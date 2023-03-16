<?php include ("conn/conn.php"); ?>
<?php if(isset($_POST['adno'])){
	$adno = $_POST['adno'];
	?>
<table class="table table-bordered" >
						<tr>
							<td>Admissions no</td>
							<td>First name</td>
							<td>last name</td>
							<td>Class</td>
							<th>Action</th>
						</tr>
					<?php
				$s2  = mysql_query("SELECT * FROM students  where admission_no = '$adno' ");
				if(mysql_num_rows($s2) == 0){
					echo "no record found";
				}
				else{
				while($sh2 = mysql_fetch_array($s2)){
				$admission = $sh2['admission_no'];
				$fname= $sh2['fname'];
				$lname = $sh2['lname'];
				$class = $sh2['class'];
				$username = $sh2['username'];
				?>
				
				            <tr>
							<th><?php echo $admission?></th>
							<th><?php echo $fname ?></th>
							<th><?php echo $lname ?></th>
							<th><?php echo $class ?></th>
							<th><a href="edit2.php?is=<?php echo $username ?>" class=" btn btn-pink"><span class="glyphicon glyphicon-pencil"></span></a>
								 <a href="reset.php?is=<?php echo $username ?>" class=" btn btn-pink"><span class="glyphicon glyphicon-edit"></span></a>
                  				<a href="#" data-bs-toggle="modal" data-bs-target=".bs-example-modal-sm<?php echo $sn ?>" class=" btn btn-pink" style="display: <?php echo $dis; ?>" ><span class="glyphicon glyphicon-ban-circle"></span></a>
							</th>							
						</tr>
						 <div class="modal fade bs-example-modal-sm<?php echo $sn ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content" style="padding: 10px;">
    <div class="modal-header">Render The student inactive</div>
      <p style="font-weight: bold;" > Render <?php echo $fname." ".$lname ?> inactive ?<br>
      <small>
      Please note that this action would prevent the student from accessing the portal you can activate the student again from the list of inactive students
      </small>
      </p>
        <div class="modal-footer">
          <button class="btn btn-sm btn-danger" data-dismiss="modal">cancle</button>
          <button class="btn btn-sm btn-success" id="btn<?php echo $sn ?>">proceed</button>
        </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
   $('#btn<?php echo $sn ?>').click(function(){
     var admission = "<?php echo $admission ?>";
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
</script>
						<?php
					}
					}
				}
					?>
					</table>
					<?php if(isset($_POST['fname'])){
	$fname = $_POST['fname'];
	?>
<table class="table table-bordered" >
						<tr>
							<td>Admissions no</td>
							<td>First name</td>
							<td>last name</td>
							<td>Class</td>
							<th>Action</th>
						</tr>
					<?php
				$s2  = mysql_query("SELECT * FROM students  where fname = '$fname' ");
				if(mysql_num_rows($s2) == 0){
					echo "no record found";
				}
				else{
				while($sh2 = mysql_fetch_array($s2)){
				$admission = $sh2['admission_no'];
				$fname= $sh2['fname'];
				$lname = $sh2['lname'];
				$class = $sh2['class'];
				$username = $sh2['username'];
				?>
				
				            <tr>
							<th><?php echo $admission?></th>
							<th><?php echo $fname ?></th>
							<th><?php echo $lname ?></th>
							<th><?php echo $class ?></th>
							<th><a href="edit2.php?is=<?php echo $username ?>" class=" btn btn-pink"><span class="glyphicon glyphicon-pencil"></span></a>
								 <a href="reset.php?is=<?php echo $username ?>" class=" btn btn-pink"><span class="glyphicon glyphicon-edit"></span></a>
                 <a href="#" data-bs-toggle="modal" data-bs-target=".bs-example-modal-sm<?php echo $sn ?>" class=" btn btn-pink" style="display: <?php echo $dis; ?>" ><span class="glyphicon glyphicon-ban-circle"></span></a>
							</th>							
						</tr>
						 <div class="modal fade bs-example-modal-sm<?php echo $sn ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content" style="padding: 10px;">
    <div class="modal-header">Render The student inactive</div>
      <p style="font-weight: bold;" > Render <?php echo $fname." ".$lname ?> inactive ?<br>
      <small>
      Please note that this action would prevent the student from accessing the portal you can activate the student again from the list of inactive students
      </small>
      </p>
        <div class="modal-footer">
          <button class="btn btn-sm btn-danger" data-dismiss="modal">cancle</button>
          <button class="btn btn-sm btn-success" id="btn<?php echo $sn ?>">proceed</button>
        </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
   $('#btn<?php echo $sn ?>').click(function(){
     var admission = "<?php echo $admission ?>";
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
</script>
						<?php
					}
					}

				}
					?>
					</table>
										<?php if(isset($_POST['lname'])){
	$lname = $_POST['lname'];
	?>
<table class="table table-bordered" >
						<tr>
							<td>Admissions no</td>
							<td>First name</td>
							<td>last name</td>
							<td>Class</td>
							<th>Action</th>
						</tr>
					<?php
				$s2  = mysql_query("SELECT * FROM students  where lname = '$lname' ");
				if(mysql_num_rows($s2) == 0){
					echo "no record found";
				}
				else{
				while($sh2 = mysql_fetch_array($s2)){
				$admission = $sh2['admission_no'];
				$fname= $sh2['fname'];
				$lname = $sh2['lname'];
				$class = $sh2['class'];
				$username = $sh2['username'];
				?>
				
				            <tr>
							<th><?php echo $admission?></th>
							<th><?php echo $fname ?></th>
							<th><?php echo $lname ?></th>
							<th><?php echo $class ?></th>
							<th><a href="edit2.php?is=<?php echo $username ?>" class=" btn btn-pink"><span class="glyphicon glyphicon-pencil"></span></a>
								 <a href="reset.php?is=<?php echo $username ?>" class=" btn btn-pink"><span class="glyphicon glyphicon-edit"></span></a>
                  <a href="#" data-bs-toggle="modal" data-bs-target=".bs-example-modal-sm<?php echo $sn ?>" class=" btn btn-pink" style="display: <?php echo $dis; ?>" ><span class="glyphicon glyphicon-ban-circle"></span></a>
							</th>							
						</tr>
						 <div class="modal fade bs-example-modal-sm<?php echo $sn ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content" style="padding: 10px;">
    <div class="modal-header">Render The student inactive</div>
      <p style="font-weight: bold;" > Render <?php echo $fname." ".$lname ?> inactive ?<br>
      <small>
      Please note that this action would prevent the student from accessing the portal you can activate the student again from the list of inactive students
      </small>
      </p>
        <div class="modal-footer">
          <button class="btn btn-sm btn-danger" data-dismiss="modal">cancle</button>
          <button class="btn btn-sm btn-success" id="btn<?php echo $sn ?>">proceed</button>
        </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
   $('#btn<?php echo $sn ?>').click(function(){
     var admission = "<?php echo $admission ?>";
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
</script>
						<?php
					}
					}
					
				}
					?>
					</table>
										<?php if(isset($_POST['clas'])){
	$clas = $_POST['clas'];
	?>
<table class="table table-bordered" >
						<tr>
							<td>Admissions no</td>
							<td>First name</td>
							<td>last name</td>
							<td>Class</td>
							<th>Action</th>
						</tr>
					<?php
				$s2  = mysql_query("SELECT * FROM students  where class = '$clas' ");
				if(mysql_num_rows($s2) == 0){
					echo "no record found";
				}
				else{
				while($sh2 = mysql_fetch_array($s2)){
				$admission = $sh2['admission_no'];
				$fname= $sh2['fname'];
				$lname = $sh2['lname'];
				$class = $sh2['class'];
				$username = $sh2['username'];
				?>
				
				            <tr>
							<th><?php echo $admission?></th>
							<th><?php echo $fname ?></th>
							<th><?php echo $lname ?></th>
							<th><?php echo $class ?></th>
							<th><a href="edit2.php?is<?php echo $username ?>" class=" btn btn-pink"><span class="glyphicon glyphicon-pencil"></span></a>
								 <a href="reset.php?is=<?php echo $username ?>" class=" btn btn-pink"><span class="glyphicon glyphicon-edit"></span></a>
                  <a href="#" data-bs-toggle="modal" data-bs-target=".bs-example-modal-sm<?php echo $sn ?>" class=" btn btn-pink" style="display: <?php echo $dis; ?>" ><span class="glyphicon glyphicon-ban-circle"></span></a>
							</th>							
						</tr>
						 <div class="modal fade bs-example-modal-sm<?php echo $sn ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content" style="padding: 10px;">
    <div class="modal-header">Render The student inactive</div>
      <p style="font-weight: bold;" > Render <?php echo $fname." ".$lname ?> inactive ?<br>
      <small>
      Please note that this action would prevent the student from accessing the portal you can activate the student again from the list of inactive students
      </small>
      </p>
        <div class="modal-footer">
          <button class="btn btn-sm btn-danger" data-dismiss="modal">cancle</button>
          <button class="btn btn-sm btn-success" id="btn<?php echo $sn ?>">proceed</button>
        </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
   $('#btn<?php echo $sn ?>').click(function(){
     var admission = "<?php echo $admission ?>";
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
</script>
						<?php
					}
					}
					
				}
					?>
					</table>