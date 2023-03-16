<?php
$title = "Manage Student";
include("header.php");
?>

<div class="viewbox-content">
    <div class="content">
        <div class="col-sm-10 mb-5">
            <div class="content">
                <div class="panel-body">
                    <a href="cstudent.php" class="btn btn-pink"><span class="glyphicon glyphicon-plus"></span> Create
                        new student</a> <a href="student_records.php" class="btn btn-pink"><span
                            class="glyphicon glyphicon-stats"></span> Student population</a>
                    <a href="inactive_students.php" class="btn btn-pink"><span
                            class="glyphicon glyphicon-ban-circle"></span> inactive students</a>
                    <a class="btn btn-pink" href="imports.php"><span class="glyphicon glyphicon-import"></span> Import
                        students</a>
                </div>
                <div class="panel-body">
                    <div class="table-responsive table-box" id="record">
                        <table id="student_data" class="table table-bordered table-striped">
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

                                $s2 = mysqli_query($con, "SELECT * FROM students ");
                                while ($sh2 = mysqli_fetch_array($s2)) {
                                    $sn = $sh2['sn'];
                                    $admission = $sh2['admission_no'];
                                    $lname = $sh2['lname'];
                                    $fname = $sh2['fname'];
                                    $class = $sh2['class'];
                                    $username = $sh2['username'];
                                    $active = $sh2['active'];
                                    if ($active == '0') {
                                        $dis = "none";
                                    } else {
                                        $dis = "";
                                    }
                                    ?>

                                    <tr>
                                        <td><?php echo $admission ?></td>
                                        <td>
                                            <?php echo $lname ?>
                                        </td>
                                        <td><?php echo $fname ?></td>
                                        <td>
                                            <?php echo $class ?>
                                        </td>
                                        <td>
                                            <a href="view_student.php?is=<?php echo $username ?>"
                                                class=" btn btn-pink"><span
                                                    class="glyphicon glyphicon-eye-open"></span></a>

                                            <a href="#" data-bs-toggle="modal" data-bs-target=".bs-example-modal-sms"
                                                class=" btn btn-pink proceed1" style="display: <?php echo $dis; ?>"
                                                title='render student inactive' data="<?php echo $admission ?>"
                                                data2="<?php echo $fname . ' ' . $lname ?>"><span
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
                </div>
            </div>
        </div>
    </div>
    <!-- inactive modal -->
    <div class="modal fade bs-example-modal-sms" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content" style="padding: 10px; color: #666;">
                <div class="modal-header">Render The student inactive</div>
                <p style="font-weight: bold;"> Render <span class='es_name'></span> inactive ?<br>
                    <small>
                        Please note that this action would prevent the student from accessing the portal you can
                        activate
                        the student again from the list of inactive students
                    </small>
                </p>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-danger" data-dismiss="modal">cancel</button>
                    <button class="btn btn-sm btn-success proceed" data="">proceed</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('.proceed1').click(function () {
            var admission1 = $(this).attr('data');
            var name = $(this).attr('data2');
            $('.es_name').text(name);
            $('.proceed').attr("data", admission1);
            $('.proceed').click(function () {
                var admission = $(this).attr("data");
                $.ajax({
                    url: "inactive.php",
                    method: "POST",
                    data: { admission: admission, },
                    success: function (data) {
                        $('.modal-content').html(data);
                        setTimeout(function () {
                            window.location.reload();
                        }, 2000);
                    }
                });
            });
        });
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