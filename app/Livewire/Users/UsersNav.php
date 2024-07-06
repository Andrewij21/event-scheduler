<?php

namespace App\Livewire\Users;

use App\Models\Division;
use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Component;

class UsersNav extends Component
{
    public $search = '';

    public $name;
    public $email;
    public $division_id;
    public $password;

    public function createUser()
    {
        $newUser = $this->validate([
            "name" => "required",
            "email" => "required",
            "division_id" => "required",
            "password" => "required",
        ]);
        // dump($newUser, "hi");
        User::create($newUser);
        $this->dispatch('search', search: "");
        $this->dispatch('close-modal');
    }
    public function updatedSearch()
    {
        $this->dispatch('search', search: $this->search);
        // $this->username = strtolower($this->username);
    }
    #[Computed()]
    public function divisions()
    {
        $divisions = Division::latest()->get();
        return $divisions;
    }
    public function render()
    {
        $this->division_id = $this->divisions->first()->id;
        return view('livewire.users.users-nav');
    }
}
