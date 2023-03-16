<?php include("conn/conn.php") ?>
<?php session_start();
if(!isset($_SESSION['users'])){
	header("location:..\index.php");
}
error_reporting(0)
?>
<!DOCTYPE html>
<html>
<head>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css.css">
	<meta name="viewport" content="width=device-width, initial- scale=1.0">
	<title>student portal</title>
	<style type="text/css">
	#stamp{
		background:linear-gradient(to left, transparent 50%, rgba());
		background-size:2px 4px, 4px 2px;
		text-shadow: 0 0 2px #03f;
		box-shadow: 0 0 2px #03f;
		padding: 5px;
		border:4px solid #03f;
		display: inline-block;
		color: #03f;
		text-transform: uppercase;
		font-weight: bolder;
		font-size: 25px;
		mix-blend-mode:hard-light;
		transform: rotate(-5deg);
		letter-spacing: 7px;
	}
</style>
</head>
<body>
	<?php include("header.php") ?>
	<div class="container-fluid main-container">
		<div class="row main">
			<div class="col-lg-12 panel-container">
				<div class="panel panel-default">
					<div class="panel-heading" id="p_heading">
						<?php 
						$users = $_SESSION['users'];
						$s1  = mysqli_query($con,"SELECT * FROM students where username = '$users'");
						$sh1 = mysqli_fetch_array($s1);
						$name1 = $sh1['fname']." ".$sh1['lname'];
						$img = $sh1['picture'];
						$class = $sh1['class'];
						$admission = $sh1['admission_no'];
						?>
						<img src="<?php echo $img ?>" id="imgs" class="img-responsive">
						<h4><?php echo $name1 ?></h4>
						<i><?php echo $class ?></i>
					</div>
					<div class="panel-body">
						<?php $result = mysqli_query($con,"SELECT * FROM calender ");
					$result2 = mysqli_fetch_array($result);
					$return1 = $result2['current_term'];
					$return2 = $result2['session'];
					if($return1 == 1){
						$not = "";
					}
					elseif ($return1==2) {
						$not = "<select class='form-control' name='others' id='others'>
						<option value=''>View past results</option>
						<option value='1'>1</option>
						</select> <br>";
					}
					else{
						$not = "<select class='form-control' name='others' id='others'>
						<option value=''>View past results</option>
						<option value='1'>1</option>
						<option value='2'>2</option>
						</select> <br>";
					}
					?>
						<div class="panel-2"></div>
						<div class="table-responsive table-box panel-1">

							<div style="border:1px solid #d7d7d7; border-radius: 4px; padding: 5px;" id="contentx">
								<div id="editor"></div>
								<div class="row">
									<div class="col-lg-1"><img src="logo.png" style="width: 90px; height: 90px;"></div>

									<div class="col-lg-10"><h4 class="text-center" style="font-weight: bold;">ELYON COLLEGE</h4><p style="text-align: center; font-weight: bold;">Report Sheet</p></div>
								</div>
								<br>
								<table class=" table table-bordered table-striped">
									<tr>
										<th>Name</th>
										<th>Class</th>
										<th>Admission no</th>
										<th>Term</th>
										<th>Session</th>
									</tr>
									<tr>
										<td><?php echo $name1 ?></td>
										<td><?php echo $class ?></td>
										<td><?php echo $admission ?></td>
										<td><?php echo $return1 ?></td>
										<td><?php echo $return2 ?></td>
									</tr>
								</table>
								<?php echo $not ?>	
								<?php
								$sql1 = mysqli_query($con,"SELECT * FROM result_access");
								$sql2 = mysqli_fetch_array($sql1);
								$status = $sql2['status'];
								if($status==0){
									echo"<p class='alert alert-danger'>result computation in progess ...</p>";
								}
								else{
									?>
									<table class="table table-bordered table-striped">
										<tr>
											<th>subject</th>
											<th>C.A.T 1</th>
											<th>C.A.T 2</th>
											<th>C.A.T 3</th>
											<th>C.A.T total</th>
											<th>ETT</th>
											<th>Total 1</th>
											<th>last term cul</th>
											<th>total cul</th>
											<th>grade</th>
										</tr>
										<?php
										$ich = substr($class,0,3);
										$uman = $_SESSION['users2'];
										$run2 = mysqli_query($con,"SELECT * FROM result where student = '$uman' ");
										while($result2 = mysqli_fetch_array($run2)){
											$subject = $result2['subject'];
											$score = $result2['score'];
											$score2 = $result2['score2'];
											$score3 = $result2['score3'];
											$total1 = $score+$score2+$score3;
											$score4 = $result2['score4'];
											$last = $result2['last'];
											$total3 = $total1+$score4;
											if($last == ""){
												$total2 = $total3 ;
											}
											else{
												$total2 = ceil(($total3+$last)/2);
											}
											if($ich == "SSS"){
											if($total2 >= 75){
												$grade = "A1";
											}
											elseif($total2 >=70){
												$grade = "B2";
											}
											elseif ($total2 >=65) {
												$grade = "B3";
											}
											elseif ($total2 >=60) {
												$grade = "C4";
											}
											elseif ($total2 >=55) {
												$grade = "C5";
											}
											elseif ($total2 >=50) {
												$grade = "C6";
											}
											elseif ($total2 >=45) {
												$grade = "D7";
											}
											elseif ($total2 >=40) {
												$grade = "E8";
											}
											else {
												$grade = "F9";
											}
										}
										else{
											if($total2 >= 70){
													$grade = "A";
												}
												elseif($total2 >=50){
													$grade = "C";
												}
												elseif ($total2 >=40) {
													$grade = "P";
												}
												else {
													$grade = "F";
												}
										}
											if($score<8){
												$color = "#f30";
											}
											else{
												$color = "#03f";
											}
											if($score2<8){
												$color5 = "#f30";
											}
											else{
												$color5 = "#03f";
											}
											if($score3<5){
												$color1 = "#f30";
											}
											else{
												$color1 = "#03f";
											}
											if($total1<20){
												$color2 = "#f30";
											}
											else{
												$color2 = "#03f";
											}
											if($score4<30){
												$color3 = "#f30";
											}
											else{
												$color3 = "#03f";
											}
											if($total2<50){
												$color4 = "#f30";
											}
											else{
												$color4 = "#03f";
											}
											?>
											<tr>
												<td><?php echo $subject ?></td>
												<td style="color: <?php echo $color ?>"><?php echo $score ?></td>
												<td style="color: <?php echo $color5 ?>"><?php echo $score2 ?></td>
												<td style="color: <?php echo $color1 ?>"><?php echo $score3 ?></td>
												<td style="color: <?php echo $color2 ?>"><?php echo $total1 ?></td>
												<td style="color: <?php echo $color3 ?>"><?php echo $score4 ?></td>
												<td style="color: <?php echo $color4 ?>"><?php echo $total3 ?></td>
												<td style="color: <?php echo $color4 ?>"><?php echo $last ?></td>
												<td style="color: <?php echo $color4 ?>"><?php echo $total2 ?></td>
												<td style="color: <?php echo $color4 ?>"><?php echo $grade ?></td>

											</tr>
											<?php
										}
										?>
									</table>
								</div>
								<?php 
								$xs = mysqli_query($con,"SELECT * From status where student = '$admission' ");
								$it = mysqli_num_rows($xs);
								if($it == 0){
									echo "";
								}
								else{
									$ir = mysqli_fetch_array($xs);
									$stats = $ir['status'];
									echo "<h4 class='' id='stamp'>$stats</h4>";
								}
								?>
								<p class="text-center"><br><button class="btn btn-info" id="cmd" >save as pdf</button></p>
								<?php
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include("footer.php") ?>
	<script type="text/javascript" src='jquery.js'></script>
	<script src="bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="html2canvas.js"></script>
	<script type="text/javascript" src="jspdf.debug.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#others"). change(function(){
				var change = $("#others").val();
				$('.panel-1').hide();
				$.ajax({
					method:"POST",
					url:"other.php",
					data:{change:change,},
					success:function(data){
						$('.panel-2').html(data);
					}
				})
			})
		})
	</script>
	<script type="text/javascript">
		var doc = new jsPDF();
		var specialElementHandlers = {
			'#editor': function (element, renderer) {
				return true;
			}
		};

		$('#cmd').click(function () {
			doc.addHTML($('#contentx').html(), 15, 15, {
				'width': 170,
				'elementHandlers': specialElementHandlers
			});
			doc.save('sample-file.pdf');
		});

	</script>
</body>
</html>