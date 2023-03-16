<?php
$title = "Manage Students";
include("header.php");
?>

<div class="viewbox-content">
    <div class="content">
        <div class="col-sm-10 mb-5">
            <div class="content">
                <div class="report">
                    <div class="panel-body">
                        <a href="cstudent.php" class="btn btn-pink mb-2">
                            <span class="icon">
                                <i data-feather="plus"></i>
                            </span>
                            Create new student
                        </a>
                        <a href="student_records.php" class="btn btn-pink mb-2">
                            <span class="icon">
                                <i data-feather="bar-chart-2"></i>
                            </span>
                            Student population
                        </a>
                        <a href="inactive_students.php" class="btn btn-pink mb-2">
                            <span class="icon">
                                <i data-feather="slash"></i>
                            </span>
                            Inactive students
                        </a>
                        <a class="btn btn-pink mb-2" href="imports.php">
                            <span class="icon">
                                <i data-feather="upload"></i>
                            </span>
                            Import students
                        </a>
                        <a class="btn btn-pink mb-2" href="student_excos.php">
                            <span class="icon">
                                <i data-feather="users"></i>
                            </span>
                            Student Excos
                        </a>
                    </div>
                    <div class="panel-body ">

                        <form method="POST">
                            <div class="thumbnail">
                                <h4 class="text-center"> Search for Students </h4>
                                <div class="row" style="padding:2%;">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Select Faculty</label>
                                            <select class="form-control college" name="college" required>
                                                <option class="">Select Faculty</option>
                                                <?php
                                                $get_colleges = mysqli_query($con, "SELECT * FROM college");
                                                while ($show_college = mysqli_fetch_array($get_colleges)) {
                                                    $college = $show_college['college_name'];
                                                    $college_code = $show_college['college_code'];

                                                    echo "<option value='$college_code'>$college</option>";
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">

                                        <div class="form-group">
                                            <label>Select Department</label>
                                            <select name="department" class="form-control department" required>
                                                <option class="">Select Faculty First</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Select Level</label>
                                            <select class="form-control level" name="level" required>
                                                <option class="">Select Level</option>
                                                <?php
                                                $get_level = mysqli_query($con, "SELECT * FROM level");
                                                while ($show_level = mysqli_fetch_array($get_level)) {
                                                    $level = $show_level['level'];


                                                    echo "<option value='$level'>$level</option>";
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <p class="text-center"><button name="submit" class="btn btn-pink"
                                                type="submit">Search</button></p>
                                    </div>
                        </form>
                    </div>

                    <div class="panel-body">
                        <?php
                        if (isset($_POST['submit'])) {
                            ?>
                            <div class="table-responsive table-box" id="record">
                                <table id="student_data" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Matric no</th>
                                            <th>last name</th>
                                            <th>First name</th>
                                            <th>Level</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $college = $_POST['college'];
                                        $department = $_POST['department'];
                                        $level = $_POST['level'];
                                        $s2 = mysqli_query($con, "SELECT * FROM students where department = '$department' and college = '$college' and level = '$level'  ");
                                        while ($sh2 = mysqli_fetch_array($s2)) {
                                            $sn = $sh2['sn'];
                                            $matric = $sh2['matric_no'];
                                            $lname = $sh2['lname'];
                                            $fname = $sh2['fname'];
                                            $level = $sh2['level'];
                                            $username = $sh2['username'];
                                            $active = $sh2['active'];
                                            if ($active == '0') {
                                                $dis = "none";
                                            } else {
                                                $dis = "";
                                            }
                                            ?>

                                            <tr>
                                                <td><?php echo $matric ?></td>
                                                <td>
                                                    <?php echo $lname ?>
                                                </td>
                                                <td><?php echo $fname ?></td>
                                                <td>
                                                    <?php echo $level ?>
                                                </td>
                                                <td>
                                                    <a href="view_student.php?is=<?php echo $username ?>"
                                                        class=" btn btn-pink"><span
                                                            class="glyphicon glyphicon-eye-open"></span></a>

                                                    <a href="#" data-bs-toggle="modal" data-bs-target=".bs-example-modal-sms"
                                                        class=" btn btn-pink proceed1" style="display: <?php echo $dis; ?>"
                                                        title='render student inactive' data="<?php echo $admission ?>"><span
                                                            class="glyphicon glyphicon-ban-circle"></span></a>
                                                </td>
                                            </tr>

                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <!-- pagenation -->
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $(".college").change(function () {
            var college = $(".college").val();
            $.ajax({
                method: "POST",
                url: "ajaxData.php",
                data: {
                    college: college
                },
                success: function (data) {
                    $('.department').html(data);
                }
            })
        })
    })
</script>
<script>
    $(document).ready(function () {
        $('#student_data').DataTable({
            "processing": true,
        });
    });
</script>
<?php include("../extras/footer.php") ?>