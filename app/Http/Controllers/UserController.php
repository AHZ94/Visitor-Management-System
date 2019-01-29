<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use App\user;
use App\appointment;
use App\vehicle;
use App\visitor;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::where('user_type','staff')->paginate(7);

        return view('Staff.ListStaff',compact('user'));
        //return ($user);
    }

    public function create()
    {
        return view('Staff.AddStaff',compact('user'));
    }

    public function store(Request $request,user $user)
    {        
        $password = bcrypt('0000');
        
        request()->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'ic_passport'=> 'required',
            'department' => 'required',
            'user_type' => 'required',                   
            'password' => $password,                   
        ]);

        if($request->hasFile('cover_image'))
        {
            $cover = $request->file('cover_image');    
            $filename  = time() . '.' . $cover->getClientOriginalExtension();
            Image::make($cover)->resize(300,300)->save(public_path('/upload/cover/' . $filename));
            $user->cover_image = $filename;
        }

        $password = bcrypt('0000');      
        $user->password = $password;
        $user->contact_no = request('contact_no');

        $user->name = request('firstname');
        $user->lastname = request('lastname');
        $user->email = request('email');
        $user->ic_passport = request('ic_passport');
        $user->department = request('department');
        $user->user_type = request('user_type');                                        
        $user->save();

        return redirect('/user');
        //return($user);
    }

    public function show(user $user,appointment $appointment,visitor $visitor, vehicle $vehicle)
    {   


        $user = User::all()->where('id',$user->id)->first();        
        $appointment = Appointment::where('user_id',$user->id)->paginate(5);        

        return view('Staff.ViewStaff')
        ->with('user',$user)
        ->with('appointment',$appointment);        
        
        //return ($appointment);
    }
    public function profile(user $user)
    {           
        return view('Staff.AdminProfile',compact('user'));        
    }
    public function edit(user $user)
    {
        return view('Staff.UpdateStaff',compact('user'));
    }

    public function update(Request $request,user $user)
    {         
        if($request->hasFile('cover_image'))
        {
            $cover = $request->file('cover_image');    
            $filename  = time() . '.' . $cover->getClientOriginalExtension();
            Image::make($cover)->resize(300,300)->save(public_path('/upload/cover/' . $filename));
            $user->cover_image = $filename;   
        }        

        $user->name = request('name');
        $user->lastname = request('lastname');
        $user->email = request('email');
        $user->ic_passport = request('ic_passport');
        $user->contact_no = request('contact_no');
        $user->department = request('department');
        $user->user_type = request('user_type');         
        $user->save();

        return redirect('/user');
        //return ($user);
    }

    public function destroy(user $user)
    {
        $user->destroy($user->id);        

        return redirect('/user');
    }
}
