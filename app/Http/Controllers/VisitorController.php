<?php

namespace App\Http\Controllers;

use App\visitor;
use App\vehicle;
use Image;
use Illuminate\Http\Request;


class VisitorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $visitor = visitor::paginate(7);
       

        return view('Visitor.ListVisitor',compact('visitor'));   
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //       
    }

    public function show(visitor $visitor,vehicle $vehicle)
    {   
            
        $vehicle = vehicle::all()->where('visitor_id',$visitor->id);

        return view('Visitor.ViewVisitor')
        ->with('visitor',$visitor)
        ->with('vehicle',$vehicle);
    }

    public function edit(visitor $visitor)
    {
        return view('Visitor.UpdateVisitor',compact('visitor'));
    }

    public function update(Request $request,visitor $visitor)
    {         
        if($request->hasFile('cover_image'))
        {
            $cover = $request->file('cover_image');    
            $filename  = time() . '.' . $cover->getClientOriginalExtension();
            Image::make($cover)->resize(300,300)->save(public_path('/upload/cover/' . $filename));
            $visitor->cover_image = $filename;
        }        

        $visitor->firstname = request('firstname');
        $visitor->lastname = request('lastname');
        $visitor->ic_passport = request('ic_passport');
        $visitor->contact_no = request('contact_no');
        $visitor->email = request('email');        
        $visitor->save();

        return redirect('/visitor');
    }

    public function destroy(visitor $visitor)
    {
        $visitor->destroy($visitor->id);        

        return redirect('/visitor');
    }


}
