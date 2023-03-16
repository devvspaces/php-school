<?php include("header.php") ?>
<div class="container-fluid  main-container">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
	<script type="text/javascript" src="print.js"></script>
	<div class="col-sm-10 mb-5">
		<div class="content">
			<div id="p_heading">
				<?php
				$users = $_SESSION['users'];
				$s1  = mysqli_query($con, "SELECT * FROM admin where username = '$users'");
				$sh1 = mysqli_fetch_array($s1);
				$name1 = $sh1['fname'] . " " . $sh1['lname'];
				$img = $sh1['picture'];
				$position = $sh1['position'];
				if ($img == "") {
					$img2 = "passport/default.png";
				} else {
					$img2 = $img;
				}
				?>
				<?php include("nav.php") ?>
			</div>
			<div class="panel-body">
				<h4>Paid fees</h4>
				<a href="cfee.php" class="btn btn-pink"><span class="glyphicon glyphicon-plus"></span> Create New fee</a> <a href="view_pin.php" class="btn btn-pink">View existing pin</a> <a href="cleared_students.php" class="btn btn-pink">Cleared students</a>
				<a href="v_p_f.php" class="btn btn-pink">Paid Fees</a>

			</div>
			<div class="panel-body">
				<div class="row">
					<div id="contentx" style="padding: 3px;">
						<?php include('no_words.php') ?>
						<?php
						$reference_id = $_GET['transactionid'];
						$mis1 = mysqli_query($con, "SELECT * FROM paid_fees where reference_id = '$reference_id' ");
						$mis2 = mysqli_fetch_array($mis1);
						$receiptid = $mis2['receiptid'];
						$amount = $mis2['amount'];
						$date = $mis2['dates'];
						$title = $mis2['title'];
						$session = $mis2['session'];
						$student = $mis2['student'];
						$s1  = mysqli_query($con, "SELECT * FROM students where matric_no = '$student'");
						$sh1 = mysqli_fetch_array($s1);
						$name1 = $sh1['lname'] . " " . $sh1['fname'] . " " . $sh1['mname'];
						$img = $sh1['picture'];
						$level = $sh1['level'];
						$name = "School Authority";
						?>
						<div class="col-lg-10 col-lg-offset-1" style="border:1px solid #d7d7d7;">
							<br>
							<img src="logo.png" style="width: 70px; height: 70px;">
							<h4 class="text-center" style="font-weight: bold; margin-top:-60px;"><?php echo $name ?></h4>
							<p style="text-align: center; font-weight: bold; font-size: 16px;">KM3, AKURE-OWO EXPRESS ROAD,SHASHA,<br> OBA-ILE AKURE ONDO STATE <br>&nbsp &nbsp<sapan class='glyphicon glyphicon-phone'></sapan> 08035042727,08038838583</p>
							<p style="font-weight: bold;" class="text-center">Payment Receipt</p>
							<div class='table-responsive table-box'>
								<table class="table">
									<tr>
										<th>Date: </th>
										<td> <?php echo $date ?></td>
										<th>Session: </th>
										<td><?php echo $session ?></td>
										<th>Receipt id:</th>
										<td><?php echo $receiptid ?></td>
									</tr>
								</table>
							</div>
							<table class="table">
								<tr>
									<th>Name: </th>
									<td> <?php echo $name1 ?></td>
								</tr>
								<tr>
									<th>Matric no: </th>
									<td> <?php echo $student ?></td>
								</tr>
								<tr>
									<th>Payment For: </th>
									<td> <?php echo $title ?></td>
								</tr>
								<tr>
									<th>Amount in words: </th>
									<td><?php

										echo  number_to_word($amount) . " Naria Only";  ?></td>
								</tr>
							</table>
							<table class="table">
								<tr>

									<td><b>Amount</b>: &#8358 <?php echo number_format($amount) ?>.00k</td>
									<td><b>Issued By</b> <?php echo $name ?></td>
								</tr>

							</table>
							<div style="float: right;">
								<div id="output"></div>
							</div>
						</div>
						<br>
						<div class="col-lg-12">
							<p class="text-center" style="font-size:12px;">&copy <?php echo date("Y") ?> <?php echo $name ?> All Right Reserved. This receipt was Generated Electronically</p>
						</div>
					</div>
				</div>

				<p class="text-center"><br><button class="btn btn-info" onclick="generatePDF()">Print receipt</button></p>

			</div>
		</div>
	</div>
</div>
</div>
<!-- modal for student delete begins -->
<div class="modal fade bs-example-modal-smsdel" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	<div class="modal-dialog modal-sm " role="document">
		<div class="modal-content" style="color: #777;">
			<div class="modal-header">
				<button class="close" data-dismiss="modal" aria-label="Close" type="button"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title text-center">Delete Fees Confirmation</h4>
				<div class="modal-body">
					<p class="text-center"><span class="glyphicon glyphicon-trash"></span><br> Are you sure you want to delete this Fees?<br><small>Nb: this action cannot be reversed</small> ?</p>
				</div>
				<div class="modal-footer">
					<button class="btn btn-success" data-dismiss="modal">Cancle</button>
					<a href="" class="btn btn-danger remove1" data="">Delete</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include("footer.php") ?>
<script type="text/javascript">
	$(document).ready(function() {
		$('.remove').click(function() {
			var dat = $('.remove').attr("data");
			$('.remove1').attr("href", dat);
		})
	})
</script>
<script>
	$(document).ready(function() {
		$('#pf_data').DataTable();
	});
</script>
<script type="text/javascript" src="jquery.qrcode.min.js"></script>
<script>
	jQuery(function() {
		jQuery('#output').qrcode({
			text: "<?php echo $name1 . '\n' . $title . '\n' . $amount . '\n ' . $student . '\n' . $session . '\n' . $receiptid . '\n' . 'www.hapacollege.com' ?>",
			width: 100,
			height: 100,


		});
	})
</script>