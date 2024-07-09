<?php

namespace App\Livewire\Services\Detail;

use App\Models\Division;
use App\Models\Schedule;
use App\Models\Service;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class ServiceDetailPage extends Component
{
    public ?string $id = null; // Define the id property 
    public $search = '';
    protected $queryString = ['id'];

    #[On('search')]
    public function updatedSearch($search)
    {
        // dump($search);
        $this->search = $search;
        unset($this->schedules);
    }

    public function destroyUserSchedule(Schedule $schedule)
    {
        Schedule::destroy($schedule->id);
        $this->dispatch('refresh-user');
    }

    #[Computed()]
    public function schedules()
    {
        return Schedule::where("service_id", $this->id)->when($this->search ?? false, function ($query, $search) {
            return $query->whereHas('user', function ($query) use ($search) {
                $query->where('name', "like", "%" . $this->search . "%");
            });
        })->get();
    }

    public function render()
    {
        $service = Service::find($this->id);
        if (isset($service)) {
            return view('livewire.services.detail.service-detail-page')->layout('components.layout');
        }

        abort(404, 'Service not found.');
    }
}
