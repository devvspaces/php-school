<?php include("conn/conn.php") ?>
  <table class="table table-bordered table-striped">
    <tr>
      <th>Day </th>
      <th>Period, time & duration</th>
    </tr>
    <?php  
    $day_select = mysqli_query($con, "SELECT * From period_format group by day order by sn asc");
    while($day_get = mysqli_fetch_array($day_select)){
      $day  = $day_get['day'];
      ?>
      <tr>
        <th> <span style="writing-mode: vertical-lr;"><?php echo $day ?></span></th>
        <th><table class='table table-bordered'>
          <tr>
            <th>period</th>
            <?php 

            $period_sel = mysqli_query($con, "SELECT * FROM period_format where day = '$day'");
            while($period_get = mysqli_fetch_array($period_sel)){
              $period = $period_get['period'];
              $psn = $period_get['sn'];
              echo"<td>$period <span data='$psn' class='glyphicon glyphicon-trash del_per' style='color:#999; font-size:10px; float:right; cursor:pointer; margin-top:5px;'></span></td>";
            }
            ?>
          </tr>
          <tr>
            <th>duration (mins)</th>
            <?php 
            $period_sel = mysqli_query($con, "SELECT * FROM period_format where day = '$day'");
            while($duration_get = mysqli_fetch_array($period_sel)){
              $duration = $duration_get['duration'];
              echo"<td>$duration</td>";
            }
            ?>
          </tr>
          <tr>
            <th>start-end</th>
            <?php 
            $period_sel = mysqli_query($con, "SELECT * FROM period_format where day = '$day'");
            while($time_get = mysqli_fetch_array($period_sel)){
              $start=date('g:i', strtotime($time_get['start_time']));
              $end= date('g:i',strtotime($time_get['end_time']));
              echo"<td>$start-<br>$end</td>";
            }
            ?>
          </tr>
        </table>
        
      </th>
    </tr>
    <?php
  }
  ?>
</table>
<script type="text/javascript">
  $('.del_per').click(function(){
  var is = $(this).attr("data");
 var x =  confirm("are you sure you want to delete ?");
 if(x == true){
   $.ajax({  
        url:"delete_period.php",  
        method:"GET",  
        data:{is:is,},       
        success: function(data){ 
          alert(data);
          window.location.reload();
        }

      }); 

 }
 else{

 }
})
      
</script>