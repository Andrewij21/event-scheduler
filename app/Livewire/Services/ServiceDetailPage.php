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
    public $selectedDivisionId; // Define the id property
    public $selectedDivision = "All"; // Define the id property
    public $search = '';
    public function filterDivision($id, $name = "All")
    {
        $this->selectedDivisionId = $id;
        $this->selectedDivision = $name;
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
            $query = Schedule::where('service_id', $service->id)
                ->when($this->selectedDivisionId, function ($query) {
                    return $query->where('division_id', $this->selectedDivisionId);
                })
                ->when($this->search, function ($query) {
                    return $query->whereHas('user', function ($q) {
                        $q->where('name', 'like', '%' . $this->search . '%');
                    });
                })->get();

            return view('livewire.services.detail', ['schedules' => $query])->layout('components.layout');
        }

        abort(404, 'Service not found.');
    }
}
