<table  class="table table-striped">
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
			<td>{{ $users->name }}</td>
			<td>{{ $users->user_type }}</td>
			<td>{{ $users->department }}</td>
			<td>{{ $users->email }}</td>
			<td>{{ $users->ic_passport }}</td>
			<td>{{ $users->contact_no }}</td>
			<td>
				@if($users->deleted_at == null)
					Active
				@else
					Deactivate
				@endif
			</td>										
		</tr>
		@endforeach
	</tbody>
</table>			