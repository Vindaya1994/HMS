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
							<img class="imgslider"src="assets/img/feedback/slide1.jpg" >
						</div>
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="assets/img/feedback/slide4.jpg" >
						</div>
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="assets/img/feedback/slide3.jpg" >
						</div>
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="assets/img/feedback/feedback.jpg" >
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
							<li class="active"><span class="last">Feedback</span></li>
						</ul>
						<div class="breadcrumb-contacts">
							<a class="tellink" href="tel:+94 572 226 220">Tel :+94 572 226 220</a> 
							<a href="contact_us.php">Contact Us</a>
						</div>
					</div> 
				</div> 
				<div class="col-md-12 col-lg-10 col-lg-offset-1">
				<hr>
					<h1><span>FEEDBACK</span>
						GETTING IN TOUCH	
					</h1>
				</div>
				<div class="section-page-content row">
					<div class="col-lg-10 col-lg-offset-1">
						<p>We believe that the best way to improve services is by learning from the people who use them. We welcome comments,
						 compliments and complaints from service users, carers and the people we come into contact with in our work. These help
						  us to see what we are doing well and where we can make improvements to our services.
						</p>

					</div>
				</div>
				<div class="section-page-content row">
					
					<div class="col-lg-10 col-lg-offset-1 w3-white">

						<!-- my codings for feedback-->
						<div class="w3-row">
                            <div class="w3-display-container w3-content" style="max-width:1500px;">
								
                                <img class="w3-image" src="assets/img/feedback/feedback.jpg" alt="notbook" style="min-width:1000px" width="1100" height="200">                                     
								<!--feedback card-->
								<div class="w3-col s12 w3-gray w3-center">
                                    <!--begin feedback form-->
                                    <div class="container2">
                                		<div class="content">

                                        	<form class="w3-container w3-text-black" action="./config/customer.php" id="feedback-form" style="width:100%;" method="post" >
                                            
                                            <h1>FEEDBACK</h1>

                                            <input class="w3-input w3-border w3-animate-input" type="textarea" name="message" style="width:600px; height:150px;"  required placeholder="Feedback" ><br>

											<!--for passs cus_id-->
											<input type="hidden"  name="cus_id" value="<?php echo $_SESSION['cus_id'] ?>">
							
                                            <div class="form-group"> 
                                                <div class="col-sm-offset-2 col-sm-10 w3-center">
													<button class="w3-block btn w3-green w3-text-black" name="feedback" type="submit"><b>Send<b></button><br>
													<button class="w3-block btn w3-red w3-text-black" name="feedback-cancel" type="reset"><b>Cancel<b></button><br>
                                                </div>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
								<!--end feedback form-->
							</div>
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
