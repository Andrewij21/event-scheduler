<?php

namespace App\Livewire\Services;

use App\Models\Service;
use App\View\Components\Layout;
use Carbon\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;

class ServicesPage extends Component
{
    // #[Url(as: 'id', history: true)]
    // public ?string $selectedService;
    // public function viewService($id)
    // {
    //     $this->selectedService = $id;
    // }

    #[On('service-created')]
    public function serviceCreated()
    {
        unset($this->thisMonthServices);
    }
    #[Computed()]
    public function currentServices()
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        // Ambil semua event untuk bulan ini
        return Service::whereYear('date', $currentYear)
            ->whereMonth('date', $currentMonth)->orderBy('date', 'asc')
            ->get();

    }

    public function destroyService(Service $service)
    {
        Service::destroy($service->id);
    }
    public function render()
    {
        return view('livewire.services.services-page')->layout('components.layout');
    }
}
