<?php
$title = "Calendar";
include("header.php");
?>


<div class="viewbox-content">
	<div class="content">
		<div class="col-sm-10 mb-5">
			<div class="content">
				<div class="report">
					<div class="panel-body">
						<h3 class="mb-4">Calendar</h3>
					</div>
					<div class="panel-body">
						<?php
						$s2 = mysqli_query($con, "SELECT * FROM  calender ");
						$sh2 = mysqli_fetch_array($s2);
						$sn = $sh2['sn'];
						$session = $sh2['session'];
						$semester = $sh2['current_semester'];
						$sstart = $sh2['s_start'];
						$sstop = $sh2['s_stop'];
						$tstart = $sh2['t_start'];
						$tstop = $sh2['t_stop'];
						$current_date = date("d-m-Y");
						?>
						<h4 class="text-center mb-4">Key Event</h4>
						<div class="table-responsive table-box">
							<table class="table table-bordered" id="data">
								<tr>
									<th>Session</th>
									<th>Session Starts</th>
									<th>Session Ends</th>
									<th>Semester</th>
									<th>Semester Starts</th>
									<th>Semester Ends</th>
									<th>Date</th>
									<th>Action</th>
								</tr>
								<tr>
									<td>
										<?php echo $session ?>
									</td>
									<td> <?php echo $sstart ?></td>
									<td>
										<?php echo $sstop ?>
									</td>
									<td><?php echo $semester ?></td>
									<td>
										<?php echo $tstart ?>
									</td>
									<td><?php echo $tstop ?></td>
									<td>
										<?php
										echo $current_date; ?>
									</td>

									<td><?php if (strtotime($tstop) <= strtotime($current_date)) {
										?>
											<br>
											<a href='ccalendar.php'
												onclick="return confirm('are you sure you want to end the Semester ?')"
												class='btn btn-primary mb-2'>Round off the Semester</a>

										<?php
									} else {
										echo "Semester in progress";
									}
									?> <a href='ecalendar.php' class='btn btn-primary'><span class="icon"><i data-feather="edit"></i></span> Edit</a>
									</td>
								</tr>
							</table>
						</div>
						<div id="opo" class="mt-5">
							<h3 class="text-center">Sheduled Event for the session</h3>
							<p class="text-right"><a href="#" data-bs-toggle="modal" data-bs-target="#bs-example-modal-sms"
									class="btn btn-pink mb-3"><span class="glyphicon glyphicon-plus"></span> Create New
									Event
								</a></p>
							<div class="table-responsive table-box">

								<table class="table table-bordered" id="data">
									<tr>
										<th>Event</th>
										<th>Date</th>
										<th>Time</th>
										<th>Venue</th>
										<th>action</th>
									</tr>
									<tbody class="load_event">

									</tbody>
								</table>
							</div>
							<p class="text-center"><button class="btn btn-pink" type="button"
									onclick="window.print()"><span class="glyphicon glyphicon-print"></span>
									Print</button></p>
							<!-- printed version-- not visible to the page-->
							<div class="" id="contentx" style="visibility: hidden; width: 95%; height: 100%;">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>Event</th>
											<th>Date</th>
											<th>Time</th>
											<th>Venue</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$show = mysqli_query($con, "SELECT * from event");
										while ($op = mysqli_fetch_array($show)) {
											$event_id = $op['sn'];
											$event = $op['event'];
											$date = $op['date'];
											$time = $op['time'];
											$venue = $op['venue'];
											echo "<tr>
											<td>$event</td>
											<td>$date</td>
											<td>$time</td>
											<td>$venue</td>";
										} ?>
									</tbody>
								</table>

							</div>
							<!-- ends here -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- modal for create -->
<div id="bs-example-modal-sms" class="modal fade bs-example-modal-sms" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content" style="padding: 10px; color: #666;">
			<div class="modal-header">
				<h5 class="text-center">Create New Event</h5>
			</div>
			<form method="post" id="add_event">
				<input type="" name="event" class="form-control" placeholder="event name" required><br>
				<input type="date" name="date" class="form-control" placeholder="date" required><br>
				<input type="time" name="time" class="form-control" placeholder="time" required><br>
				<input type="" name="venue" class="form-control" placeholder="venue" required><br>
				<p class="text-center"><button class="btn add btn-pink" type="submit"><span
							class="glyphicon glyphicon-plus"></span> Add Event</button></p>
				<div class="view_result"></div>
			</form>

		</div>
	</div>
</div>
<!-- modal for create ends -->
<!-- modal for edit event -->
<div class="modal fade bs-example-modal-sms2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content" style="padding: 10px; color: #666;">
			<div class="modal-header">
				<h5 class="text-center">Edit Event</h5>
			</div>
			<form method="post" id="add_event">
				<input type="" name="event" class="form-control" placeholder="event name" required><br>
				<input type="" name="date" class="form-control" placeholder="date" value="" required><br>
				<input type="" name="time" class="form-control" placeholder="time" value="" required><br>
				<input type="" name="venue" class="form-control" placeholder="time" value="" required><br>

				<p class="text-center"><button class="btn add" type="submit"><span
							class="glyphicon glyphicon-plus"></span> Add Event</button></p>
				<div class="view_result"></div>
			</form>

		</div>
	</div>
</div>

<script type="text/javascript">
	function load_event() {
		$.ajax({
			url: "load_event_controller.php",
			method: "POST",
			data: {
				data: "us",
			},
			success: function (data) {
				$('.load_event').html(data);
			}
		});
	}
	$(document).ready(function () {
		load_event();
	})
	$(document).ready(function () {
		$('#add_event').on("submit", function (e) {
			e.preventDefault();
			$('.add').attr("disabled", "disabled");
			$.ajax({
				url: "event_controller.php",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function (data) {
					if (data == 'error') {
						$('.view_result').html("<div class='alert alert-danger'>error</div");
						$('.add').removeAttr("disabled");
					} else {
						$('.view_result').html(data);
						$('.add').removeAttr("disabled");
						load_event();
					}
				}
			});
		});
	});
</script>

<?php include("../extras/footer.php") ?>