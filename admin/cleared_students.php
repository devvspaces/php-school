<?php
$title = "Cleared Students";
include("header.php");
?>

<div class="viewbox-content">
	<div class="content">
		<div class="col-sm-10 mb-5">
			<div class="content">

				<div class="report">
					<div class="panel-body shift">
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
						<a href="v_p_f.php" class="btn btn-pink">
							<span class="icon">
								<i data-feather="credit-card"></i>
							</span>
							Paid Fees
						</a>
					</div>
					<div class="panel-body">
						<div class="form-group col-lg-4">
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
						</div>
						<div class="form-group col-lg-4">
							<label>Department</label>
							<select name="department" class="form-control department" required id="clas">
								<option class="">Select Faculty First</option>
							</select>
							<br>
						</div>
						<div class="form-group col-lg-4">
							<label>Level</label>
							<select class="form-control">
								<option value="">Select Level</option>
								<option value="100">100</option>
								<option value="200">200</option>
								<option value="300">300</option>
								<option value="400">400</option>
								<option value="500">500</option>


							</select>
						</div>
						<div class="col-lg-12">
							<p class="text-center"><button class="btn btn-pink">Submit</button></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

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
	$(document).ready(function () {
		$('#clas').change(function () {
			var clas = $("#clas").val();
			$.ajax({
				url: "q_students.php",
				method: "POST",
				data: {
					clas: clas,
				},
				success: function (data) {
					$('#content-x').html(data);
				}
			});
		});
	});
</script>
<?php include("../extras/footer.php") ?>