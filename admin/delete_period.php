<?php
include("conn/conn.php");
if(isset($_GET['is'])){
	$is = $_GET['is'];
	$delete = mysqli_query($con,"DELETE  FROM period_format where sn = '$is'");
	if(!$delete){
		die(mysqli_error($con));
	}
	else{
			echo "deleted";
		}
}

?>