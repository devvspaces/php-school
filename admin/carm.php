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
					<h4>Create new Arm</h4>
					<a href="carm.php" class="btn btn-primary">Create new Arm</a>
				</div>
				<div class="panel-body">
				<?php 
				$class_id= $_GET['class_id'];
				$class = $_GET['class'];
				if(isset($_POST['create'])){
				$arm = mysqli_real_escape_string($con,$_POST['arm']);
				$class = mysqli_real_escape_string($con,$_POST['class']);
				$class_id = mysqli_real_escape_string($con,$_POST['class_id']);
				$teacher = mysqli_real_escape_string($con,$_POST['teacher']);
				$date = date("d-m-y");
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
				$sql=mysqli_query($con,"INSERT INTO class_arm(arm,class_id,class,teacher)VALUES('$arm','$class_id','$class','$teacher')");
				if(!$sql){
					die(mysqli_error($con));
				}
				else{
				
						echo "<div class='alert alert-success '> 
            <a href='#' class='close' data-dismiss='alert'> 
            &times; 
            </a> 
       Arm has been added successfully
        </div>";
					
				}
		}
	}
				?>
				<form method="POST">
					<input type="" name="arm" class="form-control" placeholder="Arm" required><br><br>
					<input type="" name="class" class="form-control" placeholder="class" value="<?php echo $class ?>" required readonly><br><br>
					<select class="form-control" name="teacher" required>
						<option value="">SELECT CLASS TEACHER</option>
					<?php 
                    $query3 = mysqli_query($con,"SELECT * FROM staff");
                    while($fetch3 = mysqli_fetch_array($query3)){
                    $id = $fetch3['employee'];
                    $name2 = $fetch3['lname']." ".$fetch3['fname'];
                    echo "<option value='$id' class='change'>$name2</option>";
                  }
                  ?>
					</select><br><br>
					<input type="hidden" name="class_id" value="<?php echo $class_id ?>">

				<p class="text-center">	<button class="btn btn-primary" name="create">Create</button></p>
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