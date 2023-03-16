<?php include("header.php") ?>
<div class="container-fluid main-container">
	<div class="row main">
		<div class="col-lg-12 panel-container">
			<div class="panel panel-default">
				<div class="panel-heading" id="p_heading">
					<?php
					$users = $_SESSION['users'];
					$s1  = mysqli_query($con, "SELECT * FROM staff where username = '$users'");
					$sh1 = mysqli_fetch_array($s1);
					$name1 = $sh1['fname'] . " " . $sh1['lname'];
					$img = $sh1['picture'];
					$department = $sh1['department'];
					if ($img == "") {
						$img2 = "passport/default.png";
					} else {
						$img2 = $img;
					}
					?>
					<img src="<?php echo $img2 ?>" id="imgs" class="img-responsive">
					<h4><?php echo $name1 ?></h4>
					<i><?php echo $department ?></i>
				</div>
				<div class="panel-body">
					<?php
					$ses = mysqli_query($con, "SELECT * FROM calender");
					$sete = mysqli_fetch_array($ses);
					$return2 = $sete['session'];
					$return1 = $sete['current_semester'];
					if (isset($_GET['is'])) {
						$is = $_GET['is'];
						$sl2 = mysqli_query($con, "SELECT * from course where code = '$is'");
						$sh2 = mysqli_fetch_array($sl2);
						$code = $sh2['code'];
						$level = $sh2['level'];
						$course = $sh2['title'];
						$course_code = $sh2['sn'];
						$anchor = $sh2['teacher'];
					}
					$sl3 = mysqli_query($con, "SELECT * FROM course_registration where course_code = '$code' and session = '$return2' and semester = '$return1' ");
					$num1 = mysqli_num_rows($sl3);
					$name = "";
					?>
				</div>
				<div class="panel-body">
					<div style="border:1px solid #d7d7d7; border-radius: 4px; padding: 3px;">
						<div class="row">
							<div class="col-lg-1"><img src="logo.png" style="width: 90px; height: 90px;"></div>

							<div class="col-lg-10">
								<h4 class="text-center" style="font-weight: bold;"><?php echo $name ?></h4>
								<p style="text-align: center; font-weight: bold;">course Sheet</p>
							</div>

						</div>
						<br>
						<a href="sheet.php?is=<?php echo $code ?>" class=" btn btn-pink"> score sheet</a>
						<a href="sheet2.php?is=<?php echo $code ?>" class=" btn btn-pink">
							attendance </a>
						<a href="sheet3.php?is=<?php echo $code ?>" class=" btn btn-pink">
							csv score</a>
						<a href="sendnot.php?is=<?php echo $code ?>" class="btn btn-pink">Send noticication</a>
						<p> </p>
						<!--<p><button class="btn" onclick="codespeedy()">Print Attendance Sheet</button></p>-->
						<div class="table-responsive table-box">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Course</th>
										<th>Course code</th>
										<th>Level</th>
										<th>no of students</th>
									</tr>
								</thead>
								<tr>
									<td><?php echo $course ?></td>
									<td><?php echo $code ?></td>
									<td><?php echo  $level ?></td>
									<td><?php echo $num1 ?></td>
								</tr>
							</table>
							<table id="student_data" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Matric No</th>
										<th>Name</th>
									</tr>
								</thead>
								<tbody>
									<?php

									while ($show_us = mysqli_fetch_array($sl3)) {
										$idm = $show_us['matric_no'];
										$sqlx = mysqli_query($con, "SELECT * FROM students where matric_no = '$idm' ");
										if (!$sqlx) {
											die(mysqli_error($con));
										}
										$sqlxx = mysqli_fetch_array($sqlx);
										$matric = $sqlxx['matric_no'];
										$student_name = $sqlxx['fname'] . " " . $sqlxx['lname'];
									?>
										<tr>
											<td><?php echo $matric ?></td>
											<td><?php echo $student_name ?></td>
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
</div>
<?php include("footer.php") ?>
<script>
	$(document).ready(function() {
		$('#student_data').DataTable();
	});
</script>