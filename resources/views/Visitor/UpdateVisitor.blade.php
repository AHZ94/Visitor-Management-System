@extends('Layout.master')

@section('body')
	<div class="container">
		<div class="card card-body bg-light">					

			<form method="POST" action="/visitor/{{ $visitor->id }}" enctype="multipart/form-data">

			@method('PATCH')
			@csrf

				<div class="row">
					<div class="form-group col-md-6">
						<div class="row">
							<div class="form-group col-md-4">
								<label>Profile picture:</label>
							</div>
							<div class="form-group col-md-8">
								<div class="my-3">					
									<input type="file" name="cover_image" class="form-data" placeholder="File goes here">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-4">
								<label>First Name</label>
							</div>
							<div class="form-group col-md-8">					
								<input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="firstname"
								value="{{ $visitor->firstname }}" required>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-4">
								<label>Email</label>
							</div>
							<div class="form-group col-md-8">					
								<input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="email"
								value="{{ $visitor->email }}" required>
							</div>
						</div>		
						<div class="row">
							<div class="form-group col-md-4">
								<label>Identification No:</label>
							</div>
							<div class="form-group col-md-8">					
								<input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="ic_passport"
								value="{{ $visitor->ic_passport }}" required>
							</div>
						</div>					
					</div>
					<div class="form-group col-md-6">
						<div class="row">
							<div class="form-group col-md-4">				
								<br><br>	
							</div>
							<div class="form-group col-md-8">					
								<span></span>
							</div>
						</div>	
						<div class="row">
							<div class="form-group col-md-4">
								<label>Last Name:</label>
							</div>
							<div class="form-group col-md-8">					
								<input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="lastname"
								value="{{ $visitor->lastname }}" required>
							</div>
						</div>	
						<div class="row">
							<div class="form-group col-md-4">
								<label>Contact No:</label>
							</div>
							<div class="form-group col-md-8">					
								<input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="contact_no"
								value="{{ $visitor->contact_no }}" required>
							</div>
						</div>
					</div>
				</div>
				<div class="pull-right">
					<div class="button mt-2">
						<button class="btn btn-lg btn-primary" type="submit">
							Submit
						</button>
					</div>
				</div>				
			</form>			
		</div>		
	</div>	

@stop	