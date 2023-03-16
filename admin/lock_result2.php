<?php include("conn/conn.php") ?>
<?php session_start();
if(!isset($_SESSION['users'])){
  header("location:..\index.php");
}
 ?>
<?php
if(isset($_GET['is'])){
	if($_GET['is']=='CA1'){
	$ir = $_GET['is'];
	$it = $_GET['it'];
	if($it == 'lock'){
	$query = mysqli_query($con,"UPDATE result_query set status = '0' where result = '$ir' ");
	if(!$query){
		die(mysqli_error($con));
	}
	else{
		header("Location:lock_result.php");
	}
}
	else{
		$query = mysqli_query($con,"UPDATE result_query set status = '1' where result = '$ir' ");
	if(!$query){
		die(mysqli_error($con));
	}
	else{
		header("Location:lock_result.php");
	}
}
}
}
if(isset($_GET['is'])){
	if($_GET['is']=='CA2'){
	$ir = $_GET['is'];
	$it = $_GET['it'];
	if($it == 'lock'){
	$query = mysqli_query($con,"UPDATE result_query set status = '0' where result = '$ir' ");
	if(!$query){
		die(mysqli_error($con));
	}
	else{
		header("Location:lock_result.php");
	}
}
	else{
		$query = mysqli_query($con,"UPDATE result_query set status = '1' where result = '$ir' ");
	if(!$query){
		die(mysqli_error($con));
	}
	else{
		header("Location:lock_result.php");
	}
}
}
}
if(isset($_GET['is'])){
	if($_GET['is']=='CA3'){
	$ir = $_GET['is'];
	$it = $_GET['it'];
	if($it == 'lock'){
	$query = mysqli_query($con,"UPDATE result_query set status = '0' where result = '$ir' ");
	if(!$query){
		die(mysqli_error($con));
	}
	else{
		header("Location:lock_result.php");
	}
}
	else{
		$query = mysqli_query($con,"UPDATE result_query set status = '1' where result = '$ir' ");
	if(!$query){
		die(mysqli_error($con));
	}
	else{
		header("Location:lock_result.php");
	}
}
}
}
if(isset($_GET['is'])){
	if($_GET['is']=='ett'){
	$ir = $_GET['is'];
	$it = $_GET['it'];
	if($it == 'lock'){
	$query = mysqli_query($con,"UPDATE result_query set status = '0' where result = '$ir' ");
	if(!$query){
		die(mysqli_error($con));
	}
	else{
		header("Location:lock_result.php");
	}
}
	else{
		$query = mysqli_query($con,"UPDATE result_query set status = '1' where result = '$ir' ");
	if(!$query){
		die(mysqli_error($con));
	}
	else{
		header("Location:lock_result.php");
	}
}
}
}
if(isset($_GET['is'])){
	if($_GET['is']=='last'){
	$ir = $_GET['is'];
	$it = $_GET['it'];
	if($it == 'lock'){
	$query = mysqli_query($con,"UPDATE result_query set status = '0' where result = '$ir' ");
	if(!$query){
		die(mysqli_error($con));
	}
	else{
		header("Location:lock_result.php");
	}
}
	else{
		$query = mysqli_query($con,"UPDATE result_query set status = '1' where result = '$ir' ");
	if(!$query){
		die(mysqli_error($con));
	}
	else{
		header("Location:lock_result.php");
	}
}
}
}
?>