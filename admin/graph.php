<html>

<head>
  <link rel="stylesheet" href="https://www.cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="https://code.jquery.com/jquery-1.8.2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  <meta charset="utf-8" />
  <title></title>
  <style>
    .morris-hover {
      position: absolute;
      z-index: 1000;
    }

    .morris-hover.morris-default-style {
      border-radius: 10px;
      padding: 6px;
      color: #666;
      background: rgba(255, 255, 255, 0.8);
      border: solid 2px rgba(230, 230, 230, 0.8);
      font-family: sans-serif;
      font-size: 12px;
      text-align: center;
    }

    .morris-hover.morris-default-style .morris-hover-row-label {
      font-weight: bold;
      margin: 0.25em 0;
    }

    .morris-hover.morris-default-style .morris-hover-point {
      white-space: nowrap;
      margin: 0.1em 0;
    }

    svg {
      width: 100%;
      height: 100%;
    }
  </style>
</head>

<body>

  <section class="container-fluid">
    <div class="row">
      <div class="">
        <div id="bar-chart"></div>
      </div>
    </div>
  </section>
</body>
<?php
include("../class.php");
$male_100 = $auth->countall5('students', 'level', 100, 'gender', 'Male');
$female_100 = $auth->countall5('students', 'level', 100, 'gender', 'Female');


$male_200 = $auth->countall5('students', 'level', 200, 'gender', 'Male');
$female_200 = $auth->countall5('students', 'level', 200, 'gender', 'Female');


$male_300 = $auth->countall5('students', 'level', 300, 'gender', 'Male');
$female_300 = $auth->countall5('students', 'level', 300, 'gender', 'Female');


$male_400 = $auth->countall5('students', 'level', 400, 'gender', 'Male');
$female_400 = $auth->countall5('students', 'level', 400, 'gender', 'Female');


$male_500 = $auth->countall5('students', 'level', 500, 'gender', 'Male');
$female_500 = $auth->countall5('students', 'level', 500, 'gender', 'Female');

?>
<script>
  var male_100 = parseInt(<?= $male_100 ?>);
  var female_100 = parseInt(<?= $female_100 ?>);


  var male_200 = parseInt(<?= $male_200 ?>);
  var female_200 = parseInt(<?= $female_200 ?>);


  var male_300 = parseInt(<?= $male_300 ?>);
  var female_300 = parseInt(<?= $female_300 ?>);


  var male_400 = parseInt(<?= $male_400 ?>);
  var female_400 = parseInt(<?= $female_400 ?>);


  var male_500 = parseInt(<?= $male_500 ?>);
  var female_500 = parseInt(<?= $female_500 ?>);




  $(document).ready(function() {
    barChart();

    $(window).resize(function() {
      window.barChart.redraw();
    });
  });

  function barChart() {
    window.barChart = Morris.Bar({
      element: "bar-chart",
      data: [{
          y: "100 Level",
          a: male_100,
          b: female_100
        },
        {
          y: "200 Level",
          a: male_200,
          b: female_200
        },
        {
          y: "300 Level",
          a: male_300,
          b: female_300
        },
        {
          y: "400 Level",
          a: male_400,
          b: female_400
        },
        {
          y: "500 Level",
          a: male_500,
          b: female_500
        },
      ],
      xkey: "y",
      ykeys: ["a", "b"],
      labels: ["Male", "Female"],
      lineColors: ["#1e88e5", "#ff3321"],
      lineWidth: "3px",
      resize: true,
      redraw: true,
    });
  }
</script>

</html>