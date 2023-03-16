
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
					$employee = $sh1['employee'];
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
					<a href="c_assignment.php" class="btn">Create Assignment</a><p> </p>
					<div>
						<?php
						$ass_id = $_GET['ass_id'];
						if(isset($_GET['ass_id'])){
						$sel_ass = mysqli_query($con,"SELECT * FROM assignment where ass_id = '$ass_id'");
							$show_ass = mysqli_fetch_array($sel_ass);
							$title1 = $show_ass['title'];
							$desc1 = $show_ass['description'];
							$dead = $show_ass['deadline_date'];
							$ass_id = $show_ass['ass_id'];
							$time1 = $show_ass['deadline_time'];
							$file_in = $show_ass['file'];
						}
							?>
						<?php
							if(isset($_POST['send'])){
							$title = mysqli_real_escape_string($con,$_POST['title']);
							$date_end = mysqli_real_escape_string($con,$_POST['date']);
							$time = mysqli_real_escape_string($con,$_POST['time']);
							$description = mysqli_real_escape_string($con,$_POST['description']);
							if($_FILES['file']['name'] == ""){
								$fdir = $file_in;
							}
							else{
							$file = $_FILES['file']['name'];
							$ext = pathinfo($file, PATHINFO_EXTENSION);
							$newname = "file_".uniqid().'.'.$ext;
							move_uploaded_file($_FILES["file"]["tmp_name"],"file/".$newname);
							$fdir = "file/".$newname;
							}
							$insert = mysqli_query($con,"UPDATE assignment set title = '$title',description = '$description',deadline_date = '$date_end',deadline_time = '$time',file = '$fdir' where ass_id = '$ass_id'");
							if(!$insert){
								die(mysqli_error($con));
							}
							else{
								echo "<p class='alert alert-success'>edited successfully</p>";
								header("location:edit_ass.php?ass_id=$ass_id");
							}
						}
						?>
						<form method="POST" enctype="multipart/form-data">
						<input type="" name="title" placeholder="title" class="form-control" value="<?php echo $title1 ?>" required><br>
						<input type="date" name="date" placeholder="deadline date" class="form-control" value="<?php echo $dead ?>" required><br>
						<input type="time" name="time" placeholder="dead line time" class="form-control" value="<?php echo $time1?>" required><br>
						<input type="file" name="file" placeholder="title" class="form-control"><br>
						<textarea name="description" placeholder="description" class="form-control" required><?php echo $desc1 ?></textarea><br>
						<p class="text-center"><button class="btn btn-primary" name="send">SEND</button></p>
						</form>
					</div>
					
					</div>

				</div>
			</div>
		</div>
	</div>
	<?php include("footer.php") ?>