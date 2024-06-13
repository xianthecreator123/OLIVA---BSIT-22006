<?php



require 'dbcon.php';



if(isset($_POST['delete_student']))

{

	$student_id = mysqli_real_escape_string($con, $_POST['student_id']);

	

	$query = "DELETE FROM patientsss WHERE id='$student_id'";

	$query_run = mysqli_query($con, $query);

	

	if($query_run)

	{

		$res = [

		    'status' => 200,

			'message' => 'Patient deleted successfully'

		];

		echo json_encode($res);

		return false;

	}

	else

	{

		$res = [

		    'status' => 500,

			'message' => 'Failed to delete patient'

		];

		echo json_encode($res);

		return false;

	}

	

}







/*update*/

if(isset($_POST['update_patient']))

{

	$patient_id = mysqli_real_escape_string($con, $_POST['patient_id']);

	$name = mysqli_real_escape_string($con, $_POST['name']);

	$treatment = mysqli_real_escape_string($con, $_POST['treatment']);

	$bill = mysqli_real_escape_string($con, $_POST['bill']);

	

	if($name == NULL || $treatment == NULL || $bill == NULL)

	{

		$res = [

		    'status' => 422,

			'message' => 'All fields are required'

		];

		echo json_encode($res);

		return false;

	}

	

	$query = "UPDATE patientsss SET name='$name', treatment='$treatment', bill='$bill' WHERE id='$patient_id'";

	$query_run = mysqli_query($con, $query);

	

	if($query_run)

	{

		$res = [

		    'status' => 200,

			'message' => 'Patient updated successfully'

		];

		echo json_encode($res);

		return false;

	}

	else

	{

		$res = [

		    'status' => 500,

			'message' => 'Failed to update patient'

		];

		echo json_encode($res);

		return false;

	}

	

}









/*edit*/

if(isset($_GET['patient_id']))

{

	$patient_id = mysqli_real_escape_string($con, $_GET['patient_id']);

	

	$query = "SELECT * FROM patientsss WHERE id='$patient_id'";

	$query_run = mysqli_query($con, $query);

	

	if(mysqli_num_rows($query_run) == 1)

	{

		$patient = mysqli_fetch_array($query_run);

		$res = [

		    'status' => 200,

			'message' => 'Patient fetch successfully',

			'data' => $patient

		];

		echo json_encode($res);

		return false;

	}

	else

	{

		$res = [

		    'status' => 404,

			'message' => 'Patient ID not found'

		];

		echo json_encode($res);

		return false;

	}

	

}





/*add patient*/

if(isset($_POST['save_patient']))

{

	$name = mysqli_real_escape_string($con, $_POST['name']);

	$treatment = mysqli_real_escape_string($con, $_POST['treatment']);

	$bill = mysqli_real_escape_string($con, $_POST['bill']);

	

	if($name == NULL || $treatment == NULL || $bill == NULL)

	{

		$res = [

		    'status' => 422,

			'message' => 'All fields are required'

		];

		echo json_encode($res);

		return false;

	}

	

	$query = "INSERT INTO patientsss (name,treatment,bill) VALUES ('$name','$treatment','$bill')";

	$query_run = mysqli_query($con, $query);

	

	if($query_run)

	{

		$res = [

		    'status' => 200,

			'message' => 'Patient added successfully'

		];

		echo json_encode($res);

		return false;

	}

	else

	{

		$res = [

		    'status' => 500,

			'message' => 'Failed to add patient'

		];

		echo json_encode($res);

		return false;

	}

	

}



?>