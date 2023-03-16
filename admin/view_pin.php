<?php
$title = "Financial Statements";
include("header.php");
?>

<div class="viewbox-content">
	<div class="content">
		<div class="col-sm-10 mb-5">
			<div class="content">
				<div class="report">
					<div class="panel-body shift">
						<a href="cfee.php" class="btn btn-pink">
							<span class="icon">
								<i data-feather="plus"></i>
							</span>
							Create new fee
						</a>
						<a href="cleared_students.php" class="btn btn-pink">
							<span class="icon">
								<i data-feather="users"></i>
							</span>
							Cleared students
						</a>
						<a href="v_p_f.php" class="btn btn-pink">
							<span class="icon">
								<i data-feather="credit-card"></i>
							</span>
							Paid Fees
						</a>
					</div>
					<div class="panel-body my-5">
						<h4 class="text-center mb-3">View Financial Statement Of Students <span><a href="bulk_fs.php"
									class="btn btn-outline-primary">Bulk Print</a></span></h4>
						<form method="post">
							<div class="col-lg-6 col-sm-12 form-group">
								<input type="" name="student" class="form-control" placeholder="Student Matric No"
									required>
							</div>
							<div class="col-lg-6 col-sm-12 form-group">
								<select name="session" class="form-control" required>
									<option value="">Select Session</option>
									<?php
									$sqlstr = "SELECT * FROM session ORDER BY session DESC";
									$stmt = $con->prepare($sqlstr);
									$stmt->execute();
									$result = $stmt->get_result();
									while ($row = $result->fetch_assoc()):
										$session_id = $row['sn'];
										$session_name = $row['session'];
										?>
										<option value="<?= $session_id ?>">
											<?= $session_name ?>
										</option>
									<?php endwhile; ?>
								</select>
							</div>
							<div class="col-lg-12">
								<p class="text-center">
									<button type="submit" class="btn btn-pink mt-3" name="view">View</button>
								</p>
							</div>
						</form>

					</div>



					<?php
					if (isset($_POST['view'])) {
						$student = mysqli_real_escape_string($con, $_POST['student']);
						$session_id = mysqli_real_escape_string($con, $_POST['session']);
						$session = $auth->select14('session', 'session', 'sn', $session_id);
						$s1 = mysqli_query($con, "SELECT * FROM students where matric_no = '$student'");
						if ($check_student = mysqli_num_rows($s1) == 0) {
							echo "<div class='panel-body'>
						<h4 class='text-center'>Matric Number Does Not Exist </h4> </div>";
						} else {
							$sh1 = mysqli_fetch_array($s1);
							$name2 = $sh1['lname'] . " " . $sh1['fname'] . " " . $sh1['mname'];
							$level = $sh1['level'];
							$college = $sh1['college'];
							$department = $sh1['department'];
							$admission = $sh1['matric_no'];
							?>
							<div class="panel-body">
								<div id="contentx">
									<h4 class="text-center"><img src="logo.png" style="width:70px; height:70px;"> <?php echo $name2 ?></h4>
									<h4 class="text-center">Financial Statement For <?php echo $name2 ?> For <?php echo $session . " Session " ?></h4>

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
												$total = 0;
												$sl2 = mysqli_query($con, "SELECT * FROM fees where level = '$level' AND department = '$department' and college = '$college' and  session = '$session'");
												while ($sh2 = mysqli_fetch_array($sl2)) {
													$sn1 = $sh2['sn'];
													$title = $sh2['title'];
													$amount = $sh2['amount'];
													$total += $amount;

													?>
													<tr>
														<td><?php echo $title ?></td>
														<td>
															<?php echo number_format($amount) ?>
														</td>
													</tr>
													<tr>
														<th>Total</th>
														<th>
															<?php echo number_format($total) ?>
														</th>
													</tr>
												<?php
												}
												?>
												<?php
												$mis3 = mysqli_query($con, "SELECT * FROM paid_fees where  student = '$admission' and session = '$session'  ");
												$num1 = mysqli_num_rows($mis3);
												$check = mysqli_query($con, "SELECT SUM(amount) AS ttotal  FROM paid_fees where student = '$admission' and session = '$session' ");
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
													<th>Date</th>
													<th>Act</th>
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
														<td><a href='receipt.php?transactionid=<?php echo $refrence_id1 ?> '
																class='btn btn-pink'>Print receipt</a></td>
													</tr>
												<?php
												}
												?>
												<tr>
													<td colspan="3">Total</td>
													<td><?php echo number_format($sum) ?></td>
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
								<div class="col-lg-12">
									<p class="text-center"><button class="btn" onclick="generatePDF()"><span
												class="glyphicon glyphicon-print"></span> Print</button></p>
								</div>
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

<script type="text/javascript">
	$(document).ready(function () {
		$('#pin_data').DataTable();
	});
</script>

<?php include("../extras/footer.php") ?>