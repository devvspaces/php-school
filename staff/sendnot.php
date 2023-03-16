<?php include("header.php") ?>
<div class="container-fluid main-container">
	<div class="row main">
		<div class="col-lg-12 panel-container">
			<div class="panel panel-default">
				<div class="panel-heading" id="p_heading">
					<?php 
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
					<?php 
						$s2  = mysqli_query($con,"SELECT * FROM  calender ");
					$sh2 = mysqli_fetch_array($s2);
					$sn = $sh2['sn'] ;
					$return2= $sh2['session'];
					$return1= $sh2['current_semester'];
					if(isset($_GET['is'])){
						$is = $_GET['is'];
						$sl2 = mysqli_query($con,"SELECT * from course where code = '$is'" );
						$sh2 = mysqli_fetch_array($sl2);
						$code = $sh2['code'];
						$level = $sh2['level'];
					}
					?>
					<h4>Students taking <?php echo $code ?></h4>
					<?php 
						$sl3 = mysqli_query($con,"SELECT * FROM course_registration where course_code  = '$code' and session = '$return2' and semester ='$return1' ");
					$num1 = mysqli_num_rows($sl3);
					?>
					<small>Total number of students:<?php echo $num1 ?></small>
				</div>
				<div class="panel-body">
					<?php
					if(isset($_POST['send'])){
						$title = mysqli_real_escape_string($con,$_POST['title']);
						$body = mysqli_real_escape_string($con,$_POST['body']);
						$date = date('d-m-y');
							while($show_us = mysqli_fetch_array($sl3)){
								$idm = $show_us['matric_no'];
								//echo $idm;
								//echo $no;
								$ins1 = mysqli_query($con,"INSERT INTO notification(matric_no,title,content,dates,audience,sender)VALUES('$idm','$title','$body','$date', '$level', '$name1')");
								if(!$ins1){
									die(mysqli_error($con));
								}
							}
						?>
						<div class="alert alert-success "> 
							<a href="#" class="close" data-dismiss="alert"> 
								&times; 
							</a> 
							notification sent sucessfully
						</div>
						<?php
					}

					?>
					<form method="POST">
						<input type="" name="title" placeholder="title" class="form-control" required><br>
						<textarea name="body" placeholder="notificaton" class="form-control" required></textarea><br>
						<p class="text-center"><button class="btn btn-primary" name="send">SEND</button></p>
					</form>		
				</div>
			</div>
		</div>
	</div>
</div>
<?php include("footer.php") ?>