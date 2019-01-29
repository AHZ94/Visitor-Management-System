<?php

namespace App\Exports;

use App\vehicle;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class VehicleExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $vehicle = Vehicle::withTrashed()->get();

    	return view('Report.FilterVehicle',compact('vehicle'));
        //dd('hello');
    }
}
