<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class UsersPage extends Component
{
    public $search = '';
    #[On('search')]
    public function updatedSearch($search)
    {
        $this->search = $search;
        unset($this->users);
    }
    #[Computed()]
    public function users()
    {
        return User::where("name", "like", "%" . $this->search . "%")->get();
    }
    public function destroyUser(User $user)
    {
        User::destroy($user->id);
    }
    public function render()
    {
        return view('livewire.users.users-page')->layout('components.layout');
    }
}
