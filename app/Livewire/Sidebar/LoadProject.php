<?php

namespace App\Livewire\Sidebar;

use App\Models\Project;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class LoadProject extends Component
{
    public $selectedProject = '';

    public function mount()
    {
        if (Session::has('project'))
            $this->selectedProject = Session::get('project')->id;
    }

    public function render()
    {
        $projects = Project::where('status', 'active')->get();

        return view('livewire.sidebar.load-project', compact('projects'));
    }

    public function selectProject(Project $project)
    {
        Session::put('project', $project);
        $this->js('window.location.reload()');
    }
}
