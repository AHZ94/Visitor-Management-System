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