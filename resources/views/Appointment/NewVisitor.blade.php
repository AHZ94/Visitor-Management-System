@extends('Layout.master')

@section('body')
	<div class="container-fluid">
		<div class="card card-body bg-light">					

			<form method="POST" action="\appointment" enctype="multipart/form-data">

			@csrf

			<div class="form-group col-md-6">
				<div class="row">
					<div class="form-group col-md-4">
						<label>Photo</label>
					</div>
					<div class="form-group col-md-8">					
						<input type="file" name="cover_image" class="form-data" placeholder="File goes here">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-4">
						<label>First Name</label>
					</div>
					<div class="form-group col-md-8">					
						<input type="text" name="firstname" class="form-control" placeholder="Inser first name">				
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-4">
						<label>Identification No</label>
					</div>
					<div class="form-group col-md-8">					
						<input type="text" name="ic_passport" class="form-control" placeholder="IC/Passport">					
					</div>
				</div>					
				<div class="row">
					<div class="form-group col-md-4">
						<label>Vehicle Type</label>
					</div>
					<div class="form-group col-md-8">
						<select class="custom-select custom-select-lg mb-3" name="vehicle">
						  <option value="Car" selected>Car</option>
						  <option value="Motorcycle">Motorcycle</option>							  
						</select>
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
						  <option value="Meeting" selected>Meeting</option>
						  <option value="Others">Others</option>							  
						</select>
					</div>
				</div>	
				<div class="row">
					<div class="form-group col-md-4">
						<label>Employee</label>
					</div>					
				    <div class="form-group col-md-8">				    			    						   
				      <select class="custom-select custom-select-lg mb-3" data-show-subtext="true" data-live-search="true" name="user_id">
				        @foreach($user as $user)
					        <option value="{{ $user->id }}">{{ $user->name }}</option>						        
				        @endforeach
				      </select>				      						
   	      			</div>	   
				</div>	
			</div>
			<div class="form-group col-md-6">
				<div class="row">
					<div class="form-group col-md-4">
						<label>Email</label>
					</div>
					<div class="form-group col-md-8">					
						<input type="text" name="email" class="form-control" placeholder="Insert email">						
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-4">
						<label>Last Name</label>
					</div>
					<div class="form-group col-md-8">					
						<input type="text" name="lastname" class="form-control" placeholder="Insert last name">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-4">
						<label>Contact No</label>
					</div>
					<div class="form-group col-md-8">					
						<input type="text" name="contact_no" class="form-control" placeholder="Insert phone number">			
					</div>
				</div>					
				<div class="row">
					<div class="form-group col-md-4">
						<label>Plate No</label>
					</div>
					<div class="form-group col-md-8">					
						<input type="text" name="plate" class="form-control" placeholder="Insert plate no">
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
						<label>No Visitor</label>
					</div>
					<div class="form-group col-md-8">					
						<input type="text" name="no_person" class="form-control" placeholder="Total Visitor">
					</div>
				</div>	
				<div class="row">
					<div class="form-group col-md-4">
						<label>Remarks</label>
					</div>
					<div class="form-group col-md-8">					
						<input type="text" name="remarks" class="form-control" placeholder="comment section here">
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