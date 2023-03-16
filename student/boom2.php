<?php include("conn/conn.php") ?>
<?php
$sqlvv1 = mysqli_query($con,"SELECT * FROM pin");
while ($sqlvv = mysqli_fetch_array($sqlvv1)) {
	$pin = $sqlvv['pin'];
	$sql = mysqli_query($con,"SELECT * FROM pin where pin = '$pin'");
$sql2 = mysqli_num_rows($sql);
				$sql5 = mysqli_fetch_array($sql);
				$sql6 = $sql5['status'];
				$sql17 = $sql5['admission'];
				$sql8 = $sql5['fees_id'];
				if($sql2==0){
					echo "this pin does not exist";
				}
				elseif ($sql6==1) {
					echo "this pin has already been used";
				}
				
				else{
					$sl2 = mysqli_query($con,"UPDATE pin set status = '1' where pin = '$pin' ");
				
				$sql3 = mysqli_query($con,"SELECT * FROM fees where sn = '$sql8' ");
				$sh3 = mysqli_fetch_array($sql3);
				$date = date('d-m-y');
				$receipt = rand(1000000,1000000000);
				$q1 = $sh3['sn'];
				//$q2 = $sh3['title'];
				$q4 = $sql17;
				$q5 = $sh3['amount'];
				$q6 = $sh3['title'];
				$msql3 = mysqli_query($con,"SELECT * FROM calender");
				$fetch3 = mysqli_fetch_array($msql3);
				$session = $fetch3['session'];
				$term = $fetch3['current_term'];
				$sql4 = mysqli_query($con,"INSERT into paid_fees (fees_id,student,receiptid,dates,amount,title,session,term) VALUES ('$sql8', '$q4','$receipt','$date','$q5','$q6','$session','$term')");
				
				if(!$sql4){
					die(mysqli_error($con));
				}
				else{

				?>
					<div class="alert alert-success "> 
            <a href="#" class="close" data-dismiss="alert"> 
            &times; 
            </a> 
        payment made successfully you can print your receipt
        </div>
				<?php
			}
				}
		}
		
				?>
}

?>

