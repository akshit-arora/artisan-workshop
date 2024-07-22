<?php

namespace App\Livewire\Plugins\DBViewer;

use App\Services\DBService;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    #[Title('Show Table Data')]

    public $tableName;
    public $tableNames;
    public $tableData;
    public $project;
    public $where = null;

    public function mount(string $tableName)
    {
        $this->tableName = $tableName;
    }

    public function render()
    {
        if (!Session::has('project')) {
            $this->redirect(route('dashboard'), navigate: true);
        }

        $this->project = Session::get('project');

        $service = new DBService();

        $this->tableNames = $service->setProject($this->project)->getTableNames($this->project);

        $service->table($this->tableName);

        $columns = $service->columns();
        $rows = $service->where($this->where)->get();

        return view('livewire.plugins.d-b-viewer.show', compact('columns', 'rows'));
    }

    public function refresh()
    {
        $this->dispatch('$refresh');
    }
}
