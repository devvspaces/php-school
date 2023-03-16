<?php
$title = "Dashboard";
include("header.php");
?>

<div class="viewbox-content">
    <section class="student-cards">
        <div class="card">
            <span class="icon">
                <i data-feather="user"></i>
            </span>

            <h2><?= $auth->countall3('students', 'gender', 'Male') ?></h2>
            <p>Male Students</p>
        </div>

        <div class="card">
            <span class="icon">
                <i data-feather="user"></i>
            </span>

            <h2><?= $auth->countall3('students', 'gender', 'Female') ?></h2>
            <p>Female Students</p>
        </div>

        <div class="card">
            <span class="icon">
                <i data-feather="users"></i>
            </span>

            <h2><?= $auth->countall1('students') ?></h2>
            <p>Total Students</p>
        </div>
    </section>

    <iframe src="./graph.php" frameborder="0" width="100%"></iframe>

    <section class="general-announcements">

        <div class="box">

            <h2>General Announcements</h2>

            <div class="table-box">
                <div class="container">
                    <table class="table" id="student_data">
                        <thead>
                            <th>S/N</th>
                            <th>Date</th>
                            <th>Title</th>
                            <th>Announcements</th>
                        </thead>

                        <tbody>
                            <?php
                                $x = 0;
                                $sqlstr = "SELECT * FROM anoucement WHERE viewers = 'all' OR viewers = 'staff' ORDER BY sn DESC";
                                $stmt = $conn->prepare($sqlstr);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                while ($row = $result->fetch_assoc()):
                                    $x++;
                                    extract($row);
                            ?>
                                <tr>
                                    <td><?= $x ?></td>
                                    <td>
                                        <?= $dates ?>
                                    </td>
                                    <td><?= $title ?></td>
                                    <td>
                                        <?= $content ?>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </section>
</div>

<?php include("../extras/footer.php") ?>

