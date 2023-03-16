<?php
$title = "Time Table";
$nav = "Time table";
include("header.php");
?>


<?php
$s2 = mysqli_query($con, "SELECT * FROM  calender ");
$sh2 = mysqli_fetch_array($s2);
$sn = $sh2['sn'];
$return2 = $sh2['session'];
$return1 = $sh2['current_semester'];
$name = $sh2['school_name'];
?>


<div class="viewbox-content">
	<div class="container-fluid main-container">
		<div class="row main">
			<div class="col-lg-12 panel-container">
				<div class="panel">
					<div class="rest">
						<div class="">
							<div id="contentx">
								<div class="text-center mb-4">
									<h4>
										<strong>
											<?php echo $name ?>
										</strong>
									</h4>
									<h4>
										Time Table For <?php echo $level . ' level ' . $return2 ?>
									</h4>
								</div>
								<div class="table-responsive table-box">
									<table class="table table-bordered table-striped">
										<tr>
											<th>Day</th>
											<th>Schedule/subject
											</th>
											<?php
											$sql_time = mysqli_query($con, "SELECT * FROM time_table where class = '$class' and arm = '$arm' Group by day order by sn asc");
											while ($get = mysqli_fetch_array($sql_time)) {
												$day = $get['day'];
												?>
											<tr>
												<th><span style="writing-mode: vertical-lr;"><?php echo substr($day, 0, 3) ?></span></th>
												<th>
													<table class="table table-bordered">
														<tr>
															<?php
															$set_time = mysqli_query($con, "SELECT * FROM time_table where class = '$class' and arm = '$arm' and day = '$day' order by period asc ");
															while ($write = mysqli_fetch_array($set_time)) {
																$period = $write['period'];
																$subject_id = $write['subject_id'];
																$time_get = mysqli_query($con, "SELECT * FROM period_format where period = '$period' and day = '$day' ");
																$time_hold = mysqli_fetch_array($time_get);
																$start_time = $time_hold['start_time'];
																$end_time = $time_hold['end_time'];

																$subget = mysqli_query($con, "SELECT * FROM subject where sn = '$subject_id' ");
																$sub_show = mysqli_fetch_array($subget);
																$sub_code = $sub_show['code'];
																$sub_rel = $sub_show['title'];
																?>
																<th><small><?php echo $period ?> <br> (<?php echo date('g:i', strtotime($start_time)) . '-' . date('g:i', strtotime($end_time)) ?>)<br></small> <small>
																		<hr>
																		<?php echo $sub_code ?>
																	</small></th>

															<?php
															}

															?>
														</tr>
													</table>
												</th>
											</tr>
											</tr>
										<?php
											}
											?>
									</table>
								</div>
							</div>
							<div class="text-center mt-4">
								<button class="btn btn-lg btn-pink" onclick="generatePDF()">
									<span class="icon">
										<i data-feather="printer"></i>
									</span>
									Print</button>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include("../extras/footer.php") ?>