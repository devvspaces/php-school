<?php
$title = "Paid Fees";
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
					</div>
					<div class="panel-body">

						<div class="table-responsive table-box ">
							<table id="pf_data" class="table table-bordered table-striped">
								<thead id="data">
									<tr>
										<th>Fees</th>
										<th>Amount</th>
										<th>Student</th>
										<th>Session</th>
										<th>Action</th>
										<th>reference</th>
										<th>date</th>
									</tr>
								</thead>
								<?php
								$cal = mysqli_query($con, "SELECT * FROM  calender ");
								$sh2 = mysqli_fetch_array($cal);
								$return2 = $sh2['session'];
								$return1 = $sh2['current_semester'];
								$s2 = mysqli_query($con, "SELECT * FROM paid_fees");
								while ($sh2 = mysqli_fetch_array($s2)) {
									$sn = $sh2['sn'];
									$title = $sh2['title'];
									$amount = $sh2['amount'];
									$participant = $sh2['student'];
									$method = $sh2['method'];
									$date = $sh2['dates'];
									$reference = $sh2['reference_id'];
									$sessionx = $sh2['session'];

									?>
									<tr>
										<th><?php echo $title ?></th>
										<th>
											<?php echo number_format($amount) ?>
										</th>
										<th><?php echo $participant ?></th>
										<th>
											<?php echo $sessionx ?>
										</th>
										<th><a href='receipt.php?transactionid=<?php echo $reference ?>'
												class='btn btn-pink'>Print receipt</a></th>
										<th>
											<?php echo $reference ?>
										</th>
										<th><?php echo $date ?></th>

									</tr>
									<?php
								}
								?>

							</table>
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
			var dat = $('.remove').attr("data");
			$('.remove1').attr("href", dat);
		})
	})
</script>
<script>
	$(document).ready(function () {
		$('#pf_data').DataTable();
	});
</script>
<?php include("../extras/footer.php") ?>