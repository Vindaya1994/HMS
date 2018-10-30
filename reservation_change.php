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
							<li class="active"><span class="last">Change Reservation</span></li>
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
						<div class="w3-display-container w3-content" style="max-width:1200px;" >
							<img class="w3-image" src="assets/img/reservation/cancel.jpg" alt="The Hotel" style="min-width:1000px" width="1100" height="200">
							<div class="w3-display-topmiddle" style="overflow-y: scroll;">
                        	<div class="w3-container w3-padding  w3-gray">
                            	<h2><i class="fa fa-bed w3-margin-right"></i>Change Reservation</h2>
                            </div>
                        	<div class="w3-container w3-white w3-padding-8 w3-center w3-light-gray " style="font-style:Lato;" >
                                <h4><b>Your current reservations</b></h4>
								<p>Please select reservation you want to change</p><hr class="w3-black">

								<!--form-->
                                <form class="w3-container" action="./config/customer.php" id="reservation-change-form" method="POST" enctype="multipart/form-data">
                                
										
								<?php
									$cus_id= $_SESSION['cus_id'];
									$current_date =date("Y-m-d");

									$myrow =$obj ->currentReservations("reservation",$cus_id,$current_date);
									echo "<td>checkin </td><td> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;</td><td>checkout </td><br>" ;

									foreach($myrow as $row){
										$salutation = $row['reservation_no'];
										$checkin = $row ['checkin'];
										$checkout = $row ['checkout'];
										echo "<td><input type='radio' required name='reservation_num' value='". $row['reservation_no'] ."'></td>&nbsp;&nbsp;<tr><td>$checkin<td> &nbsp;&nbsp;- &nbsp;&nbsp;</td>$checkout </td></tr><br><br>" ;
									}
								?>
											
								<!--here chechin,check out and type selection card-->			
                                <div class="w3-card-4 w3-border-black w3-margin w3-padding">
												
									<br>
									<!--select bedroom type-->
									<label class="w3-left"><b><i class="fa fa-bed"></i>Bed room type</b></label>
										<select class="w3-select w3-border " name="option" required>
											<option value="" disabled selected>Choose bedroom type </option>
													
											<?php

												$myrow =$obj ->view_rooms("room_category");
												foreach($myrow as $row2){
														echo "<option value='". $row2['cat_id'] ."'>" . $row2['cat_name'] . "</option>";
												}  
											?>
										</select>

									<!--select check in date-->
									<br><br>
									<label class="w3-left"><b><i class="fa fa-calendar-o"></i>Check in</b></label>
										<input type="date" class="form-control" name="check_in" placeholder="Enter date of check in" 
										value="<?php if(isset($_POST['check_in'])){ echo $_POST['check_in']; }     ?>">
												
													
									<!--select check out date-->
									<br><br>
									<label class="w3-left"><b><i class="fa fa-calendar-o"></i>Check out</b></label>
										<input type="date" class="form-control" name="check_out"  placeholder="Enter date of check in"
										value="<?php if(isset($_POST['check_out'])){ echo $_POST['check_out']; }     ?>">
								
									<!--for passs cus_id-->
									<input type="hidden"  name="cus_id" value="<?php echo $_SESSION['cus_id'] ?>">
								
								</div>     

								<p>Are you sure to change your reservation?</p>
									<div class="w3-row">
                                		<button  style="width:500px" class="btn w3-green" name="room-reservation-change" type="submit">Yes</button>     
                                		<button  style="width:500px"class="btn w3-red" name="room-reservation-change-cancel" type="reset" >No</button>
									</div> 
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

			/*check availability form*/
			function openAvailability2() {
					window.location='Availability2.php';
				}
		</script>
	</body>
</html>
