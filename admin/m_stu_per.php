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
         <h4>Manage student</h4>
         <a href="cstudent.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Create new student</a> <a href="student_records.php" class="btn btn-info"><span class="glyphicon glyphicon-stats"></span> Student population</a> <a href="inactive_students.php" class="btn btn-warning"><span class="glyphicon glyphicon-ban-circle"></span> Inactive students</a>
         <a class="btn btn-info" href="imports.php"><span class="glyphicon glyphicon-import"></span> Import students</a>
         <a class="btn btn-info" href="student_excos.php"><span class="glyphicon glyphicon-user"></span> Student Excos</a>
       </div>
       <div class="panel-body">
        <div class="table-responsive table-box" id="record">
         <table id="student_data" class="table table-bordered table-striped" >
          <thead>
          <tr>
           <th>Admission no</th>
           <th>last name</th>
           <th>First name</th>
           <th>Class</th>
           <th>Action</th>
         </tr>
        </thead>
        <tbody>
        <?php
        $is = $_GET['class'];
        $s2  = mysqli_query($con,"SELECT * FROM students where class = '$is' ");
        while($sh2 = mysqli_fetch_array($s2)){
          $sn = $sh2['sn'];
          $admission = $sh2['admission_no'];
          $lname = $sh2['lname'];
          $fname= $sh2['fname'];
          $class = $sh2['class'];
          $username = $sh2['username'];
          $active = $sh2['active'];
          if($active == '0'){
            $dis = "none";
          }
          else{
            $dis = "";
          }
          ?>
          
          <tr>
           <td><?php echo $admission?></td>
           <td><?php echo $lname ?></td>
           <td><?php echo $fname ?></td>
           <td><?php echo $class ?></td>
           <td>
            <a href="view_student.php?is=<?php echo $username ?>" class=" btn btn-pink"><span class="glyphicon glyphicon-eye-open"></span></a>
           
            <a href="#" data-bs-toggle="modal" data-bs-target=".bs-example-modal-sms" class=" btn btn-pink proceed1" style="display: <?php echo $dis; ?>" title='render student inactive' data="<?php echo $admission ?>"><span class="glyphicon glyphicon-ban-circle"></span></a>
          </td>							
        </tr>
        
       <?php
     }
     ?>
   </tbody>
   </table>
   <!-- pagenation -->
</div>
</div>
</div>
</div>
</div>
</div>
<!-- inactive modal -->
        <div class="modal fade bs-example-modal-sms" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content" style="padding: 10px; color: #666;">
              <div class="modal-header">Render The student inactive</div>
              <p style="font-weight: bold;" > Render <?php echo $fname." ".$lname ?> inactive ?<br>
                <small>
                  Please note that this action would prevent the student from accessing the portal you can activate the student again from the list of inactive students
                </small>
              </p>
              <div class="modal-footer">
                <button class="btn btn-sm btn-danger" data-dismiss="modal">cancle</button>
                <button class="btn btn-sm btn-success proceed"  data="">proceed</button>
              </div>
            </div>
          </div>
        </div>

<?php include("footer.php") ?>
<script type="text/javascript">
          $(document).ready(function(){
           $('.proceed1').click(function(){
              var  admission1 = $(this).attr('data');
            $('.proceed').attr("data",admission1);
             $('.proceed').click(function(){
             var admission = $(this).attr("data");
             $.ajax({
               url:"inactive.php",
               method:"POST",
               data:{admission:admission,},
               success:function(data){ 
                $('.modal-content').html(data);
                setTimeout(function(){
                  window.location.reload();
                },2000);
              }
            });
           });    
         });
        })
       </script>
       <script> 
    $(document).ready(function(){
      $('#student_data').DataTable({
        "processing":true,
      }); 
    }); 
  </script> 