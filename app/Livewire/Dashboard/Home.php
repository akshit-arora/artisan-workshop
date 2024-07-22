<?php

namespace App\Livewire\Dashboard;

use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Title;
use Livewire\Component;

class Home extends Component
{
    #[Title('Workshop Dashboard')]
    public $project = null;

    public function mount()
    {
        if (Session::has('project'))
        {
            $this->project = Session::get('project');
        }
    }

    public function render()
    {
        return view('livewire.dashboard.home');
    }
}
