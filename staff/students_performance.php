<?php
$title = "Student Performance";
include("header.php");
?>

<div class="viewbox-content">
	<div class="container-fluid main-container">
		<div class="row main">
			<div class="col-lg-12 panel-container">
				<div class="panel">
					<div class="panel-heading panele" id="p_heading">
						<?php
							$s2 = mysqli_query($con, "SELECT * FROM  calender ");
							$sh2 = mysqli_fetch_array($s2);
							$sn = $sh2['sn'];
							$return2 = $sh2['session'];
							$return1 = $sh2['current_semester'];
						?>
						<div class="ig-area pb-3">
							<img src="<?php echo $img2 ?>" id="imgs" class="img-fluid dp" width="100px">
							<h4>
								<?php echo $name1 ?>
							</h4>
							<i><?php echo $department ?></i>
						</div>
					</div>
					<div class="rest">
						<div class="">
							<form method="POST" action="students_performance.php">
								<div class="row">
									<div class="col-lg-8 col-lg-offset-2">
										<input type="" name="admission_no" class="form-control"
											placeholder="Matric Number" required><br>
										<div class="">
											<button class="btn btn-primary" name="view">View</button>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="panel-body mt-5">
							<?php
							if (isset($_POST["view"])) {
								$admission_no = mysqli_real_escape_string($con, $_POST['admission_no']);
								$check = mysqli_query($con, "SELECT * FROM students where matric_no = '$admission_no'");
								$num = mysqli_num_rows($check);
								if ($num == 0) {
									echo "<p class='alert alert-danger'>admission number does not exist</p>";
								} else {
									$data = mysqli_fetch_array($check);
									$name = $data['lname'] . " " . $data['fname'];
									$level = $data['level'];
									$admission = $data['matric_no'];
									?>
									<div style="background-color: #FFF; padding: 5px; color: #666;">
										<div class="table-responsive table-box">
											<table class="table">
												<tr>
													<th>Name:</th>
													<th><?php echo $name ?></th>

													<th>Admission no:</th>
													<th>
														<?php echo $admission ?>
													</th>

													<th>level:</th>
													<th><?php echo $level ?></th>
												</tr>
											</table>
											<h4 class="text-center">Current Result</h4>
											<table class="table table-bordered table-striped">
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
												$total_unit = $total_weight = 0;
												$m1 = mysqli_query($con, "SELECT * FROM result where matric_no = '$admission' and session = '$return2' and semester = '$return1'  ");
												while ($ms1 = mysqli_fetch_array($m1)) {
													$score = $ms1['score'];
													$course = $ms1['course'];
													$ccode = $ms1['code'];
													$check_unit = mysqli_query($con, "SELECT * FROM course where code = '$ccode'");
													$show_unit = mysqli_fetch_array($check_unit);
													$show_unit2 = $show_unit['unit'];
													$grade = "";
													$weight = "";
													$total_unit += $show_unit2;
													if ($score > 70) {
														$grade = "A";
														$weight = $show_unit2 * 5;
													} elseif ($score >= 60) {
														$grade = "B";
														$weight = $show_unit2 * 4;
													} elseif ($score >= 50) {
														$grade = "C";
														$weight = $show_unit2 * 3;
													} elseif ($score >= 45) {
														$grade = "D";
														$weight = $show_unit2 * 2;
													} elseif ($score >= 40) {
														$grade = "E";
														$weight = $show_unit2 * 1;
													} else {
														$grade = "F";
														$weight = $show_unit2 * 0;
													}
													$total_weight += $weight;

													$gpa = $total_weight / $total_unit;
													?>
													<tr>
														<td><?php echo $ccode ?></td>
														<td>
															<?php echo $course ?>
														</td>
														<td><?php echo $show_unit2 ?></td>
														<td>
															<?php echo $score ?>
														</td>
														<td><?php echo $grade ?></td>
														<td>
															<?php echo $weight ?>
														</td>
														<td></td>
														<td></td>
													</tr>
												<?php
												}
												?>
												<tr>
													<td>TOTAL</td>
													<td></td>
													<td>
														<?php echo $total_unit ?>
													</td>
													<td></td>
													<td></td>
													<td><?php echo $total_weight ?></td>
													<td>
														<?php echo $gpa ?>
													</td>
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

	</div>
</div>

<?php include("../extras/footer.php") ?>