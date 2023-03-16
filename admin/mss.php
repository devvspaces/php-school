<?php
include("header.php");
include("../class.php");
?>
<div class="content">
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

			<div class="report">
				<div class="panel-body">
					<h4>Course Registration</h4>
				</div>

				<div class="panel-body">
					<div class="row">
						<div class="col-lg-6 col-md-12 col-sm-12">
							<h4 class="text-center">List of Courses</h4>
							<?php
							$stis = $_GET['is'];
							$student_class = mysqli_query($con, "SELECT * FROM students where username = '$stis'");
							$mfetch = mysqli_fetch_array($student_class);
							$level = $mfetch['level'];
							$college = $mfetch['college'];
							$department = $mfetch['department'];
							$matric = $mfetch['matric_no'];
							?>

							<table class="table table-bordered" id="data">
								<tr>
									<th>Coruse Code</th>
									<th>Course</th>
									<th>Unit</th>
									<th>Action</th>
								</tr>
								<tr>
									<th colspan="4">Failed Courses</th>
								</tr>
								<?php
								$total_funit = 0;
								$pass_mark = $auth->select12('pass_mark', 'calender');
								$current_semester = $auth->select12('current_semester', 'calender');
								$current_session = $auth->select12('session', 'calender');
								$previous_session = $auth->select12('previous_session', 'calender');
								$check_failed = mysqli_query($con, "SELECT * FROM result where matric_no = '$matric' and session != '$current_session' and semester = '$current_semester' and score < $pass_mark");
								if (!$check_failed) {
									die(mysqli_error($con));
								}
								while ($query_failed = mysqli_fetch_array($check_failed)) {
									$fcode = $query_failed['code'];
									$fcourse = $query_failed['course'];
									// unit //
									$get_funit = mysqli_query($con, "SELECT * from course where  code = '$fcode'  ");
									$show_funit = mysqli_fetch_array($get_funit);

									$funit = $show_funit['unit'];
									$total_funit += $funit;
								?>
									<tr>
										<th><?php echo $fcode ?></th>
										<th><?php echo $fcourse ?></th>
										<th><?php echo $funit ?></th>
										<th> <?php
												$mon = mysqli_query($con, "SELECT * FROM course_registration where course_code= '$fcode' and  matric_no = '$matric' and session = '$current_session' and semester = '$current_semester'");
												if (mysqli_num_rows($mon) == 0) {
													echo "<button type='button' class='btn btn-select' data='$fcode' stream='co' unit='$funit' >ADD</button>";
												} else {
													echo "<button type='button' class='btn btn-select' data='$fcode' disabled>ADDED</button>";
												}
												?></th>
									</tr>
								<?php
								}
								?>
								<tr>
									<th>TOTAL</th>
									<th></th>
									<th><?php echo $total_funit ?></th>
									<th></th>
								</tr>


								<tr>
									<th colspan="4">Faculty And Departmental Courses</th>
								</tr>

								<?php
								$get_dcourse = mysqli_query($con, "SELECT * from course where level = '$level' and college_code= '$college' and dept_code = '$department' and semester = '$current_semester'  ");
								while ($show_dcourse = mysqli_fetch_array($get_dcourse)) {
									$title = $show_dcourse['title'];
									$code = $show_dcourse['code'];
									$unit = $show_dcourse['unit'];
								?>

									<tr>
										<td><?php echo $code ?></td>
										<td><?php echo $title ?></td>
										<td><?php echo $unit ?></td>
										<th>
											<?php
											$mon = mysqli_query($con, "SELECT * FROM course_registration where course_code= '$code' and  matric_no = '$matric' and session = '$current_session' and semester = '$current_semester'");
											if (mysqli_num_rows($mon) == 0) {
												echo "<button type='button' class='btn btn-select' data='$code' stream='ms' unit='$unit'>ADD</button>";
											} else {
												echo "<button type='button' class='btn btn-select' data='$code' disabled>ADDED</button>";
											}
											?>
									</tr>
								<?php
								}
								?>
								<tr>
									<th colspan="4">University Wide Courses</th>
								</tr>
								<?php
								$get_ucourse = mysqli_query($con, "SELECT * from course where level = '$level' and type = 'uw' and college_code != '$college' and dept_code != '$department' and semester = '$current_semester' ");
								while ($show_ucourse = mysqli_fetch_array($get_ucourse)) {
									$title = $show_ucourse['title'];
									$code = $show_ucourse['code'];
									$course_id = $show_ucourse['sn'];
									$unit = $show_ucourse['unit'];
								?>

									<tr>
										<td><?php echo $code ?></td>
										<td><?php echo $title ?></td>
										<td><?php echo $unit ?></td>
										<td>
											<?php
											$mon = mysqli_query($con, "SELECT * FROM course_registration where course_code= '$code' and  matric_no = '$matric' and session = '$current_session' and semester = '$current_semester'");
											if (mysqli_num_rows($mon) == 0) {
												echo "<button type='button' class='btn btn-select' data='$code' stream='ms' unit='$unit'>ADD</button>";
											} else {
												echo "<button type='button' class='btn btn-select' data='$code' disabled>ADDED</button>";
											}
											?>

										</td>
									</tr>
								<?php
								}
								?>
							</table>



						</div>
						<div class="col-lg-6 col-md-12 col-sm-12">
							<h4 class="text-center">Registered Courses</h4>
							<table class="table table-bordered">
								<tr>
									<th>Course Code</th>
									<th>Title</th>
									<th>Unit</th>
									<th>Action </th>
								</tr>
								<?php
								$total_unit = 0;
								$sub = mysqli_query($con, "SELECT * FROM course_registration where session = '$current_session' and semester = '$current_semester' and matric_no = '$matric'");
								$total_course = mysqli_num_rows($sub);
								while ($subjects = mysqli_fetch_array($sub)) {

									$c_code = $subjects['course_code'];
									$sn = $subjects['sn'];
									$sub2 = mysqli_query($con, "SELECT * from course where code = '$c_code' ");
									$sb_name = mysqli_fetch_array($sub2);
									$title = $sb_name['title'];
									$s_code = $sb_name['code'];
									$c_unit = $sb_name['unit'];
									$total_unit += $c_unit;
								?>
									<tr>
										<td><?php echo $title ?></td>
										<td><?php echo $s_code ?></td>
										<td><?php echo $c_unit ?></td>
										<th>
											<button type='button' class='btn btn-remove' data='<?php echo $sn ?>'>Remove</button>
										</th>
									</tr>
								<?php
								}
								?>
								<tr>
									<td>Summary</td>
									<td>Total Courses: <?php echo $total_course ?></td>
									<td>Total Unit: <?php echo $total_unit ?></td>
									<td><button class="btn">Submit</button></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<?php include("footer.php") ?>
<script type="text/javascript">
	$(document).ready(function() {
		$(".btn-select").click(function() {
			var code = $(this).attr("data");
			var stream = $(this).attr("stream");
			var unit = $(this).attr("unit");
			var matric = "<?php echo $matric ?>";
			// alert(unit)
			// return;
			$(this).hide();
			$.ajax({
				method: "POST",
				url: "register.php",
				data: {
					code: code,
					matric: matric,
					stream: stream,
					unit: unit
				},
				success: function(data) {
					alert(data);
					window.location.reload();
				}
			})
		})
	})
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".btn-remove").click(function() {
			var c_code = $(this).attr("data");
			//alert(c_code);
			$.ajax({
				method: "POST",
				url: "remove_elective.php",
				data: {
					c_code: c_code
				},
				success: function(data) {
					window.location.reload();
					//alert(data);
				}
			})
		})
	})
</script>