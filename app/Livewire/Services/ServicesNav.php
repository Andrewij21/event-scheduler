<?php

namespace App\Livewire\Services;

use App\Models\Service;
use Carbon\Carbon;
use Livewire\Component;

class ServicesNav extends Component
{
    public $name;
    public $date;
    public $start_at;
    public $end_at;

    public function createNewService()
    {
        // dump([
        //     "name" => $this->name,
        //     "date" => Carbon::createFromFormat('d/m/Y', $this->date)->format('Y-m-d'),
        //     "start_at" => $this->start_at,
        //     "end_at" => $this->end_at
        // ]);
        Service::create(["name" => $this->name, "date" => Carbon::createFromFormat('d/m/Y', $this->date)->format('Y-m-d'), "start_at" => $this->start_at, "end_at" => $this->end_at]);
        $this->dispatch('service-created');
        $this->dispatch('close-modal');
    }
    public function render()
    {
        $this->start_at = Carbon::now()->format("H:i");
        $this->end_at = Carbon::now()->format("H:i");
        return view('livewire.services.services-nav');
    }
}
