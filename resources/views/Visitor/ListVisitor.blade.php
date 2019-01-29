@extends('Layout.master')

@section('body')
	<div class="container-fluid text-center">
		<div class="table-responsive">
			<table class="table table-borderless text-center">
				<thead>
					<th>Visitor</th>
					<th>Email</th>
					<th>Contact No</th>
					<th>Identification No</th>						
					<th>Action</th>
				</thead>
				<tbody>
					@foreach($visitor as $visitors)
						<tr>
							<td><span class="text-capitalize">{{ $visitors->firstname }} {{ $visitors->lastname }}</span></td>
							<td>{{ $visitors->email }}</td>
							<td>{{ $visitors->contact_no }}</td>
							<td>{{ $visitors->ic_passport }}</td>											
							<td>
								<a href="/visitor/{{ $visitors->id }}">
									<button type="button" class="btn btn-primary btn-sm" aria-label="Left Align" >
									  <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
									</button>
								</a>
								<a href="/visitor/{{ $visitors->id }}/edit">
									<button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
									  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									</button>
								</a>
								<form method="POST" action="/visitor/{{ $visitors->id }}" style="display: inline;">
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
			{{ $visitor->links() }}		
		</div>
	</div>
@stop

@section('icon')

	<div class="container-fluid mb-2">		
		<a class="nav-link pull-right" data-toggle="collapse" href="#collapse1" role="button" aria-expanded="false" aria-controls="collapse1">	
			<span class="glyphicon glyphicon-search"></span>
		</a>
	</div>
	
@stop


@section('filter')

	<div class="collapse" id="collapse1">
		<div class="container-fluid">
			<div class="card card-body bg-light">					
				<form method="POST" action="/visitor/search">	
				@csrf		
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>Visitor</label>
							<input type="text" name="name" class="form-control" placeholder="Insert Name">	
						</div>
						<div class="form-group col-md-6">
							<label>Email</label>
							<input type="text" name="email" class="form-control" placeholder="Ahmad@email.com">
						</div>
					</div>					
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>Identification No</label>
							<input type="text" name="ic_passport" class="form-control" placeholder="IC/Passport">
						</div>
						<div class="form-group col-md-6">
							<label>Contact Number</label>
							<input type="text" name="contact_no" class="form-control" placeholder="012-xxxxxx">
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
												
					