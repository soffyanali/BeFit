   <?php
// Start the session

   
  require_once('update_action.php');
 //
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

<link href="css2/bootstrap.css" rel='stylesheet' type='text/css' />

<link rel="stylesheet" href="build/css/intlTelInput.css">



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

<!-- Metis Menu -->
<script src="js2/metisMenu.min.js"></script>
<script src="js2/custom.js"></script>
<link href="css2/custom.css" rel="stylesheet">
<!--//Metis Menu -->

</head> 
<body class="cbp-spmenu-push">
	<div class="col-md-10">

		<!--left-fixed -navigation-->
		
		
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper" class="col-md-10">


			          <?php
                    if( isset($_SESSION['SUCCESS_MESSAGE']) ){
                    ?>

                  <div class="alert alert-success">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <?php echo $_SESSION['SUCCESS_MESSAGE']; ?>
                 </div>

                 <?php
                  unset( $_SESSION['SUCCESS_MESSAGE'] );
                  }
                  ?>

                  <div class="registration">
						Go Back to Dashboard
						<a class="" href="dashboard.php">
							Dashboard
						</a>
					</div>


			<div class="main-page signup-page">
				<h2 class="title1">User Update Here</h2>
				<div class="sign-up-row widget-shadow">
					<h5>Personal Information :</h5>
				<form method="post"  action="update_action.php">
					<div class="sign-u"><h5>firstname</h5>
								<input type="text" name="firstname" id="firstname" placeholder="<?php if(isset($first_name)) { echo $first_name; } ?>"  value="<?php if(isset($firstname)) { echo $firstname; } ?>">
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u"><h5>lastname</h5>
								<input type="text" name="lastname" id="lastname" placeholder="<?php if(isset($lastname)) { echo $lastname; } ?>" value="<?php if(isset($lastname)) { echo $lastname; } ?>" >
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u"><h5>Age</h5>
								<input type="text" placeholder="<?php if(isset($Age)) { echo $Age; } ?>" name="Age" id="age"  value="<?php if(isset($Age)) { echo $Age; } ?>">
						<div class="clearfix"> </div>
					</div>
					
					<div class="sign-u"><h5>height</h5>
								<input type="text" placeholder="<?php if(isset($height)) { echo $height; } ?>" name = "height" id="height" value="<?php if(isset($height)) { echo $height; } ?>">
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u"><h5>weight</h5>
								<input type="text" placeholder="<?php if(isset($weight)) { echo $weight; } ?>" name="weight" id="weight"  value="<?php if(isset($weight)) { echo $weight; } ?>">
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u"><h5>targetWeight</h5>
								<input type="text" placeholder="<?php if(isset($targetWeight)) { echo $targetWeight; } ?>" name = "targetWeight" id="targetWeight" value="<?php if(isset($targetWeight)) { echo $targetWeight; } ?>">
						<div class="clearfix"> </div>
					</div>
                    
					
					
						<div class="clearfix"> </div>
					<div class="sub_home">
							<input type="submit" name="submit" value="Submit">
						<div class="clearfix"> </div>
					</div>
					
				</form>
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


	<script src="build/js/intlTelInput.js"></script>
  <script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
      // allowDropdown: false,
      // autoHideDialCode: false,
      // autoPlaceholder: "off",
      // dropdownContainer: document.body,
      // excludeCountries: ["us"],
      // formatOnDisplay: false,
      // geoIpLookup: function(callback) {
      //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
      //     var countryCode = (resp && resp.country) ? resp.country : "";
      //     callback(countryCode);
      //   });
      // },
      // hiddenInput: "full_number",
      // initialCountry: "auto",
      // localizedCountries: { 'de': 'Deutschland' },
      // nationalMode: false,
      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
      // placeholderNumberType: "MOBILE",
      // preferredCountries: ['cn', 'jp'],
      // separateDialCode: true,
      utilsScript: "build/js/utils.js",
    });
  </script>
	
</body>
</html>