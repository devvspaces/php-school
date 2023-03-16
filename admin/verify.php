<?php include("header.php") ?>
	<div class="content">
			<div class="col-sm-10 mb-5">
				<div class="content">
					<div id="p_heading">
						<?php 
					$users = $_SESSION['users'];
					$s1  = mysqli_query($con,"SELECT * FROM admin where username = '$users'");
					$sh1 = mysqli_fetch_array($s1);
					$name1 = $sh1['fname']." ".$sh1['lname'];
					$img = $sh1['picture'];
					$position = $sh1['position'];
					if($img==""){
						$img2 = "passport/default.png";
					}
					else{
						$img2 = $img;
					}
					?>
					 	<?php include("nav.php") ?>
					</div>
				<div class="panel-body">
					<h4>Create Pin</h4>
						<a href="cfee.php" class="btn btn-pink"><span class="glyphicon glyphicon-plus"></span> Create New fee</a> <a href="verify.php" class="btn btn-pink active">Assign Payment</a> <a href="view_pin.php" class="btn btn-pink">Financial Statement</a> <a href="cleared_students.php" class="btn btn-pink">Cleared students</a>
					<a href="v_p_f.php" class="btn btn-pink">Paid Fees</a>

				</div>
				<div class="panel-body">
					<?php
					$s2  = mysqli_query($con,"SELECT * FROM  calender ");
					$sh2 = mysqli_fetch_array($s2);
					$sn = $sh2['sn'] ;
					$return2= $sh2['session'];
					$return1= $sh2['current_term'];
					if(isset($_POST['verify'])){
						$date = date('d-m-y');
						$date2 = date('dmy');
						$time = date('hi');
						$adno = mysqli_real_escape_string($con,$_POST['adno']);
						$amount = mysqli_real_escape_string($con,$_POST['amount']);
						$title = mysqli_real_escape_string($con,$_POST['title']);
						$pin = "999".rand(1000,5000)."$date2"."$time";
						$receipt_id = uniqid();
						$ins =mysqli_query($con,"INSERT into paid_fees(student,amount,session,term,receiptid,reference_id,method,dates,title)VALUES('$adno','$amount','$return2','$return1','$receipt_id','$pin','manual','$date','$title')");
						if(!$ins){
							die(mysqli_error($con));
						}
						else{
							?>
							<div class="alert alert-success "> 
								<a href="#" class="close" data-dismiss="alert"> 
									&times; 
								</a> 
								Fees has been Assigned Successfully
							</div>
							<?php
						}
					}
					?>
					<div class="form-group">
						<form method="POST">
							<input type="" name="adno" id="adno" placeholder="enter student admission no" class="form-control" required><br>
							<input type="" name="amount" id="teller" placeholder="Enter Amount being Paid" class="form-control" required><br>
							<small>note: the amount should not include comma eg not  <strike>50,000</strike> but 50000 </small><br><br>
							<input type="" name="title" id="teller" placeholder="Title of Fee" class="form-control" required><br>
							<div id="option">
								
							</div>

							<p class="text-center"><button class="btn btn-pink" name="verify">Assign Payment</button></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include("footer.php") ?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#adno').change(function(event){
			var adno = $("#adno").val();
			$.ajax({
				url:"verify2.php",
				method:"POST",
				data:{adno:adno},
				success:function(data){
					$('#option').html(data);
				}
			});
		});    
	});
</script>
</body>
</html>