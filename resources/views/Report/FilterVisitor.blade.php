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