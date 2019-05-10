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
 <script src="js/jquery.js"></script>
  <script src="js/jquery-migrate-1.2.1.js"></script>
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


     <?php
// Start the session
  require_once('diet_action2.php');
 //session_start();
   ?>

		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
        <form action="#" method="post"  id="demoForm1" class='rd-mailform' >
				<h2 class="title1">Diet Recipes</h2>
				<div class="blank-page widget-shadow scroll" id="style-2 div1">
					<div class="row">
					<h3 class="title1" >Breakfast</h3> 
          <h2 class="title1">Total Calories you should consume : <?php if(isset($caloriesRequiredForBreakfast)) echo $caloriesRequiredForBreakfast; ?> </h2> 
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <div id="toppings">
  <table class="table table-bordered table-bordered table-hover">
    <thead>
      <tr>
        <th>Action</th>
        <th>Title</th>
        <th>Rating</th>
        <th>Calories</th>
        <th>Ingredients</th>
        <th>Directions</th>
      </tr>
    </thead>
    <tbody id="myTable">
      <?php if(isset($diet_list1)) echo $diet_list1; ?>
    </tbody>
  </table>
</div>
  
  <p>Note that we start the search in tbody, to prevent filtering the table headers.</p>

  <label>Total calories you taken:  <input type="text" id="total" name="total" class="num" size="6" value="0" readonly="readonly"  style="color=#000000" onkeyup="sync()"/></label>
				</div>

				</div>
				</form>
			</div>
		</div>
    <div id="page-wrapper">
      <div class="main-page">
        <form action="#" method="post"  id="demoForm2" class='rd-mailform' >
        <div class="blank-page widget-shadow scroll" id="style-2 div1">
          <div class="row">
            <h3 class="title1" >Lunch</h3> 
          <h2 class="title1">Total Calories you should consume : <?php if(isset($caloriesRequiredForLunch)) echo $caloriesRequiredForLunch; ?> </h2> 
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <div id="toppings2">
  <table class="table table-bordered table-bordered table-hover">
    <thead>
      <tr>
        <th>Action</th>
        <th>Title</th>
        <th>Rating</th>
        <th>Calories</th>
        <th>Ingredients</th>
        <th>Directions</th>
      </tr>
    </thead>
    <tbody id="myTable">
      <?php if(isset($diet_list2)) echo $diet_list2; ?>
    </tbody>
  </table>
</div>
  
  <p>Note that we start the search in tbody, to prevent filtering the table headers.</p>

  <label>Total calories you taken:  <input type="text" id="total2" name="total2" class="num" size="6" value="0" readonly="readonly"  style="color=#000000" onkeyup="sync()"/></label>
        </div>

        </div>
        </form>
      </div>
    </div>
    <div id="page-wrapper">
      <div class="main-page">
        <form action="#" method="post"  id="demoForm3" class='rd-mailform' >
        <div class="blank-page widget-shadow scroll" id="style-2 div1">
          <div class="row">
          <h3 class="title1" >Dinner</h3> 
          <h2 class="title1">Total Calories you should consume : <?php if(isset($caloriesRequiredForDinner)) echo $caloriesRequiredForDinner; ?> </h2> 
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <div id="toppings3">
  <table class="table table-bordered table-bordered table-hover">
    <thead>
      <tr>
        <th>Action</th>
        <th>Title</th>
        <th>Rating</th>
        <th>Calories</th>
        <th>Ingredients</th>
        <th>Directions</th>        
      </tr>
    </thead>
    <tbody id="myTable">
      <?php if(isset($diet_list3)) echo $diet_list3; ?>
    </tbody>
  </table>
</div>
  
  <p>Note that we start the search in tbody, to prevent filtering the table headers.</p>

  <label>Total calories you taken:  <input type="text" id="total3" name="total3" class="num" size="6" value="0" readonly="readonly"  style="color=#000000" onkeyup="sync()"/></label>
        </div>

        </div>
        </form>
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


<script type="text/javascript">
    // call onload or in script segment below form
function attachCheckboxHandlers() {

    // get reference to element containing toppings checkboxes
    var el = document.getElementById('toppings');

    // get reference to input elements in toppings container element
    var tops = el.getElementsByTagName('input');
    
    // assign updateTotal function to onclick property of each checkbox
    for (var i=0, len=tops.length; i<len; i++) {
        if ( tops[i].type === 'checkbox' ) {
            tops[i].onclick = updateTotal;
        }
    }
}
    
// called onclick of toppings checkboxes
function updateTotal(e) {
    // 'this' is reference to checkbox clicked on
    var form = this.form;
    
    // get current value in total text box, using parseFloat since it is a string
    var val = parseFloat( form.elements['total'].value );
    var breakfast = <?php echo $caloriesRequiredForBreakfast+100;?>
    

    // if check box is checked, add its value to val, otherwise subtract it
    if ( this.checked ) {
        val += parseFloat(this.value);
    } else {
        val -= parseFloat(this.value);
    }
    
    if (val > breakfast) {
      alert('your breakfast intake is exceeded ');
      val -= parseFloat(this.value);
      this.checked = false;
    };
    // format val with correct number of decimal places
    // and use it to update value of total text box
    form.elements['total'].value = formatDecimal(val);
}
    
// format val to n number of decimal places
// modified version of Danny Goodman's (JS Bible)
function formatDecimal(val, n) {
    n = n || 2;
    var str = "" + Math.round ( parseFloat(val) * Math.pow(10, n) );
    while (str.length <= n) {
        str = "0" + str;
    }
    var pt = str.length - n;
    return str.slice(0,pt) + "." + str.slice(pt);
}

// in script segment below form

 

attachCheckboxHandlers();


    </script>



    <script type="text/javascript">
    // call onload or in script segment below form
function attachCheckboxHandlers2() {

    // get reference to element containing toppings checkboxes
    var el = document.getElementById('toppings2');

    // get reference to input elements in toppings container element
    var tops = el.getElementsByTagName('input');
    
    // assign updateTotal function to onclick property of each checkbox
    for (var i=0, len=tops.length; i<len; i++) {
        if ( tops[i].type === 'checkbox' ) {
            tops[i].onclick = updateTotal;
        }
    }
}
    
// called onclick of toppings checkboxes
function updateTotal(e) {
    // 'this' is reference to checkbox clicked on
    var form = this.form;
    
    // get current value in total text box, using parseFloat since it is a string
    var val = parseFloat( form.elements['total2'].value );
    var Lunch = <?php echo $caloriesRequiredForLunch+100;?>
    

    // if check box is checked, add its value to val, otherwise subtract it
    if ( this.checked ) {
        val += parseFloat(this.value);
    } else {
        val -= parseFloat(this.value);
    }
    
    if (val > Lunch) {
      alert('your Lunch intake is exceeded ');
      val -= parseFloat(this.value);
      this.checked = false;
    };
    // format val with correct number of decimal places
    // and use it to update value of total text box
    form.elements['total2'].value = formatDecimal(val);
}
    
// format val to n number of decimal places
// modified version of Danny Goodman's (JS Bible)
function formatDecimal(val, n) {
    n = n || 2;
    var str = "" + Math.round ( parseFloat(val) * Math.pow(10, n) );
    while (str.length <= n) {
        str = "0" + str;
    }
    var pt = str.length - n;
    return str.slice(0,pt) + "." + str.slice(pt);
}

// in script segment below form

 

attachCheckboxHandlers2();


    </script>

     <script type="text/javascript">
    // call onload or in script segment below form
function attachCheckboxHandlers3() {

    // get reference to element containing toppings checkboxes
    var el = document.getElementById('toppings3');

    // get reference to input elements in toppings container element
    var tops = el.getElementsByTagName('input');
    
    // assign updateTotal function to onclick property of each checkbox
    for (var i=0, len=tops.length; i<len; i++) {
        if ( tops[i].type === 'checkbox' ) {
            tops[i].onclick = updateTotal;
        }
    }
}
    
// called onclick of toppings checkboxes
function updateTotal(e) {
    // 'this' is reference to checkbox clicked on
    var form = this.form;
    
    // get current value in total text box, using parseFloat since it is a string
    var val = parseFloat( form.elements['total3'].value );
    var Dinner = <?php echo $caloriesRequiredForDinner+100;?>
    

    // if check box is checked, add its value to val, otherwise subtract it
    if ( this.checked ) {
        val += parseFloat(this.value);
    } else {
        val -= parseFloat(this.value);
    }
    
    if (val > Dinner) {
      alert('your Dinner intake is exceeded ');
      val -= parseFloat(this.value);
      this.checked = false;
    };
    // format val with correct number of decimal places
    // and use it to update value of total text box
    form.elements['total3'].value = formatDecimal(val);
}
    
// format val to n number of decimal places
// modified version of Danny Goodman's (JS Bible)
function formatDecimal(val, n) {
    n = n || 2;
    var str = "" + Math.round ( parseFloat(val) * Math.pow(10, n) );
    while (str.length <= n) {
        str = "0" + str;
    }
    var pt = str.length - n;
    return str.slice(0,pt) + "." + str.slice(pt);
}

// in script segment below form

 

attachCheckboxHandlers3();


    </script>
   
</body>
</html>