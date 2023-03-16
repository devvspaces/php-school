<?php
include("conn/conn.php");
$s2  = mysqli_query($con,"SELECT * FROM  calender ");
					$sh2 = mysqli_fetch_array($s2);
					$sn = $sh2['sn'] ;
					$return2= $sh2['session'];
					$return1= $sh2['current_term'];
if(isset($_POST['student'])){
	$students = $_POST['student'];
	$date = date('d-m-y');
	$status = '1';
	$day = date('l');
	$month = date('F');
	$year = date('Y');
	$sql_query = mysqli_query($con,"INSERT into attendance (admission_no,date,status,day,month,year,session,term)VALUES('$students','$date','$status','$day','$month','$year','$return2','$return1')");
	if(!$sql_query){
		die(mysqli_error($on));
	}
	else{
		echo"present";
	}
}

if(isset($_POST['student1'])){
	$students = $_POST['student1'];
	$date = date('d-m-y');
	$status = '0';
	$day = date('l');
	$month = date('F');
	$year = date('Y');
	$sql_query = mysqli_query($con,"INSERT into attendance (admission_no,date,status,day,month,year,session,term)VALUES('$students','$date','$status','$day','$month','$year','$return2','$return1')");
	if(!$sql_query){
		die(mysqli_error($on));
	}
	else{
		echo"absent";
	}
}
if(isset($_POST['report'])){
	$students = $_POST['student2'];
	$report = $_POST['report'];
	$date = date('d-m-y');
	$status = '0';
	$day = date('l');
	$month = date('F');
	$year = date('Y');
	$sql_query = mysqli_query($con,"INSERT into daily_report(admission_no,date,report,day,month,year)VALUES('$students','$date','$report','$day','$month','$year')");
	if(!$sql_query){
		die(mysqli_error($on));
	}
	else{
		echo"report sent";
	}
}
?>