<?php

namespace App\Exports;

use App\Appointment;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportFile implements FromView
{
    public function view(): View
    {
        return view('Report.FilterAppointment', [
            'appointment' => Appointment::all()
        ]);
    }
}