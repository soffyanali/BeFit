

<?php
/*
 * Soffyan Ali X13114531
 * Front-End of Dashboard
 */
include_once('session.php');

?>


<!DOCTYPE HTML>
<html>
<head>
<title>BE-Fit</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->
<link href="css2/bootstrap.css" rel='stylesheet' type='text/css' />


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

<!-- Custom CSS -->
<link href="css2/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="css2/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons CSS-->

<!-- side nav css file -->
<link href='css2/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
<!-- //side nav css file -->
 
 <!-- js-->
<script src="js2/jquery-1.11.1.min.js"></script>
<script src="js2/modernizr.custom.js"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts--> 

<!-- chart -->
<script src="js2/Chart.js"></script>
<!-- //chart -->

<!-- Metis Menu -->
<script src="js2/metisMenu.min.js"></script>
<script src="js2/custom.js"></script>
<link href="css2/custom.css" rel="stylesheet">
<!--//Metis Menu -->
<style>
#chartdiv {
  width: 100%;
  height: 295px;
}
</style>
<!--pie-chart --><!-- index page sales reviews visitors pie chart -->
<script src="js2/pie-chart.js" type="text/javascript"></script>
 <script type="text/javascript">
/////////////////////////////////////////////////////////////////////////
        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#2dde98',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#8e43e7',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ffc168',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

           
        });

    </script>
<!-- //pie-chart --><!-- index page sales reviews visitors pie chart -->

  <!-- requried-jsfiles-for owl -->
          <link href="css2/owl.carousel.css" rel="stylesheet">
          <script src="js2/owl.carousel.js"></script>
            <script>
              $(document).ready(function() {
                $("#owl-demo").owlCarousel({
                  items : 3,
                  lazyLoad : true,
                  autoPlay : true,
                  pagination : true,
                  nav:true,
                });
              });
            </script>
          <!-- //requried-jsfiles-for owl -->
</head> 
<body class="cbp-spmenu-push">
  <div class="main-content">
  <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
    <!--left-fixed -navigation-->
    <aside class="sidebar-left">

      <?php 
     include_once("navigationbar.php");   // navigationbar
     ?>
    </aside>
  </div>
    <!--left-fixed -navigation-->
    
    <!-- header-starts -->
    <?php 
     include_once("header.php");   // navigationbar
     ?>
    <!-- //header-ends -->







    <?php
include('code.php');


?>

<?php
include('diet_action2.php');
?>





<?php

// Graph code



$email = $_SESSION['login_user'];

$connect = mysqli_connect("localhost", "root", "", "be_fit");
$query = "SELECT heart_rate,timeOfRecord as datetime FROM user_health_status where email = '$email' ORDER by timeOfRecord DESC limit 10";

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

// insert heart rate data to json file
$jsonTable = json_encode($table);




// echo $jsonTable;

?>





<?php

//featchnign heart rate and steps from database


$email = $_SESSION['login_user'];
$conn = new mysqli("localhost", "root", "", "be_fit");
$sql2 = "SELECT heart_rate,calories,steps FROM user_health_status  where email = '$email' ORDER BY status_id DESC LIMIT 1 ";


            if($result = mysqli_query($conn, $sql2)){

                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                                     $value1=$row['heart_rate'];
                                     $value2=$row['calories'];
                                     $value3=$row['steps'];
   
                        }
// Alert for  heart rate   [https://www.twilio.com/docs/sms]
                        if ($value1 >= 120) {
  include_once('sms4.php');
  # code...
}
        
                             // Close result set
                             mysqli_free_result($result);
                    } else{
                         echo "No records matching your query were found.";
                    }

            }   else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            }

?>
    <!-- main content start-->
    <div id="page-wrapper">
      <div class="main-page">
      <div class="col_3">
          <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
                    <i class="pull-left fa fa-heartbeat user1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php if(isset($value1)) echo $value1; ?></strong></h5>
                      <span>Heart Rate</span>
                    </div>
                </div>
          </div>
          <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
                    <i class="pull-left fa fa-fire dollar1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php if(isset($value2)) echo $value2; ?></strong></h5>
                      <span>Calories Burn</span>
                    </div>
                </div>
          </div>
          <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
                    <i class="pull-left fa fa-road icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php if(isset($value3)) echo $value3; ?></strong></h5>
                      <span>Steps</span>
                    </div>
                </div>
          </div>
          <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
                    <i class="pull-left fa fa-user dollar1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php if(isset($bmiuser)) echo $bmiuser; ?></strong></h5>
                      <span>BMI</span>
                    </div>
                </div>
           </div>

          <div class="col-md-3 widget">
            <div class="r3_counter_box">
                    <i class="pull-left fa fa-cutlery  user1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php if(isset($caloriesRequired)) echo $caloriesRequired;  ?></strong></h5>
                      <span>Calories/Day</span>


                    </div>
                </div>
           </div>
          <div class="clearfix"> </div>
            <?php
       // echo $step_count;
        if (isset($authUrl)) {
            echo "<a class='login' href='" . $authUrl . "'>Sync Your Google Fit</a>";
            //echo" <button class='login' href='" . $authUrl . "'  class='btn btn-success'>Sync your google fit</button>";
        } 
        ?>
           <!--  <button type="submit" class="btn btn-success" name="submit" >Sync your google fit</button> -->
    </div>
    
    <div class="row-one widgettable">
      <div class="col-md-7 content-top-2 card">
        <div class="agileinfo-cdr">
          <div class="card-header">
                        <h3>Heart Rate</h3>
                    </div>

                              <div id="line_chart" style="width: 98%; height: 350px"></div>
            </div>
            
        </div>
      </div>
      <div class="col-md-5 stat">
        
        
<!-- Recommended food list display -->


      
        
        
        <div class="r3_counter_box">
          <h2>Targets</h2>
          <div class="scrollbar" id="style-1">
            <div class="activity-row">
             
              <div class="col-xs-7 activity-desc">
                <h5><a href="diet2.php">Breakfast Calories</a></h5>
                <p><?php if(isset($caloriesRequiredForBreakfast)) echo $caloriesRequiredForBreakfast;  ?></p>
              </div>
              <div class="col-xs-2 activity-desc1"><h6>9 to 10 AM</h6></div>
              <div class="clearfix"> </div>
            </div>
            <div class="activity-row">
             
              <div class="col-xs-7 activity-desc">
                <h5><a href="diet2.php">Lunch Calories</a></h5>
                <p><?php if(isset($caloriesRequiredForLunch)) echo $caloriesRequiredForLunch;  ?></p>
              </div>
              <div class="col-xs-2 activity-desc1"><h6>2 to 3 PM</h6></div>
              <div class="clearfix"> </div>
            </div>
            <div class="activity-row">
             
              <div class="col-xs-7 activity-desc">
                <h5><a href="diet2.php">Dinner Calories</a></h5>
                <p><?php if(isset($caloriesRequiredForDinner)) echo $caloriesRequiredForDinner;  ?></p>
              </div>
              <div class="col-xs-2 activity-desc1"><h6>7 to 8 PM</h6></div>
              <div class="clearfix"> </div>
            </div>
                       
            
            
          </div>
        </div>
      
      <div class="clearfix"> </div>
    </div>
        
        
  
  

    <script  src="js2/index1.js"></script>
      
      </div>
    </div>
  <!--footer-->
  
    <!--//footer-->
  </div>
    
  <!-- new added graphs chart js-->
  
    <script src="js2/Chart.bundle.js"></script>
    <script src="js2/utils.js"></script>


    <style>
  .page-wrapper
  {
   width:1000px;
   margin:0 auto;
  }
  </style>
  
  
  <!-- new added graphs chart js-->
  
  <!-- //for index page weekly sales java script -->
  
  
   
  <!-- Bootstrap Core JavaScript -->
   <script src="js2/bootstrap.js"> </script>
  <!-- //Bootstrap Core JavaScript -->

  

  <!--  Java script for graph -->

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
  
</body>
</html>










