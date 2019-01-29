@extends('Layout.master')

@section('body')
	
	<div class="container-fluid">
		<div class="card card-body bg-light">
			<div class="row">					
				<div class="col-sm-4">
					<div class="text-center">
				        <img src="/upload/cover/{{ $user->cover_image }}" class="avatar img-circle img-thumbnail2" alt="avatar">
				        <div class="display-4 text-dark">
				        	<dt>STAFF</dt>
				        </div>
		      		</div>
				</div>									
				<div class="col-sm-8">					
						<div class="card card-body bg-white">	
							<div class="row2">
								<div class="col-sm-6">														
									<label class="control-label col-sm-5">Name</label>													
									<div class="col-sm-7">
										<div class="text text-capitalize">
											<h4>:&nbsp{{ $user->name }}&nbsp{{ $user->lastname }}</h4>			
										</div>
									</div>
								</div>
								<div class="col-sm-6">										
									<label class="control-label col-sm-5">Status</label>									
									<div class="col-sm-7">
										@if($user->delete_at == null)				
											<h4>:&nbsp<span class="label label-success">Active</span></h4>
										@else
											<h4>:&nbsp<span class="label label-danger">Deactivate</span></h4>
										@endif
									</div>
								</div>									
							</div>						
							<div class="row2">
								<div class="col-sm-6">	
									<div class="col-sm-5">
										<label>Email</label>	
									</div>
									<div class="col-sm-7">
										<h4>:&nbsp{{ $user->email }}</h4>
									</div>
								</div>	
								<div class="col-sm-6">
									<div class="col-sm-5">	
										<label>User Type</label>			
									</div>
									<div class="col-sm-7">
										<h4>:&nbsp{{ $user->user_type }}</h4>
									</div>
								</div>						
							</div>
							<div class="row2">
								<div class="col-sm-6">	
									<div class="col-sm-5">
										<label>Identification No</label>	
									</div>
									<div class="col-sm-7">
										<h4>:&nbsp{{ $user->ic_passport }}</h4>
									</div>
								</div>	
								<div class="col-sm-6">
									<div class="col-sm-5">	
										<label>Contact No</label>			
									</div>
									<div class="col-sm-7">
										<h4>:&nbsp{{ $user->contact_no }}</h4>
									</div>
								</div>						
							</div>			
						</div>								
				</div>
			</div>	
		</div>
	
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Date</th>
					<th>Time</th>
					<th>Visitor</th>
					<th>Plate No</th>
					<th>Status</th>				
					<th>Check In</th>
					<th>Check Out</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($appointment as $appointments)
					<tr>
						<td>{{ $appointments->date }}</td>
						<td>{{ Carbon\Carbon::parse($appointments->times)->format('g:i A') }}</td>
						<td>{{ $appointments->visitor->firstname }}</td>
						<td>{{ $appointments->vehicle->vehicle_plate }}</td>
						<td>
							@if( $appointments->status == 'Pending')								
								<span class="label-custom label-primary">
									{{ $appointments->status }}</div>
								</span>
							@elseif($appointments->status == 'Check In')								
								<span class="label-custom label-success">
									{{ $appointments->status }}</div>
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
						@if($appointments->check_in == null)
							<td>{{ $appointments->check_in }}</td>
						@else
							@if($appointments->check_in == '00:00:00')
								<td>N/A</td>
							@else
								<td>{{ Carbon\Carbon::parse($appointments->check_in)->format('g:i A') }}</td>
							@endif
						@endif
						@if($appointments->check_out == null)
							<td>{{ $appointments->check_out }}</td>
						@else
							@if($appointments->check_out == '00:00:00')
								<td>N/A</td>
							@else
								<td>{{ Carbon\Carbon::parse($appointments->check_out)->format('g:i A') }}</td>
							@endif
						@endif
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
				@endforeach
			</tbody>
		</table>	
	</div>

@stop

@section('pagination')

	<div class="text text-center">
		{{ $appointment->links() }}		
	</div>

@stop


