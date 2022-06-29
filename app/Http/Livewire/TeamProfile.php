<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TeamProfile extends Component
{
    public $team;

    
    public function mount($team) 
    {
        $this->team = $team;
    }

    public function render()
    {
        return view('livewire.team-profile');
    }
}
