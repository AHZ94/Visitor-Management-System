@extends('Layout.master')

@section('body')		
		
	<div class="container-fluid">
		<div class="table-responsive">		
			<table  class="table table-borderless  text-center">
				<thead class="text-center">
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Contact No</th>					
						<th>Identification No</th>					
						<th>Status</th>					
					</tr>
				</thead>
				<tbody>
					@foreach($visitor as $visitors)
						<tr>
							<td>{{ $visitors->firstname }} {{ $visitors->lastname }}</td>
							<td>{{ $visitors->email }}</td>
							<td>{{ $visitors->contact_no }}</td>
							<td>{{ $visitors->ic_passport }}</td>				
							<td>
								@if($visitors->deleted_at == null)
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
				{{ $visitor->links() }}
			</div>
		</div>
	</div>
@stop

@section('filter')
	<div class="hidden-print">
		<div class="collapse" id="collapse1">	
			<div class="container-fluid">
				<div class="card card-body bg-light">					
					<form method="POST" action="/report/search-visitor">	
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
	</div>
@stop

@section('icon')
	<div class="hidden-print">
		<div class="container-fluid mb-2">		
			<a class="nav-link pull-right" href="javascript:window.print()" role="button" aria-expanded="false">	
				<span class="glyphicon glyphicon-print"></span>
			</a>
			<a class="nav-link pull-right" href="/download/visitor" role="button">
				<span class="glyphicon glyphicon-file"></span>
			</a>
			<a class="nav-link pull-right" data-toggle="collapse" href="#collapse1" role="button" aria-expanded="false" aria-controls="collapse1">	
				<span class="glyphicon glyphicon-search"></span>
			</a>
		</div>
	</div>
@stop