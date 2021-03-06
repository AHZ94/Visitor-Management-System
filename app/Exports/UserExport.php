<?php

namespace App\Exports;

use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UserExport implements FromView
{

    public function view(): View
    {
    	$user = User::withTrashed()->where('id','!=','1')->get();

    	//dd($user)
        return view('Report.FilterStaff',compact('user'));
    }
}
