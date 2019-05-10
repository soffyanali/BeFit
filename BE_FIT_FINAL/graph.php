<?php
//index.php
$connect = mysqli_connect("localhost", "root", "", "be_fit");
$query = '
SELECT heart_rate,timeOfRecord as datetime FROM user_health_status ORDER by timeOfRecord DESC limit 10
';
$result = mysqli_query($connect, $query);
$rows = array();
$table = array();

$table['cols'] = array(
 array(
  'label' => 'Date Time', 
  'type' => 'string'
 ),
 array(
  'label' => 'Heart Rate', 
  'type' => 'number'
 )
);

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $datetime = explode(".", $row["datetime"]);
 $sub_array[] =  array(
      "v" =>  $datetime[0]
     );
 $sub_array[] =  array(
      "v" => $row["heart_rate"]
     );
 $rows[] =  array(
     "c" => $sub_array
    );
}
$table['rows'] = $rows;
$jsonTable = json_encode($table);


// echo $jsonTable;

?>


<html>
 <head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script type="text/javascript">
   google.charts.load('current', {'packages':['corechart']});
   google.charts.setOnLoadCallback(drawChart);
   function drawChart()
   {
    var data = new google.visualization.DataTable(<?php echo $jsonTable; ?>);

    var options = {
     title:'Heart Rate',
     legend:{position:'bottom'},
     chartArea:{width:'95%', height:'65%'}
    };

    var chart = new google.visualization.LineChart(document.getElementById('line_chart'));

    chart.draw(data, options);
   }
  </script>
  <style>
  .page-wrapper
  {
   width:1000px;
   margin:0 auto;
  }
  </style>
 </head>  
 <body>
  <div class="page-wrapper">
   <br />
   <h2 align="center">Heart Rate</h2>
   <div id="line_chart" style="width: 100%; height: 500px"></div>
  </div>
 </body>
</html>