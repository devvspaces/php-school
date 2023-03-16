
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
										<h4 class="text-center">Extracurricular Scores For <?php echo  $_GET['is']; ?> </h4>

					<form method="POST">
					<table class="table table-bordered">
						<tr>
							<th>Skill </th>
							<th>Score</th>
						</tr>
							<?php 
					$student_id = $_GET['is'];
					$qx = mysqli_query($con,"SELECT * FROM calender ");
					$sh3 = mysqli_fetch_array($qx);
					$session = $sh3['session'];
					$term = $sh3['current_term'];
					$sl_get = mysqli_query($con,"SELECT * FROM extra_activity ");
					while ($sl_show = mysqli_fetch_array($sl_get)){
						$skill = $sl_show['name'];
						$skill_sn = $sl_show['sn'];
						?>
						<tr>
							<th><?php echo $skill ?></th>
							<th><input type="" class="form-control" name="<?php echo $skill_sn ?>" ></th>
						</tr>

						<?php
						if(isset($_POST['submit'])){
						$input = $_POST[$skill_sn];
						$check = mysqli_query($con,"SELECT * From extral_score where student_id = '$student_id' and session = '$session' and term = '$term' and ac_sn = '$skill_sn'  ");
						if(mysqli_num_rows($check) !=0){
							echo "<p style= 'color:#f30;'>Score Already Present</p>";
						}
						else{
						$sql = mysqli_query($con,"INSERT INTO extral_score (
							ac_sn,student_id,activity,score,session,term) VALUES ('$skill_sn','$student_id','$skill','$input','$session','$term') ");
						
						}
					
				
				if(!$sql){
							die(mysqli_error($con));
						}
						else {
							//echo "<p class='text-center alert alert-success'>Score added Successfully</p>";
						}
					}
				}

					?>
						
					</table>
										<p class="text-center"><input type="submit" name="submit" value="submit" class="btn"></p>

				</form>
					</div>
				</div>
			</div>
		</div>
	<?php include("footer.php") ?>
		<script> 
    $(document).ready(function(){
      $('#attendance_data').DataTable(); 
    }); 
  </script>