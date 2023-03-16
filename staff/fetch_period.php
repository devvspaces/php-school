<?php
include("conn/conn.php");
if(isset($_POST['day'])){
	$day = $_POST['day'];
	$day = mysqli_query($con,"SELECT * FROM period_format where day = '$day'");
	while($showday = mysqli_fetch_array($day)){
		$period = $showday['period'];
		echo 
		"<option value='$period'>$period</option>";
	}
}

?>