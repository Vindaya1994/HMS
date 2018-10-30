
<!DOCTYPE html>

<html lang="en">
    
    <head>
        <?php include_once'headers/header.php' ?>
        <!-- css to the relevant page  -->
        <link rel="stylesheet" href="assets/css/dinning.css" >
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
							<img class="imgslider"src="assets/img/dinning/dinning2.jpg" >
						</div>
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="assets/img/dinning/indinning6.jpg" >
						</div>
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="assets/img/dinning/dinning8.jpg" >
						</div>
						
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="assets/img/dinning/dinning10.jpg" >
						</div>
					</div>
					
				</div>
		<!-- End Page header -->	
		
		<!--*****************************************************Page Content***************************************************************-->
		
		<div class="site-main container">
			<div class="section-page-heading row  ">
				<div class="breadcrumb-leftnav-wrapper ">
					<div class="col-md-12 col-lg-10 col-lg-offset-1 ">
						<ul class="breadcrumb">
							<li><a href="index.php" title="The Tenth Hotel" class="bolds">Home</a></li>
							<li class="active"><span class="">Dining</span></li>
						</ul>
						<div class="breadcrumb-contacts">
							<a class="tellink" href="tel:+94 572 226 220">Tel : +94 572 226 220</a> 
							<a href="contact_us.php">Contact Us</a>
						</div>
					</div> 
				</div> 
				<div class="col-md-12 col-lg-10 col-lg-offset-1">
				<hr>
					<h1><span>Dinning</span>
						Whet your Appetite


					</h1>
				</div>
				<div class="section-page-content row">
					<div class="col-lg-10 col-lg-offset-1">
						<p>From restaurants to in-room menus and more, our food and beverage offerings are sure to satisfy your every craving. We challenge our guests to break the rules and dine differently. Join us for an innovative, exciting and entirely unique dining experience.</p>

					</div>
				</div>
				<div class="section-child-page-blocks row">
					<div class="c col-lg-5 col-lg-offset-1">
						<div class="image-wrapper" style="background-image: url(assets/img/dinning/dinning12.jpg);"></div>
						<div class="description-wrapper">
							<div class="description-inner">
								<h2>restaurant</h2>
									<div class="description">
										<p>Enjoy wondrous food &amp; cocktails as you lounge by the pool</p>
									</div>
								<a href="view_drestaurant.php" class="w3-button w3-green">Find Out More</a>							
							</div>
						</div>
					</div>
					<div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3 col-lg-5 col-lg-offset-0">
						<div class="image-wrapper" style="background-image: url(assets/img/dinning/indinning4.jpg);"></div>
						<div class="description-wrapper">
							<div class="description-inner">
								<h2>In-Room Dining</h2>
									<div class="description">
										<p>Don your bathrobe as you feast on a delicious meal</p></div>
								
								<a href="view_dinRoomDining.php" class="w3-button w3-green">Find Out More</a></div>
						</div>
					</div>
					
				</div>
			</div> 
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
