<?php include("../class.php") ?>
<?php session_start() ?>
<?php
if (isset($_GET['is'])) {
	$is = $_GET['is'];
	$sql = mysqli_query($con, "DELETE from fees where sn = '$is'");
	if (!$sql) {
		die(mysqli_error($con));
	} else {
		header("Location:mfees.php");
	}
} else {
	die("error");
}
