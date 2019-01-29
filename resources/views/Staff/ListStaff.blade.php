@extends('Layout.master')

@section('body')
	<div class="container-fluid text-center">
		<div class="table-responsive">
			<table class="table table-borderless">
				<thead>
					<th>User Type</th>
					<th>Status</th>				
					<th>Staff</th>
					<th>Email</th>
					<th>Department</th>
					<th>Action</th>
				</thead>
				<tbody>
					@foreach($user as $users)
						<tr>
							<td>{{ $users->user_type }}</td>
							<td>
								@if($users->delete_at == null)
									<span class="label-custom label-success">
										Active
									</span>
								@else
									<span class="label-custom label-danger">
										Deactivate
									</span>
								@endif
							</td>
							<td><span class="text-capitalize">{{ $users->name }} {{ $users->lastname }}</span></td>
							<td>{{ $users->email }}</td>
							<td>{{ $users->department }}</td>
							<td>
								<a href="/user/{{ $users->id }}">
									<button type="button" class="btn btn-primary btn-sm" aria-label="Left Align">
									  <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
									</button>
								</a>
								<a href="/user/{{ $users->id }}/edit">
									<button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
									  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									</button>
								</a>
												
									<form method="POST" action="/user/{{ $users->id }}" style="display: inline;">
										@method('DELETE')
										@csrf

										<button type="submit" class="btn btn-danger btn-sm" aria-label="Left Align">
										  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
										</button>
									</form>	
							</td>
						</tr>								
					@endforeach
				</tbody>
			</table>	
		</div>
	</div>
@stop

@section('pagination')
	<div class="fixed-bottom">
		<div class="text text-center">
			{{ $user->links() }}		
		</div>
	</div>
@stop

@section('filter')

	<div class="collapse" id="collapse1">
		<div class="container-fluid">
			<div class="card card-body bg-light">					
				<form method="POST" action="/staff/search">	
				@csrf				
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>Staff</label>
							<input type="text" name="staff" class="form-control" placeholder="Insert Name">			
						</div>					
						<div class="form-group col-md-6">
							<label>Email</label>
							<input type="text" name="email" class="form-control" placeholder="Eg: Ahmad@Email.com">	
						</div>
					</div>					
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>Department</label>
							<select class="form-control">
							  <option value="Technician" selected>Technician</option>
							  <option value="Customer Service">Customer Service</option>							  
							</select>						
						</div>
						<div class="form-group col-md-6">
							<label>User Type</label>
							<select class="form-control" name="user_type">
							  <option value="Staff" selected>Staff</option>
							  <option value="Security">Security</option>							  
							</select>
						</div>				
					</div>			
					<button class="btn btn-lg btn-primary btn-block" type="submit">
						Search
					</button>	
				</form>			
			</div>			
		</div>	
	</div>
@stop

@section('icon')
	<div class="container-fluid mb-2">
		<a class="nav-link pull-right" href="/user/create" role="button">	
			<span class="glyphicon glyphicon-plus"></span>
		</a>
		<a class="nav-link pull-right" data-toggle="collapse" href="#collapse1" role="button" aria-expanded="false" aria-controls="collapse1">	
			<span class="glyphicon glyphicon-search"></span>
		</a>
	</div>
@stop