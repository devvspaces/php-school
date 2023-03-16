<?php include("conn/conn.php") ?>
<?php session_start() ?>
<?php 
	$is = $_POST['id'];
	$clas3 = $_POST['clas3'];
	if($clas3 == ""){
		die('select a class');
	} 
	$sql = mysqli_query($con,"UPDATE students set class =  '$clas3' where username = '$is'");
	if(!$sql){
		die(mysql_error($con));
	}
	else{
		?>
<div class="alert alert-success "> 
            <a href="#" class="close" data-dismiss="alert"> 
            &times; 
            </a> 
            saved
        </div>
	<?php
	}
	?>