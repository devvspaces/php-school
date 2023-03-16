<?php include("../conn.php") ?>
<?php session_start() ?>
<?php
if (isset($_GET['is'])) {
	$is = $_GET['is'];
	$itm =  mysqli_query($con, "INSERT into gone_staff SELECT * FROM staff where username = '$is'");
	if (!$itm) {
		die(mysqli_error($con));
	} else {
		$sql = mysqli_query($con, "DELETE from staff where username = '$is'");
		$sql6 = mysqli_query($con, "UPDATE users set presence = '0' where userid2 = '$is'");

		if (!$sql) {
			die(mysqli_error($con));
		} else {
			header("Location:mstaff.php");
		}
	}
} else {
	die("error");
}
