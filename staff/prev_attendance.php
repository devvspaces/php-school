
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
					$today = date('d-m-y');
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
					$check_query = mysqli_query($con,"SELECT * FROM class_arm where teacher = '$employee'");
					$mon = mysqli_num_rows($check_query);
					if($mon == 0){
						echo "<h4 class='text-center'>You do not currently administer any class</h4>";
					}
					else{
						$data = mysqli_fetch_array($check_query);
						$class = $data['class'];
						$arm = $data['arm'];
						$arm_id = $data['arm_id'];
						echo "<h4 class='text-center'>You Currently Administer $class $arm</h4><br>
						<p class='text-center'><a href='attendance.php' class='btn'>Attendance</a> <a href='prev_attendance.php' class='btn'>Previous Attendance</a></p>";
					}

					?>
					<form method="POST">
					<input type="date" name="for_date" class="form-control" required>
					<p class="text-center"><br><button type="submit" class="btn btn-success">View</button></p>
				</form>
					<?php
					if(isset($_POST['for_date'])){
					$my_date = $_POST['for_date'];
					$our_date = date('d-m-y',strtotime($my_date));
					$show_students = mysqli_query($con,"SELECT * FROM students where arm =  '$arm' and class = '$class'");
					$num = mysqli_num_rows($show_students);
					echo "<p class='text-center'>STUDENTS in $class $arm<br> $num students in total</p>";
					?>
					<h4 class="text-center"> Attendance Sheet for Today <?php echo date('l, d F, Y', strtotime($my_date)) ?></h4>

					<div class="table-responsive table-box">
						<br>
						<table id="prev_data" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Admission no</th>
									<th>First name</th>
									<th>Last name</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
							<?php
							while($show_it = mysqli_fetch_array($show_students)){
								$fname = $show_it['fname'];
								$lname = $show_it['lname'];
								$admin = $show_it['admission_no'];
								?>
								<tr>
									<td><?php echo $admin ?></td>
									<td><?php echo $fname ?></td>
									<td><?php echo $lname ?></td>

									<td>
										<?php
										$check_record = mysqli_query($con,"SELECT * FROM attendance where admission_no = '$admin' and date = '$our_date' ");
										$data2 = mysqli_fetch_array($check_record);
										$status = $data2['status'];
										if($status == '1'){
											$status2 = 'present';
										}
										else{
											$status2 = "absent";
										}
										echo $status2;
									?>
									</td>
								</tr>
								<?php
							}
							?>
						</tbody>
						</table>
					</div>


				</div>
				<?php
			}
			?>
			</div>
		</div>
	</div>
	<?php include("footer.php") ?> 
		<script> 
    $(document).ready(function(){
      $('#prev_data').DataTable(); 
    }); 
  </script>