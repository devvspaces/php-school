<?php include("../class.php") ?>
<?php session_start();
if (!isset($_SESSION['users'])) {
	header("location:..\index.php");
}
?>
<?php
$date = date('d-m-Y');
if (isset($_POST['admission'])) {
	$matric_no = $_POST['admission'];
	$username = $auth->select14('username', 'students', 'matric_no', $matric_no);
	$sql1 =  mysqli_query($con, "SELECT * FROM students where matric_no = '$matric_no'");
	if (!$sql1) {
		die(mysqli_error($con));
	} else {
		if ($auth->countall3('inactive', 'matric_no', $matric_no) < 1) {
			die("This user is not inactive");
		}
		$check_inactive =  mysqli_query($con, "SELECT * FROM inactive where matric_no = '$matric_no'");
		$check_inactive_res = mysqli_fetch_array($check_inactive);
		$inactive_date = $check_inactive_res['dates'];
		$date_expired = date('d-m-Y', strtotime('+30days', strtotime($inactive_date))) . PHP_EOL;
		//echo $date_expired;
		$now = strtotime($date);
		$valid = strtotime($date_expired);
		if ($now < $valid) {
			//echo $valid."<br>".$now;
			echo "<p class='alert alert-danger'>you can only delete a student after 30 days of remaining in inactive zone</p>";
		} else {
			$sql2 = mysqli_fetch_array($sql1);
			$student = $sql2['admission_no'];


			$sql3 =  mysqli_query($con, "INSERT into left_students SELECT * FROM students where matric_no = '$matric_no'");
			if (!$sql3) {
				die(mysqli_error($con));
			} else {
				$sql5 = mysqli_query($con, "DELETE from students where matric_no ='$matric_no'");

				if (!$sql5) {
					die(mysqli_error($con));
				} else {
					$sql6 = mysqli_query($con, "UPDATE users set presence = '0' where userid2 = '$username'");
					if (!$sql6) {
						die(mysqli_error($con));
					} else {

						echo "You have marked this student has left $student";
					}
				}
			}
		}
	}
}
?>