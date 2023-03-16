<?php include("conn/conn.php") ?>

<?php
if (isset($_POST['clas'])) {
	$x = $_POST['clas'];
	$sql = mysqli_query($con, "SELECT * FROM department where code = '$x' ");
	echo "<option value=''>Select Department</option>";
	while ($sh4 = mysqli_fetch_array($sql)) {
		$dept_code = $sh4['dept_code'];
		$department = $sh4['department'];
		echo "<option value='$dept_code'>$department</option>";
	}
}
?>