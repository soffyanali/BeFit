<?php
session_start();
?>

<!DOCTYPE HTML>
<html>
<head>
<title>BE-FIT</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->
<link href="css2/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="css2/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="css2/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons CSS -->

 <!-- side nav css file -->
 <link href='css2/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
 <!-- side nav css file -->
 
 <!-- js-->
<script src="js2/jquery-1.11.1.min.js"></script>
<script src="js2/modernizr.custom.js"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts--> 

<!-- Metis Menu -->
<script src="js2/metisMenu.min.js"></script>
<script src="js2/custom.js"></script>
<link href="css2/custom.css" rel="stylesheet">
<!--//Metis Menu -->

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
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<h2 class="title1">POST</h2>
				<div class="blank-page widget-shadow scroll" id="style-2 div1">
					<div class="row">
					<h3 class="title1" >My Post</h3>  
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Topic</th>
        <th>User</th>
        <th>Title</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="myTable">
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
        <td><a><button type="button" class="btn btn-success btn-circle" data-toggle="tooltip" title="view"><i class="fa fa-eye"> </i></button> </a>
        <a><button type="button" class="btn btn-primary btn-circle" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"> </i></button> </a>
    <a><button type="button" class="btn btn-danger btn-circle" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"> </i></button> </a>
</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@mail.com</td>
         <td><a><button type="button" class="btn btn-success btn-circle" data-toggle="tooltip" title="view"><i class="fa fa-eye"> </i></button> </a>
        <a><button type="button" class="btn btn-primary btn-circle" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"> </i></button> </a>
    <a><button type="button" class="btn btn-danger btn-circle" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"> </i></button> </a>
</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@greatstuff.com</td>
         <td><a><button type="button" class="btn btn-success btn-circle" data-toggle="tooltip" title="view"><i class="fa fa-eye"> </i></button> </a>
        <a><button type="button" class="btn btn-primary btn-circle" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"> </i></button> </a>
    <a><button type="button" class="btn btn-danger btn-circle" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"> </i></button> </a>
</td>
      </tr>
      <tr>
        <td>Anja</td>
        <td>Ravendale</td>
        <td>a_r@test.com</td>
         <td><a><button type="button" class="btn btn-success btn-circle" data-toggle="tooltip" title="view"><i class="fa fa-eye"> </i></button> </a>
        <a><button type="button" class="btn btn-primary btn-circle" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"> </i></button> </a>
    <a><button type="button" class="btn btn-danger btn-circle" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"> </i></button> </a>
</td>
      </tr>
    </tbody>
  </table>
  
  <p>Note that we start the search in tbody, to prevent filtering the table headers.</p>
				</div>

				</div>
				
			</div>
		</div>
		<!--footer-->
		
        <!--//footer-->
	</div>
	
	<!-- side nav js -->
	<script src='js2/SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->
	
	<!-- Classie --><!-- for toggle left push menu script -->
		<script src="js2/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- //Classie --><!-- //for toggle left push menu script -->
	
	<!--scrolling js-->
	<script src="js2/jquery.nicescroll.js"></script>
	<script src="js2/scripts.js"></script>
	<!--//scrolling js-->
	
	<!-- Bootstrap Core JavaScript -->
   <script src="js2/bootstrap.js"> </script>


   <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
   
</body>
</html>