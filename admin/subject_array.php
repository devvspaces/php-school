<table border="1"><?php include("conn/conn.php") ?>
<?php
$subjects = array(
"Mathematics"=>"science",
"English"=>"art",
"Biology"=>"science",
"Economics"=>"commericial",
"Yoruba"=>"art",
"finical accounting"=>"commericial",
"commerance"=>"commericial",
"geography"=>"commericial",
"typing"=>"commericial",

);
$date = date('d-m-Y');
foreach ($subjects as $key => $value) {
	$sql = mysql_query("SELECT * FROM staff where department = '$value'");
	$result = array();
	while($im = mysql_fetch_array($sql)){
		$result[] = $im['employee'];
	}
			$employee = $result[array_rand($result)];
			$class = "SS3_commericial";
			$code = substr($key, 0,4)."$class"; 
			echo "<tr>
	<th>$key</th>
	<th>$value</th>
	<th>$employee</th>
	<th>$code</th>
	<th>$class</th>
	<th>$date</th>
</tr>";
$sql1=mysql_query("INSERT INTO subject(title,code,department,teacher,dates,participant)VALUES('$key','$code','$value','$employee','$date','$class')");
				if(!$sql1){
					die(mysql_error());
				}
}

?>

</table>
