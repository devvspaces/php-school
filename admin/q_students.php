<?php include("conn/conn.php") ?>
<?php session_start();
error_reporting(0);
if (!isset($_SESSION['users'])) {
	header("location:..\index.php");
}
?>
<div id='contentx' class='table-responsive table-box' style='padding:6px; font-size: 11px;'>
	<?php
	if (isset($_POST['clas'])) {
		$clas = $_POST['clas'];
		$msql3 = mysqli_query($con, "SELECT * FROM calender");
		$fetch3 = mysqli_fetch_array($msql3);
		$session = $fetch3['session'];
		$term = $fetch3['current_semester'];
		if ($term == 1) {
			$tpre = "st";
		} elseif ($term == 2) {
			$tpre = "nd";
		} else {
			$tpre = "rd";
		}
		echo "
			<h4 class='text-center'>Hapa College</h4>
	<h4 style='text-align: center;'> list of cleared students in $clas $session session $term<sup>$tpre</sup> term  </h4>
	<table class='table table-bordered table-striped'>
	<tr>
	<th>SN</th>
	<th>Name</th> 
	<th>Admission number</th>
	<th>Total Fees</th>
	<th>Total Paid</th>
	<th>Balance</th>
	<th>Status</th>
	</tr>";
		$n = 0;
		$sl1 = mysqli_query($con, "SELECT * FROM  students where college = '$clas'");
		while ($sh1 = mysqli_fetch_array($sl1)) {
			$class = $sh1['college'];
			$admission  = $sh1['matric_no'];
			$name = $sh1['fname'] . " " . $sh1['lname'];
			$department = $sh1['department'];
			$n++;
			$mis = mysqli_query($con, "SELECT * FROM fees ");
			while ($fetch2 = mysqli_fetch_array($mis)) {

				$part = $fetch2['college'];
				$code = $fetch2['code'];
				$list = explode(',', $part);
				$hay = array('all', $class, $admission, $department);

				if (count(array_intersect($hay, $list)) > 0) {
					$code1 = $code;
				} else {
					$code1 = '';
				}

				$sl2 = mysqli_query($con, "SELECT SUM(amount) as ttotal FROM fees where college = 'all' || college = '$class' || college = '$department' || college = '$admission' || college like '%$class%' and session = '$session' and semester = '$term' ");
				$tsum = "";
				$num0 = mysqli_fetch_array($sl2);
				$tsum  =  $num0['ttotal'];


				$mis3 = mysqli_query($con, "SELECT SUM(amount) as tpaid FROM paid_fees where student = '$admission'AND session = '$session' AND semester = '$term' ");
				$num1 = mysqli_fetch_array($mis3);
				$tpay = $num1['tpaid'];
			}

			$balance = $tsum - $tpay
	?>
			<tr>
				<td><?php echo $n ?></td>
				<td><?php echo $name ?></td>
				<td><?php echo $admission ?></td>
				<td><?php echo number_format($tsum) ?></td>
				<td><?php echo number_format($tpay) ?></td>
				<td><?php echo number_format($balance) ?></td>
				<td><?php if ($balance > 0) {
						echo "Not Cleared";
					} else {
						echo "Cleared";
					}

					?></td>
			</tr>


		<?php
		}
		?>
		</table>
</div>
<p class="text-center"><button class="btn" onclick="generatePDF()"><span class="glyphicon glyphicon-print"></span> Print</button></p>
<?php
	}
?>