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
						<h4>Edit Calendar</h4>
						<?php 
						$current_date = date("d-m-Y");
						if(isset($_POST['create'])){
							$session = $_POST['session'];
							$semester = $_POST['semester'];
							$sstart = $_POST['sstart'];
							$sstop = $_POST['sstop'];
							$tstart = $_POST['tstart'];
							$tstop = $_POST['tstop'];
							$query = mysqli_query($con,"UPDATE calender set session = '$session', current_semester = '$semester', s_start = '$sstart', s_stop = '$sstop', t_start = '$tstart', t_stop = '$tstop' ");
							if(!$query){
								die(mysqli_errno($con));
							}
							else{
								?>
							</div>
							<div class="panel-body">
								<div class="alert alert-success "> 
									<a href="#" class="close" data-dismiss="alert"> 
										&times; 
									</a> 
									calender has been edited successfully
								</div>
								<?php
							}
						}
				$s2  = mysqli_query($con,"SELECT * FROM  calender ");
				$sh2 = mysqli_fetch_array($s2);
				$session1 = $sh2['session'];
				$semester1 = $sh2['current_semester'];
				$sstart1 = $sh2['s_start'];
				$sstop1 = $sh2['s_stop'];
				$tstart1 = $sh2['t_start'];
				$tstop1 = $sh2['t_stop'];
				
				
						?>
						<form method="POST">
							<label>Session</label>
							<input type="" name="session" class="form-control" placeholder="session" value="<?php echo $session1 ?>" required><br>
							<label>Semester</label>
							<input type="" name="semester" class="form-control" placeholder="semester" value="<?php echo $semester1 ?>" required>
							<br>
							<label>Semester Start</label>
							<input type="" name="tstart" placeholder="Term starts (dd-mm-yyyy)" value="<?php echo $tstart1 ?>" class="form-control" required>
							<br>
							<label>Semester ends</label>
							<input type="" name="tstop" placeholder="Term stops (dd-mm-yyyy)" value="<?php echo $tstop1 ?>"  class="form-control" required><br>
							<label>Session Start</label>
							<input type="" name="sstart" placeholder="session starts (dd-mm-yyyy)" value="<?php echo $sstart1 ?>"  class="form-control"  required>
							<br>
							<label>Session ends</label>
							<input type="" name="sstop" placeholder="session stops (dd-mm-yyyy)" value="<?php echo $sstop1 ?>"   class="form-control" required ><br>
							<p class="text-center"><button class="btn btn-primary" name="create">Edit</button></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include("footer.php") ?>
	<script type="text/javascript" src='jquery.js'></script>
	<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>