<?php
$title = "Manage Faculty";
include("header.php");
?>

<div class="viewbox-content">

    <div class="content">
        <div class="report">
            <div class="panel-body">
                <a href="ccollege.php" class="btn btn-pink mb-4"><span class="glyphicon glyphicon-plus"></span> Create
                    new
                    Faculty</a>
            </div>
            <div class="panel-body">
                <div class="table-responsive table-box" id="record">
                    <table id="student_data" class="table table-bordered table-striped">
                        <thead id="data">
                            <tr>
                                <th>SN</th>
                                <th>Faculty Code</th>
                                <th>Faculty Name</th>
                                <th>Dean</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $serial = 0;
                            $s2 = mysqli_query($con, "SELECT * FROM college ");
                            while ($sh2 = mysqli_fetch_array($s2)) {
                                $sn = $sh2['sn'];
                                $code = $sh2['college_code'];
                                $college_name = $sh2['college_name'];
                                $dean = $sh2['dean'];
                                if ($dean == "" || $auth->countall3('staff', 'employee', $dean) < 1) {
                                    $dean = "N/A";
                                }
                                $serial++;
                                ?>

                                <tr>
                                    <td><?php echo $serial ?></td>
                                    <td>
                                        <?php echo $code ?>
                                    </td>
                                    <td><?php echo $college_name ?></td>
                                    <td>
                                        <?php echo $dean ?>
                                    </td>
                                    <td>
                                        <a href="edit_college.php?is=<?php echo $sn ?>"
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