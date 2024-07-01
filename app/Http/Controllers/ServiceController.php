<?php

namespace App\Http\Controllers;

use App\Models\service;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        // Ambil semua event untuk bulan ini
        $services = Service::whereYear('date', $currentYear)
            ->whereMonth('date', $currentMonth)
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
        // dd($weeks);
        return view("services.index", ['thisMonthServices' => $thisMonthServices]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(service $service)
    {
        //
    }
}
