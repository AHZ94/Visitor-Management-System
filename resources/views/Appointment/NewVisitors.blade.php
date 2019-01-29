@extends('Layout.master')

@section('body')
	<div class="col-lg-4">
		<div class="card">

		</div>
	</div>
	<div class="col-lg-8">		
		<div class="card">
			<div class="card-header">
				<h4>Appointment</h4>
			</div>
			<div class="card-body">			
				<div class="form-row">
					<div class="form-group col-md-4">
						<div class="input-group">
							<span class="input-group-addon">
			                    <span class="glyphicon glyphicon-calendar"></span>
			                </span>
							<input type="date" name="date" class="form-control">
			            </div>
					</div>
					<div class="form-group col-md-4 offset-md-4">
						<div class="input-group">
							<span class="input-group-addon">
			                    <span class="glyphicon glyphicon-time"></span>
			                </span>
							<input type="time" name="time" class="form-control">
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<div class="input-group">
							<span class="input-group-addon">
			                    <span class="glyphicon glyphicon-bullhorn"></span>
			                </span>
							<select class="form-control">
								<option>Meeting</option>
							</select>
						</div>
					</div>
					<div class="form-group col-md-6">						
						<div class="input-group">
							<span class="input-group-addon">
			                    <strong>Employee</strong>
			                </span>
							<select class="form-control">
								<option>Karim</option>
								<option>Karim2</option>
							</select>
						</div>						
					</div>
				</div>					
			</div>
		</div>

		<div class="card mt-3">
			<div class="card-header">
				<h4>Visitor Details</h4>
			</div>
			<div class="card-body">
				<div class="form-row">
					<div class="form-group col-md-6">
						<div class="input-group">
							<span class="input-group-addon">
			                    <span class="glyphicon glyphicon-plane"></span>
			                </span>
							<input type="text" name="name" class="form-control" placeholder="First Name">
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="input-group">
							<span class="input-group-addon">
			                    Plate
			                </span>
							<input type="text" name="name" class="form-control" placeholder="First Name">
						</div>
					</div>
				</div>			
				<div class="form-row">
					<div class="form-group col-md-6">
						<div class="input-group">
							<span class="input-group-addon">
			                    <span class="glyphicon glyphicon-user"></span>
			                </span>
							<input type="text" name="name" class="form-control" placeholder="First Name">
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="input-group">
							<input type="text" name="name2" class="form-control" placeholder="Last Name">
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<div class="input-group">
							<span class="input-group-addon">
			                    <span class="glyphicon glyphicon-credit-card"></span>
			                </span>
							<input type="text" name="identification no" class="form-control" placeholder="Identification No">
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="input-group">
							<span class="input-group-addon">
			                    <span class="glyphicon glyphicon-phone"></span>
			                </span>
							<input type="text" name="contact" class="form-control" placeholder="contact">
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<div class="input-group">
							<span class="input-group-addon">
			                    <span class="glyphicon glyphicon-plane"></span>
			                </span>
							<select class="form-control">
								<option>Car</option>
							</select>
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="input-group">
							<span class="input-group-addon">
			                    Plate
			                </span>
							<select class="form-control">
								<option>XXX1010</option>
							</select>
						</div>
					</div>
				</div>				
			</div>
		</div>
	</div>

@stop	