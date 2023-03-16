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
      <div class="report">
          <div class="panel-body">
          <h4 class="text-center">Time Table Format</h4>
          <p class="text-center"><a href="#" class="btn time" data-bs-toggle="modal" data-bs-target=".bs-example-modal-sms"  data="<?php echo $day ?>">Add Period</a> </p>
          <div class="table-responsive table-box load_period">
            
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<!-- modal for create -->
<div class="modal fade bs-example-modal-sms" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content" style="padding: 10px; color: #666;">
      <div class="modal-header"><h5 class="text-center">Create New Period</h5></div>
      <form method="post" id="add_period">
        <select name="day" class="form-control" required>
          <option value="">Select Day</option>
          <option value="monday">Monday</option>
          <option value="tuesday">Tuesday</option>
          <option value="wednesday">Wednesday</option>
          <option value="thursday">Thursday</option>
          <option value="friday">Friday</option>
        </select><br>
        <input type="" name="period" class="form-control" placeholder="period" required><br>
        <input type="" name="duration" class="form-control" placeholder="duration (in minutes)" required><br>
        <label>Start time</label>
        <input type="time" name="start_time" class="form-control" placeholder="start_time" required><br>
        <p class="text-center"><button class="btn add" type="submit"><span class="glyphicon glyphicon-plus"></span> Add Event</button></p>
        <div class="view_result"></div>
      </form>

    </div>
  </div>
</div>
      </div>
<!-- modal for create ends -->
<?php include("footer.php") ?>

<script type="text/javascript">
  function load_period(){
      $.ajax({        
        url:"period_output.php",  
        method:"POST", 
        data:{data:"us",},           
        success: function(data){  
        $('.load_period').html(data);
        }  
      }); 
    }
    $(document).ready(function(){
      load_period();
    })
  $(document).ready(function(){  
    $('#add_period').on("submit", function(e){  
      e.preventDefault(); 
      $('.add').attr("disabled","disabled");
      $.ajax({  
        url:"add_period.php",  
        method:"POST",  
        data:new FormData(this),  
        contentType:false,        
        cache:false,              
        processData:false,          
        success: function(data){  

          if(data=='success')  
          {  
            $('.view_result').html("<div class='alert alert-success'>Period added successfully</div>");
          }
          else  
          {  
            $('.view_result').html("<div class='alert alert-danger'>"+data+"</div>");
            
          }          
          $('.add').removeAttr("disabled");
          load_period();

        }  
      });  


    });  
  });  
</script>
</script>