<?php
$title = "Finance";
include("header.php");
error_reporting(0);
?>

<div class="viewbox-content">
	<div class="container-fluid main-container">
		<div class="row main">
			<div class="col-lg-12 panel-container">
				<div class="panel">
					<div class="rest">
						<h4 class="mb-4 mt-4" style="font-weight: 600;">
							Statement For <?php echo $return2 . " session" ?>
						</h4>
						<div class="">
							<div id="contentx">
								<div class="col-lg-6 col-sm-12">
									<div class="table-responsive table-box">
										<table class="fee_tables table table-bordered table-striped">
											<tr>
												<th colspan="4">Fees Breakdown</th>
											</tr>
											<tr>
												<th>SN</th>
												<th>Fees</th>
												<th>Amount</th>
												<th>Action</th>
											</tr>
											<?php
											$total = $serial = 0;
											$sqlstr = "SELECT * FROM fees where college = '$college' and department = '$department' and level = '$level'  AND session = '$return2'";
											$stmt = $conn->prepare($sqlstr);
											$stmt->execute();
											$result = $stmt->get_result();
											while ($row = $result->fetch_assoc()):
												extract($row);
												$serial++;
												$total += $amount;
												$action = "<a href='fees_choice.php?amount=$total' class='btn btn-pink'>make payment</a> ";
												if ($auth->countall5('paid_fees', 'fid', $sn, 'student', $matric_no) > 0) {
													$action = "Paid";
												}
												?>
												<tr>
													<td><?= $serial ?></td>
													<td>
														<?= $title ?>
													</td>
													<td><?= number_format($amount, 2) ?></td>
													<td>
														<?= $action ?>
													</td>
												</tr>
											<?php endwhile; ?>
											<?php
											$sql = "SELECT *, SUM(amount) AS TOTALPayment FROM fees where college = '$college' and department = '$department' and level = '$level'  AND session = '$return2'";
											$result = mysqli_query($con, $sql);
											$row = mysqli_fetch_array($result);
											$total = $row['TOTALPayment'];
											?>
											<tr>
												<th>Total</th>
												<th>
													<?php echo number_format($total, 2) ?>
												</th>
												<th>
												</th>
												<th>
												</th>
											</tr>
										</table>
									</div>
								</div>
								<div class="col-lg-6 col-sm-12 mt-5">
									<div class="table-responsive table-box">
										<table class="fee_tables table table-bordered table-striped">
											<tr>
												<th colspan="4">Payment History</th>
											</tr>
											<tr style="padding: 2px;">
												<th>SN</th>
												<th>Title</th>
												<th>Amount</th>
												<th>Date</th>
												<!-- <th>Act</th> -->
											</tr>
											<?php
											$total = $serial = 0;
											$sqlstr = "SELECT * FROM paid_fees where student = '$matric_no' AND session = '$return2'";
											$stmt = $conn->prepare($sqlstr);
											$stmt->execute();
											$result = $stmt->get_result();
											while ($row = $result->fetch_assoc()):
												extract($row);
												$serial++;
												$title = $auth->select14('title', 'fees', 'sn', $fid);
												?>
												<tr>
													<td><?= $serial ?></td>
													<td>
														<?= $title ?>
													</td>
													<td><?= number_format($amount, 2) ?></td>
													<td>
														<?= $dates ?>
													</td>
												</tr>
											<?php endwhile; ?>
										</table>
									</div>

								</div>
							</div>
							<div class="col-lg-12 mt-5">
								<button class="btn btn-lg btn-pink" onclick="generatePDF()">
									<span class="icon">
										<i data-feather="printer"></i>
									</span> Print
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript" src='jquery.js'></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script>
	$(document).ready(function () {
		$('.fee_tables').DataTable({
			"processing": true,
		});
	});
</script>

<?php include("../extras/footer.php") ?>