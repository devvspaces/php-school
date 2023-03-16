 <?php include("header.php") ?>
<style type="text/css">
		@media print {
		body *{ visibility: hidden; }
		#contentx *{visibility: visible;}
		#contentx {position: absolute; top: 40px; left: 30px;}
	}
	</style>
	<div class="container-fluid main-container">
		<div class="row main">
			<div class="col-lg-12 panel-container">
				<div class="panel panel-default">
					<div class="panel-heading">
					 		<table class="table  table-bordered table-striped">
					 			<tr>
					 				<th>Student</th>
					 				<th>Score</th>
					 				<th>Position</th>
					 			</tr>
						<?php 
						$users = $_SESSION['users'];
						$s1  = mysqli_query($con,"SELECT * FROM staff where username = '$users'");
						$sh1 = mysqli_fetch_array($s1);
						$name1 = $sh1['fname']." ".$sh1['lname'];
						$img = $sh1['picture'];
						$department= $sh1['department'];
						$s2  = mysqli_query($con,"SELECT * FROM  calender ");
					$sh2 = mysqli_fetch_array($s2);
					$sn = $sh2['sn'] ;
					$return2= $sh2['session'];
					$return1= $sh2['current_term'];
						if($img==""){
							$img2 = "passport/default.png";
						}
						else{
							$img2 = $img;
						}
						?>
						<img src="<?php echo $img2 ?>" id="imgs" class="img-responsive">
						<h4><?php echo $name1 ?></h4>
						<i><?php echo $department ?></i>
					</div>
					<div class="panel-body">
					        
				        <?php 
				            $id = $_GET['sbj'];
				            $class = $_GET['class'];
				            function ordinal($number) {
    $ends = array('th','st','nd','rd','th','th','th','th','th','th');
    if ((($number % 100) >= 11) && (($number%100) <= 13))
        return $number. 'th';
    else
        return $number. $ends[$number % 10];
}
//Example Usage
//echo ordinal(100);
				            $im = mysqli_query($con, "SELECT * FROM result where code = '$id' and session = '$return2' and term = '$return1'");
				            while($it = mysqli_fetch_array($im)){
				                $st = $it['student'];
				                $code = $it['code'];
				                	$msquery2 = mysqli_query($con,"SELECT * FROM result   where student = '$st' and code = '$code'    and session = '$return2' and term = '$return1' and exam_type ='CA1'  ");
								
									$sh5 = mysqli_fetch_array($msquery2);
									$admno = $sh5['student'];
									$ca1 = $sh5['score'];
									// ca2
									$msquery2 = mysqli_query($con,"SELECT * FROM result   where student = '$st' and code = '$code'   and session = '$return2' and term = '$return1' and exam_type ='CA2'  ");
								
									$sh5 = mysqli_fetch_array($msquery2);
									$admno = $sh5['student'];
									$ca2 = $sh5['score'];
									$catotal = $ca1+$ca2;
									// exam
									$msquery2 = mysqli_query($con,"SELECT * FROM result   where student = '$st' and code = '$code'  and session = '$return2' and term = '$return1' and exam_type ='ett'  ");
								
									$sh5 = mysqli_fetch_array($msquery2);
									$admno = $sh5['student'];
									$ett= $sh5['score'];
									$total1 = $ett+$catotal;
									//last term cumul

									$msquery2 = mysqli_query($con,"SELECT * FROM result   where student = '$st' and code = '$code'   and session = '$return2' and term = '$return1' and exam_type ='last'  ");
								
									$sh5 = mysqli_fetch_array($msquery2);
									$admno = $sh5['student'];
									$last= $sh5['score'];
									$total_sub  = $ca1+$ca2+$ett;
									if($last == ""){
									$total  = $total_sub;
									}
									else{
									    $total_s = $total_sub+$last;
									    
										$total = $total_s/2;
									}
									//echo $total."<br>";
				                $status_check = mysqli_query($con, "SELECT * from subject_pos where student = '$st' and code = '$code' AND code = '$id' and session = '$return2' and term  = '$return1'");
				                if(mysqli_num_rows($status_check) >0){
				                	//echo("This Record aleady exist");
				                	
				                	$update_pos= mysqli_query($con, "UPDATE subject_pos set score = '$total' where student = '$st' and session = '$return2' and term = '$return1' ");
				                }
				                else{
				                 $insert_pos = mysqli_query($con,"INSERT INTO subject_pos (student,code,class,score,session,term)VALUES ('$st','$id','$class','$total','$return2','$return1') ");
				                }
				            }
				               $rank  =  mysqli_query($con," SELECT student,score, FIND_IN_SET( score, (SELECT GROUP_CONCAT( score  ORDER BY score DESC ) FROM subject_pos   where code = '$id' and session = '$return2' and term = '$return1' and class = '$class' ) ) AS pos FROM subject_pos where code = '$id' and session = '$return2' and term = '$return1' and class = '$class'");
				               	if(!$rank){
				                 		die(mysqli_error($con));
				                 	}
				                 	
				               		while ($rank2 = mysqli_fetch_array($rank))
				               		{
				               		$rank3 = ordinal($rank2['pos']);
				               		$ml_score = $rank2['score'];
				               		$sd = $rank2['student'];
				               		?>
				              
				               			<tr>
				               				<th><?php echo $sd ?></th>
				               				<th><?php echo $ml_score ?></th>
				               				<th><?php echo $rank3 ?></th>
				               				
				               			</tr>
				               	
				               		<?php

				               		//echo$ml_score."-".$rank3."<br>";
				               	$ADD = mysqli_query($con,"UPDATE subject_pos set pos = '$rank3' where student = '$sd' and code = '$id' and session = '$return2' and term = '$return1'");
				               	//header('location:'.$_SERVER["HTTP_REFERER"]);
				               	}
				                 
				                
				        
				        ?>
				     
				       	</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include("footer.php") ?>
<script> 
    $(document).ready(function(){
      $('#class_data').DataTable(); 
    }); 
  </script> 