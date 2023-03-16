
<?php include("header.php") ?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
<script type="text/javascript" src="print.js"></script>
<div class="container-fluid main-container">
	<div class="row main">
		<div class="col-lg-12 panel-container">
			<div class="panel panel-default">
				<div class="panel-heading" id="p_heading">
					<?php 
					$users = $_SESSION['users'];
					$s1  = mysqli_query($con,"SELECT * FROM students where username = '$users'");
					$sh1 = mysqli_fetch_array($s1);
					$name1 = $sh1['lname']." ".$sh1['fname']." ".$sh1['mname'];
					$img = $sh1['picture'];
					$level = $sh1['level'];
					$student = $sh1['matric_no'];
					?>
					<img src="<?php echo $img ?>" id="imgs" class="img-responsive" alt="your passport here">
					<h4><?php echo $name1 ?></h4>
					<i><?php echo $level ?></i>
				</div>
				<?php include('no_words.php') ?>
				<?php 
				$reference_id = $_GET['transactionid'];
				$mis1 = mysqli_query($con,"SELECT * FROM paid_fees where reference_id = '$reference_id' ");
				$mis2 = mysqli_fetch_array($mis1);
				$receiptid = $mis2['receiptid'];
				$amount = $mis2['amount'];
				$date = $mis2['dates'];
				$title = $mis2['title'];
				$session = $mis2['session'];
				?>
				<div class="panel-body">
					<div class="row">
						<div id="contentx" style="padding: 3px;">
						<div class="col-lg-10 col-lg-offset-1" style="border:1px solid #d7d7d7">
							<br>
							<img src="logo.png" style="width: 70px; height: 70px;">
							<h4 class="text-center" style="font-weight: bold; margin-top:-60px;"><?php echo $name ?></h4>
							<p style="text-align: center; font-weight: bold; font-size: 16px;">KM3, AKURE-OWO EXPRESS ROAD,SHASHA,<br> OBA-ILE AKURE ONDO STATE <br>&nbsp &nbsp<sapan class='glyphicon glyphicon-phone'></sapan> 08035042727,08038838583</p>
							<p style="font-weight: bold;" class="text-center">payment receipt</p>
							<div class= 'table-responsive table-box'>
							<table class="table">
						<tr>
									<th>Date: </th><td> <?php echo $date ?></td>
									<th>Session: </th> <td><?php echo $session ?> Session</td>
									<th>Receipt id:</th><td><?php echo $receiptid ?></td>

								</tr>
							</table>
							</div>
							<table class="table">
								<tr>
									<th>Name: </th><td> <?php echo $name1 ?></td>
								</tr>
								<tr>
									<th>Matric no: </th> <td> <?php echo $student ?></td>
								</tr>
								<tr>
									<th>Payment For: </th> <td> <?php echo $title ?></td>
								</tr>
								<tr>
									<th>Amount in words: </th> <td><?php

									echo  number_to_word($amount)." Naria Only";  ?></td>
								</tr>
							</table>
							<table class="table">
								<tr>

									<td><b>Amount</b>: &#8358 <?php echo number_format($amount) ?>.00k</td>
									<td><b>Issued By</b> <?php echo $name ?></td>
								</tr>

							</table>
							<div style="float: right;"><div id="output"></div></div>
							</div>
							<br>
							<div class="col-lg-12">
							<p class="text-center">&copy <?php echo date("Y") ?> <?php echo $name ?> All Right Reserved. This receipt was Generated Electronically</p></div>
						</div>
					</div>

					<p class="text-center"><br><button class="btn btn-info"  onclick="generatePDF()">Print receipt</button></p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include("footer.php") ?>
<script type="text/javascript" src='jquery.js'></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="../admin/jquery.qrcode.min.js"></script>
	<script>
jQuery(function(){
	jQuery('#output').qrcode({
		text:"<?php echo $name1.'\n'.$title.'\n'.$amount.' '.$session.' '. $receiptid ?>",
		width:100,
		height:100,


	});
})
</script>
</body>
</html>