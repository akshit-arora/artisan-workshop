<?php

namespace App\Livewire\Project;

use App\Models\Project;
use Livewire\Attributes\Title;
use Livewire\Component;

/**
 * Class ProjectList
 * Livewire component for listing projects
 * 
 * @package App\Livewire\Project
 */
class ProjectList extends Component
{
    /**
     * Set the title
     */
    #[Title('Projects')]

    /**
     * Render the component
     *
     * @return \Illuminate\View\View
     */
    public function render(): \Illuminate\View\View
    {
        $projects = Project::all();

        return view('livewire.project-list', compact('projects'));
    }
}
