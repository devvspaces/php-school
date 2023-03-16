<?php include("conn/conn.php") ?>
<?php session_start() ?>
<?php 
if(isset($_GET['is'])){
	$is = $_GET['is'];
	$sql = mysqli_query($con,"DELETE from event where sn = '$is'");
	if(!$sql){
		die(mysqli_error($con));
	}
	else{
		header("Location:calendar.php");
	}
}
else{
	die("error");
}