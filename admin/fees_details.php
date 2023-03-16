<?php include("header.php") ?>
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

			<div class="panel-body">
				<h4 class="text-center">Fees Details</h4>
			</div>
			<div class="panel-body">
				<?php
				$fees_id = $_GET['is'];
				$my_query = mysqli_query($con, "SELECT * FROM fees where sn = '$fees_id'");
				$array = mysqli_fetch_array($my_query);
				$title = $array['title'];
				$amount = $array['amount'];
				$college = $array['college'];
				$department = $array['department'];
				$date = $array['dates'];
				?>
				<div class="table-responsive table-box">
					<table class="table table-bordered">
						<tr>
							<th>Fees Title</th>
							<td><?php echo $title ?></td>
						</tr>
						<tr>
							<th>Amount</th>
							<td><?php echo number_format($amount) ?></td>
						</tr>
						<tr>
							<th>Faculty</th>
							<td><?php echo $college ?></td>
						</tr>
						<tr>
							<th>Department</th>
							<td><?php echo $department ?></td>
						</tr>
						<tr>
							<th>Date Created</th>
							<td><?php echo $date ?></td>
						</tr>
					</table>

				</div>

			</div>
		</div>
	</div>
</div>
</div>