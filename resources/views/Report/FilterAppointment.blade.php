	
			<table  class="table table-striped">
				<thead class="text-center">
					<tr>
						<th>Unique Code</th>
						<th>Date</th>
						<th>Time</th>
						<th>No. Person</th>
						<th>Visitor</th>
						<th>Plate No</th>
						<th>Visit Employee</th>
						<th>Status</th>
						<th>Check In</th>
						<th>Check Out</th>
						<th>Approval</th>
						<th>Remarks</th>					
					</tr>
				</thead>
				<tbody>
					@foreach($appointment as $appointments)
						<tr>						
							<td>{{ $appointments->unique_code }}</td>
							<td>{{ $appointments->date }}</td>
							<td>{{ Carbon\Carbon::parse($appointments->times)->format('g:i A') }}</td>
							<td>{{ $appointments->no_person }}</td>
							<td>{{ $appointments->visitor->firstname }}</td>
							<td>{{ $appointments->vehicle->vehicle_plate }}</td>
							<td>{{ $appointments->user->name }}</td>
							<td>{{ $appointments->status }}</td>
							<td>{{ Carbon\Carbon::parse($appointments->check_in)->format('g:i A') }}</td>
							<td>{{ Carbon\Carbon::parse($appointments->check_out)->format('g:i A') }}</td>
							<td>{{ $appointments->approval }}</td>
							<td>{{ $appointments->remarks }}</td>					
						</tr>
					@endforeach					
				</tbody>
			</table>			


