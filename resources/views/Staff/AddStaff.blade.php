@extends('Layout.master')

@section('body')
	<div class="container">		
		
		<div class="card card-body bg-light">					

			<form method="POST" action="/user" enctype="multipart/form-data">

			@csrf

			<div class="form-group col-md-6">
				<div class="row2">
					<div class="form-group col-md-4">
						<label>Photo</label>
					</div>
					<div class="form-group col-md-8">					
						<input type="file" name="cover_image" class="form-data" value="user.png">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-4">
						<label>First Name</label>
					</div>
					<div class="form-group col-md-8">						
						<input type="text" name="firstname" class="form-control	" placeholder="Insert first name" value="{{ old('firstname')}}" required>										
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-4">
						<label>Email</label>
					</div>
					<div class="form-group col-md-8">					
						<input type="text" name="email" class="form-control" placeholder="Insert email" value="{{ old('email')}}" required>
					</div>
				</div>		
				<div class="row">
					<div class="form-group col-md-4">
						<label>Identification No</label>
					</div>
					<div class="form-group col-md-8">					
						<input type="text" name="ic_passport" class="form-control" placeholder="Insert ic or passport" value="{{ old('ic_passport')}}"  required>
					</div>
				</div>					
			</div>
			<div class="form-group col-md-6">
				<div class="row">
					<div class="form-group col-md-4">
						<label>User Type</label>
					</div>
					<div class="form-group col-md-8">											
						<select class="custom-select custom-select-lg mb-1" name="user_type" value="{{ old('user_type')}}" required>
						  <option value="staff">Staff</option>
						  <option value="security">Security</option>							  
						</select>
					</div>
				</div>	
				<div class="row">
					<div class="form-group col-md-4">
						<label>Last Name </label>
					</div>
					<div class="form-group col-md-8">					
						<input type="text" name="lastname" class="form-control" placeholder="Insert Last Name" value="{{ old('lastname')}}" required>
					</div>
				</div>	
				<div class="row">
					<div class="form-group col-md-4">
						<label>Department</label>
					</div>
					<div class="form-group col-md-8">
						<select class="custom-select custom-select-lg mb-1" name="department" value="{{ old('department')}}" required>
						  <option value="Service">1. Service</option>
						  <option value="Information Technology">2. Information Technology(IT)</option>						
						  <option value="Finance">3. Finance</option>							  
						  <option value="Customer Service">4. Customer Service</option>							  
						</select>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-4">
						<label>Contact No</label>
					</div>
					<div class="form-group col-md-8">					
						<input type="text" name="contact_no" class="form-control" placeholder="Insert phone numbere">
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