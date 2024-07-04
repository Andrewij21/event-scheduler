<?php

namespace App\Livewire\Users;

use Livewire\Component;

class UsersNav extends Component
{
    public $search = '';

    public function updatedSearch()
    {
        $this->dispatch('search', search: $this->search);
        // $this->username = strtolower($this->username);
    }
    public function render()
    {
        return view('livewire.users.users-nav');
    }
}
