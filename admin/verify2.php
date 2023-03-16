<?php include("conn/conn.php") ?>
<?php session_start();
if(!isset($_SESSION['users'])){
	header("location:..\index.php");
}
?>

<h4 class="text-center">Financial Statement</h4>
<table class="table table-bordered">
	<tr>
		<th colspan="2"> FeesBreak Down </th>
		<th colspan="2">Payment History</th>
	</tr>
						<tr>
							<th>Title</th>
							<th>Amount</th>
							<th>Paid</th>
							<th>Balance</th>
						</tr>
	<?php
	

	$s2  = mysqli_query($con,"SELECT * FROM  calender ");
					$sh2 = mysqli_fetch_array($s2);
					$sn = $sh2['sn'] ;
					$return2= $sh2['session'];
					$return1= $sh2['current_term'];

	if(isset($_POST['adno'])){
		$adno = $_POST['adno'];
		$check = mysqli_query($con,"SELECT SUM(amount) AS ttotal  FROM paid_fees where student = '$adno' and session = '$return2' and term = '$return1'");
						$res = mysqli_fetch_array($check);
						$sum = $res['ttotal'];
						//echo $sum;
		$s1 = mysqli_query($con,"SELECT * FROM students where admission_no = '$adno'");
		if(!$s1){
			die(mysqli_error());
		}
		$num = mysqli_num_rows($s1);
		if($num == 0){
			die("<div class= 'alert alert-danger'>admission number does not exist</div>");
		}
		else{
			$shx = mysqli_fetch_array($s1);
			$class = $shx['class'];
			$department = $shx['department'];
			$query = mysqli_query($con,"SELECT * FROM fees");
			while($fetch2 = mysqli_fetch_array($query)){
				$part = $fetch2['participant'];
				$code = $fetch2['code'];
				$list = explode(',', $part);
				$hay = array('all',$class, $adno,$department);
				if(count(array_intersect($hay, $list))>0){
								//echo "yes";
					$code1 = $code;
				}
				else{
								//echo "no";
					$code1 = '';
				}							
				$sl2 = mysqli_query($con,"SELECT * FROM fees where code = '$code1' and term = '$return1' and session = '$return2' ");
				$no = mysqli_num_rows($sl2);
					while($sh1 = mysqli_fetch_array($sl2)){
						$sn  = $sh1['sn'];
						$title = $sh1['title'];
						$amount = $sh1['amount'];
						$total += $amount;
						?>
						<tr>
							<th><?php echo $title ?></th>
							<th><?php echo number_format($amount) ?></th>
						</tr>

						<?php
					}
			}
			?>
				<tr>
					<th>Total</th>
					<th><?php echo number_format($total) ?></th>
					<th><?php echo number_format($sum) ?></th>
					<th><?php echo number_format($total-$sum) ?></th>
				</tr>
			</table>
			<?php
		}
	}
	?>