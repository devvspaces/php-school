<?php
$title = "Dashboard";
$nav = "Home";
include("header.php");
?>

<div class="viewbox-content">

	<?php
	$first_query = mysqli_query($con, "SELECT * from graduated_students where matric_no = '$matric_no'");

	if (mysqli_num_rows($first_query) == 0) {
		// include("linker.php");
	} else {
		$first_fetch = mysqli_fetch_array($first_query);
		$name1 = $first_fetch['lname'] . " " . $first_fetch['fname'];
		//$year = $first_fetch['year'];
		?>


		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading" id="p_heading" style="height: 600px;">
							<h4 style="margin-top: 300px; text-align: center;">Dear <?php echo $name1 ?>, You have Graduated
								from <?php echo $name ?>.<br>We wish you well in life and hope to see you scale higher
								heights
								<br> have a nice day <br><br><a href="logout.php" class="btn">Logout</a>
							</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}

	?>


	<div class="pro-activity-panel">
		<div class="profile-panel">

			<div class="header-bg"></div>

			<div class="content">
				<img src="passport/default.png" alt="">

				<div class="details">
					<h4>
						<?php echo $name1 ?>
					</h4>
					<p>
						<?php echo $level ?> Level
					</p>
					<p>
						<?php echo $college ?>
					</p>
				</div>

				<div class="boxes">

					<div class="box">
						<h4>Matric Number:</h4>
						<p>
							<?php echo $matric_no ?>
						</p>
					</div>

					<div class="box">
						<h4>Phone:</h4>
						<p>+234 7044755633</p>
					</div>

					<div class="box">
						<h4>Email:</h4>
						<p>Fatdan@gmail.com</p>
					</div>

				</div>
			</div>

		</div>
		<div class="activity-panel">
			<div class="box">
				<h4>Activity Session</h4>
				<p>2022 / 2023</p>
			</div>

			<div class="box">
				<h4>Course Semester:</h4>
				<p>Second Semester</p>
			</div>

			<div class="box">
				<h4>Current Level:</h4>
				<p>100</p>
			</div>

			<div class="box">
				<h4>Student Status:</h4>
				<p>
				<div class="badge bg-danger">
					Inactive
				</div>
				</p>
			</div>
		</div>
	</div>


	<div class="container-fluid main-container">
		<div class="row main">
			<div class="col-lg-12 panel-container">
				<div class="panel">

					<div class="rest mt-5">
						<div class="">
							<div class="row">
								<div class="col-lg-10">
									<h4 class="mb-3">
										<span class="icon">
											<i data-feather='bell'></i>
										</span>
										General Anouncement
									</h4>
								</div>
								<div class="col-lg-1">
									<p class="che-hide">
										<span style="cursor: pointer;"
											class="icon">
											<i>
												<i data-feather='chevron-down'></i>
											</i>
										</span>
										</p>
								</div>
							</div>

						</div>

						<div class="panel-body anoucement-panel table-box">
							<table class="table">
								<?php
								$sl14 = mysqli_query($con, "SELECT * from anoucement where viewers = 'all' or viewers = 'student' limit 5 ");
								while ($sh19 = mysqli_fetch_array($sl14)) {
									$title19 = $sh19['title'];
									$content19 = $sh19['content'];
									?>
									<tr>
										<th><?php echo $title19 ?>
											<hr>
											<p style="font-size: 15px; font-weight: normal !important;">
												<?php echo $content19 ?>
											</p>
										</th>
									</tr>

								<?php
								}
								?>
							</table>
						</div>

						<h4 class="mb-3 mt-5">
							<span class="icon">
								<i data-feather='bell'></i>
							</span>
							Todays Report (<?php echo date('l, d F, Y') ?>)
						</h4>
						<div class="panel-body table-box">
							<table class="table">
								<tr>
									<th>Attendance</th>
									<td>
										<?php
										$today = date('d-m-y');
										$attendancex = "N/A";
										$js_query = mysqli_query($con, "SELECT * FROM attendance where date = '$today' and admission_no = '$student' ");
										if (!$js_query) {
											die("An error has occured.");
										}
										$num = mysqli_num_rows($js_query);
										if ($num > 0) {
											$report = mysqli_fetch_array($js_query);
											$status = $report['status'];
											if ($status == 1) {
												$attendancex = 'present';
											} else {
												$attendancex = 'absent';
											}
										}
										echo $attendancex;
										?>
									</td>
								</tr>
								<tr>
									<th>
										Daily Report
									</th>
									<td>
										<?php
										$status = "N/A";
										$today = date('d-m-y');
										$js_report = mysqli_query($con, "SELECT * FROM daily_report where date = '$today' and admission_no = '$student' ");
										$num2 = mysqli_num_rows($js_query);
										if ($num2 > 0) {
											$report = mysqli_fetch_array($js_report);
											$status = $report['report'];
										}

										echo $status;
										?>
									</td>
								</tr>
							</table>

						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('.che-hide').click(function () {
		$('.anoucement-panel').toggle()
	})
</script>
<?php include("../extras/footer.php") ?>