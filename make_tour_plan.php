<?php include_once './config/customer.php'; ?>
<!DOCTYPE html>

<html lang="en">
    
    <head>
		<?php include_once 'headers/header.php';
		 ?>
		
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

				
				<!--Slideshow Images related to the content of the page -->
				<div id="myslide">
					<!-- Automatic Slideshow Images -->
					<div id="slideht">
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="images/c.jpg" >
						</div>
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="images/x.jpg" >
						</div>
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="images/y.jpg" >
						</div>
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="images/z.jpg" >
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
							<li class="active"><span class="last">Services</span></li>
							<li class="active"><span class="last">Tour Plans</span></li>
							<li class="active"><span class="last">Make Tour Plan</span></li>
							
						</ul>
						<div class="breadcrumb-contacts">
							<a class="tellink" href="tel:+94 572 226 220">Tel :+94 572 226 220</a> 
							<a href="contact_us.php">Contact Us</a>
						</div>
					</div> 
				</div> 
				<div class="col-md-12 col-lg-10 col-lg-offset-1">
				<hr>
					<h1><span>tour plans </span>
						Enjoy your own tour plans
					</h1>
				</div>
				<div class="section-page-content row">
					<div class="col-lg-10 col-lg-offset-1">
						<p>The Tenth Hotel Ella is always there to make your jorney perfect. We have designed awesome tour palns for you which will made an unforgettable 
						day for you. We also welcome your own tour palns with additional palces or with your own places. Make a wonderful day with The Tenth Tour Plans with low cost!</p>

					</div>
				</div>
				
				<div class="section-page-content row">
					<div class="col-lg-10 col-lg-offset-1 w3-white">
						<table style=" border-radius:10px">
						
							<tr><td>&nbsp </td><td>&nbsp </td></tr>
							<p />
							<tr style="padding:10px">
							<table style="background-color:#b2b2a3; border-radius:10px; width:945px">
							<tr><td>&nbsp </td><td>&nbsp </td></tr>
							<tr>
								<td>&nbsp <img src="images/j.jpg" width="400px" height="350px">&nbsp &nbsp </td>
								<td><h3 align="center">Make your Own</h3>
									<p />
									
										<p>&nbsp &nbsp Make your own tour palns and visit where you want. We are happy to say that &nbsp &nbsp &nbsp &nbsp &nbsp we warmly welcome your ideas on your own tour. We'll take where you want to  &nbsp &nbsp &nbsp &nbsp go
										 without any dout.</p> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
										&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
										<a href="form_make_tp.php"><button class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name="submit">CREATE</button></a><br>
										
								</td>
							</tr>
							
							</table>
							</tr>
							<tr><td>&nbsp </td><td>&nbsp </td></tr>
						</table>
							
					</div>
				</div>
			</div> 
		</div> 	
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
			
				//open home page
				function openIndexWin() {
					window.location='index.php';
				}
	
				/*check availability form*/
				function openAvailability2() {
					window.location='Availability2.php';
				}
	

		</script>
	</body>
</html>
