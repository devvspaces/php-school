<?php
$title = "Bulk Message";
include("header.php");
?>

<div class="viewbox-content">
	<div class="content">
		<div class="col-sm-10 mb-5">
			<div class="content">
				<div class="panel-body">
					<h4>Send SMS to Stake Holders</h4>
					<?php
					if (isset($_GET['event_id'])) {
						$event_id = $_GET['event_id'];
						$event_query = mysqli_query($con, "SELECT * FROM event where sn = '$event_id' ");
						$event_result = mysqli_fetch_array($event_query);
						$event = $event_result['event'];
						$date = $event_result['date'];
						$time = $event_result['time'];
						$venue = $event_result['venue'];

						$msg = "Please be reminded of the $event event. Date: $date. Time: $time venue: $venue thanks";
					} else {
						$event = '';
						$msg = '';
					}
					?>
					<?php
					if (isset($_GET['msg'])) {
						echo $_GET['msg'];
						if ($_GET['msg'] == "sus") {
							echo "<p class='alert alert-success'>Message sent</p>";
						} else {
							echo "<p class='alert alert-danger'>error in sending message</p>";
						}
					}
					?>
					<form method="POST" action="sms_send.php">
						<div class="form-group">
							<label class="form-label" for="receipient">Receipient</label>
							<select id="receipient" name="receiver" class="form-control receipient_sms">
								<option value="" selected>Select</option>
								<option value="students" class="students">Students</option>
								<option value="staff" id="staff">Staff</option>
								<option id="parents">parents</option>
								<option value="manual" id="manual">Manual input</option>
							</select>
						</div>

						<!-- Students -->
						<div class="sms_divs form-group" id="student_category" style="display: none;">
							<label class="form-label">Select category of students</label>
							<select class="form-control student_category" name="student_category">
								<option value="" selected>Select</option>
								<option value="ALL">ALL </option>
								<option value="faculty">Students By Faculty</option>
								<option value="department">Students By Department </option>
								<option value="level">Students By Level </option>
							</select>
						</div>
						<div class="sms_divs form-group" id="sbf" style="display: none;">
							<label class="form-label">Select Faculty of students</label>
							<select class="form-control" name="faculty">
								<option value="" selected>Select</option>
								<?php
								$class_query = mysqli_query($con, "SELECT * FROM college");
								while ($college_res = mysqli_fetch_array($class_query)) {
									$college_name = $college_res['college_name'];
									$college_code = $college_res['college_code'];
									echo "<option value='$sn'>$college_name</option>";
								}
								?>
							</select>
						</div>
						<div class="sms_divs form-group" id="sbd" style="display: none;">
							<label class="form-label">Select Department of students</label>
							<select class="form-control" name="department">
								<option value="" selected>Select</option>
								<?php
								$class_query = mysqli_query($con, "SELECT * FROM department");
								while ($department_res = mysqli_fetch_array($class_query)) {
									$sn = $department_res['sn'];
									$department = $department_res['department'];
									echo "<option value='$sn'>$department</option>";
								}
								?>
							</select>
						</div>
						<div class="sms_divs form-group" id="sbl" style="display: none;">
							<label class="form-label">Select Level of students</label>
							<select class="form-control" name="level">
								<option value="" selected>Select</option>
								<?php
								$class_query = mysqli_query($con, "SELECT * FROM level");
								while ($class_res = mysqli_fetch_array($class_query)) {
									$level = $class_res['level'];
									$sn = $class_res['sn'];
									echo "<option value='$sn'>$level Level</option>";
								}
								?>
							</select>
						</div>


						<!-- Staffs -->
						<div class="sms_divs form-group" id="staff-input" style="display: none;">
							<label class="form-label">Select Department of staff</label>
							<select class="form-control" name="staff">
								<option value="" selected>Select</option>
								<option value="ALL">ALL </option>
								<?php
								$dept_query = mysqli_query($con, "SELECT * FROM department");
								while ($dept_res = mysqli_fetch_array($dept_query)) {
									$department = $dept_res['department'];
									$dept_code = $dept_res['dept_code'];
									echo "<option value='$dept_code'>$department</option>";
								}
								?>
							</select>
						</div>

						<!-- Parents -->
						<div class="sms_divs form-group" id="parents-input" style="display: none;">
							<label class="form-label">Select parents of students by level</label>
							<select class="form-control" name="parents">
								<option value="" selected>Select</option>
								<option value="ALL">ALL </option>
								<?php
								$class_query = mysqli_query($con, "SELECT * FROM level");
								while ($class_res = mysqli_fetch_array($class_query)) {
									$level = $class_res['level'];
									$sn = $class_res['sn'];
									echo "<option value='$sn'>$level level</option>";
								}
								?>
							</select>
						</div>

						<!-- Manual -->
						<div class="sms_divs form-group" id="man-input" style="display: none;">
							<input type="" class="form-control" name="manual_input"
								placeholder="inpuut all number seperated by a comma eg, 08033445533,08098765432">
						</div>

						<div class="form-group">
							<input type="" name="title" value="<?php echo $event ?>" class="form-control"
								placeholder="Message title" required>
						</div>
						<div class="form-group">
							<textarea class="form-control" name="body" placeholder="message body"
								required><?php echo $msg ?></textarea>
						</div>
						<p class="text-center"><button type="submit" name="send" class="btn btn-success">Send</button>
						</p>
					</form>
				</div>
				<div class="panel-body">
					<h4>Send Bulk Email</h4>
					<form method="POST" action="email_send.php">
						<div class="form-group">
							<label class="form-label" for="receipient">Receipient</label>
							<select id="receipient" name="receiver" class="form-control receipient_sms2">
								<option value="" selected>Select</option>
								<option value="students" class="students">Students</option>
								<option value="staff" id="staff">Staff</option>
								<option id="parents">parents</option>
								<option value="manual" id="manual">Manual input</option>
							</select>
						</div>

						<!-- Students -->
						<div class="sms_divs2 form-group" id="student_category2" style="display: none;">
							<label class="form-label">Select category of students</label>
							<select class="form-control student_category2" name="student_category">
								<option value="" selected>Select</option>
								<option value="ALL">ALL </option>
								<option value="faculty">Students By Faculty</option>
								<option value="department">Students By Department </option>
								<option value="level">Students By Level </option>
							</select>
						</div>
						<div class="sms_divs2 form-group" id="sbf2" style="display: none;">
							<label class="form-label">Select Faculty of students</label>
							<select class="form-control" name="faculty">
								<option value="" selected>Select</option>
								<?php
								$class_query = mysqli_query($con, "SELECT * FROM college");
								while ($college_res = mysqli_fetch_array($class_query)) {
									$college_name = $college_res['college_name'];
									$college_code = $college_res['college_code'];
									echo "<option value='$sn'>$college_name</option>";
								}
								?>
							</select>
						</div>
						<div class="sms_divs2 form-group" id="sbd2" style="display: none;">
							<label class="form-label">Select Department of students</label>
							<select class="form-control" name="department">
								<option value="" selected>Select</option>
								<?php
								$class_query = mysqli_query($con, "SELECT * FROM department");
								while ($department_res = mysqli_fetch_array($class_query)) {
									$sn = $department_res['sn'];
									$department = $department_res['department'];
									echo "<option value='$sn'>$department</option>";
								}
								?>
							</select>
						</div>
						<div class="sms_divs2 form-group" id="sbl2" style="display: none;">
							<label class="form-label">Select Level of students</label>
							<select class="form-control" name="level">
								<option value="" selected>Select</option>
								<?php
								$class_query = mysqli_query($con, "SELECT * FROM level");
								while ($class_res = mysqli_fetch_array($class_query)) {
									$level = $class_res['level'];
									$sn = $class_res['sn'];
									echo "<option value='$sn'>$level Level</option>";
								}
								?>
							</select>
						</div>


						<!-- Staffs -->
						<div class="sms_divs2 form-group" id="staff-input2" style="display: none;">
							<label class="form-label">Select Department of staff</label>
							<select class="form-control" name="staff">
								<option value="" selected>Select</option>
								<option value="ALL">ALL </option>
								<?php
								$dept_query = mysqli_query($con, "SELECT * FROM department");
								while ($dept_res = mysqli_fetch_array($dept_query)) {
									$department = $dept_res['department'];
									$dept_code = $dept_res['dept_code'];
									echo "<option value='$dept_code'>$department</option>";
								}
								?>
							</select>
						</div>

						<!-- Parents -->
						<div class="sms_divs2 form-group" id="parents-input2" style="display: none;">
							<label class="form-label">Select parents of students by level</label>
							<select class="form-control" name="parents">
								<option value="" selected>Select</option>
								<option value="ALL">ALL </option>
								<?php
								$class_query = mysqli_query($con, "SELECT * FROM level");
								while ($class_res = mysqli_fetch_array($class_query)) {
									$level = $class_res['level'];
									$sn = $class_res['sn'];
									echo "<option value='$sn'>$level level</option>";
								}
								?>
							</select>
						</div>

						<!-- Manual -->
						<div class="sms_divs2 form-group" id="man-input2" style="display: none;">
							<input type="email" class="form-control" name="manual_input"
								placeholder="inpuut all emails seperated by a comma eg, a@gmail.com,b@gmail.com">
						</div>

						<div class="form-group">
							<input type="" name="title" value="<?php echo $event ?>" class="form-control"
								placeholder="Message title" required>
						</div>
						<div class="form-group">
							<textarea class="form-control" name="body" placeholder="message body"
								required><?php echo $msg ?></textarea>
						</div>
						<p class="text-center"><button type="submit" name="send" class="btn btn-success">Send</button>
						</p>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('.receipient_sms').change(function () {
		$(".sms_divs").hide();
		var res_sms = $(this).val();
		if (res_sms == 'students') {
			$('#student_category').show();
		} else if (res_sms == "manual") {
			$('#man-input').show();
		} else if (res_sms == "parents") {
			$('#parents-input').show();
		} else if (res_sms == "staff") {
			$('#staff-input').show();
		}
	})


	$('.student_category').change(function () {
		$(".sms_divs").hide();
		$('#student_category').show();
		var res_sms = $(this).val();
		if (res_sms == 'faculty') {
			$('#sbf').show();
		} else if (res_sms == "department") {
			$('#sbd').show();
		} else if (res_sms == "level") {
			$('#sbl').show();
		}
	})

	// Email
	$('.receipient_sms2').change(function () {
		$(".sms_divs2").hide();
		var res_sms = $(this).val();
		if (res_sms == 'students') {
			$('#student_category2').show();
		} else if (res_sms == "manual") {
			$('#man-input2').show();
		} else if (res_sms == "parents") {
			$('#parents-input2').show();
		} else if (res_sms == "staff") {
			$('#staff-input2').show();
		}
	})


	$('.student_category2').change(function () {
		$(".sms_divs2").hide();
		$('#student_category2').show();
		var res_sms = $(this).val();
		if (res_sms == 'faculty') {
			$('#sbf2').show();
		} else if (res_sms == "department") {
			$('#sbd2').show();
		} else if (res_sms == "level") {
			$('#sbl2').show();
		}
	})

	$('#res_email').change(function () {
		var res_email = $(this).val();
		if (res_email == 'students') {
			$('#oth1').show();
			$("#parents-input1,#staff-input1").hide();
		} else if (res_email == 'parents') {
			$('#parents-input1').show();
			$("#oth1,#staff-input1").hide();

		} else if (res_email == 'staff') {

			$('#staff-input1').show();
			$("#oth1,#parents-input1,#man-input1").hide();
		} else {
			$("#oth1,#parents-input1,#man-input1,staff-input1").hide();

		}
	})
</script>

<?php include("../extras/footer.php") ?>