@extends('Layout.master')

@section('body')

	<div class="container-fluid">
		<div class="card card-body bg-light">
			<div class="row">							
				<div class="col-sm-4">
					<div class="text-center">
				        <img src="/upload/cover/{{ $visitor->cover_image }}" class="avatar img-fluid img-thumbnail img-circle img-thumbnail" alt="avatar">
				        <div class="display-3 text-dark">
				        	<dt>VISITOR</dt>
				        </div>
		      		</div>
				</div>									
				<div class="col-sm-8">						
					<div class="card card-body bg-white">	
						<div class="row2">
							<div class="col-sm-6">
								<div class="row">																									
									<div class="col-sm-4">
										<label>NAME</label>									
									</div>
									<div class="col-sm-8">
										<div class="text-capitalize">
											<h4>:&nbsp <span>{{ $visitor->firstname }} {{ $visitor->lastname }}</span></h4>	
										</div>			
									</div>
								</div>									
							</div>
							<div class="col-sm-6">	
								<div class="row">																									
									<div class="col-sm-4">
										<label>EMAIL</label>									
									</div>
									<div class="col-sm-8">
										<h4>:&nbsp <span>{{ $visitor->email }}</span></h4>									
									</div>
								</div>
							</div>						
						</div>						
						<div class="row2">
							<div class="col-sm-6">																
								<div class="row">										
									<div class="col-sm-4">
										<label>IC/PASSPORT</label>									
									</div>
									<div class="col-sm-8">
										<h4>:&nbsp <span>{{ $visitor->ic_passport }}</span></h4>									
									</div>
								</div>						
							</div>
							<div class="col-sm-6">	
								<div class="row">													
									<div class="col-sm-4">
										<label>PHONE NO</label>									
									</div>
									<div class="col-sm-8">
										<h4>:&nbsp <span>{{ $visitor->contact_no }}</span></h4>									
									</div>
								</div>	
							</div>						
						</div>						
					</div>					

					<div class="row">
						<div class="col-sm-6">
							<div class="card-body">
								<label>VEHICLE</label>
							</div>							
						</div>
						<div class="col-sm-6 mt-4">							
							<a class="pull-right" href="/vehicle/{{ $visitor->id }}/create" role="button">	
								<button type="button" class="btn btn-light btn-md">
									<span class="glyphicon glyphicon-plus"></span>
								</button>
							</a>							
						</div>
					</div>
														
					<div class="card card-body bg-white">
						@if(count($vehicle))
							<div class="table-responsive">
								<table class="table table-striped text-center">
									<thead class="thead-light">
										<tr>
											<th>Vehicle Type</th>
											<th>Plate No</th>
											<th>Action</th>										
										</tr>
									</thead>
									<tbody>
										@foreach($vehicle as $vehicle)								
											<tr>
												<td>{{ $vehicle->vehicle_type }}</td>
												<td>{{ $vehicle->vehicle_plate }}</td>
												<td>
													<form method="POST" action="/vehicle/{{ $vehicle->id }}">				
															@method('DELETE')
															@csrf

															<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target=".bd-example-modal-sm" >
															  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
															</button>

														</form>
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						@else							
				            <div class="top mt-3">	
				            	<div class="alert alert-warning">			               
			                  		<p>No Vehicle Registered</p>         				                
			                  	</div>	
				            </div>					        
						@endif	
					</div>	
					<div class="pull-right">
						<div class="button pt-4">
							<button class="btn btn-lg btn-default" type="button">
								Back
							</button>
						</div>
					</div>	
				</div>
			</div>	
		</div>

	</div>

	
	
@stop