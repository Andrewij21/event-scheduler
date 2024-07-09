<?php

namespace App\Livewire\Services\Detail;

use App\Models\Division;
use App\Models\Schedule;
use Livewire\Attributes\Computed;
use Livewire\Component;

class ServiceDetailNav extends Component
{
    public $search = '';
    public $searchUser = '';
    public $id; // Define the id property  
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
    public function users()
    {
        return Schedule::whereNotIn("service_id", [$this->id])->whereHas("user", function ($q) {
            return $q->where('name', "like", "%" . $this->searchUser . "%");
        })->get();
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
