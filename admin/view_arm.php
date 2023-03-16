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
            <?php
              $armid = $_GET['armid'];
              $arm_query = mysqli_query($con,"SELECT * FROM class_arm where arm_id = '$armid'");
              $show = mysqli_fetch_array($arm_query);
              $class = $show['class'];
              $arm = $show['arm'];
              $show_students = mysqli_query($con,"SELECT * FROM students where arm =  '$arm' and class = '$class'");
              $num = mysqli_num_rows($show_students);
              echo "<p class='text-center'>STUDENTS in $class $arm $num students in total</p>";
            ?>
             <div class="table-responsive table-box">
              <br>
               <table id="std_arm_data" class="table table-bordered table-striped">
                <thead>
                 <tr>
                   <th>Admission no</th>
                   <th>First name</th>
                   <th>Last name</th>
                 </tr>
               </thead>
               <?php
              $armid = $_GET['armid'];
             
              while($show_it = mysqli_fetch_array($show_students)){
                $fname = $show_it['fname'];
                $lname = $show_it['lname'];
                $admin = $show_it['admission_no'];
            ?>
              <tr>
                <td><?php echo $admin ?></td>
                <td><?php echo $fname ?></td>
                <td><?php echo $lname ?></td>
              </tr>
              <?php
            }
            ?>
             </table>
                
             </div>
            </div>

          </div>
        </div>
    </div>
  </div>
  <div class="dada"></div>
  <?php include("footer.php") ?>
<script> 
    $(document).ready(function(){
      $('#std_arm_data').DataTable(); 
    }); 
  </script> 