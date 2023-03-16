<?php include("conn/conn.php") ?>
<?php/*
$fetch = $_GET['is'];
				$g1 = mysql_query("SELECT * FROM subject where sn = '$fetch'");
				$li1 = mysql_fetch_array($g1);
				$partx = $li1['participant'];
$live1 = mysql_query("SELECT * FROM students where class = '$partx'");
				while($ans = mysql_fetch_array($live1)){
					$xy = rand(15,60);
					$student = $ans['admission_no'];
				$run2 = mysql_query("UPDATE result set score4 = '$xy' where student = '$student' ");
			}
*/

			echo"gg";
			
			$d = mysqli_query("SELECT * FROM monster");
			if(!$d){
				die(mysqli_error($con))
			}
			$c = mysqli_num_rows($d);
			for ($i=0; $i < $c ; $i++) { 
				$mn = "19/00".$i;
				$e = mysqli_query("UPDATE monster set matricnumber = '$mn' ");
				if(!$e){
					die(mysqli_error($con));
				}
			}
			?>