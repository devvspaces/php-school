<?php include("header.php") ?>
<div class="content">
  <div class="col-sm-10 mb-5">
    <div class="content">
      <div id="p_heading">
        <?php
        $users = $_SESSION['users'];
        $s1  = mysqli_query($con, "SELECT * FROM admin where username = '$users'");
        $sh1 = mysqli_fetch_array($s1);
        $name1 = $sh1['fname'] . " " . $sh1['lname'];
        $img = $sh1['picture'];
        $position = $sh1['position'];
        if ($img == "") {
          $img2 = "passport/default.png";
        } else {
          $img2 = $img;
        }
        $is = $_GET['is'];
        ?>
        <?php include("nav.php") ?>
      </div>

      <div class="panel-body">
        <h4>Manage Courses</h4>
        <a href="ccourse.php?is=<?php echo $is ?>" class="btn btn-pink"><span class="glyphicon glyphicon-plus"></span> Create new Course</a>
      </div>
      <div class="panel-body">
        <div class="table-responsive table-box" id="record">
          <table id="student_data" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Course Code</th>
                <th>Course Title</th>
                <th>Unit</th>
                <th>Level</th>
                <th>Lecturer</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $s2  = mysqli_query($con, "SELECT * FROM course where dept_code = '$is' ");
              while ($sh2 = mysqli_fetch_array($s2)) {
                $sn = $sh2['sn'];
                $title = $sh2['title'];
                $code = $sh2['code'];
                $college = $sh2['college'];
                $department  = $sh2['department'];
                $dept_code = $sh2['dept_code'];
                $level = $sh2['level'];
                $teacher = $sh2['teacher'];
                $unit = $sh2['unit'];
              ?>

                <tr>
                  <td><?php echo $code ?></td>
                  <td><?php echo $title ?></td>
                  <td><?php echo $unit ?></td>
                  <td><?php echo $level ?></td>
                  <td><?php echo $teacher ?></td>
                  <td>
                    <a href="edit_course.php?is=<?php echo $sn ?>" class=" btn btn-pink btn-sm">Edit</span></a>

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
<?php include("footer.php") ?>
<script type="text/javascript">
  $(document).ready(function() {
    $('.proceed1').click(function() {
      var admission1 = $(this).attr('data');
      $('.proceed').attr("data", admission1);
      $('.proceed').click(function() {
        var admission = $(this).attr("data");
        $.ajax({
          url: "inactive.php",
          method: "POST",
          data: {
            admission: admission,
          },
          success: function(data) {
            $('.modal-content').html(data);
            setTimeout(function() {
              window.location.reload();
            }, 2000);
          }
        });
      });
    });
  })
</script>
<script>
  $(document).ready(function() {
    $('#student_data').DataTable({
      "processing": true,
    });
  });
</script>