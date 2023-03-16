<?php include("header.php");
ob_start();
?>
<div class="container-fluid main-container">
	<div class="row main">
		<div class="col-lg-12 panel-container">
			<div class="panel panel-default">
				<div class="panel-heading" id="p_heading">
					<?php 
//display teachers details
					$users = $_SESSION['users'];
					$s1  = mysqli_query($con,"SELECT * FROM staff where username = '$users'");
					$sh1 = mysqli_fetch_array($s1);
					$name1 = $sh1['fname']." ".$sh1['lname'];
					$img = $sh1['picture'];
					$department= $sh1['department'];
					if($img==""){
						$img2 = "passport/default.png";
					}
					else{
						$img2 = $img;
					}
					?>
					<img src="<?php echo $img2 ?>" id="imgs" class="img-responsive">
					<h4><?php echo $name1 ?></h4>
					<i><?php echo $department ?></i>
				</div>
				<div class="panel-body">
					<h4>Result</h4>
				</div>
				<div class="panel-body">
					<?php 
//get some details from the calander
					$qx = mysqli_query($con,"SELECT * FROM calender ");
					$sh3 = mysqli_fetch_array($qx);
					$return2 = $sh3['session'];
					$return1 = $sh3['current_semester'];
					?>
					<?php
					ob_start();
					if(isset($_POST['create'])){
						$name = mysqli_real_escape_string($con,$_POST['name']);
						$course2 = $_POST['course'];
						$code2 = $_POST['code'];
						$uniq = uniqid();
						$result_lock = mysqli_query($con,"SELECT * FROM result_query where result = 'result'");
						$sh2=mysqli_fetch_array($result_lock);
						$status_check = $sh2['status'];
						if($status_check == 0){
							die("<p class='alert alert-danger'>uploading or editing of $type result has been restrained by the administrator</p>");

						}              
						$sqlmix = mysqli_query($con,"SELECT * FROM  result_record where code = '$code2' AND session = '$return2' and semester = '$return1'");

						if(mysqli_num_rows($sqlmix) > 0){
							//die("<p class = 'alert alert-danger'>The result of this form already exist</p>");
							//header("location:uploadresult.php?is=$subjectid&&type=$type");
				             echo "<script>window.location.href='uploadresult.php?is=$code2';</script>";

						}
						
						else{
							$sqlxx = mysqli_query($con,"INSERT INTO result_record (name,session,semester,course,code,uniq)VALUES('$name','$return2','$return1','$course2','$code2','$uniq')");
							if (!$sqlxx){
								die(mysqli_error($con));
							}
							else{
								//header("location:uploadresult.php?is=$subjectid&&type=$type");
							    echo "<script>window.location.href='uploadresult.php?is=$code2';</script>";
							}
						}
					}
					?>
					<form method="POST">	
						<?php 
						if(isset($_GET['is'])){
							$snx = $_GET['is'];
						}
						$q1 = mysqli_query($con,"SELECT * FROM course where code = '$snx'");
						$sh2 = mysqli_fetch_array($q1);
						$course = $sh2['title'];
						$code = $sh2['code'];
						?>			
						<input type="" name="name" placeholder="Result name" class="form-control"  required>
						<small>eg MAT111  result for 1st semester of 2017/2018 session </small><br><br>
						<input type="" name="session" placeholder="session" class="form-control" value="<?php echo $return2 ?>" readonly required><br>
						<input type="" name="semester"  class="form-control" value="<?php echo $return1 ?>" readonly required><br>
						<input type="" name="course" placeholder="" class="form-control" required value="<?php echo $course ?>" readonly><br>
						<input type="" name="code" placeholder="" class="form-control" required value="<?php echo $code ?>" readonly><br>
						<p class="text-center"><button class="btn btn-primary" name="create">Proceed</button></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include("footer.php") ?>