<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	
	 <title>Patient Status</title>
	 
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
	 
  </head>
  <body>
  
  <!-- add patient -->
  <div class="modal fade" id="patientAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New Patient</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
	  
	  <form id="savePatient">
	  
      <div class="modal-body">
	  
	  <div id="errorMessage" class="alert alert-warning d-none"></div>
	  
        <div class="mb-3">
		<label for="">Name</label>
		<input type="text" name="name" class="form-control">
		</div>
		
		<div class="mb-3">
		<label for="">Treatment</label>
		<input type="text" name="treatment" class="form-control">
		</div>
		
		<div class="mb-3">
		<label for="">Bill</label>
		<input type="text" name="bill" class="form-control">
		</div>
		
		
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
	  
	   </form>
    </div>
  </div>
</div>

<!-- edit -->
 <div class="modal fade" id="patientEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Info</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
	  
	  <form id="updatePatient">
	  
      <div class="modal-body">
	  
	  <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>
	  
	  <input type="hidden" name="patient_id" id="patient_id">
	  
        <div class="mb-3">
		<label for="">Name</label>
		<input type="text" name="name" id="name" class="form-control">
		</div>
		
		<div class="mb-3">
		<label for="">Treatment</label>
		<input type="text" name="treatment" id="treatment" class="form-control">
		</div>
		
		<div class="mb-3">
		<label for="">Bill</label>
		<input type="text" name="bill" id="bill" class="form-control">
		</div>
		
		
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Changes</button>
      </div>
	  
	   </form>
    </div>
  </div>
</div>

<!--- view -->
<div class="modal fade" id="patientViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">View Info</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
	  
	  
      <div class="modal-body">
	  
	  
	  
        <div class="mb-3">
		<label for="">Name</label>
		<p id="view_name" class="form-control"></p>
		</div>
		
		<div class="mb-3">
		<label for="">Treatment</label>
		<p id="view_treatment" class="form-control"></p>
		</div>
		
		<div class="mb-3">
		<label for="">Bill</label>
		<p id="view_bill" class="form-control"></p>
		</div>
		
		
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
	
    </div>
  </div>
</div>





	<div class="container">
	<div class="row justify-content-center">
	<div class="col-md-10">
	<div class="card">
	
	<div class="card-header">
	<h4>List of Discharge Patient
	<button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#patientAddModal">
    Add Patient
    </button>
	</h4>
	</div>
	
	<div class="card-body">
	
	<table id="myTable" class="table table-bordered table-striped table-dark table-hover">
	<thead>
	<tr>
	<th>ID</th>
	<th>Name</th>
	<th>Treatment</th>
	<th>Bill</th>
	<th>Action</th>
	</tr>
	</thead>
	<tbody>
	
	<?php
	require 'dbcon.php';
	
	$query = "SELECT * FROM patientsss";
	$query_run = mysqli_query($con, $query);
	
	if(mysqli_num_rows($query_run) > 0)
	{
		foreach($query_run as $patient)
		{
			?>
			<tr>
			<td><?= $patient['id'] ?></td>
			<td><?= $patient['name'] ?></td>
			<td><?= $patient['treatment'] ?></td>
			<td><?= $patient['bill'] ?></td>
			<td>
			  
				<button type="button" value="<?=$patient['id'];?>" class="viewPatientBtn btn btn-info">View</button>
			    <button type="button" value="<?=$patient['id'];?>" class="editPatientBtn btn btn-success">Edit</button>
				<button type="button" value="<?=$patient['id'];?>" class="deletePatientBtn btn btn-danger">Delete</button>
				
			</td>
			</tr>
			<?php
		}
		
	}
	?>
	
	<tr>
	<td></td>
	</tr>
	</tbody>
	</table>
	
	</div>
	</div>
	</div>
	</div>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	
	<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>

	
	<script>
	
	/*add*/
	$(document).on('submit', '#savePatient', function (e) {
		e.preventDefault();
		
		var formData = new FormData(this);
		formData.append("save_patient", true);
		
		$.ajax({
			type: "POST",
			url: "code.php",
			data: formData,
			processData: false,
			contentType: false,
			success: function (response) {
				
				var res = jQuery.parseJSON(response);
				if(res.status == 422) {
					$('#errorMessage').removeClass('d-none');
					$('#errorMessage').text(res.message);
				}else if(res.status == 200){
					
					$('#errorMessage').addClass('d-none');
					$('#patientAddModal').modal('hide');
					$('#savePatient')[0].reset();
					
					alertify.set('notifier','position', 'top-right');
					alertify.success(res.message);
					
					$('#myTable').load(location.href + " #myTable");
				}
				
			}
			
		});
		
	});
	
	/*edit*/
	$(document).on('click', '.editPatientBtn', function () {
		
		var patient_id = $(this).val();
		//alert(patient_id);
		
		$.ajax({
			type: "GET",
			url: "code.php?patient_id=" + patient_id,
			success: function (response) {
				
				var res = jQuery.parseJSON(response);
				
				if(res.status == 422) {
					alert(res.message);
				}else if(res.status == 200){
					
				    $('#patient_id').val(res.data.id);
					$('#name').val(res.data.name);
					$('#treatment').val(res.data.treatment);
					$('#bill').val(res.data.bill);
					
					$('#patientEditModal').modal('show');
					
				}
				
			}
			
		});
				
	});
	
	
	/*update*/
	$(document).on('submit', '#updatePatient', function (e) {
		e.preventDefault();
		
		var formData = new FormData(this);
		formData.append("update_patient", true);
		
		$.ajax({
			type: "POST",
			url: "code.php",
			data: formData,
			processData: false,
			contentType: false,
			success: function (response) {
				
				var res = jQuery.parseJSON(response);
				if(res.status == 422) {
					$('#errorMessageUpdate').removeClass('d-none');
					$('#errorMessageUpdate').text(res.message);
				}else if(res.status == 200){
					
					$('#errorMessageUpdate').addClass('d-none');
					
					alertify.set('notifier','position', 'top-right');
					alertify.success(res.message);
					
					$('#patientEditModal').modal('hide');
					$('#updatePatient')[0].reset();
					
					$('#myTable').load(location.href + " #myTable");
				}
				
			}
			
		});
		
	});
	
	/*view*/
	$(document).on('click', '.viewPatientBtn', function () {
		
		var patient_id = $(this).val();
		
		$.ajax({
			type: "GET",
			url: "code.php?patient_id=" + patient_id,
			success: function (response) {
				
				var res = jQuery.parseJSON(response);
				
				if(res.status == 422) {
					alert(res.message);
				}else if(res.status == 200){
					
				
					$('#view_name').text(res.data.name);
					$('#view_treatment').text(res.data.treatment);
					$('#view_bill').text(res.data.bill);
					
					$('#patientViewModal').modal('show');
					
				}
				
			}
			
		});
				
	});
	
	/*delete*/
	$(document).on('click', '.deletePatientBtn', function (e) {
		e.preventDefault();
		
		if(confirm('Are you sure you want to delete this data?'))
		{
		   var student_id = $(this).val();
		   
		   $.ajax({
			type: "POST",
			url: "code.php",
			data: {
				'delete_student': true,
				'student_id': student_id
			},
			success: function (response) {
				
				var res = jQuery.parseJSON(response);
				
				if(res.status == 500) {
					alert(res.message);
				}else{
					
					alertify.set('notifier','position', 'top-right');
					alertify.success(res.message);
					
					$('#myTable').load(location.href + " #myTable");
				}
				
				
				
			}
			
		   });
		   
		}
	
	});
	
	
	
	</script>
	
  </body>
</html>