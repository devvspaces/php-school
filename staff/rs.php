
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

							
							<?php 
					$student_id = $_GET['is'];
					$qx = mysqli_query($con,"SELECT * FROM calender ");
					$sh3 = mysqli_fetch_array($qx);
					$session = $sh3['session'];
					$term = $sh3['current_term'];
					$sl_get = mysqli_query($con,"SELECT * FROM extral_score where student_id = '$student_id' and term  = '$term' and session = '$session' ");
					if(mysqli_num_rows($sl_get) ==0 ){
						echo "<p class='text-center'><a href='rp.php?is=$student_id' class='btn btn-sm'>Set performance Score</a></p>";
					}

					else{
						?>

							<table class="table table-bordered table-striped">
								<tr>
									<th>Activity</th>
									<th>Score</th>
								</tr>
								<?php
					while ($sl_show = mysqli_fetch_array($sl_get)){
						$skill = $sl_show['activity'];
						$skill_sn = $sl_show['score'];
						?>
							<tr>
									<th><?php echo $skill ?></th>
									<th><?php echo $skill_sn ?></th>
								</tr>

						<?php
					}
				}
						?>
						</table>
						<p class='text-center'><a href='rs_edit.php?is=<?php echo $student_id ?>' class='btn btn-sm'>Edit</a></p>
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