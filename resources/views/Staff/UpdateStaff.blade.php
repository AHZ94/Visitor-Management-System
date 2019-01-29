@extends('Layout.master')

@section('body')
	<div class="container">
		<div class="card card-body bg-light">					

			<form method="POST" action="/user/{{ $user->id }}" enctype="multipart/form-data">

			@method('PATCH')
			@csrf

			<div class="form-group col-md-6">
				<div class="row2">
					<div class="form-group col-md-4">
						<label>Photo:</label>
					</div>
					<div class="form-group col-md-8">					
						<input type="file" name="cover_image" class="form-data" placeholder="File goes here" value="{{ old('user',$user->cover_image) }}">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-4">
						<label>First Name</label>
					</div>
					<div class="form-group col-md-8">					
						<input type="text" name="name" class="form-control" value="{{ old('user',$user->name) }}">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-4">
						<label>Email</label>
					</div>
					<div class="form-group col-md-8">					
						<input type="text" name="email" class="form-control" value="{{ old('user',$user->email) }}">
					</div>
				</div>		
				<div class="row">
					<div class="form-group col-md-4">
						<label>Identification No</label>
					</div>
					<div class="form-group col-md-8">					
						<input type="text" name="ic_passport" class="form-control" value="{{ old('user',$user->ic_passport) }}">
					</div>
				</div>					
			</div>
			<div class="form-group col-md-6">
				<div class="row">
					<div class="form-group col-md-4">
						<label>User Type</label>
					</div>
					<div class="form-group col-md-8">
						<select class="custom-select custom-select-lg mb-1" class="user_type" name="user_type">
						  <option value="staff" selected>staff</option>
						  <option value="security">security</option>							  
						</select>												
					</div>
				</div>	
				<div class="row">
					<div class="form-group col-md-4">
						<label>Last Name</label>
					</div>
					<div class="form-group col-md-8">					
						<input type="text" name="lastname" class="form-control" value="{{ old('user',$user->lastname) }}">
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
						<input type="text" name="contact_no" class="form-control" value="{{ old('user',$user->contact_no) }}">
					</div>
				</div>
			</div>
			<div class="pull-right mt-1">
				<button class="btn btn-lg btn-primary" type="submit">
					Submit
				</button>
			</div>					
			
			</form>
			
		</div>		
	</div>	

@stop	