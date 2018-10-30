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
							<li class="active"><span class="last">Transport Service</span></li>
							<li class="active"><span class="last">Request Transport Service</span></li>
							
						</ul>
						<div class="breadcrumb-contacts">
							<a class="tellink" href="tel:+94 572 226 220">Tel :+94 572 226 220</a> 
							<a href="contact_us.php">Contact Us</a>
						</div>
					</div> 
				</div> 
				<div class="col-md-12 col-lg-10 col-lg-offset-1">
				<hr>
					<h1><span>Transport Service</span>
						A comfortable travel with The Tenth
					</h1>
				</div>
				<div class="section-page-content row">
					<div class="col-lg-10 col-lg-offset-1">
						<p>The Tenth Hotel Ella is always there to make your jorney perfect. We are here to arrage a good transport service for you which can 
						take you to your destination comfortably for a reasonable cost.</p>
					</div>
				</div>
				
				<div class="section-page-content row">
					<div class="col-lg-10 col-lg-offset-1 w3-white">
					<table style="background-color:#edf6e9; border-radius:10px">
					
						<?php
							$myrow =$obj ->view_transportServices("transport_services");
							foreach($myrow as $row){ ?>
						
					
						<tr><td>&nbsp </td><td>&nbsp </td></tr>
						<tr style="padding:10px">
							<td>&nbsp &nbsp <img src="<?php echo $row['vehical_image']?>" width="400px" height="300px">&nbsp &nbsp</td>
							<td>
								
									<table style="cellspacing:10; cellpadding:10">
										<p />
										<tr>
											<td>&nbsp Vehical Type :</td>
											<td>&nbsp <?php echo $row['vehical_type']?></td>
										</tr>
										<tr><td>&nbsp </td><td>&nbsp </td></tr>
										<tr>
											<td>&nbsp No of Passengers : </td>
											<td>&nbsp <?php echo $row['no_of_passangers']?></td>
										</tr>
										<tr><td>&nbsp </td><td>&nbsp </td></tr>
										<tr>
											<td>&nbsp Price :</td>
											<td>&nbsp <?php echo $row['price_per_km']?>&nbsp per km &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
											&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </td>
										</tr>
										<tr><td>&nbsp </td><td>&nbsp </td></tr>
									</table>
								<a href="form_request_t.php"><button class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name="Request-tp">REQUEST</button</a>
								

							</td>
						</tr>
						
						<?php } ?>
						
						<tr><td>&nbsp </td><td>&nbsp </td></tr>
						<p />
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
