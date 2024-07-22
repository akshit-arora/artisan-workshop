<?php

namespace App\Livewire\Plugins\DBViewer;

use App\Services\DBService;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    public $tableName;
    public $tableData;
    public $project;
    public $where = null;

    public function updatingWhere()
    {
        $this->resetPage();
    }

    public function mount(?string $tableName = null)
    {
        $this->tableName = $tableName;
    }

    public function render()
    {
        if (!Session::has('project')) {
            $this->redirect(route('dashboard'), navigate: true);
        }

        $this->project = Session::get('project');

        $columns = $rows = [];

        if ($this->tableName != null) {
            $service = new DBService();

            $service->setProject($this->project)->table($this->tableName);

            $columns = $service->columns();
            $rows = $service->where($this->where)->get();
        }

        return view('livewire.plugins.d-b-viewer.show', compact('columns', 'rows'));
    }

    public function refresh()
    {
        $this->resetPage();
    }
}
