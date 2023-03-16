<?php
$title = "Home";
include("header.php");
?>

<div class="viewbox-content">
	<div class="container-fluid main-container">
		<div class="row main">
			<div class="col-md-10 panel-container">
				<div class="panel">
					<div class="panel-heading panele" id="p_heading">
						<div class="ig-area">
							<img src="<?php echo $img1 ?>" id="imgs" class="img-responsive dp" width="100px">
							<h4>
								<?php echo $name1 ?>
							</h4>
							<i><?php echo $department ?></i>
						</div>
					</div>
					<div class="rest">
						<div class="mb-3">
							<h4>
								<span class="icon">
									<i data-feather="bell"></i>
								</span>
								General Anouncement
							</h4>
						</div>
						<div class="table-box">
							<table class="table">
								<?php
								$sl14 = mysqli_query($con, "SELECT * from anoucement where viewers = 'all' or  viewers = 'staff' limit 5 ");
								while ($sh19 = mysqli_fetch_array($sl14)) {
									$title19 = $sh19['title'];
									$content19 = $sh19['content'];
									?>
									<tr>
										<td>
											<?php echo $title19 ?>
										</td>
										<td>
											<?php echo $content19 ?>
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
</div>

<?php include("../extras/footer.php") ?>