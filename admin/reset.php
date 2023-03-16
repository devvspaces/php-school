	<?php include("header.php") ?>
	<div class="container-fluid main-container">
		<div class="row main">
			<!-- <?php include("linkpanel.php") ?> -->

			<div class="col-lg-9 panel-container">
				<div class="panel panel-default">
					<div class="panel-heading" id="p_heading">
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
						<img src="<?php echo $img2 ?>" id="imgs" class="img-responsive">
						<h4><?php echo $name1 ?></h4>
						<i><?php echo $position ?></i>
					</div>
					<div class="panel-body">
						<h4> Reset Password</h4>
					</div>
					<div class="panel-body">
						<?php
						if (isset($_POST['reset'])) {
							$is = $_GET['is'];
							$password = mysqli_real_escape_string($con, $_POST['password']);
							$password2 = md5($password);
							$sql = mysqli_query($con, "UPDATE users SET password2 = '$password2' where userid2 = '$is'");
							if (!$sql) {
								die(mysqli_error($con));
							} else {
						?>
								<div class="alert alert-success ">
									<a href="#" class="close" data-dismiss="alert">
										&times;
									</a>
									<span class="glyphicon glyphicon-ok"></span> Password has Changed to <?php echo $password; ?>
								</div>
						<?php
							}
						}
						?>
						<form method="POST">
							<input type="password" name="password" class="form-control" value="" required placeholder="enter default password here"><br>
							<p class="text-center"><button class="btn btn-primary" name="reset">Reset</button></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include("footer.php") ?>