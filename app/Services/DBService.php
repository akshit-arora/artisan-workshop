<?php

namespace App\Services;

use App\Models\Project;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class DBService
{
    private $dbType = 'mysql';
    private $project;
    private $configName;
    private $tableName;
    private $where = null;
    private $offset = 0;
    private $limit = 50;

    public function setProject(Project $project)
    {
        $this->project = $project;

        $this->configName =$this->getDBConfig($this->project);

        return $this;
    }

    public function getTableNames()
    {
        $tableNames = [];

        $configName = $this->getDBConfig($this->project);

        if ($this->dbType == 'sqlite') {
            $result = DB::connection($configName)->select("select * from sqlite_master where type='table'");

            foreach ($result as $row) {
                $tableNames[] = $row->name;
            }
        } elseif ($this->dbType == 'mysql') {
            $result = DB::connection($configName)->select("SHOW TABLES");

            foreach ($result as $row) {
                $row = array_values(json_decode(json_encode($row), true));

                $tableNames[] = $row[0];
            }
        }

        return $tableNames;
    }

    public function table(string $tableName)
    {
        $this->tableName = $tableName;

        return $this;
    }

    public function offset(int $offset)
    {
        $this->offset = $offset;

        return $this;
    }

    public function limit(int $limit)
    {
        $this->limit = $limit;

        return $this;
    }

    public function where(?string $where)
    {
        if ($where && $where != '') {
            $this->where = $where;
        }

        return $this;
    }

    public function columns()
    {
        $db = DB::connection($this->configName);

        $columnNames = [];

        if ($this->dbType == 'sqlite') {
            $columns = $db->select('PRAGMA table_info(' . $this->tableName . ')');

            $columnNames = Arr::pluck($columns, 'name');
        } elseif ($this->dbType == 'mysql') {
            $columnNames = $db->select('SHOW COLUMNS FROM ' . $this->tableName);
            // $columnNames = $db->getSchemaBuilder()->getColumnListing($this->tableName);
            $columnNames = Arr::pluck($columnNames, 'Field');
        }

        return $columnNames;
    }

    public function get()
    {
        $db = DB::connection($this->configName)->table($this->tableName);

        try {
            if ($this->where && $this->where != '') {
                $db->whereRaw($this->where);
            }

            return $db->offset($this->offset)->limit($this->limit)->get();
        } catch (Exception $e) {
            $this->where = '';

            return $this->get();
        }
    }

    private function getDBConfig(Project $project)
    {
        $envReader = new EnvReaderService();

        $configValues = $envReader->get(
            $project->location,
            ['DB_CONNECTION', 'DB_HOST', 'DB_PORT', 'DB_DATABASE', 'DB_USERNAME', 'DB_PASSWORD']
        );

        $this->dbType = $configValues['DB_CONNECTION'];

        if ($this->configName == $this->dbType . '_' . $project->id) {
            return $this->configName;
        }

        if ($configValues['DB_CONNECTION'] == 'sqlite') {
            $database = ($configValues['DB_DATABASE'] ?? 'database') . '.sqlite';

            $path = $project->location;

            // Check if the path has / in the end.
            if (substr($path, -1) !== '/' && substr($path, -1) !== '\\') {
                $path .= '/';
            }

            $database = $project->location . 'database/' . $database;

            $configName = 'sqlite_' . $project->id;

            Config::set('database.connections.' . $configName, [
                'driver' => 'sqlite',
                'database' => $database,
            ]);

            return $configName;
        } elseif ($configValues['DB_CONNECTION'] == 'mysql') {
            $configName = 'mysql_' . $project->id;

            Config::set('database.connections.' . $configName, [
                'driver' => 'mysql',
                'host' => $configValues['DB_HOST'],
                'port' => $configValues['DB_PORT'],
                'database' => $configValues['DB_DATABASE'],
                'username' => $configValues['DB_USERNAME'],
                'password' => $configValues['DB_PASSWORD'],
            ]);

            return $configName;
        }
    }
}
