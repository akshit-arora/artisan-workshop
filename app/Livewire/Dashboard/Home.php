<?php

namespace App\Livewire\Dashboard;

use Livewire\Attributes\Title;
use Livewire\Component;

/**
 * Class Home
 * Livewire component for the dashboard home page
 * 
 * @package App\Livewire\Dashboard
 */
class Home extends Component
{
    /**
     * Title of the page
     */
    #[Title('Workshop Dashboard')]

    /**
     * Project currently being worked on
     */
    public $project = null;

    /**
     * Mount the livewire component
     */
    public function mount()
    {
        if (app('workshop')->hasProject())
        {
            $this->project = app('workshop')->getProject();
        }
    }

    /**
     * Render the livewire component
     */
    public function render()
    {
        return view('livewire.dashboard.home');
    }
}
