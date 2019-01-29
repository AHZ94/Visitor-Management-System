<?php

namespace App\Exports;

use App\Visitor;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class VisitorExport implements FromView
{
   	public function view(): View
    {
        $visitor = Visitor::withTrashed()->get();

        //dd($visitor);
    	return view('Report.FilterVisitor')->with('visitor',$visitor);
    }
}
