<?php
include("conn/conn.php");
	$ses = mysqli_query($con,"SELECT * FROM calender");
				$sete= mysqli_fetch_array($ses);
				$return2 = $sete['session'];
				$return1 = $sete['current_term'];
if(isset($_POST['student'])){
	$student = $_POST['student'];
	$subject_id = $_POST['subject_id'];
		$mon = mysqli_query($con,"SELECT * FROM elective_subject where subject_id = '$subject_id' and  student= '$admission'");
										if(mysqli_num_rows($mon) == 0){
										    	$sql = mysqli_query($con,"INSERT into elective_subject (subject_id,student_id,admission_no,session,term)VALUES('$subject_id','$student', '$student','$return2','$return1')");
	if(!$sql){
		die(mysqli_error("$con"));
	}
										
										}
										else{
											echo "subject Already Selected";
										}

}
?>