
<!DOCTYPE html>

<html lang="en">
    
    <head>
        <?php include_once'headers/header.php' ?>
        <!-- css to the relevant page  -->
       
		<style>
		</style>
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

				<div id="myslide">
					<!-- Automatic Slideshow Images -->
					<div id="slideht">
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="assets/img/about_us/2.jpg" >
						</div>
						
					</div>
					
				</div>
			
<!--*************************************************************************************content***********************************************************************************-->
		<div class="site-main container">
			<div class="section-page-heading row  ">
				<div class="breadcrumb-leftnav-wrapper ">
					<div class="col-md-12 col-lg-10 col-lg-offset-1 ">
						<ul class="breadcrumb">
							<li><a href="index.php" title="The Tenth Hotel" class="bolds">Home</a><span class="sep"></span></li>
							<li class="active"><span class="last">About us</span></li>
						</ul>
						<div class="breadcrumb-contacts">
							<a class="tellink" href="tel:+94 572 226 220">Tel :+94 572 226 220</a> 
							<a href="contact_us.php">About us</a>
						</div>
					</div> 
				</div> 
				<div class="col-md-12 col-lg-10 col-lg-offset-1">
				<hr>
					<h1><span></span>
						
					</h1>
				</div>
				<div class="section-page-content row">
					<div class="col-lg-10 col-lg-offset-1">
						<div class="section-offer-content row"style="margin-top:40px;">
						<div class="images-wrapper col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-0 col-lg-5 col-lg-offset-1">
							<img style="height:301.172px;width:470px;"class="" src="assets/img/about_us/about_us.jpg" alt="">
						</div>
						<div class="content-wrapper col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-0 col-lg-5" >
							<h1 style=" margin-bottom: 40px;  margin-left: 40px; font-size: 25px;"> Located in the top-rated area in Ella </h1>

							
							<div class="section-page-content"></div>

							<hr>
							
					</div>
					<div class="section-content-bottom section-page-content row">
						<div class="col-sm-10 col-sm-offset-1 col-md-12 col-md-offset-0 col-lg-10 col-lg-offset-1">
							<hr>
							<p>Offering a restaurant, The Tenth Hotel is located in Ella and provides a 24-hour front desk for the convenience of the guests. Free WiFi access is available..</p>

							<p>Each room here will provide you with a seating area, flat-screen satellite TV and work desk. Private bathroom comes with free toiletries. You can enjoy mountain and garden view.</p>
							
							<p>At The Tenth Hotel you will find a garden and terrace. Other facilities offered at the property include a shared lounge. An array of activities can be enjoyed on site or in the surroundings, including hiking. The property offers free parking.</p>

							<p>The Mattala Rajapaksa International Airport is 40 mi away. </p>

							<p> This is our guests' favorite part of Ella, according to independent reviews. </p>
							<p> We speak your language! </p>
							
						</div>
					</div>
					</div>
				</div>
			
			</div>	
		</div>

		 <!---->		
				


<!--*******************************************************************************End of content***********************************************************************************-->
		
		<footer>
			<?php 
				if(isset($_SESSION['uid'])) {
					include_once './footers/footer2.php';

				}else{
					include_once './footers/footer1.php';
				}
			?>
		</footer>
   		
        <!--java script-->
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

			//disable button
				$('#my_button').on('click', function(){
                alert('Please login to the system for reservations.');
                $('#my_button').attr("disabled", true);
            });	

			/*check availability form*/
			function openAvailability() {
				window.location='availability.php';
			}


		

		</script>
	</body>
</html>
