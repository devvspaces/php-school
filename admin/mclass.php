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
            <h4>Manage Class</h4>
             <a href="create_class.php" class="btn btn-pink">Create Class</a>
           </div>
                     <div class="panel-body">

            <div class="table-responsive table-box">
              <br>
              <table id="class_data" class="table table-striped table-bordered">
                <thead>
                <tr>
                  <th>Class</th>
                  <th>Coordinator</th>
                  <th>Action</th>
                  <th>Arm </th>
                </tr>
              </thead>
              <tbody>
                <?php
                $query1 = mysqli_query($con,"SELECT * FROM class order by sn asc");
                while($fetch1 = mysqli_fetch_array($query1)){
                  $class  = $fetch1['class'];
                  $class_id = $fetch1['sn'];
                  $coordinator = $fetch1['coordinator'];
                  $query2 = mysqli_query($con,"SELECT * FROM staff where employee = '$coordinator'");
                  $fetch2 = mysqli_fetch_array($query2);
                  $name = $fetch2['lname']." ".$fetch2['fname'];
                  echo "<tr>
                  <td>$class</td>
                  <td>$name</td>
                   <td>"?><select class="form-control change" data="<?php echo $class ?>">
                    <option value="">Select Coordinator</option>
                    <?php 
                    $query3 = mysqli_query($con,"SELECT * FROM staff");
                    while($fetch3 = mysqli_fetch_array($query3)){
                    $id = $fetch3['employee'];
                    $name2 = $fetch3['lname']." ".$fetch3['fname'];
                    echo "<option value='$id' >$name2</option>";
                  }
                  echo" </select> </td>
                  <td> <a href='m_arm.php?class_id=$class_id'  =  ' class='btn btn-pink'>Manage arm</a></td>
                  </tr>";
                }
                    ?>
                 

                  </tr>
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
  <script type="text/javascript">
    $(document).ready(function(){
      $('.change').change(function(){
        var clas = $(this).attr("data");
        var coordinator = $(this).val();
         $.ajax({
               url:"coordinator.php",
               method:"POST",
               data:{coordinator:coordinator,clas:clas},
               success:function(data){ 
                if(data == "error"){
                  alert("This staff is already a class coordinator");
                  $('.change').val();
                }
                else{
                $('.dada').html(data);
                  
                  window.location.reload();
                }
              }
            });
           });    
      })
  </script>
<script> 
    $(document).ready(function(){
      $('#class_data').DataTable(); 
    }); 
  </script> 