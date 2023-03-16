<?php include("conn/conn.php") ?>
<?php  
$sql = mysql_query("DELETE from users where type = 'student'");
	if(!$sql){
		die(mysql_error());
	}
?>
