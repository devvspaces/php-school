<?php include("conn/conn.php") ?>
<?php
	$holder = $_POST['holder'];
	$post = $_POST['post'];
	$check = mysqli_query($con,"SELECT * FROM student_post where holder  = '$holder'");
	if(mysqli_num_rows($check) >0){
		echo "error";
	}
	else{
	$query = mysqli_query($con,"UPDATE student_post set holder = '$holder' where sn = '$post' ");
	}

	?>