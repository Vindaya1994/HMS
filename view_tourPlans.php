<?php
include "./config/customer.php";

?>	

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

		
<!--***************************************************************************** content**************************************************************************************-->
		<div class="site-main container">
			<div class="section-page-heading row  ">
				<div class="breadcrumb-leftnav-wrapper ">
					<div class="col-md-12 col-lg-10 col-lg-offset-1 ">
						<ul class="breadcrumb">
							<li><a href="index.php" title="The Tenth Hotel" class="bolds">Home</a><span class="sep"></span></li>
							<li class="active"><span class="last">Services</span></li>
							<li class="active"><span class="last">Tour Plans</span></li>
						</ul>
						<div class="breadcrumb-contacts">
							<a class="tellink" href="tel:+94 572 226 220">Tel : +94 572 226 220</a> 
							<a href="contact_us.php">Contact Us</a>
						</div>
					</div> 
				</div> 
				<div class="col-md-12 col-lg-10 col-lg-offset-1">
				<hr>
					<h1><span>Tour Plans</span>
						Enjoy Our Tour Plans
					</h1>
				</div>
				<div class="section-page-content row">
					<div class="col-lg-10 col-lg-offset-1">
						<p>The Tenth Hotel Ella is always there to make your jorney perfect. We have designed awesome tour palns for you which will made an unforgettable 
						day for you. We also welcome your own tour palns with additional palces or with your own places. Make a wonderful day with The Tenth Tour Plans with low cost!</p>
					</div>
				</div>
				
				<div class="section-page-content row">
					<div class="col-lg-10 col-lg-offset-1">
						
						<table style="border:1px; border-color:#cad1d0; border-radius:10px; padding:5px; background-color:#edf6e9">
						
						<?php
					$myrow =$obj ->view_tourPlans("pre_planed_tours");
					foreach($myrow as $row){ ?>
							
							<tr><td>&nbsp </td><td>&nbsp </td></tr>
					
							<tr style="padding:10px">
								<td>&nbsp &nbsp <img src=" <?php echo $row['tp_image'] ?>" width="400px" height="300px">&nbsp &nbsp </td>
								<td><h2 align="center"><?php echo $row['tour_name']?></h2>
									<table style="cellspacing:10; cellpadding:10">
										<p />
										<tr>
											<td>&nbsp Places you can visit:</td>
											<td>&nbsp <?php echo $row['places_to_visit']?></td>
										</tr>
										
										<tr><td>&nbsp </td><td>&nbsp </td></tr>
									
										<tr>
											<td>&nbsp Price : </td>
											<td>&nbsp LKR &nbsp <?php echo $row['price']?> &nbsp per person</td>
										</tr>
										
										<tr><td>&nbsp </td><td>&nbsp </td></tr>
										
										<tr>
											<td>&nbsp No of Participants :</td>
											<td>&nbsp <?php echo $row['no_of_participant']?></td>
										</tr>
										
										<tr><td>&nbsp </td><td>&nbsp </td></tr>
									
										<tr>
											<td>&nbsp No of days:</td>
											<td>&nbsp <?php echo $row['no_of_days']?></td>
										</tr>
											
										<tr><td>&nbsp </td><td>&nbsp </td></tr>
										
										<tr>
											<td>&nbsp Description :</td>
											<td>&nbsp <?php echo $row['description']?></td>
										</tr>
										
									</table>
								</td>
							</tr>
							<?php } ?>
							<tr><td>&nbsp </td><td>&nbsp </td></tr>
							
							<p>
							<tr style="padding:10px">
							<table style="background-color:#b2b2a3; border-radius:10px; width:945px">
							<tr>
								<td>&nbsp &nbsp <img src="images/j.jpg" width="400px" height="300px"></td>
								<td><h2 align="center">Make your Own</h2>
									<p />
										<p>&nbsp &nbsp Make your own tour palns and visit where you want! To request your own plan &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp please Register!</p> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
										&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
								</td>
							</tr>
							<tr><td>&nbsp </td><td>&nbsp </td></tr>
							</tr>
							</table>
							</p>
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
