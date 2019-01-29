@extends('Layout.master')

@section('body')
	<div class="container-fluid">
		<div class="card card-body bg-light">								
			<div class="form-group col-md-12">
				<div class="row na">
					<div class="col-sm-4">
						<div class="form-group col-md-4">
							<label>Visitor</label>
						</div>
						<div class="form-group col-md-8">											
							 <input class="form-control" id="myInput" onkeyup="myFunction()" type="text" placeholder="Search..">
						</div>
					</div>
				</div>				

				<div class="row nav-row">			
					<div class="card card-body bg-white mb-5">								
						<div class="table-responsive">
							<table  class="table table-striped" id="myTable">
								<thead class="text-center">
									<tr>
										<th>Visitor</th>
										<th>Email</th>
										<th>Contact No</th>
										<th>Identification No</th>
										<th>Action</th>							
									</tr>
								</thead>
								<tbody>
									@foreach($visitor as $visitor)
										<tr>
											<td>{{ $visitor->firstname }}</td>
											<td>{{ $visitor->email }}</td>
											<td>{{ $visitor->contact_no }}</td>
											<td>{{ $visitor->ic_passport }}</td>
											<td>
												<a href="/existing/{{ $visitor->id }}">
													<button type="button" class="btn btn-default btn-sm" aria-label="Left Align">
													  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
													</button>
												</a>
											</td>
										</tr>
									@endforeach									
								</tbody>
				
							</table>
						</div>
					</div>				
				</div>			
			</div>

			<script>
				function myFunction() {
				  // Declare variables 
				  var input, filter, table, tr, td, i;
				  input = document.getElementById("myInput");
				  filter = input.value.toUpperCase();
				  table = document.getElementById("myTable");
				  tr = table.getElementsByTagName("tr");

				  // Loop through all table rows, and hide those who don't match the search query
				  for (i = 0; i < tr.length; i++) {
				    td = tr[i].getElementsByTagName("td")[0];
				    if (td) {
				      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
				        tr[i].style.display = "";
				      } else {
				        tr[i].style.display = "none";				        				    	
				      }				    
				    } 
				  }
				}
			</script>
	
		</div>		
	</div>			

@stop	