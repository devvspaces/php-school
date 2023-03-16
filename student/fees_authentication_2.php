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
				$name1 = $sh1['fname']." ".$sh1['lname'];
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
					<i><?php echo $class ?></i>
				</div>
				<div class="panel-body">
					<h4>Pin Authentication</h4>
				</div>
				<div class="panel-body">
				<?php
				if(isset($_GET['reference'])){
				$is = $_GET['is'];
				$reference = $_GET['reference'];
				$method = "online";				
				$sql3 = mysqli_query($con,"SELECT * FROM fees where sn = '$is' ");
				$sh3 = mysqli_fetch_array($sql3);
				$date = date('d-m-y');
				$receipt = rand(1000000,1000000000);
				$q1 = $sh3['sn'];
				//$q2 = $sh3['title'];
				$q4 = $admission;
				$q5 = $_GET['amount'];
				$q6 = $sh3['title'];

				$msql3 = mysqli_query($con,"SELECT * FROM calender");
				$fetch3 = mysqli_fetch_array($msql3);
				$return2 = $fetch3['session'];
				$sql4 = mysqli_query($con,"INSERT into paid_fees (fees_id,student,receiptid,dates,amount,title,session,reference_id,method) VALUES ('$is', '$q4','$receipt','$date','$q5','$is','$return2','$reference','$method')");
				
				if(!$sql4){
					die(mysqli_error($con));
				}
				else{

				?>
					<div class="alert alert-success "> 
            <a href="#" class="close" data-dismiss="alert"> 
            &times; 
            </a> 
            			<h3 class="text-center">Payment Successful</h3>
            			<p class="text-center" style="font-size: 50px;"><span class="glyphicon glyphicon-ok-circle"></span></p>
        		<p class="text-center">your payment has been successfull with the reference no: <?php echo $reference ?> and receipt no: <?php echo $receipt?>.  You can now print print your receipt </p>

        		<p class="text-center"><a href="finance.php" class="btn btn-success btn-sm">Print Receipt</a></p>
        </div>
				<?php
				}
			}
		
				?>
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