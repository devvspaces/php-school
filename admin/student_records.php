<?php
error_reporting(0);

$title = "Student Records";
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

					<div class="panel-body">
						<div class="table-responsive table-box">
							<table class="table table-bordered" id="data">
								<tr>
									<th>Level</th>
									<th>Male <i class="fa fa-male"></i></th>
									<th>Female <i class="fa fa-female"></i></th>
									<th>Undefined <i class="fa fa-ban"></i></th>
									<th>Total</th>
								</tr>
								<?php
								$class_check = mysqli_query($con, "SELECT * FROM level");
								while ($class_result = mysqli_fetch_array($class_check)) {
									$level = $class_result['level'];
									$q1 = mysqli_query($con, "SELECT * FROM students Where level  = '$level' AND gender = 'male'");
									$n1 = mysqli_num_rows($q1);
									$q2 = mysqli_query($con, "SELECT * FROM students Where level  = '$level' AND gender = 'female'");
									$n2 = mysqli_num_rows($q2);
									$q3 = mysqli_query($con, "SELECT * FROM students Where level  = '$level' AND gender = ''");
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
            <th>$level level</th>
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

<?php include("../extras/footer.php") ?>