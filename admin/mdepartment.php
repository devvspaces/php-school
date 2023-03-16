<?php
$title = "Manage Departments";
include("header.php");
?>

<div class="viewbox-content">
    <div class="content">
        <div class="col-sm-10 mb-5">
            <div class="content">

                <div class="panel-body">
                    <a href="cdepartment.php" class="btn btn-pink"><span class="glyphicon glyphicon-plus"></span> Create
                        new department</a>
                </div>
                <div class="panel-body">
                    <div class="table-responsive table-box" id="record">
                        <table id="student_data" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Faculty</th>
                                    <th>Department Code</th>
                                    <th>Department Name</th>
                                    <th>HOD</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $serial = 0;
                                $s2 = mysqli_query($con, "SELECT * FROM department");
                                while ($sh2 = mysqli_fetch_array($s2)) {
                                    $sn = $sh2['sn'];
                                    $department = $sh2['department'];
                                    $dept_code = $sh2['dept_code'];
                                    $hod = $sh2['HOD'];
                                    if ($hod == "" || $auth->countall3('staff', 'employee', $hod) < 1) {
                                        $hod = "N/A";
                                    }
                                    $college = $sh2['college'];
                                    $serial++;
                                    ?>
                                    <tr>
                                        <td><?php echo $serial ?></td>
                                        <td>
                                            <?php echo $college ?>
                                        </td>
                                        <td><?php echo $dept_code ?></td>
                                        <td>
                                            <?php echo $department ?>
                                        </td>
                                        <td><?php echo $hod ?></td>
                                        <td>
                                            <a href="mcourse.php?is=<?php echo $dept_code ?>"
                                                class=" btn btn-pink btn-sm">Manage Courses</span></a>
                                            <a href="editdepartment.php?is=<?php echo $sn ?>"
                                                class=" btn btn-pink btn-sm">Edit</span></a>

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

<script type="text/javascript">
    $(document).ready(function () {
        $('.proceed1').click(function () {
            var admission1 = $(this).attr('data');
            $('.proceed').attr("data", admission1);
            $('.proceed').click(function () {
                var admission = $(this).attr("data");
                $.ajax({
                    url: "inactive.php",
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