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
    #[Computed()]
    public function thisMonthServices()
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        // Ambil semua event untuk bulan ini
        $services = Service::whereYear('date', $currentYear)
            ->whereMonth('date', $currentMonth)->orderBy('date', 'asc')
            ->get();
        // dd($services);

        $thisMonthServices = [];

        foreach ($services as $service) {
            $date = Carbon::parse($service->date);
            $weekStart = $date->copy()->startOfWeek(Carbon::MONDAY);
            $weekEnd = $date->copy()->endOfWeek(Carbon::SUNDAY);
            $weekKey = $weekStart->format('d') . '-' . $weekEnd->format('d F Y');

            $thisMonthServices[$weekKey][] = $service;
        }
        ;
        // dump($thisMonthServices);
        return $thisMonthServices;
    }

    public function destroyService(Service $service)
    {
        Service::destroy($service->id);
    }
    public function render()
    {
        return view('livewire.services.index')->layout('components.layout');
    }
}
