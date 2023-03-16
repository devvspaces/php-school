<?php 
$db_database='uni_portal';
$db_hostname = "localhost";
$db_username = "root";
$db_password = "";
$con=$conn= mysqli_connect($db_hostname,$db_username,$db_password,$db_database);
if(mysqli_connect_errno()){
    echo "failed".mysqli_connect_error();
}
