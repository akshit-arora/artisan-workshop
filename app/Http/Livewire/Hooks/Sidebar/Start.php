<?php

namespace App\Http\Livewire\Hooks\Sidebar;

use Livewire\Component;

class Start extends Component
{
    public $selectedProject = '';

    protected $listeners = [
        'projectCreated' => '$refresh',
        'projectUpdated' => '$refresh',
    ];

    public function render()
    {
        // Get all the active projects
        $projects = \App\Models\Project::where('status', 'active')->get();

        return view('livewire.hooks.sidebar.start', [
            'projects' => $projects,
        ]);
    }
}
