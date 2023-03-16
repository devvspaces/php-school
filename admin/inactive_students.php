<?php
$title = "Inactive Students";
include("header.php");
?>

<div class="viewbox-content">
    <div class="content">
        <div class="col-sm-10 mb-5">
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
            <div class="panel-body">
                <div class="table-responsive table-box" id="record">
                    <table id="in_student_data" class="table table-bordered table-striped">
                        <thead id="data">
                            <tr>
                                <th>SN</th>
                                <th>Matric no</th>
                                <th>First name</th>
                                <th>last name</th>
                                <th>Department</th>
                                <th>Level</th>
                                <th>Admission date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $serial = 0;
                            $s2 = mysqli_query($con, "SELECT * FROM students where active = '0' ");
                            while ($sh2 = mysqli_fetch_array($s2)) {
                                $sn = $sh2['sn'];
                                extract($sh2);
                                $serial++;
                                ?>

                                <tr>
                                    <td><?php echo $serial ?></td>
                                    <td>
                                        <?php echo $matric_no ?>
                                    </td>
                                    <td><?php echo $fname ?></td>
                                    <td>
                                        <?php echo $lname ?>
                                    </td>
                                    <td><?php echo $department ?></td>
                                    <td>
                                        <?php echo $level ?>
                                    </td>
                                    <td>
                                        <?php echo $date_admitted ?>
                                    </td>
                                    <td><a href="#" data-bs-toggle="modal" data-bs-target=".bs-example-modal-smc"
                                            class=" btn btn-pink proceed" title="reactivate"
                                            data="<?php echo $matric_no ?>"><span
                                                class="glyphicon glyphicon-ok-circle"></span></a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target=".bs-example-modal-sms"
                                            class=" btn btn-pink left" data="<?php echo $matric_no ?>"
                                            title="mark student as left"><span
                                                class="glyphicon glyphicon-remove-circle"></span></a>

                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- reactivate modal -->
    <div class="modal fade bs-example-modal-smc" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content" style="padding: 10px; color: #666;">
                <div class="modal-header">Reactivate Stdent</div>
                <p>Are you sure you want to Reactivate this Student ?<br>
                    <small>
                        The student must have met all requirement for reactivation before proceeding
                    </small>
                </p>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-danger" data-dismiss="modal">cancle</button>
                    <button class="btn btn-sm btn-success proceed1" data="">proceed</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bs-example-modal-sms" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content" style="padding: 10px; color: #666;">
                <div class="modal-header">Mark This student as left</div>
                <p>Are you sure you want to mark this student as left ?<br>
                    <small>
                        The student must have been inactive for at least 30 days before he can be mark as left to ensure
                        all
                        necessary verification is carried out
                    </small>
                </p>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-danger" data-dismiss="modal">cancle</button>
                    <button class="btn btn-sm btn-success left1" data="">proceed</button>
                </div>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('.proceed').click(function () {
            var admission1 = $(this).attr("data");
            $('.proceed1').attr("data", admission1);
            $('.proceed1').click(function () {
                var admission = $(this).attr("data");
                $.ajax({
                    url: "reactivate.php",
                    method: "POST",
                    data: {
                        admission: admission,
                    },
                    success: function (data) {
                        $('.modal-content').html(data);
                        setTimeout(function () {
                            window.location.reload();
                        }, 2000);
                    }
                });
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.left').click(function () {
            var admission1 = $(this).attr("data");
            $('.left1').attr("data", admission1);
            $('.left1').click(function () {
                var admission = $(this).attr("data");
                $.ajax({
                    url: "left.php",
                    method: "POST",
                    data: {
                        admission: admission,
                    },
                    success: function (data) {
                        $('.modal-content').html(data);
                        setTimeout(function () {
                            window.location.reload();
                        }, 2000);
                    }
                });
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#in_student_data').DataTable({
            processing: true,
        });
    });
</script>
<?php include("../extras/footer.php") ?>