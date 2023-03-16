<?php
$title = "Registered Courses";
$nav = "Courses";
include("header.php");
?>
<div class="viewbox-content">
	<div class="container-fluid main-container">
		<div class="row main">
			<div class="col-lg-12 panel-container">
				<div class="panel">
					<div class="rest">
						<div class="">
							<div class="panel-body">
								<ul class="list-group">
									<li class="list-group-item">
										<h4></span>Registered Courses</h4>
									</li>
									<?php
									$serial = 0;
									$el_show = mysqli_query($con, "SELECT * FROM course_registration where matric_no = '$matric_no' and session = '$return2' and semester = '$return1' ");
									if (!$el_show) {
										die(mysqli_error($con));
									}
									while ($el_show2 = mysqli_fetch_array($el_show)) {
										$serial++;
										$unit = $el_show2['unit'];
										$x = 'unit';
										if ($unit > 1) {
											$x = 'units';
										}
										$course_code = $el_show2['course_code'];
										$name = $auth->select14('title', 'course', 'code', $course_code);
										echo "<a class='list-group-item' href = 'view_subject.php?is=$course_code' style='color:#5a738e;' ><h5>$serial. $name ($unit $x) </h5> </a>  ";
									}
									?>
								</ul>

							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="pop"></div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		$(".btn-select").click(function () {
			var subject_id = $(this).attr("data");
			var student = "<?php echo $admission ?>";
			$(this).attr("disabled");
			$.ajax({
				method: "POST",
				url: "register.php",
				data: {
					subject_id: subject_id,
					student: student
				},
				success: function (data) {
					window.location.reload();
				}
			})
		})
	})
</script>
<script type="text/javascript">
	$(document).ready(function () {
		$(".btn-remove").click(function () {
			var sbjid = $(this).attr("data");
			var student = "<?php echo $admission ?>";
			$.ajax({
				method: "POST",
				url: "del_register.php",
				data: {
					sbjid: sbjid,
					student: student
				},
				success: function (data) {
					alert(data);
					//window.location.reload();
				}
			})
		})
	})
</script>
<?php include("../extras/footer.php") ?>