<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Component;

class UsersPage extends Component
{
    #[Computed()]
    public function users()
    {
        return User::all();
    }
    public function render()
    {
        return view('livewire.users.users-page')->layout('components.layout');
    }
}
