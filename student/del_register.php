<?php
include("conn/conn.php");
if(isset($_POST['student'])){
	$student = $_POST['student'];
	$subject_id = $_POST['sbjid'];

		$sql = mysqli_query($con,"DELETE  FROM elective_subject WHERE subject_id = '$subject_id' AND student_id = '$student'");
		if(!$sql){
		    (mysqli_error($con));
		}
else {echo $student };
		

}
?>