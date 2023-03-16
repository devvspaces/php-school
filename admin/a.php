<?php
include '../class.php';
$sqlstr1 = "SELECT * FROM students WHERE level = ''";
$stmt1 = $conn->prepare($sqlstr1);
$stmt1->execute();
$result1 = $stmt1->get_result();
$counter = $result1->num_rows;
if ($counter > 0) {
    while ($row1 = $result1->fetch_assoc()) {
        $sid[] = $row1['sn'];
    }
    foreach ($sid as $sn) {
        $sqlstr = "SELECT level FROM level ORDER BY RAND() LIMIT 1";
        $stmt = $conn->prepare($sqlstr);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $level = $row['level'];



        $sqlstr2 = "SELECT dept_code,code FROM department ORDER BY RAND() LIMIT 1";
        $stmt2 = $conn->prepare($sqlstr2);
        $stmt2->execute();
        $result2 = $stmt2->get_result();
        $row2 = $result2->fetch_assoc();
        $dept_code = $row2['dept_code'];
        $faculty = $row2['code'];


        $auth->update5('students', 'level', $level, 'sn', $sn);
        $auth->update5('students', 'department', $dept_code, 'sn', $sn);
        $auth->update5('students', 'college', $faculty, 'sn', $sn);
    }
}
