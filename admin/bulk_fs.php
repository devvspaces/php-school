<?php
$title = "Bulk Finincial Statement";
include("header.php");
?>

<div class="viewbox-content">
	<div class="content">
		<div class="col-sm-10 mb-5">
			<div class="content">
				<div class="panel-body">
					<h4>View Existing Pin</h4>
					<a href="cfee.php" class="btn btn-pink"><span class="glyphicon glyphicon-plus"></span> Create New
						fee</a> <a href="verify.php" class="btn btn-pink">Asign Payment</a> <a href="view_pin.php"
						class="btn btn-pink">Financial Statement</a> <a href="cleared_students.php"
						class="btn btn-pink">Cleared students</a>
					<a href="v_p_f.php" class="btn btn-pink">Paid Fees</a>
				</div>
				<div class="panel-body">
					<h4>View Financial Statement Of Students</h4>

					<form method="post">
						<div class="col-lg-4 col-sm-12 form-group">
							<select class="form-control" name="class">
								<option value="">Select Class</option>
								<?php
								$cls = mysqli_query($con, "SELECT * FROM class");
								while ($cls2 = mysqli_fetch_array($cls)) {
									$cls3 = $cls2['class'];
									echo "<option value='$cls3'>$cls3<?</option>";
								}
								?>
							</select>
						</div>
						<div class="col-lg-4 col-sm-12 form-group">
							<input type="" name="session" class="form-control" placeholder="session" required>
						</div>
						<div class="col-lg-4 col-sm-12 form-group">
							<input type="" name="term" class="form-control" placeholder="term" required>
						</div>
						<div class="col-lg-12">
							<p class="text-center"><button type="submit" class="btn" name="view">View</button></p>
						</div>
					</form>

				</div>
				<div class="panel-body">
					<div id="contentx" style="padding: 5px;">
						<?php
						if (isset($_POST['view'])) {
							$gclass = mysqli_real_escape_string($con, $_POST['class']);
							$session = mysqli_real_escape_string($con, $_POST['session']);
							$term = mysqli_real_escape_string($con, $_POST['term']);
							$get_class = mysqli_query($con, "SELECT * FROM students where class = '$gclass'");
							while ($see_class = mysqli_fetch_array($get_class)) {
								$student = $see_class['admission_no'];
								$s1 = mysqli_query($con, "SELECT * FROM students where admission_no = '$student'");
								$sh1 = mysqli_fetch_array($s1);
								$name2 = $sh1['lname'] . " " . $sh1['fname'] . " " . $sh1['mname'];
								$class = $sh1['class'];
								$department = $sh1['department'];
								$admission = $sh1['admission_no'];
								?>



								<div class="thumbnail html2pdf__page-break">
									<h4 class="text-center"><img src="logo.png" style="width:70px; height:70px;"> HAPA COLLEGE
									</h4>
									<h4 class="text-center">Financial Statement For <?php echo $name2 ?> For <?php echo $session . " Session Term " . $term ?></h4>
									<div class="row">
										<div class="col-lg-6 col-sm-12">
											<div class="table-responsive table-box">
												<table class="table table-bordered table-striped">
													<tr>
														<th colspan="2">Fees Breakdown</th>
													</tr>
													<tr>
														<th>Fees</th>
														<th>Amount</th>
													</tr>
													<?php
													$query = mysqli_query($con, "SELECT * FROM fees");
													while ($fetch2 = mysqli_fetch_array($query)) {
														$part = $fetch2['participant'];
														$code = $fetch2['code'];
														$list = explode(',', $part);
														$hay = array('all', $class, $admission, $department);
														if (count(array_intersect($hay, $list)) > 0) {
															//echo "yes";
															$code1 = $code;
														} else {
															//echo "no";
															$code1 = '';
														}
														$sl2 = mysqli_query($con, "SELECT * FROM fees where code = '$code1' AND session = '$session' And term = '$term'");
														while ($sh2 = mysqli_fetch_array($sl2)) {
															$sn1 = $sh2['sn'];
															$title = $sh2['title'];
															$amount = $sh2['amount'];
															$sum_total = mysqli_query($con, "SELECT SUM(amount)as total FROM fees where participant = '$class' || participant = '$department' || participant = '$admission' || participant = 'all' || participant like '%$class%' AND session = '$session' And term = '$term' ");
															$check_total = mysqli_fetch_array($sum_total);
															$total = $check_total['total'];

															$mis3 = mysqli_query($con, "SELECT * FROM paid_fees where  student = '$admission' and session = '$session' and term = '$term' ");
															$num1 = mysqli_num_rows($mis3);
															?>
															<tr>
																<td><?php echo $title ?></td>
																<td>
																	<?php echo number_format($amount) ?>
																</td>
															</tr>
															<?php
														}
													}
													?>
													<tr>
														<th>Total</th>
														<th>
															<?php echo number_format($total) ?>
														</th>
													</tr>
													<?php
													$check = mysqli_query($con, "SELECT SUM(amount) AS ttotal  FROM paid_fees where student = '$admission' and session = '$session' and term = '$term'");
													$res = mysqli_fetch_array($check);
													$sum = $res['ttotal'];
													?>


												</table>
											</div>
										</div>
										<div class="col-lg-6 col-sm-12">
											<div class="table-responsive table-box">
												<table class="table table-bordered table-striped">
													<tr>
														<th colspan="4">Payment History</th>
													</tr>
													<tr style="padding: 2px;">
														<th>Title</th>
														<th>Amount</th>
														<th colspan="2">Date</th>

													</tr>
													<?php

													while ($mis4 = mysqli_fetch_array($mis3)) {
														$title1 = $mis4['title'];
														$amount1 = $mis4['amount'];
														$refrence_id1 = $mis4['reference_id'];
														$date1 = $mis4['dates'];
														?>
														<tr>
															<td><?php echo $title1 ?></td>
															<td>
																<?php echo number_format($amount1) ?>
															</td>
															<td><?php echo $date1 ?></td>
														</tr>
														<?php
													}
													?>
													<tr>
														<td colspan="3">Total</td>
														<td>
															<?php echo number_format($sum) ?>
														</td>
													</tr>
													<tr>
														<td colspan="3">Balance </td>
														<td>
															<?php echo number_format($total - $sum) ?>
														</td>
													</tr>
												</table>
											</div>
										</div>


										<div class="col-lg-12">
											<p class="text-center">&copy <?php echo date("Y") ?> Hapa College</p>
										</div>
									</div>
								</div>
								<?php
							}
							?>
						</div>
						<div class="col-lg-12">
							<p class="text-center"><button class="btn" onclick="generatePDF()"><span
										class="glyphicon glyphicon-print"></span> Print</button></p>
						</div>
					</div>
				</div>


				<?php
						}
						?>

		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		$('#pin_data').DataTable();
	}); 
</script>

<?php include("../extras/footer.php") ?>