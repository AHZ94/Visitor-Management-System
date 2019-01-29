@extends('Layout.master')

@section('body')		
		
	<div class="container-fluid text-center">
		<div class="table-responsive">		
			<table  class="table table-borderless">
				<thead class="text-center">
					<tr>
						<th>Name</th>					
						<th>Contact No</th>					
						<th>Vehicle Type</th>
						<th>Plate No</th>										
					</tr>
				</thead>
				<tbody>
					@foreach($vehicle as $vehicles)
						<tr>
							<td>{{ $vehicles->visitor->firstname }} {{ $vehicles->visitor->lastname }}</td>
							<td>{{ $vehicles->visitor->contact_no }}</td>	
							<td>{{ $vehicles->vehicle_type }}</td>
							<td>{{ $vehicles->vehicle_plate }}</td>					
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>		
	</div>
@stop

@section('pagination')
	<div class="hidden-print">
		<div class="fixed-bottom">
			<div class="text text-center">
				{{ $vehicle->links() }}
			</div>
		</div>
	</div>
@stop

@section('filter')
	<div class="hidden-print">
		<div class="collapse" id="collapse1">	
			<div class="container-fluid">
					<div class="card card-body bg-light">					

					<form>

					<div class="form-group col-md-4">
						<div class="row2">
							<div class="form-group col-md-4">
								<label>Visitor</label>
							</div>
							<div class="form-group col-md-8">					
								<input type="text" name="name" class="form-control" placeholder="Insert name here">
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
					</div>				
					<div class="form-group col-md-5">
						<div class="row">
							<div class="form-group col-md-4">
								<label>Vehicle Type</label>
							</div>
							<div class="form-group col-md-8">
								<select class="custom-select custom-select-lg mb-3">
								  <option value="Car" selected>Car</option>
								  <option value="Motorcycle">Motorcycle</option>							  
								  <option value="None">None</option>							  
								</select>
							</div>
						</div>									
						<div class="row">
							<div class="form-group col-md-4">
								<label>Plate No</label>
							</div>
							<div class="form-group col-md-8">				
								<input type="text" name="vehicle_plate" class="form-control" placeholder="Insert vehicle plate">
							</div>
						</div>										
					</div>
					<div class="form-group col-md-3">					
						<div class="row">
							<div class="form-group col-md-5">
								<label>Status</label>
							</div>
							<div class="form-group col-md-7">
								<select class="custom-select custom-select-lg mb-3">
								  <option value="Active" selected>Active</option>
								  <option value="Inactive">Inactive</option>							  
								</select>
							</div>
						</div>											
					</div>
					<div class="pull-right mt-1">
						<button type="submit" class="btn btn-lg btn-primary">Search</button>
					</div>
					</form>
				</div>			
			</div>	
		</div>	
	</div>
@stop

@section('icon')
	<div class="hidden-print">
		<div class="container-fluid mb-2">		
			<a class="nav-link pull-right" href="javascript:window.print()" role="button" aria-expanded="false">	
				<span class="glyphicon glyphicon-print"></span>
			</a>
			<a class="nav-link pull-right" href="/download/vehicle" role="button">	
				<span class="glyphicon glyphicon-file"></span>
			</a>
			<a class="nav-link pull-right" data-toggle="collapse" href="#collapse1" role="button" aria-expanded="false" aria-controls="collapse1">	
				<span class="glyphicon glyphicon-search"></span>
			</a>
		</div>
	</div>
@stop