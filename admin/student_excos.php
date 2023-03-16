<?php
error_reporting(0);
$title = "Student Executives";
include("header.php");
?>
<div class="viewbox-content">
	<div class="content">
		<div class="col-sm-10 mb-5">
			<div class="content">
				<div class="report">
					<div class="panel-body">
						<a href="cstudent.php" class="btn btn-pink mb-2">
							<span class="icon">
								<i data-feather="plus"></i>
							</span>
							Create new student
						</a>
						<a href="student_records.php" class="btn btn-pink mb-2">
							<span class="icon">
								<i data-feather="bar-chart-2"></i>
							</span>
							Student population
						</a>
						<a href="inactive_students.php" class="btn btn-pink mb-2">
							<span class="icon">
								<i data-feather="slash"></i>
							</span>
							Inactive students
						</a>
						<a class="btn btn-pink mb-2" href="imports.php">
							<span class="icon">
								<i data-feather="upload"></i>
							</span>
							Import students
						</a>
					</div>
					<div class="panel-body">
						<table class="table table-bordered table-striped" id="data">
							<tr>
								<th>SN</th>
								<th>Post</th>
								<th>Desc</th>
								<th>Holder</th>
								<th>Action</th>
							</tr>

							<?php
							$serial = 0;
							$exco = mysqli_query($con, "SELECT * FROM student_post");
							while ($exco_show = mysqli_fetch_array($exco)) {
								$post = $exco_show['post'];
								$des = $exco_show['job_description'];
								$holder = $exco_show['holder'];
								$sn = $exco_show['sn'];
								$query2 = mysqli_query($con, "SELECT * FROM students where matric_no = '$holder'");
								$fetch2 = mysqli_fetch_array($query2);
								$sname = $fetch2['lname'] . " " . $fetch2['fname'];
								$serial++;
								?>
								<tr>
									<td><?php echo $serial ?></td>
									<td>
										<?php echo $post ?>
									</td>
									<td><?php echo $des ?></td>
									<td>
										<?php echo $sname ?>
									</td>
									<td> <select class="form-control change" required data="<?php echo $sn ?>">
											<option value="">Select Post Holder</option>
											<?php
											$std = mysqli_query($con, "SELECT * FROM students");
											while ($std_show = mysqli_fetch_array($std)) {
												$studentid = $std_show['matric_no'];
												$name = $std_show['fname'] . " " . $std_show['lname'];
												echo "<option value='$studentid'>$name</option>";
											}
											?>

										</select>
									</td>
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

<script type="text/javascript">
	$(document).ready(function () {
		$('.change').change(function () {
			var post = $(this).attr("data");
			var holder = $(this).val();
			$.ajax({
				url: "exco_controller.php",
				method: "POST",
				data: {
					holder: holder,
					post: post
				},
				success: function (data) {
					if (data == "error") {
						alert("This Student  is already a  post holder");
						$('.change').val();
					} else {
						$('.dada').html(data);

						window.location.reload();
					}
				}
			});
		});
	})
</script>

<?php include("../extras/footer.php") ?>