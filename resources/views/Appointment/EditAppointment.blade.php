@extends('Layout.master')

@section('body')
	<div class="container-fluid">
		<div class="card card-body bg-light">					

			{!! Form::open(['action'=>'LoginController@Profile','files'=>true]) !!}

			<div class="form-group col-md-6">
				<div class="row">
					<div class="form-group col-md-4">
						{{ Form::label('photo','Photo') }}
					</div>
					<div class="form-group col-md-8">					
						{{ Form::file('filename') }}
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-4">
						{{ Form::label('firstName','First Name') }}
					</div>
					<div class="form-group col-md-8">					
						{{ Form::text('firstName','',['class'=>'form-control','placeholder'=>'Insert first name']) }}
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-4">
						{{ Form::label('ic','Identification No') }}
					</div>
					<div class="form-group col-md-8">					
						{{ Form::text('ic','',['class'=>'form-control','placeholder'=>'IC/Passport']) }}
					</div>
				</div>					
				<div class="row">
					<div class="form-group col-md-4">
						{{ Form::label('vehicle','Vehicle Type') }}
					</div>
					<div class="form-group col-md-8">
						<select class="custom-select custom-select-lg mb-3">
						  <option value="Car" selected>Car</option>
						  <option value="Motorcycle">Motorcycle</option>							  
						</select>
					</div>
				</div>	
				<div class="row">
					<div class="form-group col-md-4">
						{{ Form::label('date','Date') }}
					</div>
					<div class="form-group col-md-8">					
						{{ Form::text('date','',['class'=>'form-control']) }}
					</div>
				</div>		
				<div class="row">
					<div class="form-group col-md-4">
						{{ Form::label('purpose','Purpose') }}
					</div>
					<div class="form-group col-md-8">
						<select class="custom-select custom-select-lg mb-3">
						  <option value="Meeting" selected>Meeting</option>
						  <option value="Others">Others</option>							  
						</select>
					</div>
				</div>	
				<div class="row">
					<div class="form-group col-md-4">
						{{ Form::label('employee','Employee') }}
					</div>					
				    <div class="form-group col-md-8">					    
					      <select class="selectpicker" data-show-subtext="true" data-live-search="true">
					        <option>Adam</option>
					        <option>Hello</option>				        
					        <option>True</option>				        
					      </select>				      						
   	      			</div>	   
				</div>	
			</div>
			<div class="form-group col-md-6">
				<div class="row">
					<div class="form-group col-md-4">
						{{ Form::label('email','Email') }}
					</div>
					<div class="form-group col-md-8">					
						{{ Form::text('email','',['class'=>'form-control','placeholder'=>'Insert first email']) }}
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-4">
						{{ Form::label('lastName','Last Name') }}
					</div>
					<div class="form-group col-md-8">					
						{{ Form::text('lastName','',['class'=>'form-control','placeholder'=>'Insert last name']) }}
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-4">
						{{ Form::label('contact','Contact No') }}
					</div>
					<div class="form-group col-md-8">					
						{{ Form::text('contact','',['class'=>'form-control','placeholder'=>'Inser phone number']) }}
					</div>
				</div>					
				<div class="row">
					<div class="form-group col-md-4">
						{{ Form::label('plate','Plate No') }}
					</div>
					<div class="form-group col-md-8">					
						{{ Form::text('plate','',['class'=>'form-control','placeholder'=>'Insert plate']) }}
					</div>
				</div>	
				<div class="row">
					<div class="form-group col-md-4">
						{{ Form::label('time','Time') }}
					</div>
				<div class="form-group col-md-8">					
						{{ Form::text('time','',['class'=>'form-control','placeholder'=>'Eg: 4.00pm']) }}
					</div>
				</div>		
				<div class="row">
					<div class="form-group col-md-4">
						{{ Form::label('person','No Person') }}
					</div>
					<div class="form-group col-md-8">					
						{{ Form::text('person','',['class'=>'form-control','placeholder'=>'Insert total visitor']) }}
					</div>
				</div>	
				<div class="row">
					<div class="form-group col-md-4">
						{{ Form::label('remark','Remark') }}
					</div>
					<div class="form-group col-md-8">					
						{{ Form::text('remark','',['class'=>'form-control','placeholder'=>'Comment section here']) }}
					</div>
				</div>	
			</div>
			<div class="button1">
				{{ Form::submit('Submit') }}
			</div>

			{!! Form::close() !!}
			
		</div>		
	</div>	
	
@stop	