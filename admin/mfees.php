<?php
$title = "Manage Fees";
include("header.php");
?>

<div class="viewbox-content">
	<div class="content">
		<div class="col-sm-10 mb-5">
			<div class="content">
				<div class="report">
					<div class="panel-body">
						<a href="cfee.php" class="btn btn-pink">
							<span class="icon">
								<i data-feather="plus"></i>
							</span>
							Create new fee
						</a>
						<a href="view_pin.php" class="btn btn-pink">
							<span class="icon">
								<i data-feather="book"></i>
							</span>
							Financial Statement
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
					<div class="panel-body">
						<div class="table-responsive table-box">
							<table id="fees_data" class="table table-bordered table-striped">
								<thead id="data">
									<tr>
										<th>SN</th>
										<th>Fees</th>
										<th>Amount</th>
										<th>Faculty</th>
										<th>Department</th>
										<th>Level</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$serial = 0;
									$cal = mysqli_query($con, "SELECT * FROM  calender ");
									$sh2 = mysqli_fetch_array($cal);
									$return2 = $sh2['session'];
									$return1 = $sh2['current_semester'];
									$s2 = mysqli_query($con, "SELECT * FROM fees where session = '$return2'");
									while ($sh2 = mysqli_fetch_array($s2)) {
										$sn = $sh2['sn'];
										$title = $sh2['title'];
										$amount = $sh2['amount'];
										$college = $sh2['college'];
										$department = $sh2['department'];
										$level = $sh2['level'];
										$serial++;
										?>
										<tr>
											<td><?php echo $serial ?></td>
											<td>
												<?php echo $title ?>
											</td>
											<td><?php echo number_format($amount) ?></td>
											<td>
												<?php echo $college ?>
											</td>
											<td><?php echo $department ?></td>
											<td>
												<?php echo $level ?> level
											</td>
											<td>
												<a href="#" data='deletefees.php?is=<?php echo $sn ?>' type="button"
													class="btn show-modal remove" data-bs-toggle="modal"
													data-bs-target="#myModal">
													<span class="glyphicon glyphicon-trash"></span></a>
												<a href="fees_details.php?is=<?php echo $sn ?>"
													class="btn btn-pink remove"><span
														class="glyphicon glyphicon-list-alt"></span></a>
											</td>

										</tr>
									<?php
									}
									?>
								</tbody>

							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="modal-box">
					<!-- Modal -->
					<div class="modal fade" id="myModal" data-backdrop="static" tabindex="-1" role="dialog"
						aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
								<div class="modal-body">

									<h4 class="modal-title text-center title"><span
											class="glyphicon glyphicon-trash"></span> Delete Fees Confirmation</h4>
									<p class="text-center"><br> Are you sure you want to delete this Fees?<br><small>NB:
											this action cannot be reversed</small> </p>
									<button class="btn btn-success" data-dismiss="modal">Cancel</button>
									<a href="" class="btn btn-danger remove1" data="">Delete</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		$('.remove').click(function () {
			var dat = $(this).attr("data");
			$('.remove1').attr("href", dat);
		})
	})
</script>
<script>
	$(document).ready(function () {
		$('#fees_data').DataTable();
	});
</script>
<?php include("../extras/footer.php") ?>