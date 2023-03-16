<?php include("conn/conn.php") ?>
<?php session_start();
if(!isset($_SESSION['users'])){
	header("location:..\index.php");
}
?>
 <?php
            $path = "../name.txt";
            $name = file_get_contents($path);
            ?>
<!DOCTYPE html>
<html>
<head>
	<title>staff portal</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<?php 
	$ses = mysqli_query($con,"SELECT * FROM calender");
						$sete= mysqli_fetch_array($ses);
						$return2 = $sete['session'];
						$return1 = $sete['current_semester'];
if(isset($_GET['is'])){
	$is = $_GET['is'];
	$sl2 = mysqli_query($con,"SELECT * from course where code = '$is'" );
	$sh2 = mysqli_fetch_array($sl2);
	$title = $sh2['title'];
	$code = $sh2['code'];
	$level = $sh2['level'];
	$i = 0;
}
?>
<div class="container">
    	<div class="row">
							<div class="col-lg-1"><img src="logo.png" style="float: left; width: 90px; height: 90px;"></div>

							<div class="col-lg-10"><h4 class="text-center" style="font-weight: bold;"><?php echo $name ?></h4>
							
<h4 style="text-align: center;">Score sheet for <?php echo $title."($code)"?>
<?php 

	$sl3 = mysqli_query($con,"SELECT * FROM course_registration where course_code = '$code' and session='$return2' and semester='$return1' ");

	$num1 = mysqli_num_rows($sl3);
?>
<br><small>Total number of students:<?php echo $num1 ?></small></h4>
</div>
</div>
<table class="table2excel table table-bordered table-stripped"  data-tableName='Test Table 1'>
	<tr>
		<th>SN</th>
		<th>Admin No</th>
		<th>Name</th>
		<th>CA1</th>
		<th>CA2</th>
		<th>T1</th>
		<th>ETT</th>
		<th>T2</th>
		<th>LTC</th>
		<th>TC</th>
		<th>GR</th>
	</tr>
	<?php 
		while($show_us = mysqli_fetch_array($sl3)){
			$idm = $show_us['matric_no'];
			$i++;
			$sqlx = mysqli_query($con,"SELECT * FROM students where matric_no = '$idm' ");
			if(!$sqlx){
				die(mysqli_error($con));
			}
			$sqlxx = mysqli_fetch_array($sqlx);
			$matric = $sqlxx['matric_no'];
			$name = $sqlxx['fname']." ".$sqlxx['lname'];
			?>
			<tr>
				<td><?php echo $i ?></td>
				<td><?php echo $matric ?></td>
				<td><?php echo $name  ?></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php
	}

	?>
</table>
<div class="col-lg-12"><p style="font-size: 10px;">&copy<?php echo date("Y")?> HAPA COLLEGE</p></div>
</div>
</body>
</html>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
	$(window).load(function(){
		window.print();
	})
</script>