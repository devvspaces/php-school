<?php include("conn/conn.php") ?>
<?php session_start();
if(!isset($_SESSION['users'])){
  header("location:..\index.php");
}
 ?>
 <?php
$sst = mysqli_query($con,"INSERT into  graduated SELECT * from students  where  class = 'SSS 3' ");
if(!$sst){
	die(mysqli_error($con));
}
else{
	$sqlx1 =mysqli_query($con,"DELETE FROM students where  class = 'SSS 3'");
}
if(!$sqlx1){
die(mysqli_error($con));
}
?>