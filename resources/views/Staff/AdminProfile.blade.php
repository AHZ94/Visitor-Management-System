@extends('Layout.master')

@section('body')
	<div class="container">
		<div class="card card-body bg-light">					

			<form method="POST" action="/user">
			@method('PATCH')
			@csrf

				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Photo</label>
						<input type="file" name="cover_image" class="form-data" value="{{ old('user',$user->cover_image) }}">	
					</div>
					<div class="form-group col-md-6">
						<label>First Name</label>
						<input type="text" name="name" class="form-control" placeholder="{{ old('user',$user->name) }}">
					</div>
				</div>					
				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Email</label>
						<input type="text" name="email" class="form-control" placeholder="{{ old('user',$user->email) }}" readonly="true">
					</div>
					<div class="form-group col-md-6">
						<label>User Type</label>
						<input type="text" name="user_type" class="form-control" placeholder="{{ old('user',$user->user_type) }}" readonly="true">
					</div>			
				</div>			
				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Department</label>
						<input type="text" name="department" class="form-control" placeholder="{{ old('user',$user->department) }}"readonly="true">
					</div>
					<div class="form-group col-md-6">
						<label>Contact No</label>
						<input type="text" name="contact_no" class="form-control" placeholder="{{ old('user',$user->contact_no) }}">
					</div>			
				</div>	
				<button class="btn btn-lg btn-primary btn-block" type="submit">
					Submit
				</button>					
			</form>		
		</div>		
	</div>	

@stop	