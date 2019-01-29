@extends('Layout.master')

@section('body')		

	<div class="container-fluid text-center">
		<div class="table-responsive text-wrap">				
			<table  class="table table-borderless">
				<thead class="text-center">
					<tr>
						<th>Code</th>
						<th>Date</th>
						<th >Time</th>
						<th>Status</th>
						<th>Check In</th>	
						<th>Check Out</th>
						<th>No. Person</th>
						<th>Visitor</th>
						<th>Plate No</th>
						<th>Visit Employee</th>
						<th>Approval</th>
						<th style="width: 15%">Remarks</th>					
					</tr>
				</thead>
				<tbody>
					@foreach($appointment as $appointments)
						<tr>						
							<td>{{ $appointments->unique_code }}</td>
							<td>{{ $appointments->date }}</td>
							<td>{{ Carbon\Carbon::parse($appointments->times)->format('g:i A') }}</td>
							<td>
								 @if($appointments->status == 'Pending')
				                    <span class="label-custom label-primary">
				                      {{ $appointments->status  }}
				                    </span>
				                  @elseif($appointments->status  == 'Check In')
				                    <span class="label-custom label-success">
				                      {{ $appointments->status  }}
				                    </span>
				                  @elseif($appointments->status  == 'Check Out')
				                    <span class="label-custom label-warning">
				                      {{ $appointments->status  }}
				                    </span>
				                  @elseif($appointments->status  == 'Cancelled')
				                    <span class="label-custom label-danger">
				                      {{ $appointments->status  }}
				                    </span>
				                  @endif
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
							<td>{{ $appointments->no_person }}</td>														
							<td>
								<span class="text-capitalize"> {{ $appointments->visitor->firstname }} {{ $appointments->visitor->lastname }}</span>
							</td>							
							<td>{{ $appointments->vehicle->vehicle_plate }}</td>
							<td>
								<span class="text-capitalize">{{ $appointments->user->name }} {{ $appointments->user->lastname }}</span>
							</td>
							<td>{{ $appointments->approval }}</td>
							<td style="width: 100px;">{{ $appointments->remarks }}</td>					
						</tr>
					@endforeach					
				</tbody>
			</table>					
		</div>		
	</div>
@stop

@section('pagination')	
	<div class="hidden-print">		
		<div class="text-center">			
			{{ $appointment->links() }}
		</div>		
	</div>
@stop

@section('filter')
	<div class="hidden-print">
		<div class="collapse" id="collapse1">	
			<div class="container-fluid">
					<div class="card card-body bg-light">					
						<form>
						<div class="row">
							<div class="form-group col-md-4">
								<div class="row">
									<div class="col-md-4">
										<label>Start Date</label>
									</div>
										
									<div class="col-md-8">															
						                <div class="form-group">
								            <div class='input-group date'>
								                <input type='date' class="form-control" />
								                <span class="input-group-addon">
								                    <span class="glyphicon glyphicon-calendar"></span>
								                </span>
								            </div>
								        </div>					                						            
									</div>
								</div>
							</div>
							<div class="form-group offset-md-4 col-md-4">
								<div class="row">
									<div class="col-md-4">
										<label>End Date</label>
									</div>
									<div class="col-md-8">															
						                <div class='input-group time'>
					                    <input type='time' class="form-control" />
						                    <span class="input-group-addon">
						                        <span class="glyphicon glyphicon-time"></span>
						                    </span>
					                	</div>						               						           
									</div>									
			                	</div>
							</div>		                										
							<div class="form-group col-md-4">						
								<div class="row">
									<div class="form-group col-md-4">
										<label>Unique Code</label>
									</div>
									<div class="form-group col-md-8">					
										<input type="text" name="unique_code" class="form-control" placeholder="">
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-4">
										<label>Start Time</label>
									</div>
									<div class="form-group col-md-8">					
										<input type="text" name="time" class="form-control" placeholder="">
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-4">
										<label>Visitor</label>
									</div>
									<div class="form-group col-md-8">					
										<input type="text" name="email" class="form-control" placeholder="">
									</div>
								</div>										
							</div>				
							<div class="form-group col-md-4">
								<div class="row">
									<div class="form-group col-md-4">
										<label>Status</label>
									</div>
									<div class="form-group col-md-8">					
										<input type="text" name="status" class="form-control" placeholder="">
									</div>
								</div>	
								<div class="row">
									<div class="form-group col-md-4">
										<label>End Time</label>
									</div>
									<div class="form-group col-md-8">				
										<input type="text" name="time" class="form-control" placeholder="">
									</div>
								</div>	
								<div class="row">
									<div class="form-group col-md-4">
										<label>Vehicle Plate</label>
									</div>
									<div class="form-group col-md-8">					
										<input type="text" name="plate" class="form-control" placeholder="">			
									</div>
								</div>					
							</div>
							<div class="form-group col-md-4">					
								<div class="row">
									<div class="form-group col-md-4">
										<label>Approval</label>
									</div>
									<div class="form-group col-md-8">
										<select class="custom-select custom-select-lg mb-3">
										  <option value="admin" selected>Admin</option>
										  <option value="security">Security</option>							  
										</select>
									</div>
								</div>	
								<div class="row">
									<div class="form-group col-md-4">
										<label>Visit Staff</label>
									</div>
									<div class="form-group col-md-8">					
										<input type="text" name="Employee" class="form-control" placeholder="">				
									</div>
								</div>					
							</div>
						</div>
						<div class="pull-right mt-1">
							<button type="submit" class="btn btn-lg btn-primary">Search</button>
						</div>	
					</form>
				</div>			
			</div>	
		</div>
	</div>
@stop

@section('icon')
	<div class="hidden-print">
		<div class="container-fluid mb-2">		
			<a class="nav-link pull-right" href="javascript:window.print()" role="button" aria-expanded="false">	
				<span class="glyphicon glyphicon-print"></span>
			</a>
			<a class="nav-link pull-right" href="/report/download" role="button">	
				<span class="glyphicon glyphicon-file"></span>
			</a>
			<a class="nav-link pull-right" data-toggle="collapse" href="#collapse1" role="button" aria-expanded="false" aria-controls="collapse1">	
				<span class="glyphicon glyphicon-search"></span>
			</a>
		</div>
	</div>
@stop

