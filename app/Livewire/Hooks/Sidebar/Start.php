<?php

namespace App\Livewire\Hooks\Sidebar;

use Filament\Notifications\Notification;
use Livewire\Component;

class Start extends Component
{
    public $selectedProject = null;
    public $projects = null;

    protected $listeners = [
        'projectCreated' => '$refresh',
        'projectUpdated' => '$refresh',
    ];

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->selectedProject = session('selected_project') ? session('selected_project')->id : null;
    }

    /**
     * Render the component.
     */
    public function render()
    {
        // Get all the active projects
        $this->projects = \App\Models\Project::where('status', 'active')->get();

        return view('livewire.hooks.sidebar.start', [
            'projects' => $this->projects,
        ]);
    }

    /**
     * Set the selected project
     */
    public function setProject($project)
    {
        $this->selectedProject = $project;
        $project = $this->projects->where('id', $project)->first();

        session()->put('selected_project', $project);

        if (is_null($project)) {
            return;
        }

        Notification::make()
            ->title('Project ' . $project->name . ' selected')
            ->success()
            ->send();

        $this->dispatch('projectSelected');

        // Redirect to dashboard
        return redirect()->route('filament.admin.pages.dashboard');
    }
}
