
<!DOCTYPE html>

<html lang="en">
    
    <head>
        <?php include_once'headers/header.php' ?>
        <!-- css to the relevant page  -->
        <link rel="stylesheet" href="assets/css/restaurant.css" >
		<style></style>
    </head>

 
	<body class="w3-white" >
        <!-- Page header -->
		<header>
			<?php
			if(isset($_SESSION['uid'])) {
				include_once './navigations/nav2.php';

			}else{
				include_once './navigations/nav1.php';
			}
			?>	
		</header>
		
				<!-- ********************************************include the relevant Slideshow Images*********************************************** -->
				<div id="myslide">
					<!-- Automatic Slideshow Images -->
					<div id="slideht">
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="assets/img/dinning/dinning6.jpg" >
						</div>
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="assets/img/dinning/dinning9.jpg" >
						</div>
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="assets/img/dinning/dinning8.jpg" >
						</div>
					</div>
				</div>
		<!-- End Page header -->	
		
		<!--*****************************************************Page Content***************************************************************-->
		
		<div class="site-main container" style="margin-bottom:40px;" >
			<div class="section-page-heading row  ">
				<div class="breadcrumb-leftnav-wrapper ">
					<div class="col-md-12 col-lg-10 col-lg-offset-1 ">
						<ul class="breadcrumb">
							<li><a href="index.php" title="The Tenth Hotel" class="bolds">Home</a><span class="sep"></span></li>
							<li class="active"><span class="last">Dining</span><span class="sep"></li>
							<li class="active"><span class="last">Restaurant</li>
						</ul>
						<div class="breadcrumb-contacts">
							<a class="tellink" href="tel:+94 572 226 220">Tel : +94 572 226 220</a> 
							<a href="contact_us.php">Contact Us</a>
						</div>
					</div> 
					<div class="col-md-12 col-lg-10 col-lg-offset-1">
						<hr>
						<h1><span>Tenth hotel ella</span>
							restaurant
						</h1>
					</div>
				</div> 
			</div>
			<div class="section-page-content row">
				<div class="col-lg-10 col-lg-offset-1">
					<p>Where elegance meets extravagance, cuisine restaurant, is ideal for dining in groups or even intimate meals for two. Each meal of the day is a grand culinary convergence that brings together specialities from around the world. Featuring a lavish à la carte menu, interactive food stations & the longest buffet spread amongst restaurants in Ella, Sri Lanka, Surrounded on all sides by floor-to-ceiling glass panels that give way to magnificent views, The Grill enjoys a cosy & romantic ambience, ideal for intimate dinners for two. Let us pamper you with appetising luxuries afforded by our extensive menu, which includes steak, exotic seafood & chicken dishes, paired with rich wines & signature cocktails.</p>
					<div class="col-sm-10 col-sm-offset-1 text-center"><a href="view_dmeal.php" class="button" style="margin:30px 40px;">View Menu</a></div>
				</div>
				
			</div>
			<!--section 3-->
			<div class="section-opening-hours section-restaurant-details row" style="margin-top:40px;">
				<div class="col-lg-10 col-lg-offset-1">
					<div class="block">
						<h2>Opening Hours</h2>
						<ul>
							<li><span class="label">Breakfast</span><span class="value">Monday - Saturday: 06:00am to 10:00am</span></li>
							<li><span class="label">Lunch</span><span class="value">Monday – Saturday: 12:00pm to 03:00pm</span></li>
							<li><span class="label">Dinner</span><span class="value">Monday – Saturday: 06:30pm to 12:00am</span></li>
						</ul>
					</div>
					<div class="image-wrapper block" style="background-image: url(assets/img/dinning/img10.jpg);"></div>
				</div>
			</div>
			<div class="section-restaurant-description section-restaurant-details row">
				<div class="col-lg-10 col-lg-offset-1">
					<div class="block"><h3>Special comments:</h3>
					<h6 style="color:white; text-transform: capitalize;">Best view of Ella / Interactive food stations /  / Cigars	</h6></div>
					<div class="block"><h3>Specialities: </h3>
					<h6 style="color:white; text-transform: capitalize;">Signature cocktails, premium champagnes &amp; creative comfort cuisine</h6></div>
				</div>
			</div>
			<div class="section-quick-reference section-restaurant-details row">
				<div class="col-lg-10 col-lg-offset-1">
					<div class="image-wrapper block" style="background-image: url(assets/img/dinning/img9.jpg);"></div>
					<div class="block">
						<h2>Quick References</h2>
						<ul>
							<li><span class="label">Location</span><span class="value">Ground floor</span></li>
							<li><span class="label">Seating Type</span><span class="value">indoor Seating</span></li>
							<li><span class="label">Attire</span><span class="value">Smart Casual</span></li>
						</ul>
					</div>
				</div>
			</div>
			<!--<div class="col-sm-10 col-sm-offset-1 text-center"><a href="/inquiry-form.html" class="button" style="margin:40px 40px;">Inquire Now</a></div>-->
				
		</div> 
		 	
            
		<!--***************************************************** End Page Content************************************************************* -->
		
		<!-- Footer -->
		<footer>
			<?php
				if(isset($_SESSION['uid'])) {
					include_once './footers/footer2.php';

				}else{
					include_once './footers/footer1.php';
				}
			?>	
		</footer>
   		<!-- End Footer -->

        <!-- ***********************************************************include needed java script*****************************************************************-->
        <script>
			// Automatic Slideshow - change image every 4 seconds
			var myIndex = 0;
			carousel();

			function carousel() {
				var i;
				var x = document.getElementsByClassName("mySlides");
				for (i = 0; i < x.length; i++) {
				x[i].style.display = "none";  
				}
				myIndex++;
				if (myIndex > x.length) {myIndex = 1}    
				x[myIndex-1].style.display = "block";  
				setTimeout(carousel, 4000);    
			}
			
			//open register form
			function openRegWin() {
				window.location='guest_register.php';
			}
			//open login form
			function openLogWin() {
				window.location='login.php';
			}

			/*check availability form*/
			function openAvailability() {
				window.location='availability.php';
			}
		</script>
	</body>
</html>
