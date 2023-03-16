<?php include("conn/conn.php") ?>
<?php session_start() ?>
<?php 
if(isset($_GET['is'])){
	$is = $_GET['is'];
		$sql = mysqli_query($con,"DELETE from admin where username = '$is'");
	 	$sql6 = mysqli_query($con, "DELETE from users where userid2 = '$is'");

	if(!$sql && !$sql6){
		die(mysqli_error($con));
	}
	else{
		header("Location:mstaff.php");
	}