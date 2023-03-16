<?php
include("header.php");
include("../class.php");
?>
<div class="container-fluid main-container">
	<div class="row main">
		<div class="col-lg-12 panel-container">
			<div class="panel panel-default">
				<div class="panel-heading" id="p_heading">
					<?php
					$users = $_SESSION['users'];
					$matric_no = $auth->select14('userid', 'users', 'userid2', $users);
					$s1  = mysqli_query($con, "SELECT * FROM students where matric_no = '$matric_no'");
					$sh1 = mysqli_fetch_array($s1);
					$name1 = $sh1['lname'] . " " . $sh1['fname'] . " " . $sh1['mname'];
					$img = $sh1['picture'];
					$level = $sh1['level'];
					$admission = $sh1['matric_no'];
					$s2  = mysqli_query($con, "SELECT * FROM  calender ");
					$sh2 = mysqli_fetch_array($s2);
					$sn = $sh2['sn'];
					$return2 = $sh2['session'];
					$return1 = $sh2['current_semester'];

					?>
					<img src="<?php echo $img ?>" id="imgs" class="img-responsive" style="border:1px solid #51be78">
					<h4><?php echo $name1 ?></h4>
					<i><?php echo $level ?> level</i>
				</div>
				<div class="panel-body">
					<?php
					$sbj_id = $_GET['is'];
					$fetch_sub = mysqli_query($con, "SELECT * FROM course where code = '$sbj_id'");
					$sb = mysqli_fetch_array($fetch_sub);
					$name = $sb['title'];
					$code = $sb['code'];
					$teacher = $sb['teacher'];
					$md = mysqli_query($con, "SELECT * FROM staff where employee = '$teacher'");
					$om = mysqli_fetch_array($md);
					$teacher2 = "N/A";
					if ($auth->countall3('staff', 'employee', $teacher) > 0) {
						$teacher2 = $om['fname'] . ' ' . $om['lname'];
					}

					?>
					<div class="table-responsive table-box">
						<table class="table table-bordered table-striped">
							<tr>
								<th>Subject</th>
								<td><?php echo $name ?></td>
							</tr>
							<tr>
								<th>Code</th>
								<td><?php echo $code ?></td>
							</tr>
							<tr>
								<th>Lecturer</th>
								<td><?php echo $teacher2 ?></td>
							</tr>

						</table>
					</div>
					<h4 class="text-center"><span class="glyphicon glyphicon-time"></span> Schedule</h4><br>
					<ul class="list-group">
						<?php
						$time_che = mysqli_query($con, "SELECT * FROM time_table where subject_id = '$sbj_id'");
						while ($time_get = mysqli_fetch_array($time_che)) {
							$day = $time_get['day'];
							$period = $time_get['period'];
							$time_fetch = mysqli_query($con, "SELECT * FROM period_format where period = '$period'");
							$time_extract = mysqli_fetch_array($time_fetch);
							$sti = date('g:i a', strtotime($time_extract['start_time']));
							$eti = date('g:i a', strtotime($time_extract['end_time']));
							echo "<li class='list-group-item'>$day at $sti to $eti</li>";
						}
						?>
					</ul>

				</div>
				<div class="panel-body">
					<h4 class="text-center">WEEKLY ACTIVITIES</h4>

					<?php
					$cur = mysqli_query($con, "SELECT * FROM curriculum where course_code = '$sbj_id' and session = '$return2' and semester = '$return1' order by week asc")
					?>

					<div class="table-responsive table-box">
						<table class="table-bordered table-striped">
							<?php
							while ($cur2 = mysqli_fetch_array($cur)) {
								$topic = $cur2['topic'];
								$week = $cur2['week'];
								$description = $cur2['description'];
							?>
								<tr>
									<th style="padding: 10px;">
										<p><span class="glyphicon glyphicon-calendar"></span> WEEK <?php echo $week ?></p>
										<p><b>Topic</b>: <?php echo $topic ?> </p>
										<p style="font-weight: lighter;"><b>Description</b>:<?php echo $description ?>.</p>
									</th>
								</tr>
							<?php
							}
							?>
						</table>
					</div>
				</div>
			</div>

			<div class="panel-body">
				<h4 class="text-center">Assignment panel</h4>

				<?php
				$sel_ass = mysqli_query($con, "SELECT * FROM assignment where sbj_id = '$sbj_id' order by sn desc");
				if (mysqli_num_rows($sel_ass) == 0) {
					echo "<h5 class='text-center'>No Assignment Yet</h5>";
				} else {
				?>
					<div class="table-responsive table-box">
						<table class="table table-bordered table-striped">
							<tr>
								<th>TITLE</th>
								<th>Description</th>
								<th>Submission Deadline</th>
								<th>Attachment</th>
								<th>Action</th>
								<th>Grade</th>
							</tr>
						<?php
						while ($ass_show = mysqli_fetch_array($sel_ass)) {
							$titlex = $ass_show['title'];
							$description = $ass_show['description'];
							$deadline = $ass_show['deadline_date'];
							$file = $ass_show['file'];
							$ass_id = $ass_show['ass_id'];
							$current_date = date('Y-m-d');


							if (strtotime($deadline) <= strtotime($current_date) - 1) {
								$shom = "no more Submittion";
							} else {
								$shom =  "<button class='btn asid'data-bs-toggle='modal' data-bs-target='.bs-example-modal-sms' data='$ass_id'>Submit</button>";
							}
							$grade_sel = mysqli_query($con, "SELECT * FROM ass_sub where ass_id = '$ass_id' and student = '$admission'");
							$grd = mysqli_fetch_array($grade_sel);
							$grd2 = $grd['grade'];
							echo "<tr>
								<td>$titlex</td>
								<td>$description</td>
								<td>$deadline</td>
								<td><a class='btn' href='../staff/$file'>download</a></td>
								<td>$shom</td>
								<td>$grd2</td>
								</tr>";
						}
					}
						?>

						</table>
					</div>

			</div>
		</div>
	</div>
</div>
</div>
<div class="modal fade bs-example-modal-sms" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content" style="padding: 10px; color: #666;">
			<form id="ass_submit" method="POST" enctype="multipart/form-data">
				<div class="modal-header">Submit Assignment</div>
				<div class="input-group">
					<span class="input-group-addon" id="addon2"><span class="glyphicon glyphicon-paperclip"></span></span>
					<input type="file" name="file" class="form-control" aria-describedby="addon2" required>
				</div>
				<input type="hidden" name="sub_id" value="<?php echo $sbj_id ?>">
				<input type="hidden" name="ass_id" class="ass_id" value="">
				<div class="modal-footer">
					<button class="btn btn-sm btn-danger" data-dismiss="modal">cancel</button>
					<button class="btn btn-sm proceed" type="submit">proceed</button>

				</div>
			</form>
			<p class="result-display text-center"></p>
		</div>
	</div>
</div>
<?php include("footer.php") ?>
<script type="text/javascript" src='jquery.js'></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.asid').click(function() {
			var asid = $(this).attr('data');
			$('.ass_id').val(asid);

		})
		// fetch registered students by degree, nce or all
		$('#ass_submit').on("submit", function(e) {
			e.preventDefault();
			$('.proceed').attr("disabled", "disabled");
			$.ajax({
				url: "ass_submit_controller.php",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					if (data == 'error') {
						$('.result-display').html("<div class='alert alert-danger'>invalid file</div");
						$('.proceed').removeAttr("disabled");
					} else {

						$('.result-display').html(data);
						$('.proceed').removeAttr("disabled");
						$('#ass_submit')[0].reset();



					}
				}
			});
		});
	});
</script>
</body>

</html>