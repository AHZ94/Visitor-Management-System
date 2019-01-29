@extends('Layout.master')

@section('body')

	<div class="container-fluid">
		<div class="card card-body bg-light">
			<div class="row">			
				<div class="col-sm-12"> 
					<div class="container-fluid mt-3">
			        	<div class="nav-link pull-left">
			        		<div class="row">
					        	<div class="display-4 text-dark">
						        	<dt>REGISTER NEW VEHICLE</dt>
						        </div>
						    </div>
					    </div>						
					</div>
					<div class="card card-body bg-white">	
						<div class="row">
							<div class="col-sm-6">																
								<div class="row2">
									<div class="col-sm-4">
										<label>Name</label>	
									</div>
									<div class="col-sm-8">
										<label><span>:&nbsp{{ $visitor->firstname }}</span></label>
									</div>
								</div>
								<div class="row2">							
									<div class="col-sm-4">
										<label>Identification No</label>	
									</div>
									<div class="col-sm-8">
										<label><span>:&nbsp{{ $visitor->ic_passport }}</span></label>	
									</div>
								</div>
							</div>
							<div class="col-sm-6">	
								<div class="row2">
									<div class="col-sm-4">
										<label>Email</label>	
									</div>
									<div class="col-sm-8">
										<label><span>:&nbsp</span>{{ $visitor->email }}</label>	
									</div>
								</div>
								<div class="row2">
									<div class="col-sm-4">
										<label>Contact No</label>	
									</div>
									<div class="col-sm-8">
										<label><span>:&nbsp</span>{{ $visitor->contact_no }}</label>	
									</div>
								</div>															
							</div>						
						</div>															
					</div>									        

					<!-- FORM VEHICLE -->
					
					<form method="POST" action="/vehicle/{{ $visitor->id }}"> 

					@csrf
					
					<div class="card card-body bg-white mt-3">								
						<div class="row">
							<div class="col-sm-6">
								<div class="row">
									<div class="col-sm-4">
										<label>Vehicle Type</label>
									</div>
									<div class="col-sm-8">
										<select class="custom-select custom-select-lg mb-3" name="vehicle">
										  <option value="Car" selected>Car</option>
										  <option value="Motorycle">Motorcycle</option>							  
										</select>	
									</div>									
								</div>
							</div>
							<div class="col-sm-6">
								<div class="col-sm-4">
									<label>Plate No :</label>
								</div>
								<div class="col-sm-8">
									<input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="plate" required> 
								</div>			
							</div>
						</div>
					</div>													
					<div class="pull-right mt-3">
						<div class="ml-auto p-2">
							<button class="btn btn-lg btn-primary" type="submit">
								Submit
							</button>
						</div>
					</div>				

					</form>
				</div>	
			</div>				
		</div>			
	</div>

@stop