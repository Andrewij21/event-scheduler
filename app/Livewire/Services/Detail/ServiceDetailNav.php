<?php

namespace App\Livewire\Services\Detail;

use App\Models\Division;
use App\Models\Schedule;
use App\Models\Service;
use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class ServiceDetailNav extends Component
{
    public $search = '';
    public $searchUser = '';
    public $searchDivision = '';
    public $id; // Define the id property  

    public function updatedSearch()
    {
        $this->dispatch('search', search: $this->search);
        // $this->username = strtolower($this->username);
    }

    public function addUser($id)
    {
        $user = $this->users()->find($id);
        // dump("$id");
        Schedule::create([
            "user_id" => $user->id,
            "division_id" => $user->division_id,
            "service_id" => $this->id
        ]);
        $this->dispatch('search', search: "");
        $this->dispatch('close-modal');
    }

    #[On('refresh-user')]
    #[Computed()]
    public function users()
    {
        $scheduleId = $this->id;

        return User::latest()->whereDoesntHave('schedule', function ($query) use ($scheduleId) {
            $query->where('service_id', $scheduleId);
        })->get();
    }

    #[Computed()]
    public function divisions()
    {
        $divisions = Division::latest()->get();
        return $divisions;
    }
    public function updatedSearchDivision()
    {
        dump("helo");
        // $this->dispatch('searchDivision', search: $this->search);
        // $this->username = strtolower($this->username);
    }
    public function render()
    {
        return view('livewire.services.detail.service-detail-nav');
    }
}
