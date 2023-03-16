<?php include("conn/conn.php") ?>
<?php
$sql1 = mysqli_query($con,"SELECT * FROM result_access");
$sql2 = mysqli_fetch_array($sql1);
$jss3 = $sql2['jss3'];
if($jss3==0){
  $sql3 = mysqli_query($con,"UPDATE result_access set jss3 = 1");
}
else{
  $sql3 = mysqli_query($con,"UPDATE result_access set jss3 = 0"); 
}
header('Location:'. $_SERVER['HTTP_REFERER']);
?>