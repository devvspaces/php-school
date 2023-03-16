<?php include("conn/conn.php") ?>
<?php 
$msql3 = mysqli_query($con,"SELECT * FROM calender");
$fetch3 = mysqli_fetch_array($msql3);
$session = $fetch3['session'];
$semester = $fetch3['current_semester'];
?>
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
						<h4 class="text-center">Set up a new semester</h4>
						<?php 
				$s2  = mysqli_query($con,"SELECT * FROM  calender ");
				$sh2 = mysqli_fetch_array($s2);
				$sn = $sh2['sn'] ;
				$session= $sh2['session'];
				$semester= $sh2['current_semester'];
				$sstart = $sh2['s_start'];
				$sstop = $sh2['s_stop'];
				$tstart = $sh2['t_start'];
				$tstop = $sh2['t_stop'];
				if($semester == '1'){
					$new_semester = '2';
					$new_session = $session;
					$new_sstart = $sstart;
					$new_sstop = $sstop;
				}
				elseif($semester=='2'){
					$new_semester = '1';
					$fyear = substr($session, 0,4)+1;
					$syear = substr($session, -4)+1;
					$new_session = $fyear.'/'.$syear;
					$new_sstart = '';
					$new_sstop = '';
				}
				$current_date = date("d-m-Y");
						if(isset($_POST['create'])){
					// delete oudated information in the db
					$sql3 = mysqli_query($con,"TRUNCATE anoucement");
					$sql4 = mysqli_query($con,"TRUNCATE event");
					$sql6 = mysqli_query($con,"TRUNCATE status");
					$sql6 = mysqli_query($con,"TRUNCATE notification");
					$sql5 = mysqli_query($con,"UPDATE result_query SET status = '1'");
					//start the setup process

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
									term has been added successfully
								</div>
								<?php
							}
						}
						?>
						<form method="POST">
							<input type="" name="session" class="form-control" placeholder="session" value="<?php echo $new_session ?>" required><br>
							<input type="" name="semester" class="form-control" placeholder="semester" value="<?php echo $new_semester?>" required>
							<br>
							<input type="" name="tstart" placeholder="Semester starts" class="form-control" required>
							<br>
							<input type="" name="tstop" placeholder="Semester Ends" class="form-control" required><br>
							<input type="" name="sstart" placeholder="session starts" class="form-control" value="<?php echo $new_sstart ?>" required>
							<br>
							<input type="" name="sstop" placeholder="session stops" class="form-control" required value="<?php echo $new_sstop ?>"><br>
							<p class="text-center"><button class="btn btn-primary" name="create">Create</button></p>
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