<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode; 
use Carbon\Carbon;
use App\appointment;
use App\visitor;
use App\vehicle;
use App\user;
use App\Mail\AppointmentDetail;
use Image;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $appointment = appointment::orderBy('created_at','DESC')->paginate(8);


        return view('Appointment.ListAppointment',compact('appointment'));
        //return $appointment;
    }

    public function create()
    {
        
        $user = user::all()->where('user_type','staff');

        //return($user);
      
        return view('Appointment.NewVisitor',compact('user'));
    }

    public function existing(visitor $visitor)
    {
        $visitor = visitor::all();
    
        return view('Appointment.ExistingVisitor',compact('visitor'));
        //return ($visitor);
        
    }
    public function existingId(visitor $visitor,vehicle $vehicle,user $user)
    {
        $user = user::all()->where('user_type','staff');
        $visitor = visitor::all()->where('id',$visitor->id)->first();
        $vehicle = vehicle::all()->where('visitor_id',$visitor->id);
    
        return view('Appointment.MakeAppointment')
        ->with('visitor',$visitor)
        ->with('vehicle',$vehicle)
        ->with('user',$user);

        //return ($vehicle);
    }

    public function store(Request $request,appointment $appointment, visitor $visitor,vehicle $vehicle)
    {   
        if($request->hasFile('cover_image'))
        {
            $cover = $request->file('cover_image');    
            $filename  = time() . '.' . $cover->getClientOriginalExtension();
            Image::make($cover)->resize(300,300)->save(public_path('/upload/cover/' . $filename));
            $visitor->cover_image = $filename;
        }
        
        $visitor->email = request('email');
        $visitor->firstname = request('firstname');
        $visitor->lastname = request('lastname');
        $visitor->ic_passport = request('ic_passport');
        $visitor->contact_no = request('contact_no');
        $visitor->save();

        $vehicle->visitor_id = $visitor->id;
        $vehicle->vehicle_type = request('vehicle');
        $vehicle->vehicle_plate = request('plate');
        $vehicle->save();

        $appointment->user_id = request('user_id');
        $appointment->visitor_id = $visitor->id;
        $appointment->vehicle_id = $vehicle->id;
        $appointment->date = request('date');
        $appointment->times = request('time');                            
        $appointment->purpose = request('purpose');        
        $appointment->remarks = request('remarks');
        $appointment->no_person = request('no_person');
        $appointment->unique_code = str_random(6);
        $appointment->save();                

        \Mail::to($visitor->email)->send(
            new AppointmentDetail($appointment)
        );

        return redirect('/appointment')->with('message','Record Created');        
    }
    public function make(appointment $appointment,visitor$visitor,vehicle $vehicle)
    {        

        $appointment->user_id = request('user_id');
        $appointment->visitor_id = $visitor->id;
        $appointment->vehicle_id = request('vehicle');
        $appointment->date = request('date');
        $appointment->times = request('time');                            
        $appointment->purpose = request('purpose');        
        $appointment->remarks = request('remarks');
        $appointment->no_person = request('no_person');
        $appointment->unique_code = str_random(6);
        $appointment->save();
        
        \Mail::to($visitor->email)->send(
            new AppointmentDetail($appointment)
        );

        return redirect('/appointment')->with('message','Record Created');        
        //return ($appointment);
        
    }

    public function show(appointment $appointment,visitor $visitor,vehicle $vehicle)
    {

        $visitor = visitor::where('id',$appointment->visitor_id)->withTrashed()->first();
        $vehicle = vehicle::where('id',$appointment->vehicle_id)->withTrashed()->first();
     
        return view('Appointment.ViewAppointment')
        ->with('appointment',$appointment)
        ->with('visitor',$visitor)
        ->with('vehicle',$vehicle);
        //return($visitor);    

    }

    public function checkIn(appointment $appointment){        

        $time = Carbon::now("Asia/Kuala_Lumpur");

        $appointment->check_in = $time;
        $appointment->status = 'Check In';
        $appointment->save();

        return redirect('/appointment')->with('message','Appointment Updated');
        //return($time);
    }
    public function checkOut(appointment $appointment){            

        $time = Carbon::now("Asia/Kuala_Lumpur");

        $appointment->check_out = $time;
        $appointment->status = 'Check Out';
        $appointment->save();

        return redirect('/appointment')->with('message','Appointment Updated');
        //dd($appointment);
    }
    public function cancel(appointment $appointment){            
    
        $appointment->check_in = '00:00:00';
        $appointment->check_out = '00:00:00';
        $appointment->status = 'Cancelled';
        $appointment->save();

        return redirect('/appointment')->with('message','Appointment Updated');
        //dd($appointment);
    }
}
