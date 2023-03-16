<?php include("conn/conn.php") ?>
<?php
	$sql5 = mysql_query("UPDATE questions SET exam_code= '5b5b7ce327c9d'");
	if(!$sql5){
		die(mysql_error());
	}

	?>