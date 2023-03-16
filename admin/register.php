<?php
// error_reporting(0);
include("../class.php");
$ses = mysqli_query($con, "SELECT * FROM calender");
$sete = mysqli_fetch_array($ses);
$current_session = $sete['session'];
$current_semester = $sete['current_semester'];
//previous Session
// $fyear = substr($return2, 0, 4) - 1;
// $syear = substr($return2, -4) - 1;
// $previous_session = $fyear . '/' . $syear;
if (isset($_POST['matric'])) {
	$matric_no = $_POST['matric'];
	$course = $_POST['code'];
	$stream = $_POST['stream'];
	//coming unit
	$unit = $_POST['unit'];
	//check total unit Registered Already
	$total_unit = "";
	// check for failed courses


	$created_at = date('Y-m-d H:i:s');


	$sqlstr = "INSERT INTO course_registration (course_code,matric_no,session,semester,unit,created_at) VALUES ('$course','$matric_no','$current_session','$current_semester','$unit','$created_at')";
	$stmt = $conn->prepare($sqlstr);
	if ($stmt->execute()) {
		echo "Course added successfully";
	} else {
		echo "Course not added successfully";
	}
} else {
	echo "No data supplied";
}
