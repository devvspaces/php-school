<table border="1">
<?php include("conn/conn.php") ?>
<?php
$win1 = mysqli_query($con,"SELECT * FROM students");
while($win2 = mysqli_fetch_array($win1)){
	$admission= $win2['admission_no'];
	$class = $win2['class'];
$query = mysqli_query($con,"SELECT * FROM fees");
						while($fetch2 = mysqli_fetch_array($query)){
							$part = $fetch2['participant'];
							$code = $fetch2['code'];
							$list = explode(',', $part);
							$hay = array('all',$class, $admission);
							if(count(array_intersect($hay, $list))>0){
								//echo "yes";
								$code1 = $code;
							}
							else{
								//echo "no";
								$code1 = '';
							}							
						$sl2 = mysqli_query($con,"SELECT * FROM fees where code = '$code1' ");
						while($sh2 = mysqli_fetch_array($sl2)){
						$sn1 = $sh2['sn'];
						$pin ="999".rand(10000000,50000000).rand(1235,2345);
						$dates = date('d-m-y');
						$ins =mysqli_query($con,"INSERT into pin (admission,pin,fees_id,dates)VALUES('$admission','$pin','$sn1','$dates')");
						if(!$ins){
						die(mysqli_error($con));
					}
					else{


echo"
<tr>
<td>$admission</td>
<td>$sn1</td>
<td>$pin</td>
<td>$dates</td>
</tr>
";
}
}
}
}
?>

</table>
