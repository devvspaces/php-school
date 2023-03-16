<?php include("conn.php"); ?>
<?php
$sql  = mysqli_query($con,"SELECT * FROM students ");
while($s = mysqli_fetch_array($sql)){
$number = $s['admission_no'];
$final = "passport/".ucfirst(str_replace("/", "", $number)).".jpg";
 $sql2 = mysqli_query($con,"UPDATE students set picture = '$final' where admission_no = '$number' ");
}


?>