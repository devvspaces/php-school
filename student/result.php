<?php
// error_reporting(0);
$title = "Your Results";
$nav = "Result";
include("header.php");
?>

<?php
function ageProcessor($bday = '')
{
	$broken_pieces = explode('-', $bday);
	$dob = date_create(date('d-m-Y H:i:s', strtotime($bday)));
	$now = date_create(date('Y-m-d H:i:s'));
	return date_diff($dob, $now)->format('%y');
}
$ageget = ageProcessor($dobs);
if ($dobs == "") {
	$age = "";
} else {
	$age = $ageget;
}
if ($img == '') {
	$img1 = 'passport/default.png';
} else {
	$img1 = $img;
}
$s2 = mysqli_query($con, "SELECT * FROM  calender ");
$sh2 = mysqli_fetch_array($s2);
$sn = $sh2['sn'];
if (isset($_POST['view'])) {
	$return2 = $_POST['session'];
	$return1 = $_POST['semester'];
} else {
	$return2 = $sh2['session'];
	$return1 = $sh2['current_semester'];
}
?>

<!--This style is to transform the Subject into sentence case-->
<style>
	.form-label {
		text-transform: lowercase;
	}

	.form-label:first-letter {
		text-transform: uppercase;
	}

	th {
		color: #555 !important;
	}
</style>
<!--End here-->

<div class="viewbox-content">
	<div class="container-fluid main-container">
		<div class="row main">
			<div class="col-lg-12 panel-container">
				<div class="panel">
					<div class="rest">
						<div class="">
							<h4 class="text-center">View past result</h4>
							<div class="row">
								<form method="post">
									<div class="col-lg-6">

										<br>
										<select class="form-control" name="session" required>
											<option value="">Session</option>
											<?php
											$old_res = mysqli_query($con, "SELECT * FROM  result where matric_no = '$admission'  GROUP BY session ");
											while ($old_res2 = mysqli_fetch_array($old_res)) {
												$ses = $old_res2['session'];
												echo "<option  value='$ses'>$ses</option>";
											}
											?>
										</select>
									</div>
									<br>
									<div class="col-lg-6 col-sm-12">
										<select class="form-control" name="semester" required>
											<option value="">Semester</option>
											<option value="1">First Semester</option>
											<option value="2">Second Semester</option>
										</select>
										<br>
									</div>

									<div class="text-center">
										<button class="btn btn-pink" name="view">
											<span class="icon">
												<i data-feather='eye'></i>
											</span>
											View
										</button>
									</div>
								</form>
							</div>

						</div>
						<div class="panel-body">
							<br>
							<?php
							$query = mysqli_query($con, "SELECT * FROM fees");
							$total_mark_score = 0;
							while ($fetch2 = mysqli_fetch_array($query)) {
								$part = $fetch2['participant'];
								$code = $fetch2['code'];
								$list = explode(',', $part);
								$hay = array('all', $class, $admission, $department);
								if (count(array_intersect($hay, $list)) > 0) {

									$code1 = $code;
								} else {

									$code1 = '';
								}
								$sl2 = mysqli_query($con, "SELECT SUM(amount) AS ttotal FROM fees where code = '$code1' and session = '$return2' and term = '$return1'  ");
								$num0 = mysqli_fetch_array($sl2);
								$tsum += $num0['ttotal'];
							}
							//echo $tsum."<br>";
							$mis3 = mysqli_query($con, "SELECT * FROM paid_fees where student = '$admission'AND session = '$return2' AND term = '$return1' ");
							while ($num1 = mysqli_fetch_array($mis3)) {
								$psum += $num1['amount'];
							}
							//echo $psum."<br>";
							$sql1 = mysqli_query($con, "SELECT * FROM result_access");
							$sql2 = mysqli_fetch_array($sql1);
							$status = $sql2['status'];
							if ($status == 0) {
								echo "<p class='alert alert-danger'>result computation in progess ...</p>";
							} elseif ($psum < $tsum) {
								echo "<p class='alert alert-danger'>You are yet to complete your School fees</p>";
							} else {

								?>
								<div id="contentx">
									<div style="border:1px solid #d7d7d7; border-radius: 4px; padding:1px;">
										<div id="editor"></div>
										<div class="row">
											<div class="col-lg-12"><span><img src="logo.png"
														style="width: 70px; height: 70px; position:absolute; left: 100px; top: 30px;"></span>&nbsp
												&nbsp &nbsp<h3 class="text-center" style="font-weight: bold;">
													<?php echo $name ?>
												</h3>
												<p style="text-align: center; font-weight: bold; font-size:12px;">KM3,
													AKURE-OWO EXPRESS ROAD,SHASHA,<br> OBA-ILE AKURE ONDO STATE <br>&nbsp
													&nbsp<sapan class='glyphicon glyphicon-phone'></sapan> 08035042727 </p>

												<p style="text-align: center; font-weight: bold; font-size:14px;">
													<?php echo $return2 ?> Result
												</p>
											</div>
										</div>

										<br>

										<div class="table-responsive table-box panel-1"
											style="font-size:12px; padding: 2px;">
											<table class="table">
												<tr>
													<th style='font-weight:bold;'>Name:</th>
													<td>
														<?php echo $name1 ?>
													</td>
													<th style='font-weight:bold;'>level:</th>
													<td>
														<?php echo $level ?>
													</td>
													<th style='font-weight:bold;'>Matric no:</th>
													<td>
														<?php echo $admission ?>
													</td>

													<th style='font-weight:bold;'>Session:</th>
													<td> <?php echo $return2 ?></td>
												</tr>
											</table>
										</div>
										<div class=" col-lg-12">
											<br>
											<div class="table-responsive table-box">
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
														<td>
															<?php echo $total_weight ?>
														</td>
														<td>
															<?php echo $gpa ?>
														</td>
														<td></td>
													</tr>

												</table>

											</div>

										</div>
										<p style="font-size: 10px;">&copy<?php echo date("Y") ?> </p>
									</div>

								</div>
							</div>
						<?php
							}
							?>
						<div class="col-lg-12">
							<p class="text-center">
								<button class="btn btn-pink" id="" onclick="generatePDF()">
									<span class="icon">
										<i data-feather='printer'></i>
									</span>
									Print Result
								</button>
							</p>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include("../extras/footer.php") ?>