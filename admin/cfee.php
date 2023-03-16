<?php
$title = "Create new fee";
include("header.php");
?>
<div class="viewbox-content">
	<div class="content">
		<div class="col-sm-10 mb-5">
			<div class="content">
				<div class="report">
					<div class="panel-body">
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
						<?php
						if (isset($_POST['create'])) {
							$cal = mysqli_query($con, "SELECT * FROM  calender ");
							$sh2 = mysqli_fetch_array($cal);
							$return2 = $sh2['session'];
							$return1 = $sh2['current_semester'];
							$snx = md5(uniqid());
							$title = mysqli_real_escape_string($con, $_POST['title']);
							$title2 = mysqli_real_escape_string($con, $_POST['title2']);
							if ($title == 'others') {
								$ftitle = $title2;
							} else {
								$ftitle = $title;
							}
							$amount = mysqli_real_escape_string($con, $_POST['amount']);
							$amount2 = number_format($amount, 2);
							$level = mysqli_real_escape_string($con, $_POST['level']);
							$college = $_POST['college'];
							$department = $_POST['department'];
							$date = date("d-m-y");
							$sql = mysqli_query($con, "INSERT INTO fees(sn,title,amount,level,dates,session,college,department)VALUES('$snx','$ftitle','$amount','$level','$date','$return2','$college','$department')");
							if (!$sql) {
								die(mysqli_error($con));
							} else {
								$details = "$users cretaed a fee of $amount2 with title $title";
								$auth->Log($users, 'admin', 'create_fee', $details);
								?>
								<div class="alert alert-success ">
									<a href="#" class="close" data-dismiss="alert">
										&times;
									</a>
									Fees has been added successfully
								</div>
							<?php
							}
						}
						?>
						<form method="POST">
							<select name="title" class="form-control title1" required>
								<option value="">Select fees title</option>
								<option value="Tuition Fee">Tuition Fees</option>
								<option value="DEV.FUND">DEV.FUND</option>
								<option value="P.T.A Level">P.T.A Level</option>
								<option value="ICT">ICT</option>
								<option value="uniform">Uniform</option>
								<option value="Sport">Sport Fees</option>
								<option value="Result">Result Fees</option>
								<option value="Damages">Damages</option>
								<option value="Lesson">Lesson</option>
								<option value="Labouratory Fee">Labouratory Fee</option>
								<option value="Bus Fee Full">Bus Fee Full</option>
								<option value="Bus Fee Half">Bus Fee Half</option>
								<option value="others" class="others">others</option>
							</select><br>
							<div style="display: none;" class="title2"><input type="" name="title2" class="form-control"
									placeholder="title"><br></div>
							<input type="" name="amount" class="form-control" placeholder="amount" required>
							<small>note: the amount should not include comma eg not <strike>50,000</strike> but 50000
							</small><br><br>
							<label>Faculty</label>
							<select class="form-control college" name="college" required>
								<option class="">Select Faculty</option>
								<?php
								$get_colleges = mysqli_query($con, "SELECT * FROM college");
								while ($show_college = mysqli_fetch_array($get_colleges)) {
									$college = $show_college['college_name'];
									$college_code = $show_college['college_code'];

									echo "<option value='$college_code'>$college</option>";
								}

								?>
							</select><br>
							<label>Select Department</label>
							<select name="department" class="form-control department" required>
								<option class="">Select College First</option>
							</select>
							<br>
							<label>Level</label>
							<select class="form-control" name="level" required>
								<option value="">Level</option>
								<option value="100">100</option>
								<option value="200">200</option>
								<option value="300">300</option>
								<option value="400">400</option>
								<option value="500">500</option>
							</select>
							<br>
							<div class="form-group">
								<p class="text-center"><button class="btn btn-pink" name="create">Create</button></p>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="multi/multi.js"></script>
<script type="text/javascript">
	$(function () {
		$('.multiselect-ui').multiselect({
			includeSelectAllOption: true,
			enableFiltering: true,
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function () {
		$(".college").change(function () {
			var college = $(".college").val();
			$.ajax({
				method: "POST",
				url: "ajaxData.php",
				data: {
					college: college
				},
				success: function (data) {
					$('.department').html(data);
				}
			})
		})
	})
</script>

<script type="text/javascript">
	$('.title1').change(function () {
		var title1 = $('.title1').val();
		if (title1 == 'others') {
			$('.title2').show();
		} else {
			$('.title2').hide();
		}
	})
</script>
<?php include("../extras/footer.php") ?>