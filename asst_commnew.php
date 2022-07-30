<?php
include('inc/connection.php');
$ZCDR_code = $_GET['commcode'];



$query = "SELECT zone.ZCDR_NAME, p.num_gstn, p.not_pending, p.pending, zone.ZCDR_CODE FROM (SELECT DIV_CODE,COUNT(GSTIN) as num_gstn, SUM(Flag=1) as not_pending, sum(Flag=0) as pending FROM nested_category WHERE COMM_CODE='".$ZCDR_code."' GROUP by DIV_CODE) as p inner JOIN zone ON p.DIV_CODE = zone.ZCDR_CODE GROUP by ZCDR_CODE";
//$query = "SELECT zone.COMM_CODE,zone.COMM_NAME, p.num_gstn, p.not_pending, p.pending FROM (SELECT COMM_CODE,COUNT(GSTIN) as num_gstn, SUM(Flag=1) as not_pending, sum(Flag=0) as pending FROM nested_category WHERE ZONE_CODE=".$comm_code." GROUP by COMM_CODE) as p inner JOIN zone ON p.COMM_CODE = zone.COMM_CODE GROUP by 1";

$getData = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($getData, MYSQLI_NUM)) {


    $ZCDR_NAME[] =  $row[0];
    $ZCDR_Count[] = $row[1];
    $not_pending[] = $row[2];
    $pending[] = $row[3];
    $ZCDR_CODE[] = $row[4];
   
}


//$tablequery =  "SELECT  zone.ZCDR_CODE,zone.COMM_NAME, p.GSTIN, p.mismatch_percentage FROM (SELECT COMM_CODE, DIV_CODE,RANGE_CODE,GSTIN,mismatch_percentage FROM nested_category WHERE ZONE_CODE=".$comm_code." AND Flag =1 GROUP by GSTIN ORDER BY mismatch_percentage) as p inner JOIN zone ON p.COMM_CODE = zone.COMM_CODE  GROUP BY GSTIN ORDER BY mismatch_percentage DESC";
$tablequery = "SELECT zone.ZCDR_NAME, p.GSTIN, p.mismatch_percentage, zone.ZCDR_CODE FROM (SELECT DIV_CODE,RANGE_CODE,GSTIN,mismatch_percentage FROM nested_category WHERE COMM_CODE='".$ZCDR_code."' AND Flag =1 GROUP by GSTIN ORDER BY mismatch_percentage ) as p inner JOIN zone ON p.DIV_CODE = zone.ZCDR_CODE GROUP BY GSTIN ORDER BY mismatch_percentage DESC";


$getTableData = mysqli_query($conn, $tablequery);
while ($tablerow = mysqli_fetch_array($getTableData, MYSQLI_NUM)) {

   
    $ZCDR_name[] = $tablerow[0];
    $COMM_NAME[] = $tablerow[1];
    $GSTIN[] = $tablerow[2];
    $mismatch_percentage[] = $tablerow[3];
    

}


    



//print_r( $ZCDR_name);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Directorate General of Analytics and Risk Management (DGARM)</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src='https://cdn.plot.ly/plotly-latest.min.js'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src='https://code.jquery.com/jquery-3.4.1.min.js'></script>


</head>

<body>
    <!-- partial:index.partial.html -->

    <div class="container">
    <h1 style="text-align:center; border-bottom:1px solid red;">Directorate General of Analytics and Risk Management</h1>
    <div class="row justify-content-center">
        <h4 style="text-align:center; font-style:bold;margin-top:20px;">Division Wise Distribution</h4>
        <div class="col-lg-12 col-xs-12 col-sm-12" >
            <div id='myDiv' style="width:400px;margin-left:20px;">
                    <!-- Plotly chart will be drawn inside this DIV -->
                </div>
            </div>

        </div>
    </div>  
    <div class="row">
    <div class="col-lg-12 col-xs-12 col-sm-12">
            <div id='myDiv2' style="width:400px;margin-left:20px;">
                <!-- Plotly chart will be drawn inside this DIV -->
            </div>

    </div>

    </div>
    <div class="d-flex justify-content-center">
        <input id="toggleVisibilityButton" class="btn btn-success" type="button" value="List Of Pending GSTINs" style="margin-bottom:20px;
                margin-top:50px;" />


    </div>
            <div class="container" style="width:500px;">

          




                    <table id="displaytable" style="display:none" width="100%" >
                        <tr align="center">
                           <?php
                                $i = 0;

                                if(@$COMM_NAME == NULL){
    
                                    echo @"<tr><td align='center' style='border:1px solid red';>No DATA</td> </tr>";

                                }else{
                                while ($i<count($COMM_NAME)){
                                    echo @"<tr><td align='center' style='border:1px solid red';>" .$COMM_NAME[$i]. "</td> <td align='center' style='border:1px solid red';>" .$GSTIN[$i]. "</td><td align='center' style='border:1px solid red';>" .$mismatch_percentage[$i]. "</td></tr>";
                                    
                                    $i++;
                                }
                            }
                           
                           
                           ?>
                             
                        </tr>
                    </table>
                 </div>
            

   

   
    <script>
        var myPlot = document.getElementById('myDiv');

        var labelCode =
            <?php echo '["' . implode('", "', $ZCDR_CODE) . '"]' ?>;

        var labelArray =
            <?php echo '["' . implode('", "', $ZCDR_NAME) . '"]' ?>;

        var passedArray =
            <?php echo '[' . implode(',', $ZCDR_Count) . ']' ?>;


        var pendingArray =
            <?php echo '[' . implode(',', $pending) . ']' ?>;
        
        var not_pendingArray =
            <?php echo '[' . implode(',', $not_pending) . ']' ?>;

          

        var data = [{
            type: "pie",
            values: passedArray,
            labels: labelArray,
            textinfo: "label+percent",
            insidetextorientation: "radial",
            textposition: "inside",
            automargin: true
        }];

        var layout = {
            
            // autosize: false,
            // width: 1000,
            // height: 1000,
            margin: {
            "t": 0,
            "b": 0,
            "l": 0,
            "r": -20,
        },
            showlegend: false
        };
        var config = {responsive: true,
        displayModeBar: false};

        Plotly.newPlot('myDiv', data,layout,config);

        myPlot.on('plotly_click', function(data) {
            var pts = '';
            var pts = '';
            for (var i = 0; i < data.points.length; i++) {
                pts = 'label = ' + data.points[0].label + '\nvalue = ' + data.points[0].value;
            }
         //   alert( $ZCDR_NAME[labelArray.indexOf(data.points[0].label)]);
            console.log(labelCode[labelArray.indexOf(data.points[0].label)]);

            window.location.href = 'rangenew.php?divcode=' + labelCode[labelArray.indexOf(data.points[0].label)];
        });


        //ZCDR_namelabelArray.indexOf(data.points[0].label)]);


        // Bar graph

        // var myPlot = document.getElementById('myDiv2');

        // var data2 = [{
        //     x: labelArray,
        //     y: passedArray,
        //     type: 'bar'
        // }];

        // Plotly.newPlot('myDiv2', data2);

        // myPlot.on('plotly_click', function(data2) {
        //     var pts = '';
        //     for (var i = 0; i < data2.points.length; i++) {
        //         pts = 'x = ' + data2.points[i].x + '\ny = ' +
        //             data2.points[i].y.toPrecision(4) + '\n\n';
        //     }
        //     alert('Closest point clicked:\n\n' + pts);
        //     console.log('Closest point clicked:\n\n', pts);
        // });






        var primaryGDP = {
  x: labelArray,
  y: pendingArray,
  type: 'bar',
  name: 'Pending'
};

var secondaryGDP = {
  x: labelArray,
  y: not_pendingArray,
  type: 'bar',
  name: 'Not Pending'
};



var data2 = [primaryGDP, secondaryGDP];

var layout = {
        title: 'Total Pending and Not Pending ',
        barmode: 'stack',
        height:700,
        margin: {
            "t": 100,
            "b": 250,
            "l": 50,
            "r": 0,
        },

        //   margin: {
        //     l: 50,
        //     r: 0,
        //     t:0,
        //     b:0
        // }
    };
    var config = {responsive: true,
        displayModeBar: false};

    Plotly.plot(myDiv2, data2, layout,config);






     



        document.getElementById("toggleVisibilityButton").addEventListener("click", function(button) {
            if (document.getElementById("displaytable").style.display === "none") document.getElementById("displaytable").style.display = "block";
            else document.getElementById("displaytable").style.display = "none";
        });

        




    </script>









    <!--BODY ENDS HERE-->


  

    <!-- partial -->




</body>

</html>