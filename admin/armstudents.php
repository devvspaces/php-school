<?php
include("conn/conn.php");
$query = mysqli_query($con, "SELECT * FROM students where class = 'JSS1'");
$no = mysqli_num_rows($query);
while($query2 = mysqli_fetch_array($query)){
	$students = $query2['admission_no'];

	echo $students."<br>";
}
$arm= array("A","B","C");
$arm_no = count();
echo $arm_no;
//echo celi($no/$arm_no );




?>