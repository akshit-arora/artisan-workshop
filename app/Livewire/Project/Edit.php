<?php

namespace App\Livewire\Project;

use App\Models\Project;
use App\Rules\ValidPath;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

/**
 * Class Edit
 * Livewire component for editing a project
 * 
 * @package App\Livewire\Project
 */
class Edit extends Component
{
    /**
     * Title of the page
     */
    #[Title('Edit Project')]

    /**
     * Project being edited
     */
    public $project;

    /**
     * Name of the project
     */
    #[Validate('required|string|max:255')]
    public $name;

    /**
     * Description of the project
     */
    #[Validate('nullable|string|max:255')]
    public $description;

    /**
     * Location of the project
     */
    #[Validate(['required', 'string', 'max:255', new ValidPath()])]
    public $location;

    /**
     * Status of the project
     */
    #[Validate(['required', 'string', 'in:active,inactive'])]
    public $status;

    /**
     * Mount the livewire component
     */
    public function mount(Project $project)
    {
        $this->project = $project;

        $this->name = $project->name;
        $this->description = $project->description;
        $this->location = $project->location;
        $this->status = $project->status;
    }

    /**
     * Render the livewire component
     */
    public function render()
    {
        return view('livewire.project.edit');
    }

    /**
     * Save the project
     */
    public function save()
    {
        $this->validate();

        $this->project->update([
            'name' => $this->name,
            'description' => $this->description,
            'location' => $this->location,
            'status' => $this->status,
        ]);

        $workshop = app('workshop');

        if ($workshop->hasProject() && $workshop->getProject()->id == $this->project->id) {
            $workshop->setProject($this->project);
        }

        return $this->redirect(route('projects.index'), navigate: true);
    }
}
