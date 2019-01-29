<div class="notification is-warning">
	<div class="container-fluid mb-0">
		@if($errors->any())
				<div class="alert alert-warning" role="alert">
					<ul>
						@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
		@endif
		@if(Session::has('message'))
				<div class="alert alert-success" role="alert">
					{{ Session::get('message') }}
				</div>
		@elseif(Session::has('alert'))
				<div class="alert alert-danger" role="alert">
					{{ Session::get('alert') }}
				</div>
		@endif
	</div>
</div>