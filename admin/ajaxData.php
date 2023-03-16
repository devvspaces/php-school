<?php include('conn/conn.php') ?>
<?php
// select the lga under a partucular college
if (isset($_POST['college'])) {
	echo "<option value=''>SELECT Department</option>";
	$college = $_POST['college'];
	$sql = mysqli_query($con, "SELECT * FROM department where code = '$college'");
	if (!$sql) {
		die(mysqli_error($con));
	}
	while ($sql2 = mysqli_fetch_array($sql)) {
		$dept_code = $sql2['dept_code'];
		$department = $sql2['department'];
		echo "<option value='$dept_code'>$department</option>";
	}
}
