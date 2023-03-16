	<?php
			$is = $_GET['amount'];
			if(isset($_POST['proceed'])){
				$method = $_POST['method'];
				if($method == "pin"){
					header("location:fees_authentication.php?amount=$is");
				}
				else{
				    header("location:card_payment.php?amount=$is");

				}
			}

			?>
	<?php include("header.php"); ?>
	<div class="container-fluid main-container">
		<div class="row main">
			<div class="col-lg-12 panel-container">
			<div class="panel panel-default">
				<div class="panel-heading" id="P_heading">
					<?php 
				$users = $_SESSION['users'];
				$s1  = mysqli_query($con,"SELECT * FROM students where username = '$users'");
				$sh1 = mysqli_fetch_array($s1);
				$name1 = $sh1['lname']." ".$sh1['fname']." ".$sh1['mname'];
				$img = $sh1['picture'];
				$level = $sh1['level'];
				$admission = $sh1['matric_no'];
				if($img==""){
					$img2="passport/default.png";
				}
				else{
					$img2 = $img;
				}
				?>
					<img src="<?php echo $img2 ?>" id="imgs" class="img-responsive">
					<h4><?php echo $name1 ?></h4>
					<i><?php echo $level ?></i>
				</div>
				<div class="panel-body">
					<h4>Select payment option</h4>
					<br>
					<form method="POST" action="">
				<ul class="list-group">
					<li class="list-group-item">
				<p>Manual Payment <input type="radio" name="method" value="pin"></p>
			</li>
			<li class="list-group-item">
				<p>Online Payment <input type="radio" name="method" value="card"> <i class="fa fa-cc-mastercard"></i> </p>
			</li>
		</ul>
				<p class="text-center"><button type="submit" name="proceed" class="btn btn-pink">PROCEED</button></p>
			</form>
				</div>
			</div>
			</div>
		</div>
	</div>
	<?php include("footer.php") ?>
<script type="text/javascript" src='jquery.js'></script>
<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>