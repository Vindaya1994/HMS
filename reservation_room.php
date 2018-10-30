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
							<img class="imgslider"src="assets/img/Bedrooms/slide1.jpg" >
						</div>
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="assets/img/Bedrooms/slide5.jpg" >
						</div>
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="assets/img/Bedrooms/slide6.jpg" >
						</div>
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="assets/img/Bedrooms/slide4.jpg" >
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
							<li class="active"><span class="last">Rooms</span></li>
							<li class="active"><span class="last">Reserve Room</span></li>
						</ul>
						<div class="breadcrumb-contacts">
							<a class="tellink" href="tel:+94 572 226 220">Tel :+94 572 226 220</a> 
							<a href="contact_us.php">Contact Us</a>
						</div>
					</div> 
				</div> 
				<div class="col-md-12 col-lg-10 col-lg-offset-1">
				<hr>
				<h1><span>ROOMS</span>
				LUXURY AWAITS YOU
				
					
				</h1>
				</div>
				<div class="section-page-content row">
					<div class="col-lg-10 col-lg-offset-1">
						<p>Discover the true meaning of elegance, grace & splendour at The 
							Tenth Hotel, where we bring you regal indulgence, outstanding individual comforts & the best service amongst hotels 
							in Ella.
							<br>
							Our rooms are expertly designed with every luxury in mind. With a host of amenities and dining options; 
							whether in-room or from our restaurants, intuitive service, lavish BVLGARI bath cosmetics & heavenly Frette linen bedding, we guarantee a one of a kind holiday, fit for a king or queen.
						</p>

					</div>
				</div>
				<div class="section-page-content row">
					
					<div class="col-lg-10 col-lg-offset-1 w3-white">

						<!-- my codings for reserve rooms-->
						<div class="w3-row">
                            <div class="w3-display-container w3-content" style="max-width:1500px;">
								
                                <img class="w3-image" src="assets/img/bedRooms/masterBedroom.jpg" alt="The Hotel" style="min-width:1000px" width="1100" height="200">                                     
								<div class="w3-display-right  w3-padding w3-col l8 m8">
                                    <div class="w3-card-4 w3-border w3-margin w3-padding">
										<!--heading of the card-->                               
                                        <div class="w3-container w3-gray w3-padding">
											<h2><i class="fa fa-bed w3-margin-right"></i><b>RESERVE ROOM</b></h2>
											<hr>
											<p><span class="glyphicon glyphicon-record"></span>You can check-in from 14:00 on the day of arrival and must check-out at 12:00 (noon) on the day of departure. </p>
											<p><span class="glyphicon glyphicon-record"></span>You are allow to cancel or change reservation  2 days before the check in date.</p>
										</div>
										<!--form-->
                                        <form class="w3-container" action="./config/customer.php" id="room-reservation-form" method="POST">

											<br>
											<!--select bedroom type-->
                                            <label><b><i class="fa fa-bed"></i>Bed room type</b></label>
                                            <select class="w3-select w3-border " name="option">
											<option value="" disabled selected>Choose bedroom type </option>
											 
											<?php

												$myrow =$obj ->view_rooms("room_category");
												foreach($myrow as $row){
													echo "<option value='". $row['cat_id'] ."'>" . $row['cat_name'] . "</option>";
												}
											?>
											</select>

											<!--select check in date-->
                                            <br><br>
                                            <label><b><i class="fa fa-calendar-o"></i>Check in</b></label>
                                            <input type="date" class="form-control" name="check_in" required placeholder="Enter date of check in" 
                                            value="<?php if(isset($_POST['check_in'])){ echo $_POST['check_in']; }     ?>">
										
											
											<!--select check out date-->
                                            <br><br>
                                            <label><b><i class="fa fa-calendar-o"></i>Check out</b></label>
                                            <input type="date" class="form-control" name="check_out" required placeholder="Enter date of check in"
                                            value="<?php if(isset($_POST['check_out'])){ echo $_POST['check_out']; }     ?>">

											<!--for passs cus_id-->
											<input type="hidden"  name="cus_id" value="<?php echo $_SESSION['cus_id'] ?>">


                                            <br>
                                            <button class="btn w3-green" name="room-reservation" type="submit" style="width:510px">Reserve</button>
											<button class="btn w3-red" name="room-reservation-cancel" type="reset" style="width:510px">Cancel</button>
                                        </form>
									</div>     
                                </div> 
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

			//fuction for sub drop down
			$(document).ready(function(){
			$('.dropdown-submenu a.test').on("click", function(e){
			$(this).next('ul').toggle();
			e.stopPropagation();
			e.preventDefault();
			});
			});

			

		</script>
	</body>
</html>
