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
					<h4>Edit Course</h4>
				</div>
				<div class="panel-body">
				<?php 
				
				$is = $_GET['is'];
				  $s2  = mysqli_query($con,"SELECT * FROM course where sn = '$is' ");
			        	$sh2 = mysqli_fetch_array($s2);
			          $sn = $sh2['sn'];
			          $title = $sh2['title'];
			          $code = $sh2['code'];
			          $college = $sh2['college'];
			          $department  = $sh2['department'];
			          $dept_code = $sh2['dept_code'];
			          $level = $sh2['level'];
			          $teacher = $sh2['teacher'];
			          $unit = $sh2['unit'];
			          $type = $sh2['type'];
				if(isset($_POST['create'])){
				$code = mysqli_real_escape_string($con,$_POST['code']);
				$title = mysqli_real_escape_string($con,$_POST['title']);
				$unit = mysqli_real_escape_string($con,$_POST['unit']);
				$level = mysqli_real_escape_string($con,$_POST['level']);
				$teacher = $_POST['teacher'];
				$type = mysqli_real_escape_string($con,$_POST['type']);
				$date = date("d-m-y");
				$sql=mysqli_query($con,"UPDATE course SET title = '$title',code='$code',unit='$unit',level='$level',type='$type',teacher='$teacher'where sn = '$sn'");
				if(!$sql){
					die(mysqli_error($con));
				}
				else{
					?>
						<div class="alert alert-success "> 
            <a href="#" class="close" data-dismiss="alert"> 
            &times; 
            </a> 
        Course  has been Updated successfully
        </div>
					<?php
				}
		}
				?>
				<form method="POST">
					<input type="" name="title" class="form-control" placeholder="title" value="<?php echo $title ?>" required><br>
					<input type="" name="code" class="form-control" placeholder="code" value="<?php echo $code ?>" required><br>
					<input type="" name="unit" class="form-control" placeholder="Unit" value="<?php echo $unit ?>" required><br>
					<select class="form-control" name="level" required>
						<option value="<?php echo $level ?>" style="display: none;"><?php echo $level ?></option>
						<option value="">Select Level</option>
						<option value="100">100</option>
						<option value="200">200</option>
					    <option value="300">300</option>
						<option value="400">400</option>
						<option value="500">500</option>
					</select> <br>

					<select class="form-control" name="type" required>
						<option value="<?php echo $type ?>" style="display: none;"><?php echo $type ?></option>
						<option value="">Select Type</option>
						<option value="uw">University Wide</option>
						<option value="cw">College Wide</option>
						<option value="dw">Department Wide</option>
					</select> <br>

						<select name="teacher" class="form-control" required>
							<option value="<?php echo $teacher ?>" style="display: none;" ><?php echo $teacher ?></option>
					<option value="">Select Lecturer</option>
						<?php 
						$sl3 = mysqli_query($con,"SELECT * FROM staff");
						while($sh13=mysqli_fetch_array($sl3)){
							$staff_code = $sh13['employee'];
							$staff_name = $sh13['fname']." ".$sh13['lname'];
							?>
							<option value="<?php echo $staff_code ?>"><?php echo $staff_name ?></option>
							<?php
						}
							?>
					</select>
					<br>

					<button class="btn btn-primary" name="create">Edit</button>
				</form>
				</div>
				</div>
			</div>
			</div>
		</div>
	<?php include("footer.php") ?>
<script type="text/javascript">
              $(document).ready(function(){
              $('#dept').change(function(){
              var dept = $(this).val();
              $.ajax({
              url:"department.php",
              method:"POST",
              data:{dept:dept},
              success:function(data){
              $("#opt").html(data); 
  }
});
            });
          });
        </script>