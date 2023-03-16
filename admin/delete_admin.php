<?php include("../class.php") ?>
<?php session_start() ?>
<?php
if (isset($_GET['is'])) {
	$is = $_GET['is'];
	$gen_admin = mysqli_query($con, "SELECT * from admin where username = '$is'");
	$pos = mysqli_fetch_array($gen_admin);
	$pos2 = $pos['position'];
	if ($pos2 == 'admin') {
		die("<p class='alert alert-danger'>Cannot Delete Main Admin</p>");
	} else {
		$sql = "good";
		$sql = mysqli_query($con, "DELETE from admin where username = '$is'");
		$sql6 = mysqli_query($con, "DELETE FROM users WHERE userid2 = '$is'");

		if (!$sql) {
			die(mysqli_error($con));
		} else {
			$uid = $_SESSION['users'];
			$details = "$uid deleted an admin account with username $id";
			$auth->Log($uid, 'admin', 'delete admin', $details);

			header("Location:madmin.php");
		}
	}
} else {
	die("error");
}
