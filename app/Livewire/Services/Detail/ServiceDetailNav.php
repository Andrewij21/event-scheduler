<?php

namespace App\Livewire\Services\Detail;

use App\Models\Division;
use Livewire\Attributes\Computed;
use Livewire\Component;

class ServiceDetailNav extends Component
{
    public $search = '';
    public $searchUser = '';

    public function addUser()
    {
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
        return view('livewire.services.detail.service-detail-nav');
    }
}
