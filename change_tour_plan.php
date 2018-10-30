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
							<li class="active"><span class="last">Tour Plans</span></li>
							<li class="active"><span class="last">Change Tour Plan</span></li>
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
						<p>The Tenth Hotel Ella is always there to make your jorney perfect. We allow you to change your tour plans to make it a better one. Please make sure to change
						your request atleast two days before if you are willing to change.</p>
						
					</div>
				</div>
				<div class="section-page-content row">
					
					<div class="col-lg-10 col-lg-offset-1 w3-white">

						<!-- my coding for change tour plan-->
						<div class="w3-row">
						<div class="w3-display-container w3-content" style="max-width:1600px;" >
						<br>
                        <div class="w3-container w3-padding  w3-gray">
                            <h2 style="text-align:center">Change Your Tour plan</h2>
                        </div>
                        
						<div class="w3-container w3-white w3-padding-8 w3-center w3-light-gray " style="font-style:Lato;" >
                            <h4><b>Your current tour plans</b></h4>
							<p>Please select tour plan you want to change</p><hr class="w3-black">

							<!--form-->
                            <form class="w3-container" action="./config/customer.php" id="form_make_tp_change" method="POST" enctype="multipart/form-data">
                                
								<!--cede to get current requested tour plans -->		
								<?php
									$cus_id= $_SESSION['cus_id'];
									$current_date =date("Y-m-d");

									$myrow =$obj ->current_tours("tour_plan",$cus_id,$current_date);
									echo "<td>Start Date </td><td> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;</td><td>End Date </td><br>" ;

									foreach($myrow as $row){
										$salutation = $row['tp_id'];
										$checkin = $row ['checkin'];
										$checkout = $row ['checkout'];
										echo "<td><input type='radio' required name='tour_id' value='". $row['tp_id'] ."'></td>&nbsp;&nbsp;<tr><td>$checkin<td> &nbsp;&nbsp;- &nbsp;&nbsp;</td>$checkout </td></tr><br><br>" ;
									}
								?>
											
								<!--here chechin,check out and tour_id selected-->			
                                <div class="w3-card-4 w3-border-black w3-margin w3-padding">
												
									<br>
									<!-- Places to visit-->
									
									<label class="w3-left"><b>Places To Visit</b></label>
										<input type="text" class="form-control" name="places" placeholder="Change places" 
										value="<?php if(isset($_POST['places'])){ echo $_POST['places']; }     ?>">

									<!--select check in date-->
									<br>
									<label class="w3-left"><b>Tour Start Date</b></label>
										<input type="date" class="form-control" name="checkin" placeholder="Enter date of check in" id="checkin" onchange="validateCheckin()"
										value="<?php if(isset($_POST['checkin'])){ echo $_POST['checkin']; }     ?>"> <span class="error_form" id="in"></span>
												
													
									<!--select check out date-->
									<br>
									<label class="w3-left"><b>Tour End Date</b></label>
										<input type="date" class="form-control" name="checkout"  placeholder="Enter date of check out" onchange="validateCheckout()" id="checkout" 
										value="<?php if(isset($_POST['checkout'])){ echo $_POST['checkout']; }     ?>"> <span class="error_form" id="out"></span>
										
									<!--select  pick up time-->
									<br>
									<label for="check-out"class="w3-left"><b>Pick up time</b></label>
										<input class="w3-input w3-border w3-margin-bottom w3-text-black" type="time" name="pick_up_time" required>
										
									<!--No of Participants-->
									<br>
									<label class="w3-left"><b>No of Participants</b></label>
										<input type="text" class="form-control" name="no_of_participant"  placeholder="Enter No of Participants" id="participants" onkeyup="validateParticipants()"
										value="<?php if(isset($_POST['no_of_participant'])){ echo $_POST['no_of_participant']; }     ?>"> <span class="error_form" id="pa"></span>
									
									<!--Other-->
									<br>
									<label class="w3-left"><b>Other</b></label>
										<input type="text" class="form-control" name="other"  placeholder="Other details"
										value="<?php if(isset($_POST['other'])){ echo $_POST['other']; } ?>">
								
									<!--for passs cus_id-->
									<input type="hidden"  name="cus_id" value="<?php echo $_SESSION['cus_id'] ?>">
								
								</div>     

								<p>Are you sure to change your reservation?</p>
									<div class="w3-row">
                                		<button class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name="maked_tp_change">Yes</button>
										<button class="w3-button w3-block w3-red w3-section w3-padding" type="submit" name="maked_tp_change_cancel">No</button>
										<br>
										<br>
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
