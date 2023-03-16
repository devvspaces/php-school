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
					<h4 class="text-center">View students performance</h4>
						<form method="POST" action="students_performance.php">
									<div class="row">
								<div class="col-lg-8 col-lg-offset-2">
								<input type="" name="admission_no" class="form-control" placeholder="Admission number" required><br>
								<div class="text-center"><button class="btn btn-pink" name="view">View</button>
								</div>
								</div>
							
							</div>
						</form>

					
				</div>
				<div class="panel-body">
						<?php
					if(isset($_POST["view"])){
						$admission_no = mysqli_real_escape_string($con,$_POST['admission_no']);
						$check = mysqli_query($con,"SELECT * FROM students where matric_no = '$admission_no'");
						$num = mysqli_num_rows($check);
						if($num ==0){
							echo "<p class='alert alert-danger'>admission number does not exist</p>";
						}
						else{
							$data = mysqli_fetch_array($check);
							$name = $data['lname']." ".$data['fname'];
							$level = $data['level'];
							$admission = $data['matric_no'];
						?>
						<div style="background-color: #FFF; padding: 5px; color: #666;">
						<div class="table-responsive table-box">
						<table class="table" id="data">
							<tr>
								<th>Name:</th>
								<th><?php echo $name ?></th>
							
								<th>Admission no:</th>
								<th><?php echo $admission ?></th>
							
								<th>level:</th>
								<th><?php echo $level ?></th>
							</tr>
						</table>
						<h4 class="text-center">Current Result</h4>
						<table class="table table-bordered table-striped" id="data">
						<tr>
										<th>Course</th>
										<th>Course Title</th>
										<th>Credit Unit</th>
										<th>Mark</th>
										<th>Grade Score</th>
										<th>Weight</th>
										<th>GPA</th>
										<th>CGPA</th>
									</tr>
									<?php
						$m1 = mysqli_query($con,"SELECT * FROM result where matric_no = '$admission' and session = '$return2' and semester = '$return1'  ");
						while($ms1 = mysqli_fetch_array($m1)){
						$score = $ms1['score'];
						$course = $ms1['course'];
						$ccode = $ms1['code']; 
						$check_unit = mysqli_query($con,"SELECT * FROM course where code = '$ccode'");
						$show_unit = mysqli_fetch_array($check_unit);
						$show_unit2 = $show_unit['unit'];
						$grade = "";
						$weight = "";
						$total_unit += $show_unit2;
						if($score >70){
							$grade = "A";
							$weight = $show_unit2*5;
						}
						elseif ($score >=60) {
							$grade = "B";
							$weight = $show_unit2*4;
						}
						elseif ($score >=50) {
							$grade = "C";
							$weight = $show_unit2*3;
						}
						elseif($score >=45)
						{
							$grade = "D";
							$weight = $show_unit2*2;
						}
						elseif($score >=40)
						{
							$grade = "E";
							$weight = $show_unit2*1;
						}
						else{
							$grade = "F";
							$weight = $show_unit2*0;
						}
						$total_weight += $weight;

						$gpa = $total_weight/$total_unit;
						?>
						<tr>
							<td><?php echo $ccode ?></td>
							<td><?php echo $course ?></td>
							<td><?php echo $show_unit2 ?></td>
							<td><?php echo $score ?></td>
							<td><?php echo $grade ?></td>
							<td><?php echo $weight ?></td>
							<td></td>
							<td></td>
						</tr>
						<?php
						}
						?>
						<tr>
							<td>TOTAL</td>
							<td></td>
							<td><?php echo $total_unit ?></td>
							<td></td>
							<td></td>
							<td><?php echo $total_weight ?></td>
							<td><?php echo $gpa  ?></td>
							<td></td>
						</tr>
				
					</table>
				</div>
				</div>
					<?php
					}
				}
					?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include("footer.php") ?>