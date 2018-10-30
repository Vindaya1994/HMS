
<!DOCTYPE html>

<html lang="en">
    
    <head>
        <?php include_once 'headers/header.php' ?>
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
				<!-- Automatic Slideshow Images -->
				<div id="myslide">
					<div class="mySlides w3-display-container w3-center">
						<img src="assets/img/index/horel.jpg" style="width:100%; height:550px;">
						<div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small ">
							<h2 class="w3-jumbo w3-text-white"style="letter-spacing: 3px;text-shadow:3px 2px 0 #444"><b>THE TENTH HOTEL <b></h2>
							<p><b>ELLA , SRI LANKA</b></p>   
						</div>
					</div>
					<div class="mySlides w3-display-container w3-center">
						<img src="assets/img/index/index1.jpg" style="width:100%; height:550px;">
						<div class="w3-display-bottommiddle w3-container w3-text-black w3-padding-32 w3-hide-small">
							<h1 class="w3-jumbo "style="letter-spacing: 3px;text-shadow:3px 2px 0 #444"><b>THE TENTH HOTEL <b></h1>
							<h3><b>ELLA , SRI LANKA</b></h3>     
						</div>
					</div>
					<div class="mySlides w3-display-container w3-center">
						<img src="assets/img/index/index5.jpg" style="width:100%; height:550px;">
						<div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small ">
							<h2 class="w3-jumbo w3-text-white"style="letter-spacing: 3px;text-shadow:3px 2px 0 #444"><b>THE TENTH HOTEL <b></h2>
							<p><b>ELLA , SRI LANKA</b></p>   
						</div>
					</div>
					<div class="mySlides w3-display-container w3-center">
						<img src="assets/img/index/index3.jpg" style="width:100%; height:550px;">
						<div class="w3-display-bottommiddle w3-container w3-text-black w3-padding-32 w3-hide-small">
							<h1 class="w3-jumbo "style="letter-spacing: 3px;text-shadow:3px 2px 0 #444"><b>THE TENTH HOTEL <b></h1>
							<h3><b>ELLA , SRI LANKA</b></h3>     
						</div>
					</div>
				</div>
			
		
		<!--content-->
		<div >
		
            <!--Hotel discription-->
			<div class="w3-row">
				<div class="w3-container w3-content w3-center w3-padding-64" style="max-width:900px" id="hotel">
					<div class="fullwidth wrapper ">
					
						<h4 ><span>THE TENTH HOTEL ELLA</span> </h4>
					</div>
					<div class="fullwidth  ">
						<p class="w3-center "style="letter-spacing: 2px;">Showcasing  a sun  terrace and views of the mountains, The Tenth Hotel is located in Ella in the region of Badulla District, 
						just 30.6 km from Nuwara Eliya. Guests can enjoy the on-site restaurant.Car rental is available at this hotel and the area is 
						popular for hiking. Bandarawela is 8 km from The Tenth Hotel, and Haputale is 14.5 km away.This is our guests' favorite part of Ella, according to independent reviews.
						<br>
						We speak your language! </p>
						<div class="w3-row w3-padding-32">
							<i class="fa fa-map-marker" style="width:30px"></i> Ella, Sri Lanka &nbsp;&nbsp;
							<i class="fa fa-phone" style="width:30px"></i> Phone: Tel :+94 572 226 220 &nbsp;&nbsp;
							<i class="fa fa-envelope" style="width:30px"> </i> Email: Tenthhotel@mail.com
						</div>
					</div>
				</div>
			</div>
			
			<!-- -->
			<div class="w3-row fullwidth border" id="home-links-wrapper" style="background: url(assets/img/index/bg17.png) repeat-x bottom ;"> 
				<div style="height:170px">
					<div class="home-links-box">
						<a href="view_room.php">
							<img src="assets/img/index/index3.jpg">
							<div>
								<h2><strong ><span>ROOMS</span></strong></h2>
							</div>
						</a>
					</div> 
					<div class="home-links-box">
						<a href="view_dinning.php">
							<img src="assets/img/index/meal2.jpg">
							<div>
								<h2><strong><span>meals</span></strong></h2>
							</div>
						</a>
					</div> 
					<div class="home-links-box">
						<a href="view_services.php">
							<img src="assets/img/index/service3.jpg">
							<div>
								<h2><strong><span>Services</span></strong></h2>
							</div>
						</a>
					</div> 
					<div class="home-links-box">
						<a href="view_vacancies.php">
							<img src="assets/img/index/vacan1.jpg">
							<div>
								<h2><strong><span>vacancies</span></strong></h2>
							</div>
						</a>
					</div> 
					<div class="home-links-box">
						<a href="view_promotions.php">
							<img src="assets/img/index/prom1.jpg">
							<div>
								<h2><strong><span>promotions</span></strong></h2>
							</div>
						</a>
					</div> 
				</div>
			</div> 
			
            <!-- Grid -->
            <div class="w3-row w3-white">
                <!-- Blog entries -->
                <div class="container w3-col l7 s12"style="padding-top:60px">
                    <!-- Blog entry -->
                    <div class="w3-card-4 w3-margin ">
                        <img src="assets/img/index/faci1.jpg" alt="welcome image" style="width:100% ">
                        <div class="content">
                            <div class="w3-col l6 s12">
                                <div class="w3-margin">
                                    <div class="w3-container w3-padding">
                                        <h1>OUR FACILITIES</h1>
                                    </div>
                                    <ul class="w3-ul w3-hoverable ">
                                        <li class="w3-padding-16">
                                            <img src="assets/img/index/home/bed.png" alt="Image" class="w3-left w3-margin-right" style="width:50px">
                                            <span class="w3-large">Signature Beds</span><br>
                                            <span>Deep sleep for bright days</span>
                                        </li>
                                        <li class="w3-padding-16">
                                            <img src="assets/img/index/home/clock.png" alt="Image" class="w3-left w3-margin-right" style="width:50px">
                                            <span class="w3-large">Midscale Services</span><br>
                                            <span>Facilities you need,done right</span>
                                        </li> 
                                        <li class="w3-padding-16">
                                            <img src="assets/img/index/home/wifi.jpg" alt="Image" class="w3-left w3-margin-right" style="width:50px">
                                            <span class="w3-large">Stay Connected</span><br>
                                            <span>Free WiFi</span>
                                        </li>   
                                        <li class="w3-padding-16 w3-hide-medium w3-hide-small">
                                            <img src="assets/img/index/home/location.png" alt="Image" class="w3-left w3-margin-right" style="width:50px">
                                            <span class="w3-large">Lively Locations</span><br>
                                            <span>Close to nature,far enough to get away</span>
                                        </li>  
                                        <li class="w3-padding-16 w3-hide-medium w3-hide-small">
                                            <img src="assets/img/index/home/spoon.jpg" alt="Image" class="w3-left w3-margin-right" style="width:50px">
                                            <span class="w3-large">Meals</span><br>
                                            <span>Start the day with a healthy Boost</span>
                                        </li>                                 
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>
                <!--advertistments about events-->
                <div class="container w3-col l4 s12  w3-margin "style="height: 388px;padding-top:175px;">
                    <div class=" w3-margin">
                       <div class=" wrapper w3-cente ">
							<h4 ><span>"OUR GUESTS ENJOY THE BEST OF EVERYTHING"</span> </h4>
							<div class="fullwidth w3-padding-64 ">
								<p class="w3-center "style="letter-spacing: 2px;">welcome to The Tenth Hotel, Come, delight & breathe an air of luxury at the Tenth Hotel!
							</div>
						</div> 
                    </div>
                </div>                    
            </div>
			
           <!-- discription about gallery -->
            <div class="w3-white" id="gallery" >
                <div class="w3-container w3-content " style="max-width:100%;padding-top:64px;">
					<div style="background: url(assets/img/index/bg17.png) repeat-x bottom ; padding-bottom:30px;" >
						<div class="w3-row">
							<div class="w3-col l4 w3-center ">
								<div class="w3-column">
									<img class="zoom"src="assets/img/index/horel.jpg" alt="gallley img" style="width:100% ;height:310px;"><br>
								</div>
								<div class="w3-column">
									<img class="zoom"src="assets/img/index/img2.jpg" alt="gallery image" style="width:100% ;height:310px;">
								</div>
							</div>
							<div class="middle w3-col l4 w3-dark-grey w3-center">
								<img src="assets/img/index/gallery.jpg" alt="gallery image" style="width:100%; height:622px;-webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
								filter: grayscale(100%);">
								<div class="centered">
									<h1><b>GALLERY<b></h1><br>
									<form action="gallery.php" >
									<button id="" class="btn1">VIEW GALLERY</button>
									</form>
								</div>                        
							</div>
							<div class="w3-col l4 w3-center ">
								<div class="" >
									<img class="zoom"src="assets/img/index/img3.jpg" alt="gallery image" style="width:100% ;height:310px;"><br>
								</div>     
								<div class="">
									<img class="zoom"src="assets/img/index/img4.jpg" alt="gallery image" style="width:100%;height:310px; ">
								</div>   		
							</div>   

						</div>  
					</div>
				</div>
			</div>
			
			<!-- discription about service -->	
			<div class="w3-row service-section section "style="padding-bottom:60px;">
				<div class="col-lg-10 col-lg-push-1 ">
					<h2><span>EXPERIENCE</span>
						The Magic of Ella
					</h2>
					<div class="attractions-wrapper block ">
						<div class="inner">
							<h3 class="w3-border-bottom"style="padding-bottom:16px;">ATTRACTIONS</h3>
							<div class="attraction-indexes  ">
								<div class=" "style="height:275px">	
									<ul class="w3-ul  ">
										<li class="w3-padding-16">
											<span class="glyphicon glyphicon-chevron-right">
											<span class="w3-large"style="hover:green;">Ella Rock</span><br>
										</li>
										 <li class="w3-padding-16">
											<span class="glyphicon glyphicon-chevron-right">
											<span class="w3-large">Little Adam's peak</span><br>
										</li>
										<li class="w3-padding-16">
											<span class="glyphicon glyphicon-chevron-right">
											<span class="w3-large">Nine arch bridge</span><br>
										</li>
									</ul>
								</div>	
								<div class="w3-center  w3-text-white">	
									<form action="view_services.php" >
										<button class="btn1">VIEW ALL</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="carousel-map-wrapper block w3-display-container w3-center " style=" width: 727px;">
						<img src="assets/img/services/ellarock.jpg" style="width:100%; height:448px;">
						<div class="w3-display-topleft w3-container">
							<ul class="discover-toggler  ">	
								<li class="is-active">Images</li>
							</ul>
						</div>
						<div  class="">
							<div class="w3-display-bottomleft w3-container " style="padding:16px 16px"alt="">
								<div class="caption w3-text-white "style="width:270px;text-align:left">
									<h2  style="text-align:left"class="w3-text-white">Ella Rock</h2>
									<hr >
									<span>4.8 km</span><br>
									<span>13 minutes</span>
								</div>
							</div>
							<div class="w3-display-bottomright" style="padding:16px 32px">
								<form action="view_nearestPlaces.php" >
									<button class="btn1">EXPLORE</button>
								</form>
							</div>
						</div>
					</div> 
					
				</div>
			</div>
		</div>	
		<footer>
			<?php
				if(isset($_SESSION['uid'])) {
					include_once './footers/footer2.php';

				}else{
					include_once './footers/footer1.php';
				}
			?>	
		</footer>
   		<!-- End Page Content -->

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

			/*check availability form*/
			function openAvailability() {
				window.location='availability.php';
			}
		</script>
	</body>
</html>
