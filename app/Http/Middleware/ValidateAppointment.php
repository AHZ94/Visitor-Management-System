<?php

namespace App\Http\Middleware;

use Closure;
use App\appointment;
use Carbon\Carbon;

class ValidateAppointment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $appointment = Appointment::all();
        $today = Carbon::today("Asia/Kuala_Lumpur")->toDateString();

        foreach ($appointment as $appointments) {
            if($appointments->date < $today)
            {
                if($appointments->status == 'Pending')
                {
                    $appointments->status = 'Cancelled';
                    $appointments->check_in = '00:00:00';
                    $appointments->check_out = '00:00:00';    
                    $appointments->save();
                }
                elseif($appointments->status == 'Check In')
                {
                    //$appointments->status = 'Cancelled';                    
                    $appointments->check_out = '00:00:00';    
                    $appointments->save();
                }
                //else{}               
            }
            //else{}                
        }
        return $next($request);
    }
}
