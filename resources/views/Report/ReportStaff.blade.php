@extends('Layout.master')

@section('body')		
		
	<div class="container-fluid text-center">		
		<div class="table-responsive">
			<table  class="table table-borderless">
				<thead class="text-center">
					<tr>
						<th>Employee</th>
						<th>User Type</th>
						<th>Department</th>
						<th>Email</th>
						<th>Identification No</th>
						<th>Contact No</th>
						<th>Account</th>					
					</tr>
				</thead>
				<tbody>
					@foreach($user as $users)
					<tr>
						<td>{{ $users->name }} {{ $users->lastname }}</td>
						<td>{{ $users->user_type }}</td>
						<td>{{ $users->department }}</td>
						<td>{{ $users->email }}</td>
						<td>{{ $users->ic_passport }}</td>
						<td>{{ $users->contact_no }}</td>
						<td>
							@if($users->deleted_at == null)
								<span class="label-custom label-success">
									Active
								</span>
							@else
								<span class="label-custom label-danger">
									Deactivate
								</span>
							@endif
						</td>									
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
				{{ $user->links() }}
			</div>
		</div>
	</div>
@stop

@section('filter')
	<div class="hidden-print">
		<div class="collapse" id="collapse1">	
			<div class="container-fluid">
				<div class="card card-body bg-light">					
					<form method="POST" action="/report/search-staff">	
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
								  <option value="Technician" selected>Information Techonology</option>
								  <option value="Staff">Staff</option>							  
								</select>						
							</div>
							<div class="form-group col-md-6">
								<label>User Type</label>
								<select class="form-control" name="user_type">
								  <option value="staff" selected>Staff</option>
								  <option value="security">Security</option>							  
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
	</div>
@stop

@section('icon')
	<div class="hidden-print">
		<div class="container-fluid mb-2">		
			<a class="nav-link pull-right" href="javascript:window.print()" role="button" aria-expanded="false">	
				<span class="glyphicon glyphicon-print"></span>
			</a>
			<a class="nav-link pull-right" href="/download/staff" role="button">	
				<span class="glyphicon glyphicon-file"></span>
			</a>
			<a class="nav-link pull-right" data-toggle="collapse" href="#collapse1" role="button" aria-expanded="false" aria-controls="collapse1">	
				<span class="glyphicon glyphicon-search"></span>
			</a>
		</div>
	</div>
@stop