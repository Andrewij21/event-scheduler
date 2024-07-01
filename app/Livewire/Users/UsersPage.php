<?php

namespace App\Livewire\Users;

use Livewire\Component;

class UsersPage extends Component
{
    public function render()
    {
        return view('livewire.users.users-page')->layout('components.layout');
    }
}
