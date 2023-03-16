<?php
include("conn/conn.php");
if(isset($_GET['data'])){
	$ms_query = mysqli_query($con,"UPDATE elective_window set status = '1'");
	header('Location:'. $_SERVER['HTTP_REFERER']);

}
if(isset($_GET['data2'])){
	$ms_query = mysqli_query($con,"UPDATE elective_window set status = '0'");
	header('Location:'. $_SERVER['HTTP_REFERER']);

}
?>