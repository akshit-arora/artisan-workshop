<?php

namespace App\Livewire\Project;

use App\Models\Project;
use Livewire\Attributes\Title;
use Livewire\Component;

class ProjectList extends Component
{
    #[Title('Projects')]
    public function render()
    {
        $projects = Project::all();

        return view('livewire.project-list', compact('projects'));
    }
}
