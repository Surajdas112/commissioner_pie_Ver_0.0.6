<?php
session_start();
ob_start();
include('inc/connection.php');
$query = "SELECT zone.ZONE_NAME, p.num_gstn, p.not_pending, p.pending FROM (SELECT zone_CODE,COUNT(GSTIN) as num_gstn, SUM(Flag=1) as not_pending, sum(Flag=0) as pending FROM nested_category GROUP by ZONE_CODE) as p inner JOIN zone ON p.zone_CODE = zone.ZONE_CODE GROUP by 1";
$getData = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($getData, MYSQLI_NUM)) {
  
    $ZoneCount[] = $row[1];
    $ZoneName[] = $row[0];
}
?>

<!DOCTYPE html>
<html>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<body>
    <div id="myChart" style="width:100%; max-width:600px; height:500px;">
    </div>

    <script>

        var labelArray =
            <?php echo '["' . implode('", "', $ZoneName) . '"]' ?>;

        var passedArray =
            <?php echo '[' . implode(',', $ZoneCount) . ']' ?>;


    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Zones', 'Cases'],
            //[labelArray, passedArray],
            ['France', 48.6],
            ['Spain', 44.4],
            ['USA', 23.9],
            ['Argentina', 14.5]
        ]);

        var options = {
            title: 'World Wide Wine Production',
            is3D: true
        };

        var chart = new google.visualization.PieChart(document.getElementById('myChart'));
        chart.draw(data, options);
    }


    for(var i=0; i<names.length; i++){
                console.log(names[i]);
                }
    </script>

</body>

</html>