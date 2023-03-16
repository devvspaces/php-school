<?php
include("conn/conn.php");
$is = $_GET['is'];
$ir = $_GET['ir'];
$del_query = mysqli_query($con,"DELETE  from time_table where sn = '$is'");
if(!$del_query){
	die(mysqli_error($con));
}
else{
	header("location:time_table.php?is=$ir");
}
?>