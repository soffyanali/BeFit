   <?php
// Start the session
  require_once('signup_action.php');
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
                    if( isset($_SESSION['UNSUCCESS_MESSAGE']) ){
                    ?>

                  <div class="alert alert-success">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <?php echo $_SESSION['UNSUCCESS_MESSAGE']; ?>
                 </div>

                 <?php
                  unset( $_SESSION['USUCCESS_MESSAGE'] );
                  session_destroy();
                  }
                  ?>
			<div class="main-page signup-page">
				<h2 class="title1">SignUp Here</h2>
				<div class="sign-up-row widget-shadow">
					<h5>Personal Information :</h5>
				<form method="post"  action="signup_action.php">
					<div class="sign-u">
								<input type="text" name="firstname" id="firstname" placeholder="First Name" required="">
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
								<input type="text" name="lastname" id="lastname" placeholder="Last Name" required="">
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
								<input type="email" name="email" id="email"placeholder="Email Address" required="">
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
								<input type="text" placeholder="Age" name="age" id="age" required="">
						<div class="clearfix"> </div>
					</div>
					
					<div class="sign-u">
								<input type="text" placeholder="Height" name = "height" id="height"required="">
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
								<input type="text" placeholder="Weight" name="weight" id="weight" required="">
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
								<input type="text" placeholder="Target Weight" name = "targetWeight" id="targetWeight"required="">
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
									<select name="activityLevel" id="activityLevel" class="form-control">
										<option value="" selected disabled>-- Select Activity Level -- </option>
										<option value="1.30">Very Light : Sitting,studying,little walking</option>
										<option value="1.55">Light : Typing,teaching,some walking throughtout the day</option>
										<option value="1.65">Moderate : Walking,jogging,cycling,tennis,dancing,weight training 1-2 hours/day</option>
										<option value="1.80">Heavy : Heavy manual labor,activities such as football,body building 2-4 hours/day</option>
										<option value="2.00">Very Heavy : combination of moderate and heavy activities 8 hours/day</option>
									</select>
								</div>
                    
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Gender:</h4>
						</div>
						<div class="sign-up2">
							<label>
								<input type="radio" name= "gender" value="male" required="">
								Male
							</label>
							<label>
								<input type="radio" name="gender" value="female" required="">
								Female
							</label>
						</div>
						<div class="clearfix"> </div>
					</div>
					<h6>Login Information :</h6>
					<div class="sign-u">
								<input type="password" name="password" id="password" placeholder="Password" required="">
						<div class="clearfix"> </div>
					</div>
						<div class="clearfix"> </div>
					<div class="sub_home">
							<input type="submit" name="submit" value="Submit">
						<div class="clearfix"> </div>
					</div>
					<div class="registration">
						Already Registered.
						<a class="" href="login.php">
							Login
						</a>
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