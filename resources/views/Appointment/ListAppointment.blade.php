@extends('Layout.master')

@section('body')		
		
	<div class="container-fluid text-center">		
		<div class="table-responsive">
		<table  class="table table-borderless">
			<thead class="text-center">
				<tr>
					<th>Date</th>
					<th>Status</th>
					<th>Time</th>
					<th>No. Person</th>
					<th>Visitor</th>					
					<th>Visit Employee</th>
					<th>Check In</th>
					<th>Check Out</th>
					<th>Approval</th>					
					<th>Action</th>					
				</tr>
			</thead>
			<tbody>
				@foreach($appointment as $appointments)
					<tr>					
						<td>{{ $appointments->date }}</td>
						<td>
							@if( $appointments->status == 'Pending')								
								<span class="label-custom label-primary">
									{{ $appointments->status }}
								</span>
							@elseif($appointments->status == 'Check In')								
								<span class="label-custom label-success">
									{{ $appointments->status }}
								</span>								
							@elseif($appointments->status == 'Check Out')								
								<span class="label-custom label-warning">
									{{ $appointments->status }}
								</span>								
							@elseif($appointments->status == 'Cancelled')								
								<span class="label-custom label-danger">
									{{ $appointments->status }}
								</span>							
							@endif
						</td>
						<td>{{ Carbon\Carbon::parse($appointments->times)->format('g:i A') }}</td>
						<td>{{ $appointments->no_person }}</td>
						<td>
							<span class="text-capitalize">
								{{$appointments->visitor->firstname}} {{$appointments->visitor->lastname}}
							</span>
						</td>						
						<td>
							<span class="text-capitalize">
								{{ $appointments->user->name }} {{ $appointments->user->lastname }}
							</span>
						</td>
						<td>
							@if($appointments->check_in == null)
								{{ $appointments->check_in }}
							@else
								@if($appointments->check_in == '00:00:00')
									N/A
								@else
									{{ Carbon\Carbon::parse($appointments->check_in)->format('g:i A') }}
								@endif
							@endif
						</td>
						<td>						
							@if($appointments->check_out == null)
								{{ $appointments->check_out }}
							@else
								@if($appointments->check_out == '00:00:00')
									N/A
								@else
									{{ Carbon\Carbon::parse($appointments->check_out)->format('g:i A') }}
								@endif
							@endif	
						</td>
						<td>{{ $appointments->approval }}</td>
						<td>
							@if($appointments->status=="Pending")
								<a href="\appointment\{{ $appointments->id }}">
									<button type="button" class="btn btn-primary btn-sm" aria-label="Left Align">
									  <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
									</button>
								</a>																				
								<form method="POST" action="/appointment/{{ $appointments->id }}/check-in" style="display: inline;">	
									@method('PATCH')
									@csrf
									<button type="submit" class="btn btn-success btn-sm" aria-label="Left Align">
									  <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
									</button>
								</form>						
							@elseif($appointments->status=="Check In")
								<a href="\appointment\{{ $appointments->id }}">
									<button type="button" class="btn btn-primary btn-sm" aria-label="Left Align">
									  <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
									</button>
								</a>	
								<form method="POST" action="/appointment/{{ $appointments->id }}/check-out" style="display: inline;"> 		
									@method('PATCH')
									@csrf
									<button type="submit" class="btn btn-danger btn-sm" aria-label="Left Align">
									  <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
									</button>
								</form>								

							@elseif($appointments->status=="Check Out")
								<a href="\appointment\{{ $appointments->id }}">
									<button type="button" class="btn btn-primary btn-sm" aria-label="Left Align">
									  <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
									</button>
								</a>									
							@elseif($appointments->status=="Cancelled")
								<a href="\appointment\{{ $appointments->id }}">
									<button type="button" class="btn btn-primary btn-sm" aria-label="Left Align">
									  <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
									</button>
								</a>
							@endif						
						</td>
					</tr>
				@endforeach()				
			</tbody>
		</table>		
		</div>						
	</div>
@stop

@section('pagination')
	
		<div class="text text-center">
			{{ $appointment->links() }}		
		</div>
	
@stop

@section('filter')	
	<div class="collapse" id="collapse1">
		<div class="container-fluid">
			<div class="card card-body bg-light">					
				<form>
					<div class="form-row">
						<div class="form-group col-md-2">
							<label>Start Date</label>							
							<input type="date" name="start-date" class="form-control">									
						</div>						
						<div class="form-group col-md-2">						
							<label>End Date</label>	
							<input type="date" name="end-date" class="form-control">									
						</div>						
						<div class="form-group offset-md-4 col-md-2">
							<label>Start Time</label>							
							<input type="time" name="start-time" class="form-control">									
						</div>						
						<div class="form-group col-md-2">						
							<label>End Time</label>	
							<input type="time" name="end-time" class="form-control">									
						</div>
					</div>
					
				</form>
			</div>
		</div>
	</div>
@stop


@section('icon')
	<div class="container-fluid mb-1">		
		<div class="dropdown pull-right">
		  <a class="nav-link btn-sm btn-custom" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="">
		    <span class="glyphicon glyphicon-plus"></span>
		  </a>
		  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		    <a class="dropdown-item" href="/appointment/create">Register New Visitor</a>
			<a class="dropdown-item" href="/existing">Register Existing</a>			    
		  </div>
		</div>		
		<a class="nav-link pull-right" data-toggle="collapse" href="#collapse1" role="button" aria-expanded="false" aria-controls="collapse1">	
			<span class="glyphicon glyphicon-search"></span>
		</a>
	</div>
@stop