<?php
include("conn/conn.php");
$sn = $_GET['curriculumid'];
$sbjid = $_GET['sbjid'];
$del_query = mysqli_query($con,"DELETE  from curriculum where sn = '$sn'");
if(!$del_query){
	die(mysqli_error($con));
}
else{
	header("location:curriculum.php?is=$sbjid");
}
?>
