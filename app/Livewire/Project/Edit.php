<?php

namespace App\Livewire\Project;

use App\Models\Project;
use App\Rules\ValidPath;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Edit extends Component
{
    #[Title('Edit Project')]

    public $project;

    #[Validate('required|string|max:255')]
    public $name;

    #[Validate('nullable|string|max:255')]
    public $description;

    #[Validate(['required', 'string', 'max:255', new ValidPath()])]
    public $location;

    #[Validate(['required', 'string', 'in:active,inactive'])]
    public $status;

    public function mount(Project $project)
    {
        $this->project = $project;

        $this->name = $project->name;
        $this->description = $project->description;
        $this->location = $project->location;
        $this->status = $project->status;
    }

    public function render()
    {
        return view('livewire.project.edit');
    }

    public function save()
    {
        $this->validate();

        $this->project->update([
            'name' => $this->name,
            'description' => $this->description,
            'location' => $this->location,
            'status' => $this->status,
        ]);

        if (Session::has('project') && Session::get('project')->id == $this->project->id) {
            Session::put('project', $this->project);
        }

        return $this->redirect(route('projects.index'), navigate: true);
    }
}
