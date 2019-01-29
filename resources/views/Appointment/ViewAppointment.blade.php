@extends('Layout.master')

@section('body')

	<div class="container-fluid">
		<div class="card card-body bg-light">
			<div class="row">					
				<div class="col-sm-4">
					<div class="text-center">
				        <img src="/upload/cover/{{ $visitor->cover_image }}" class="avatar img-fluid img-thumbnail img-circle img-thumbnail" alt="avatar">
				        <div class="display-1 text-dark">
				        	<dt>VISITOR</dt>
				        </div>
		      		</div>
				</div>									
				<div class="col-sm-8">						
					<div class="card card-body bg-white mb-3">
						<div class="row">				
							<div class="col-sm-6">
								<div class="row">
									<div class="col-sm-5">
										<label>STATUS</label>
									</div>
									<div class="col-sm-7">
										<label><span>:&nbsp</span></label>
										@if( $appointment->status == 'Pending')								
											<span class="label-custom label-primary">
												{{ $appointment->status }}
											</span>											
										@elseif($appointment->status == 'Check In')											
											<span class="label-custom label-success">
												{{ $appointment->status }}
											</span>											
										@elseif($appointment->status == 'Check Out')											
											<span class="label-custom label-warning">
												{{ $appointment->status }}
											</span>														
										@elseif($appointment->status == 'Cancelled')											
											<span class="label-custom label-danger">
												{{ $appointment->status }}
											</span>														
										@endif																				
									</div>
								</div>
								<div class="row">
									<div class="col-sm-5">
										<label>DATE</label>
									</div>
									<div class="col-sm-7">
										<h5><span>:&nbsp</span>{{ $appointment->date }}</h5>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-5">
										<label>CHECK IN</label>
									</div>
									<div class="col-sm-7">
										@if($appointment->check_in == null)
											<h5><span>:&nbsp</span>{{ $appointment->check_in}}</h5>
										@else
											@if($appointment->check_in == '00:00:00')
												<h5><span>:&nbsp</span>N/A</h5>
											@else
												<h5><span>:&nbsp</span>{{ Carbon\Carbon::parse($appointment->check_in)->format('g:i A') }}</h5>
											@endif
										@endif
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="row2">
									<br>
								</div>
								<div class="row">
									<div class="col-sm-5">
										<label>TIME</label>
									</div>
									<div class="col-sm-7">
										<h5><span>:&nbsp</span>{{ Carbon\Carbon::parse($appointment->times)->format('g:i A') }}</h5>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-5">
										<label>CHECK OUT</label>
									</div>
									<div class="col-sm-7">
										@if($appointment->check_out == null)
											<label><span>:&nbsp</span>{{ $appointment->check_out}}</label>
										@else
											@if($appointment->check_out == '00:00:00')
												<h5><span>:&nbsp</span>N/A</h5>
											@else
												<h5><span>:&nbsp</span>{{ Carbon\Carbon::parse($appointment->check_out)->format('g:i A') }}</h5>
											@endif
										@endif											
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card card-body bg-white mb-3">
						<div class="row">				
							<div class="col-sm-6">
								<div class="row">
									<div class="col-sm-5">
										<label>NAME</label>
									</div>
									<div class="col-sm-7">										
										<h5><span>:&nbsp</span>{{ $visitor->firstname }}&nbsp</span>{{ $visitor->lastname }}</h5>			
									</div>
								</div>
								<div class="row">
									<div class="col-sm-5">
										<label>EMAIL</label>
									</div>
									<div class="col-sm-7">
										<h5><span>:&nbsp</span>{{ $visitor->email }}</h5>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-5">
										<label>IC / PASSPORT</label>
									</div>
									<div class="col-sm-7">
										<h5><span>:&nbsp</span>{{ $visitor->ic_passport }}</h5>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-5">
										<label>VEHICLE</label>
									</div>
									<div class="col-sm-7">
										<h5><span>:&nbsp</span>{{ $vehicle->vehicle_type }}</h5>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="row">
									<div class="col-sm-5">
										<label>ACCOUNT</label>
									</div>
									<div class="col-sm-7">
										<label><span>:</span>
											@if($visitor->deleted_at == null)
											Active
											@else
											Deactivate
											@endif
										</label>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-5">
										<label>NO. PERSON</label>
									</div>
									<div class="col-sm-7">
										<h5><span>:&nbsp</span>{{ $appointment->no_person }}</h5>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-5">
										<label>PHONE NO.</label>
									</div>
									<div class="col-sm-7">
										<h5><span>:&nbsp</span>{{ $visitor->contact_no }}</h5>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-5">
										<label>VEHICLE PLATE</label>
									</div>
									<div class="col-sm-7">
										<h5><span>:&nbsp</span>{{ $vehicle->vehicle_plate }}</h5>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card card-body bg-white mb-3">
						<div class="row">				
							<div class="col-sm-6">
								<div class="row">
									<div class="col-sm-5">
										<label>VISIT EMPLOYEE</label>
									</div>
									<div class="col-sm-7">
										<h5><span>:&nbsp</span>{{ $appointment->user->name }}</h5>
									</div>
								</div>								
								<div class="row">
									<div class="col-sm-5">
										<label>REMARKS</label>
									</div>
									<div class="col-sm-7">
										<h5><span>:&nbsp</span>{{ $appointment->remarks }}</h5>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="row">
									<div class="col-sm-5">
										<label>PURPOSE</label>
									</div>
									<div class="col-sm-7">
										<h5><span>:&nbsp</span>{{ $appointment->purpose }}</h5>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="nav-link pull-right">
						<button class="btn btn-lg btn-default" type="submit">
							Back
						</button>					
					</div>
					@if($appointment->status=="Pending")
						<form method="POST" action="/appointment/{{ $appointment->id }}/cancel" style="display: inline;">
							@method('PATCH')
							@csrf
							<div class="nav-link pull-right">
								<button class="btn btn-lg btn-danger" type="submit">
									Cancel
								</button>					
							</div>
						</form>
					@else
					@endif
				</div>	
			</div>
		</div>	
	</div>
@stop