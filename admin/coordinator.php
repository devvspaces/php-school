<?php include("conn/conn.php") ?>
<?php
	$coordinator = $_POST['coordinator'];
	$clas = $_POST['clas'];
	$check = mysqli_query($con,"SELECT * FROM class where coordinator  = '$coordinator'");
	if(mysqli_num_rows($check) >0){
		echo "error";
	}
	else{
	$query = mysqli_query($con,"UPDATE class set coordinator = '$coordinator' where class = '$clas' ");
	}

	?>