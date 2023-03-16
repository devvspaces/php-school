<select name="subject" class="form-control" required>
	<option value="">Select Subject</option>
<?php
include("conn/conn.php");
session_start();
error_reporting(0);
if(!isset($_SESSION['users'])){
	header("location:..\index.php");
}
$class = $_POST['clas'];
$get_class = mysqli_query($con,"SELECT * FROM subject where participant  = '$class' ");
while($show_class = mysqli_fetch_array($get_class)){
	$c_class = $show_class['title'];
	$c_sn = $show_class['sn'];
	echo "<option value='$c_sn'>$c_class</option>";

}
?>
</select>