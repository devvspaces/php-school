<?php 
$db_database='dvcsssco_fmc';
$db_hostname = "localhost";
$db_username = "dvcsssco";
$db_password = "r0dRrHyJ621B;]";
$con= mysqli_connect($db_hostname,$db_username,$db_password,$db_database);
if(mysqli_connect_errno()){
    echo "failed".mysqli_connect_error();
}
?>
