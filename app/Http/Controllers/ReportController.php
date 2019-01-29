<?php

namespace App\Http\Controllers;

use App\appointment;
use App\visitor;
use App\user;
use App\vehicle;
use Carbon\Carbon;
use Excel;
use App\Exports\ExportFile;
use App\Exports\UserExport;
use App\Exports\VisitorExport;
use App\Exports\VehicleExport;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todays = Carbon::today("Asia/Kuala_Lumpur")->toDateString();
        $tomorrows = Carbon::tomorrow("Asia/Kuala_Lumpur")->toDateString();
        $yesterdays = Carbon::yesterday("Asia/Kuala_Lumpur")->toDateString();
        //$yesterdays = Carbon::today("Asia/Kuala_Lumpur")->subDays(1)->toDateString();

        $today = Appointment::orderBy('times','ASC')->where('date',$todays)->paginate(9);
        $tomorrow = Appointment::orderBy('times','ASC')->where('date',$tomorrows)->paginate(9);
        $yesterday = Appointment::orderBy('date','DESC')->where('date','<',$todays)->paginate(9);        

        return view('/Report/Dashboard')
        ->with('today',$today)
        ->with('tomorrow',$tomorrow)
        ->with('yesterday',$yesterday);
        //return ($today);
    }
    public function appointment(){

        $appointment = Appointment::orderBy('date','DESC')->paginate(20);                        
        $visitor = Visitor::withTrashed()->get();
        
        return view('Report.ReportAppointment')
        ->with('appointment',$appointment)
        ->with('visitor',$visitor);
        //return ($visitor)->toArray();

    }
    public function visitor(){
        $visitor = Visitor::withTrashed()->paginate(10);

        return view('Report.ReportVisitor',compact('visitor'));                
        //return ($visitor);
        
    }

    public function vehicle(){
        $visitor = Visitor::all();
        $vehicle = Vehicle::orderBy('created_at','DESC')->withTrashed()->paginate(10);

        return view('Report.ReportVehicle')
        ->with('visitor',$visitor)
        ->with('vehicle',$vehicle);
        
        //return ($appointment);
        
    }

    public function staff(){
        $user = User::orderBy('created_at','DESC')->withTrashed()->paginate(10);
        //$user = User::where('id','!=','1')->orderBy('created_at','DESC')->paginate(10);

        return view('Report.ReportStaff',compact('user'));
        //return ($appointment);    
    }

    public function export()
    {                   
        return Excel::download(new ExportFile,'Appointment.xlsx');
        //return($appointment);
        //$appointments = $appointment->where('id','2')->with('visitor','vehicle','user')->get();        
    }

    public function userExport()
    {
        return Excel::download(new UserExport,'Employee.xlsx');
    }
    public function visitorExport()
    {
        return Excel::download(new VisitorExport,'Visitor.xlsx');
    }
    public function vehicleExport()
    {
        return Excel::download(new VehicleExport,'Vehicle.xlsx');
    }
}
