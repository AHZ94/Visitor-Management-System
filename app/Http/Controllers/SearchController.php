<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\visitor;
use App\user;

class SearchController extends Controller
{
    public function visitor(Request $filters){

    	$q = Visitor::query();

    	if($filters->has('name')){
    		$q->Name($filters->input('name'));
    	}

    	if($filters->has('email')){
    		$q->Email($filters->input('email'));
    	}

    	if($filters->has('ic_passport')){
    		$q->Identification($filters->input('ic_passport'));
    	}

    	if($filters->has('contact_no')){
    		$q->contact($filters->input('contact_no'));
    	}


    	$visitor = $q->paginate(7);

        return view('Visitor.ListVisitor',compact('visitor'));

    	//return $visitor;

    	// $q = Visitor::query();
    	// if($filters->has('name')){
    	// 	$q->where('firstname','like',$filters->input('name'))
     	//	->orWhere('lastname','like',$filters->input('name'));
    	// }

    	// if($filters->has('email')){
    	// 	$q->where('email','like',$filters->input('email'));
    	// }

    	// if($filters->has('ic_passport')){
    	// 	$q->where('ic_passport','like',$filters->input('ic_passport'));
    	// }

    	// if($filters->has('contact_no')){
    	// 	$q->where('contact_no','like',$filters->input('contact_no'));
    	// }

    	
    }

    public function staff(Request $filters){

        $q = User::query();

        if($filters->has('staff')){
            $q->Name($filters->input('staff'));
        }

        if($filters->has('email')){
            $q->Email($filters->input('email'));
        }

        if($filters->has('department')){
            $q->Department($filters->input('department'));
        }

        if($filters->has('user_type')){
            $q->Type($filters->input('user_type'));
        }


        $user = $q->paginate(7);

        return view('Staff.ListStaff',compact('user'));
    }

    //Search Report Visitor
    public function report_visitor(Request $filters){

        $q = Visitor::query();

        if($filters->has('name')){
            $q->Name($filters->input('name'));
        }

        if($filters->has('email')){
            $q->Email($filters->input('email'));
        }

        if($filters->has('ic_passport')){
            $q->Identification($filters->input('ic_passport'));
        }

        if($filters->has('contact_no')){
            $q->contact($filters->input('contact_no'));
        }


        $visitor = $q->withTrashed()->paginate(7);

        return view('Report.ReportVisitor',compact('visitor'));    
        
    }

    //Search Report Staff
    public function report_staff(Request $filters){

        $q = User::query();

        if($filters->has('staff')){
            $q->Name($filters->input('staff'));
        }

        if($filters->has('email')){
            $q->Email($filters->input('email'));
        }

        if($filters->has('department')){
            $q->Department($filters->input('department'));
        }

        if($filters->has('user_type')){
            $q->Type($filters->input('user_type'));
        }


        $user = $q->withTrashed()->paginate(10);

        return view('Report.ReportStaff',compact('user'));
    }
}



