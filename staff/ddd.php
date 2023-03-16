<?php include("conn/conn.php") ?>
<?php
echo"gg";
			
			$d = mysqli_query($con,"SELECT * FROM monster");
			if(!$d){
				die(mysqli_error($con));
			}
			$c = mysqli_num_rows($d);
			$p = 0;
			while($dd = mysqli_fetch_array($d)){
				$p ++;
				$r = $dd['matricnumber'];
				$mn = "19/00".$p;
			$e = mysqli_query($con,"UPDATE monster set matricnumber = '$mn' where matricnumber = '$r' ");
				if(!$e){
					die(mysqli_error($con));
				}

			}
			
?>
