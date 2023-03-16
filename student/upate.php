<?php include("conn/conn.php") ?>
<?php session_start();
if(!isset($_SESSION['users'])){
  header("location:..\index.php");
}
?>
<?php
if(isset($_POST['bell'])){
$user = $_SESSION['users'];
$slx = mysqli_query($con,"SELECT * FROM notification where status= '0' And admission = '$user' ");
while($slxx = mysqli_fetch_array($slx)){
	$user2 = $slxx['admission'];
$sl1 = mysqli_query($con,"UPDATE notification set status = '1' where admission = '$user2' ");
if(!$sl1){
	die(mysqli_error());
}
}
	$user3 = $slxx['admission'];
	$num1 = mysqli_query($con,"SELECT * FROM notification where status= '0' AND admission = '$user3' ");
	$num2 = mysqli_num_rows($num1);
	echo $num2; 
}
	?>

