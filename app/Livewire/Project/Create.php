<?php

namespace App\Livewire\Project;

use App\Models\Project;
use App\Rules\ValidPath;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

/**
 * Class Create
 * Livewire component for creating a project
 * 
 * @package App\Livewire\Project
 */
class Create extends Component
{
    /**
     * Create a new project
     */
    #[Title('Create Project')]

    /**
     * The name of the project
     */
    #[Validate('required|string|max:255')]
    public $name;

    /**
     * The description of the project
     */
    #[Validate('nullable|string|max:255')]
    public $description;

    /**
     * The location of the project
     */
    #[Validate(['required', 'string', 'max:255', new ValidPath()])]
    public $location;

    /**
     * The status of the project
     */
    #[Validate(['required', 'string', 'in:active,inactive'])]
    public $status = 'active';

    /**
     * Render the component
     * 
     * @return \Illuminate\View\View
     */
    public function render(): \Illuminate\View\View
    {
        return view('livewire.project.create');
    }

    /**
     * Save the new project
     * 
     * @return void
     */
    public function save(): void
    {
        $this->validate();

        Project::create([
            'name' => $this->name,
            'description' => $this->description,
            'location' => $this->location,
            'status' => $this->status,
        ]);

        $this->redirect(route('projects.index'), navigate: true);
    }
}
