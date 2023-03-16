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

           <?php 
              if(isset($_GET['class_id'])){
                $class_id = $_GET['class_id'];
                //echo $class_id;
              }
              $class_id = $_GET['class_id'];
                $fetch1 = mysqli_query($con,"SELECT * FROM class where sn = '$class_id' ");
              $fetch2 = mysqli_fetch_array($fetch1);
              $class = $fetch2['class'];
              ?>
          <div class="panel-body">
            <?php echo "<h4>Manage arm for $class</h4>"; ?>
              <a href="carm.php?class_id=<?php echo $class_id ?>&&class=<?php echo $class?>" class="btn btn-pink">Create Arm</a>
             <div class="table-responsive table-box">
              <br>
               <table class="table table-bordered" id="data">
                <thead>
                 <tr>
                   <th>Arm</th>
                   <th>Class Teacher</th>
                   <th>Action</th>
                 </tr>
               </thead>
               <tbody>
                 <?php
                  $select_arm = mysqli_query($con, "SELECT * FROM class_arm where class_id = '$class_id'");
                  while($arm_display = mysqli_fetch_array($select_arm)){
                    $armid = $arm_display['arm_id'];
                    $arm = $arm_display['arm'];
                    $teacher = $arm_display['teacher'];
                    $show_t_n = mysqli_query($con, "SELECT * FROM staff where employee = '$teacher'");
                    $show_it = mysqli_fetch_array($show_t_n);
                    $t_name = $show_it['fname'].' '.$show_it['lname'];                    
                  echo "<tr><td>$arm</td>
                  <td>$t_name ($teacher)</td>
                  <td><a href='edit_arm.php?armid=$armid' class='btn btn-primary'><span class='glyphicon glyphicon-pencil'></span> Edit</a> <a href='view_arm.php?armid=$armid' class='btn btn-primary'><span class='glyphicon glyphicon-eye-open'></span> View students</a> </td>
                  <tr>";
                }
                 ?>
               
               </tbody>
               </table>
             </div>
            </div>

          </div>
        </div>
    </div>
  </div>
  <div class="dada"></div>
  <?php include("footer.php") ?>
