<?php include("conn/conn.php") ?>
<?php session_start();
if(!isset($_SESSION['users'])){
	header("location:..\index.php");

}
$users = $_SESSION['users']; 	
$s1  = mysqli_query($con,"SELECT * FROM students where username = '$users'");
$sh1 = mysqli_fetch_array($s1);
$admission = $sh1['admission_no'];
if(isset($_POST['ass_id'])){
	$ass_id = $_POST['ass_id'];
	$sub_id = $_POST['sub_id'];
	$file = $_FILES['file']['name'];
	$ext = pathinfo($file, PATHINFO_EXTENSION);
	$newname = "assignment_".uniqid().'.'.$ext;
	move_uploaded_file($_FILES["file"]["tmp_name"],"assignment/".$newname);
	$fdir = "assignment/".$newname;
	$date = date('Y-m-d');
	$check = mysqli_query($con,"SELECT * FROM ass_sub where ass_id = '$ass_id' AND student = '$admission'");
	if(mysqli_num_rows($check)>=1){
		echo "<p style='color:#F00;'>you have made a submittion for this assignment</p>";
	}
	else{
	$submit_query=mysqli_query($con,"INSERT into ass_sub (ass_id,sub_id,student,file,sub_date)VALUES('$ass_id','$sub_id','$admission','$fdir','$date')");
	if(!$submit_query){
		die(mysqli_error($con));
	}
	else{
		echo "<p style='color:#55be53;'><span class='glyphicon glyphicon-ok'></span> submitted successfully</p>";
	}
}
}
?>