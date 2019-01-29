@component('mail::message')
# VMS	< {{ Auth::user()->email }} >



Hi,

	Please scan this code to check in or check out for your attending appointment. 
	Notice: This code only valid for 1 day

	{!! QrCode::size(300)->generate($appointment->unique_code); !!}	

	Date : {{ $appointment->date }}
	Time : {{ $appointment->times }}
	Visit Employee : 

Thanks,<br>
{{ Auth::user()->email }} 
@endcomponent
