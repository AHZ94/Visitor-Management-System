<?php

namespace App\Http\Controllers;

use App\vehicle;
use App\visitor;
use App\Http\Requests\CreateVehicleRequest;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(visitor $visitor)
    {           
        return view('Visitor.AddVehicle',compact('visitor'));
    }

    public function store(CreateVehicleRequest $request,visitor $visitor,vehicle $vehicle)
    {   
                
        $vehicle->visitor_id = $visitor->id;
        $vehicle->vehicle_type = $request->input('vehicle');
        $vehicle->vehicle_plate = $request->input('plate');
        $vehicle->save();

        $vehicle = vehicle::all()->where('visitor_id',$visitor->id);
        

        return view('Visitor.ViewVisitor')
        ->with('vehicle',$vehicle)
        ->with('visitor',$visitor);       

    }

    public function destroy(visitor $visitor,vehicle $vehicle)
    {
        $vehicle->destroy($vehicle->id);        

        return redirect('/visitor')->with('alert','Vehicle Deleted');
    }
}
