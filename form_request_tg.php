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
							<li class="active"><span class="last">Tour Guides</span></li>
							<li class="active"><span class="last">Request Tour Guide</span></li>
							<li class="active"><span class="last">Request Tour Guide-Form</span></li>
						</ul>
						<div class="breadcrumb-contacts">
							<a class="tellink" href="tel:+94 572 226 220">Tel :+94 572 226 220</a> 
							<a href="contact_us.php">Contact Us</a>
						</div>
					</div> 
				</div> 
				<div class="col-md-12 col-lg-10 col-lg-offset-1">
				<hr>
				<h1><span>tour guides </span>
						A safe journey with the tenth
				</h1>
				
				</div>
				<div class="section-page-content row">
					<div class="col-lg-10 col-lg-offset-1">
						<p>The Tenth Hotel Ella is always there to make your jorney perfect. We can arranged well experienced tour guides to guide you on your journey. They 
                        will made a perfect tour for you around Ella and also all over the Sri Lnaka.</p>

					</div>
				</div>
				<!--<div class="section-page-content row">-->
					
				<div class="col-lg-10 col-lg-offset-1 w3-white">

				<!-- my codings for request tour guide-->
				<!--<div class="w3-row">-->
						
				<!--form -->
				<div class="w3-row" style="margin-top:90px;">			
					<form class="w3-container " action="./config/customer.php" id="form_request_tg" method="POST">
						<div class="w3-section">
								
							<label class="w3-left"><b>Tour Guide Name</b></label>
                                <select class="w3-select w3-border " name="option">
								<option value="" disabled selected>Choose Tour Guide</option>
											 
								<!-- Select tor guide--> 
									<?php
										$myrow =$obj ->view_tourGuides("tour_guide");
										foreach($myrow as $row){
											echo "<option value='". $row['tg_id'] ."'>" . $row['tg_name'] . "</option>";
										}
									?>
								</select>
											
								<br>
								<br>
								 
							 <!--get tour details -->
								  <label for="check-in" class="w3-left"><b>Tour Check-in date</b></label>
								  <input class="w3-input w3-border  w3-text-black" type="date" name="check-in" id="checkin" onchange="validateCheckin()" required>
								  <span class="error_form" id="in"></span>
								  <br>
								  
								  <label for="check-out"class="w3-left"><b>Tour check-out date</b></label>
								  <input class="w3-input w3-border  w3-text-black" type="date" name="check-out" onchange="validateCheckout()" id="checkout" required>
								  <span class="error_form" id="out"></span>
								  <br>
								  
								  <label for="check-out"class="w3-left"><b>Pick up time</b></label>
								  <input class="w3-input w3-border  w3-text-black" type="time" name="pick_up_time" required>
								  <br>
								  
								  <label for="check-out"class="w3-left"><b>Places to visit</b></label>
								  <input class="w3-input w3-border  w3-text-black" type="text" name="places" id="places" onkeyup="validateplaces()" required>
								  <span class="error_form" id="pl"></span>
								  <br>
								  
								  <!--for passs cus_id-->
								  <input type="hidden"  name="cus_id" value="<?php echo $_SESSION['cus_id'] ?>">							  

								  <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name="Request-tg">Request</button>
								  <button class="w3-button w3-block w3-green w3-section w3-padding" type="reset" value="Reset">Reset</button>
								  
								</div>
							</form>							
					</div>	
				</div>
           

		<!--end --->			
        </div>	 
					
		<!--End my content-->
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


	
		