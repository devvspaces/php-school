<?php include("header.php") ?>
	<div class="content">
			<div class="col-sm-10 mb-5">
				<div class="content">
					<div id="p_heading">
						<?php 
					$users = $_SESSION['users'];
					$s1  = mysqli_query($con,"SELECT * FROM admin where username = '$users'");
					$sh1 = mysqli_fetch_array($s1);
					$name1 = $sh1['fname']." ".$sh1['lname'];
					$img = $sh1['picture'];
					$position = $sh1['position'];
					if($img==""){
						$img2 = "passport/default.png";
					}
					else{
						$img2 = $img;
					}
					?>
					 	<?php include("nav.php") ?>
					</div>

				<div class="panel-body">
					<h4>Edit Arm</h4>
					<a href="edit_arm.php" class="btn btn-primary">Edit Arm</a>
				</div>
				<div class="panel-body">
					<?php 
					if(isset($_POST['create'])){
						$armid2 = $_GET['armid'];
						$arm = mysqli_real_escape_string($con,$_POST['arm']);
						$teacher = mysqli_real_escape_string($con,$_POST['teacher']);
						$date = date("d-m-y");
						$class_id = $_POST['class_id'];
						$check_coordinator = mysqli_query($con,"SELECT * FROM class where coordinator = '$teacher'");
						$check_teacher = mysqli_query($con,"SELECT * FROM class_arm where teacher = '$teacher' ");
						$arm_check = mysqli_query($con,"SELECT * FROM class_arm where arm = '$arm' AND class_id = '$class_id' ");
						if(mysqli_num_rows($check_coordinator) >= 1){
							echo "<p class='alert alert-danger'>Teacher is already a class coordinator</p>";
						}
						elseif (mysqli_num_rows($arm_check) >= 1) {
							echo"<p class='alert alert-danger'>This arm exist for this class</p>";

						}
						elseif(mysqli_num_rows($check_teacher) >= 1){
							echo"<p class='alert alert-danger'>Teacher is already a class teacher</p>";
						}
						else{
							$sql=mysqli_query($con,"UPDATE class_arm set arm = '$arm', teacher='$teacher' WHERE arm_id = '$armid2'");
							if(!$sql){
								die(mysqli_error($con));
							}
							else{

								echo "<div class='alert alert-success '> 
								<a href='#' class='close' data-dismiss='alert'> 
								&times; 
								</a> 
								Arm edited successfully
								</div>";

							}
						}
					}
					?>
					<?php
					$armid = $_GET['armid'];
					$showing = mysqli_query($con,"SELECT * FROM class_arm where arm_id = '$armid'");
					$showing2 = mysqli_fetch_array($showing);
					$arm_s = $showing2['arm'];
					$teacher_s = $showing2['teacher'];
					$class_s = $showing2['class'];
					$class_ids = $showing2['class_id'];
					?>
					<form method="POST">
						<input type="" name="arm" class="form-control" value="<?php echo $arm_s ?>" required><br><br>
						<input type="" name="class" class="form-control"  value="<?php echo $class_s ?>" required readonly><br><br>
						<input type="hidden" value="$class_ids" name="class_id">
						<select class="form-control" name="teacher" required>
							<option value="">SELECT CLASS TEACHER</option>
							<option selected style="display: none;" value="<?php echo $teacher ?>"><?php echo $teacher_s ?></option>
							<?php 
							$query3 = mysqli_query($con,"SELECT * FROM staff");
							while($fetch3 = mysqli_fetch_array($query3)){
								$id = $fetch3['employee'];
								$name2 = $fetch3['lname']." ".$fetch3['fname'];
								echo "<option value='$id' class='change'>$name2</option>";
							}
							?>
						</select><br><br>

						<p class="text-center">	<button class="btn btn-primary" name="create">Create</button></p>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include("footer.php") ?>