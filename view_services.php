<!DOCTYPE html>

<html lang="en">
    
    <head>
        <?php include_once'headers/header.php' ?>
        <!-- css to the relevant page  -->
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


				
				<!--Slideshow Images related to the content of the page -->
				<div id="myslide">
					<!-- Automatic Slideshow Images -->
					<div id="slideht">
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="images/a.jpg" >
						</div>
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="images/NA1.jpg" >
						</div>
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="images/b.jpg" >
						</div>
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="images/e.jpg" >
						</div>
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="images/i.jpg" >
						</div>
					</div>
					
				</div>
<!--***************************************************************************** content**************************************************************************************-->
		<div class="site-main container">
			<div class="section-page-heading row  ">
				<div class="breadcrumb-leftnav-wrapper ">
					<div class="col-md-12 col-lg-10 col-lg-offset-1 ">
						<ul class="breadcrumb">
							<li><a href="index.php" title="The Tenth Hotel" class="bolds">Home</a><span class="sep"></span></li>
							<li class="active"><span class="last">Services</span></li>
						</ul>
						<div class="breadcrumb-contacts">
							<a class="tellink" href="tel:+94 572 226 220">Tel : +94 572 226 220</a> 
							<a href="contact_us.php">Contact Us</a>
						</div>
					</div> 
				</div> 
				<div class="col-md-12 col-lg-10 col-lg-offset-1">
				<hr>
					<h1><span>SERVICES</span>
						 FOR DREAM HOLIDAYS
					</h1>
				</div>
				
				<div class="section-page-content row">
					<div class="col-lg-10 col-lg-offset-1">
						<p>The Ella is a famous tourist attracted town in Uva Province. You can experienced real Sri Lankan natural beauty in here. Natural pools,
						beautiful waterfalls, historical monoments and also amazing view points are around Ella which you can visit easily. The Tenth Hotel ella is always there to
						make your tour perfect. By joining with us you can experinced Yala, Udawalawa safari, night camping additionally. Come join with us and 
						make your tour more valueable and comfortable!</p>

					</div>
				</div>
				<div class="section-page-content row">
					<div class="col-lg-10 col-lg-offset-1">
						<table style="border:1px; border-color:#cad1d0; border-radius:10px; padding:5px; background-color:#edf6e9">
							
							<tr><td>&nbsp </td><td>&nbsp </td></tr>
							
							<tr style="padding:10px">
								<td>&nbsp &nbsp <img src="images/i.jpg" width="400px" height="300px">&nbsp &nbsp</td>
								<td><h2 align="center">Tour Plans</h2>
									<p />
									<p>&nbsp &nbsp Enjoy tour plans with The Tenth. Feel free to make your own tour Plan</p> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
									 &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
									 <a href="view_tourPlans.php"><button class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name="submit">Find Out More</button></a> 
								</td>
							</tr>
							
							<tr><td>&nbsp </td><td>&nbsp </td></tr>
							
							<tr style="padding:10px">
								<td>&nbsp &nbsp <img src="images/j.jpg" width="400px" height="300px">&nbsp &nbsp </td>
								<td><h2 align="center">Tour Guides</h2>
									<p />
									<p>&nbsp &nbsp Make your journey safe. Join with our tour guides.They will make you comfatable &nbsp &nbsp &nbsp &nbsp and  make a valuable tour.</p> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
									 &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
									 <a href="view_tourGuides.php"><button class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name="submit">Find Out More</button></a> 
								</td>
							</tr>
							
							<tr><td>&nbsp </td><td>&nbsp </td></tr>
							
							<p />
							<tr style="padding:10px">
								<td>&nbsp &nbsp <img src="images/v.jpg" width="400px" height="300px">&nbsp &nbsp </td>
								<td><h2 align="center">Transport Service</h2>
									<p />
									<p>&nbsp &nbsp Make a comforatable journey with The Tenth transport service.</p> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
									 &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
									 <a href="view_transport.php"><button class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name="submit">Find Out More</button></a> 
								</td>
							</tr>
	
							<tr><td>&nbsp </td><td>&nbsp </td></tr>
							
							<p />
							<tr style="padding:10px">
								<td>&nbsp &nbsp <img src="images/LS3.jpg" width="400px" height="300px">&nbsp &nbsp </td>
								<td><h2 align="center">Nearest Places</h2>
									<p />
									<p>&nbsp &nbsp Enjoy the beauty around Ella. Visit nearest places &amp fill your travel diary</p> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
									 &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
									 <a href="view_nearestPlaces.php"><button class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name="submit">Find Out More</button></a> 
								</td>
							</tr>
						</table>


						


					</div>
				</div>
			</div> 
		</div> 	
<!--*****************************************************************************End content**************************************************************************************-->
		
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

			/*check availability form*/
			function openAvailability() {
				window.location='availability.php';
			}
		</script>
	</body>
</html>
