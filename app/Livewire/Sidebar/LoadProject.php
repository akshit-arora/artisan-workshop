<?php

namespace App\Livewire\Sidebar;

use App\Models\Project;
use Livewire\Component;

/**
 * Class LoadProject
 * Livewire component for loading a project
 * 
 * @package App\Livewire\Sidebar
 */
class LoadProject extends Component
{
    /**
     * Project selected
     */
    public $selectedProject = '';

    /**
     * Mount the livewire component
     */
    public function mount()
    {
        if (app('workshop')->hasProject()) {
            $this->selectedProject = app('workshop')->getProject()->id;
        }
    }

    /**
     * Render the livewire component
     */
    public function render()
    {
        $projects = Project::where('status', 'active')->get();

        return view('livewire.sidebar.load-project', compact('projects'));
    }

    /**
     * Select a project
     */
    public function selectProject(Project $project)
    {
        app('workshop')->setProject($project);
        $this->js('window.location.reload()');
    }
}
