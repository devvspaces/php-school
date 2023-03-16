<?php include("../class.php") ?>
<?php session_start() ?>
<?php
$is = $_POST['c_code'];
$sql = mysqli_query($con, "DELETE from course_registration where sn = '$is'");
if (!$sql) {
	die(mysqli_error($con));
}

?>