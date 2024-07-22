<?php

namespace App\Livewire\Project;

use App\Models\Project;
use App\Rules\ValidPath;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{
    #[Title('Create Project')]

    #[Validate('required|string|max:255')]
    public $name;

    #[Validate('nullable|string|max:255')]
    public $description;

    #[Validate(['required', 'string', 'max:255', new ValidPath()])]
    public $location;

    #[Validate(['required', 'string', 'in:active,inactive'])]
    public $status = 'active';

    public function render()
    {
        return view('livewire.project.create');
    }

    public function save()
    {
        $this->validate();

        Project::create([
            'name' => $this->name,
            'description' => $this->description,
            'location' => $this->location,
            'status' => $this->status,
        ]);

        return $this->redirect(route('projects.index'), navigate: true);
    }
}
