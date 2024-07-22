<?php

namespace App\Livewire\Plugins\DBViewer;

use App\Services\DBService;
use App\Services\EnvReaderService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{
    #[Title('Database Viewer')]

    public $project = null;
    private $envReader;
    public $tableNames;
    public $search;

    private function loadTables()
    {
        $this->project = Session::get('project');

        $service = new DBService();

        return $service->setProject($this->project)->getTableNames($this->project);

        // return $tableNames;
    }

    public function render()
    {
        if (!Session::has('project')) {
            return redirect()->route('dashboard');
        }

        $this->tableNames = $this->loadTables();

        if ($this->search != '') {
            $this->tableNames = Arr::where($this->tableNames, function ($value, $key) {
                return Str::contains($value, $this->search);
            });
        }

        return view('livewire.plugins.d-b-viewer.index');
    }
}
