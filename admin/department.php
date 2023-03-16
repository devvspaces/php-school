<?php include("conn/conn.php") ?>
<select class="form-control" name="teacher">
<?php
if(isset($_POST['dept'])){
$x = $_POST['dept'];
$sql = mysqli_query($con,"SELECT * FROM staff where department = '$x' ");
while($sh4 = mysqli_fetch_array($sql)){
	$employee = $sh4['employee'];
	$name =$sh4["lname"]." ".$sh4["fname"];
	?>
	<option data-value="<?php echo $name?>"  value="<?php echo $employee ?>"><?php echo $name ?></option>
	<?php
}
}
?>
</select><br>