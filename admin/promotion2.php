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
					<h4>Promotion exercise</h4>
				<div class="table-responsive table-box">
				<table class="table table-bordered" style="color: #000;">
					<tr>
						<td>Admission no</td>
						<td>Status</td>
					</tr>
					<?php
					$clas = $_GET['clas'];
					$s2  = mysqli_query($con,"SELECT * FROM students  where class = '$clas' ");
					if(mysqli_num_rows($s2) == 0){
						echo "no record found";
					}
					else{
						while($sh2 = mysqli_fetch_array($s2)){
							$admission = $sh2['admission_no'];
							$class = $sh2['class'];
							$username = $sh2['username'];
							?>

							<tr>
								<td><?php echo $admission?></td>
							<td>
								<?php 
								$query = mysqli_query($con,"SELECT * from status where student = '$admission'");
								$query2 = mysqli_fetch_array($query);
								$current = $query2['status'];
								$query3 = mysqli_num_rows($query);
									echo $current; 
								}	
								
								?>
							</tr>

							<?php
						}
					?>
				</table>
				<div class="thumbnail">
					<h4 class="text-center">Summary</h4>
				<p class="text-center" style=""><?php 
					$for_good = mysqli_query($con,"SELECT * from status where class ='$clas' and status = 'promoted' ");
									echo $no_pro = mysqli_num_rows($for_good)." Students Promoted while ";	
									$for_bad = mysqli_query($con,"SELECT * from status where class = '$clas' and status = 'to repeat' ");
									echo $no_rep = mysqli_num_rows($for_bad)." students  are to repeat";	
				?></p>
			</div>
			</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include("footer.php") ?>
<script type="text/javascript" src='jquery.js'></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".promote").click(function(){
			var student = $(this).attr("data");
			var stats  = "promoted";
			var clas = "<?php echo $class ?>"; 
			$.ajax({
				method:"POST",
				url:"promote3.php",
				data:{student:student,clas:clas,stats:stats},
				context:this,
				dataType:'html',
				success:function(data){
					//alert(data);
					$(this).hide();
					$(this).siblings('.repeat').hide();
					$(this).siblings('.status').html(data);

				}
			});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".repeat").click(function(){
			var student = $(this).attr("data");
			var stats  = "to repeat";
			var clas = "<?php echo $class ?>"; 
			$.ajax({
				method:"POST",
				url:"promote3.php",
				data:{student:student,clas:clas,stats:stats},
				context:this,
				dataType:'html',
				success:function(data){
					//alert(data);
					$(this).hide();
					$(this).siblings('.promote').hide();
					$(this).siblings('.status').html(data);

				}
			});
		});
	});
</script>
</body>
</html>
