<?php
error_reporting(0);
$title = "Manage staff";
include("header.php");
?>

<div class="viewbox-content">
    <div class="content">
        <div class="col-sm-10 mb-5">
            <div class="content">
                <div class="report">
                    <div class="panel-body">
                        <a href="cstaff.php" class="btn btn-pink"><span class="glyphicon glyphicon-plus"></span> Create
                            new
                            staff
                            member</a>
                        <a href="import_staff.php" class="btn btn-pink"><span class="glyphicon glyphicon-import"></span>
                            Import
                            Staff</a>
                    </div>
                    <div class="panel-body">
                        <h4 class="text-center mb-3 mt-4">Staff Population</h4>
                        <div class="table-responsive table-box">
                            <table class="table table-bordered" id="data">
                                <tr>
                                    <th>Department</th>
                                    <th>Male <i class="fa fa-male"></i></th>
                                    <th>Female <i class="fa fa-female"></i></th>
                                    <th>Undefined <i class="fa fa-ban"></i></th>
                                    <th>Total</th>
                                </tr>
                                <?php
                                $class_check = mysqli_query($con, "SELECT * FROM staff group by department");
                                while ($class_result = mysqli_fetch_array($class_check)) {
                                    $department = $class_result['department'];
                                    $q1 = mysqli_query($con, "SELECT * FROM staff Where department = '$department' AND gender = 'male'");
                                    $n1 = mysqli_num_rows($q1);
                                    $q2 = mysqli_query($con, "SELECT * FROM staff Where department  = '$department' AND gender = 'female'");
                                    $n2 = mysqli_num_rows($q2);
                                    $q3 = mysqli_query($con, "SELECT * FROM staff Where department  = '$department' AND gender = ''");
                                    $n3 = mysqli_num_rows($q3);
                                    $total1 = $n1 + $n2 + $n3;
                                    $n37 += $n1;
                                    $n38 += $n2;
                                    $n39 += $n3;
                                    $total13 = $n37 + $n38 + $n39;
                                    $per_boy = ($n1 / $total1) * 100;
                                    $per_girls = ($n2 / $total1) * 100;
                                    $per_un = ($n3 / $total1) * 100;
                                    //total
                                    $per_boy_t = ($n37 / $total13) * 100;
                                    $per_girls_t = ($n38 / $total13) * 100;
                                    $per_un_t = ($n39 / $total13) * 100;
                                    echo "<tr>
            <th>$department</th>
            <th>$n1</th>
            <th>$n2</th>
            <th>$n3</th>
            <th>$total1</th>
          </tr>";
                                }
                                ?>
                                <tr>
                                    <th>overall total</th>
                                    <th><?php echo $n37 ?></th>
                                    <th>
                                        <?php echo $n38 ?>
                                    </th>
                                    <th><?php echo $n39 ?></th>
                                    <th>
                                        <?php echo $total13 ?>
                                    </th>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php include("../extras/footer.php") ?>