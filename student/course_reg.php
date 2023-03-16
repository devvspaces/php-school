<?php
// error_reporting(0);
$title = "Course Registration";
include("header.php");

$course_reg_checker = $auth->countall7('course_registration', 'matric_no', $matric_no, 'session', $current_session, 'semester', $current_semester);
?>

<div class="viewbox-content">
	<div class="container-fluid main-container">
		<div class="row main">
			<div class="col-lg-12 panel-container">
				<div class="panel">
					<div class="panel-heading panele" id="p_heading">
						<?php
						// Course reg
						if (isset($_POST['course_reg'])) {
							if ($course_reg_checker > 0) {
								$_SESSION['error_msg'] = "You have already registered courses for this semester";
								header("location: course_reg.php");
							}
							$courses_arr = array();
							$load = 0;
							if (!empty($_POST['courses'])) {
								foreach ($_POST['courses'] as $course) {
									array_push($courses_arr, $course);
									$unit = $auth->select14('unit', 'course', 'code', $course);
									$load += $unit;
								}
							}
							$min_load = $auth->select14('min', 'max_loads', 'level', $my_level, 'semester', $current_semester);
							$max_load = $auth->select14('max', 'max_loads', 'level', $my_level, 'semester', $current_semester);
							if ($load > $max_load) {
								$err_msg = "Maximum load you can register this semester is $max_load units";
								$_SESSION['error_msg'] = $err_msg;
								header("location: course_reg.php");
							} elseif ($load < $min_load) {
								$err_msg = "Minimum load you can register this semester is $min_load units";
								$_SESSION['error_msg'] = $err_msg;
								header("location: course_reg.php");
							} else {
								$courses = json_encode($courses_arr);
								if (!empty($_POST['courses'])) {
									$created_at = date('Y-m-d H:i:s');
									foreach ($_POST['courses'] as $course) {
										$unit = $auth->select14('unit', 'course', 'code', $course);
										$sqlstr = "INSERT INTO course_registration (course_code,matric_no,session,semester,unit,created_at) VALUES ('$course','$matric_no','$current_session','$current_semester','$unit','$created_at')";
										$stmt = $conn->prepare($sqlstr);
										if ($stmt->execute()) {
											$_SESSION['success_msg'] = "Course form submitted successfully";
											header("location: course_reg.php");
										}
									}
								}
							}
						}
						?>
					</div>
					<div class="rest">
						<div class="mb-4">
							<h4 style="font-weight: 600;">Session <?php echo $return2 ?></h4>
						</div>
						<div class="">
							<div id="contentx">
								<h4 class="text-center">
								</h4>
								<?php
								if (isset($_SESSION['error_msg'])) {
									$msg = $_SESSION['error_msg'];
									?>
									<div class='alert alert-danger '>
										<a href='#' class=' close' data-dismiss='alert'>
											&times;
										</a>
										<div>
											<b>
												<?= $msg ?>
											</b>
										</div>
									</div>
								<?php } ?>

								<?php
								if (isset($_SESSION['success_msg'])) {
									$msg = $_SESSION['success_msg'];
									?>
									<div class='alert alert-success'>
										<a href='#' class=' close' data-dismiss='alert'>
											&times;
										</a>
										<div>
											<b>
												<?= $msg ?>
											</b>
										</div>
									</div>
								<?php } ?>


								<?php
								unset($_SESSION['error_msg']);
								unset($_SESSION['success_msg']);
								?>

								<div class="col-lg-6 col-sm-12">
									<div class="table-responsive table-box">
										<table class="fee_tables table table-bordered table-striped">
											<tr>
												<th colspan="2">Outstanding courses</th>
											</tr>
											<tr>
												<th>SN</th>
												<th>Course summary</th>
											</tr>
											<?php
											$course_reg_checker = $auth->countall7('course_registration', 'matric_no', $matric_no, 'session', $current_session, 'semester', $current_semester);
											$total = $serial = 0;
											$sqlstr = "SELECT * FROM result where matric_no = '$matric_no' and semester = '$current_semester' and score < 45 GROUP BY code HAVING COUNT(*) > 0 ORDER BY sn DESC";
											$stmt = $conn->prepare($sqlstr);
											$stmt->execute();
											$result = $stmt->get_result();
											while ($row = $result->fetch_assoc()):
												extract($row);
												$serial++;
												?>
												<tr>
													<td><?= $serial ?></td>
													<td>
														<?= $code . "[" . $unit . "u," . $score . "F]" ?>
													</td>
												</tr>
											<?php endwhile; ?>
										</table>
									</div>
								</div>
								<div class="col-lg-6 col-sm-12">
									<div class="table-responsive table-box mt-4">
										<form method="POST">
											<table class="fee_tables table table-bordered table-striped">
												<tr>
													<th colspan="4">Proposed Courses</th>
												</tr>
												<tr style="padding: 2px;">
													<th>SN</th>
													<th>Course code</th>
													<th>Unit</th>
												</tr>
												<?php
												$total = $serial = 0;
												$sqlstr1 = "SELECT * FROM result where matric_no = '$matric_no' and semester = '$current_semester' and score < 45";
												$stmt1 = $conn->prepare($sqlstr1);
												$stmt1->execute();
												$result1 = $stmt1->get_result();
												while ($row1 = $result1->fetch_assoc()):
													extract($row1);
													$serial++;
													$total += $unit;
													?>
													<tr>
														<td><?= $serial ?></td>
														<td>
															<?= $code ?>
														</td>
														<td><?= $unit ?>u</td>
													</tr>
													<input style="display:none" type='checkbox' checked name='courses[]'
														value='<?= $code ?>'>
												<?php endwhile; ?>


												<?php
												$sqlstr = "SELECT * FROM course where dept_code = '$department' AND level = '$my_level' AND semester = '$current_semester'";
												$stmt = $conn->prepare($sqlstr);
												$stmt->execute();
												$result = $stmt->get_result();
												while ($row = $result->fetch_assoc()):
													extract($row);
													$serial++;
													$total += $unit;
													?>
													<tr>
														<td>
															<?= $serial ?>
														</td>
														<td><?= $code ?></td>
														<td>
															<?= $unit ?>u
														</td>
													</tr>
													<input style="display:none" type='checkbox' checked name='courses[]'
														value='<?= $code ?>'>
												<?php endwhile; ?>
												<tr>
													<td></td>
													<td>Total Units</td>
													<td>
														<?= $total ?> Units
													</td>
												</tr>
											</table>
											<?php
											if ($course_reg_checker < 1) {
												?>
												<div class="col-lg-12">
													<p class="text-center">
														<button class="btn btn-pink" name="course_reg"></span> Submit</button>
													</p>
												</div>
											<?php } else { ?>
												<div class="col-lg-12">
													<p class="text-center">
														<button class="btn btn-pink" type="button" disabled></span>
															Registered</button>
													</p>
												</div>
											<?php } ?>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function () {
		$('.fee_tables').DataTable({
			"processing": true,
		});
	});
</script>
<?php include("../extras/footer.php") ?>