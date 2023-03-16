<?php require("conn/conn.php") ?>
<?php session_start() ?>
<?php 
session_set_cookie_params(0);
session_destroy();
$dates = date('d-m-y'.', '.'h:i');
mysqli_query($con,"UPDATE users set status ='0', ip = ''where sn='".$_SESSION['sugusers']."'");
header('Location: ..\index.php');
?>