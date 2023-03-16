<?php include("conn/conn.php") ?>
<?php
session_start();
if(!isset($_SESSION['users'])){
header("location:..\index.php");
$users = $_SESSION['users'];
}
if(isset($_POST['period'])){
	$day = $_POST['day'];
	$period = $_POST['period'];
	$subject = $_POST['subject'];
	$class = $_POST['class'];
	$arm = $_POST['arm'];
	$set_by = $_POST['set_by'];
	$class_clash = mysqli_query($con,"SELECT * FROM time_table where day = '$day' and period = '$period' and class = '$class' and arm = '$arm'");
	$staff_clash = mysqli_query($con,"SELECT * FROM time_table where day = '$day' and period = '$period' and set_by = '$set_by'");
	if($e = mysqli_num_rows($class_clash)>0){
		echo "Class already has a subject on this same period and on this same day";
	}
	elseif(mysqli_num_rows($staff_clash)>0){
			echo "You have another schedule on this same period and on this same day";
	}
	elseif($period == "break"){
		echo "you cannot add a schedule on break";
	}
	else{
	$insert = mysqli_query($con,"INSERT into time_table (subject_id,class,arm,day,period,set_by)VALUES('$subject','$class','$arm','$day','$period','$set_by')");
	if(!$insert){
		die(mysqli_error($con));
	}
	else{
		echo "done";
	}
}
}



?>