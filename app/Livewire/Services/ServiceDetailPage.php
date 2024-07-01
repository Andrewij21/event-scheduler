<?php

namespace App\Livewire\Services;

use App\Models\Division;
use App\Models\Schedule;
use App\Models\Service;
use Livewire\Attributes\Computed;
use Livewire\Component;

class ServiceDetailPage extends Component
{
    public ?string $id = null; // Define the id property
    public $selectedDivision; // Define the id property
    public $search = '';
    public function filterDivision($id)
    {
        $this->selectedDivision = $id;
    }
    protected $queryString = ['id'];

    #[Computed()]
    public function divisions()
    {
        return Division::latest()->get();
    }

    public function destroyUserSchedule(Schedule $schedule)
    {
        Schedule::destroy($schedule->id);
    }

    public function render()
    {
        $service = Service::find($this->id);
        if (isset($service)) {
            $query = collect($service->schedule)->when($this->selectedDivision ?? false, function ($collection) {
                return $collection->where("division_id", $this->selectedDivision);
            });
            dump($query);
            // if ($this->searchTerm) {
            //     $query->where('name', 'like', '%' . $this->searchTerm . '%');
            // }

            $schedules = $query;

            return view('livewire.services.detail', ['schedules' => $schedules])->layout('components.layout');
        }

        abort(404, 'Service not found.');
    }
}
