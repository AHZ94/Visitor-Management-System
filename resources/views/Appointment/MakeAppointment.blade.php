@extends('Layout.master')

@section('body')
	<div class="container-fluid">
		<div class="card card-body bg-light">					

			<form method="POST" action="/existing/{{ $visitor->id }}/make-appointment">

			@csrf

			<div class="form-group col-md-6">				
				<div class="row">
					<div class="form-group col-md-4">
						<label>First Name</label>
					</div>
					<div class="form-group col-md-8">					
						<input type="text" name="firstname" class="form-control" placeholder="{{ $visitor->firstname }}" readonly="true" 
						value="{{ $visitor->firstname }}">
					</div>
				</div>										
				<div class="row">
					<div class="form-group col-md-4">
						<label>Date</label>
					</div>
					<div class="form-group col-md-8">					
						<input type="date" name="date" class="form-control">
					</div>
				</div>		
				<div class="row">
					<div class="form-group col-md-4">
						<label>Purpose</label>
					</div>
					<div class="form-group col-md-8">
						<select class="custom-select custom-select-lg mb-3" name="purpose">
						  <option value="Meeting">Meeting</option>
						  <option value="Others">Others</option>							  
						</select>
					</div>
				</div>	
				<div class="row">
					<div class="form-group col-md-4">
						<label>Employee</label>
					</div>					
				    <div class="form-group col-md-8">				    				    					     
					      <select class="custom-select custom-select-lg mb-3" name="user_id">
					        @foreach($user as $users)
						        <option value="{{ $users->id }}">{{ $users->name }}</option>						        
					        @endforeach
					      </select>				      						   	      			
   	      			</div>	   
				</div>	
				<div class="row">
					<div class="form-group col-md-4">
						<label>Remarks</label>
					</div>
					<div class="form-group col-md-8">					
						<input type="text" name="remarks" class="form-control" placeholder="Comment section here">				
					</div>
				</div>
			</div>
			<div class="form-group col-md-6">				
				<div class="row">
					<div class="form-group col-md-4">
						<label>Last Name</label>
					</div>
					<div class="form-group col-md-8">					
						<input type="text" name="lastname" class="form-control" placeholder="{{ $visitor->lastname }}" readonly="true" 
						value="{{ $visitor->lastname }}">	
					</div>
				</div>				
				<div class="row">
					<div class="form-group col-md-4">
						<label>Time</label>
					</div>
				<div class="form-group col-md-8">					
						<input type="time" name="time" class="form-control">
					</div>
				</div>		
				<div class="row">
					<div class="form-group col-md-4">
						<label>No Person</label>
					</div>
					<div class="form-group col-md-8">					
						<input type="text" name="no_person" class="form-control" placeholder="Total visitor">					
					</div>
				</div>	
				<div class="row">
					<div class="form-group col-md-4">
						<label>Plate No</label>
					</div>
					 <div class="form-group col-md-8">					    
					      <select class="custom-select custom-select-lg mb-3" name="vehicle">					      	
					      	@if(count($vehicle))
						        @foreach($vehicle as $vehicle)					        	
							        <option value="{{ $vehicle->id }}">{{ $vehicle->vehicle_plate }}({{ $vehicle->vehicle_type }})</option>
						        @endforeach
						    @else
						    	<option>No Vehicle Found</option>
						    @endif
					      </select>				      						
   	      			</div>
				</div>	
			</div>
			<div class="pull-right mt-3">
				<button class="btn btn-lg btn-primary" type="submit">
					Submit
				</button>
			</div>	

			</form>
			
		</div>		
	</div>			

@stop	