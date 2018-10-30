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
							<li class="active"><span class="last">Change Pre-Plan Tour Request</span></li>
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
						Enjoy our tour plans
					</h1>
				</div>
				<div class="section-page-content row">
					
						<div class="col-lg-10 col-lg-offset-1">
						<p>The Tenth Hotel Ella is always there to make your jorney perfect. Please be kind to change your request atleast two days before.</p>
						
					</div>
				</div>
				<div class="section-page-content row">
					
					<div class="col-lg-10 col-lg-offset-1 w3-white">

						<!-- my codings for change tour requests-->
						<div class="w3-row">
						<div class="w3-display-container w3-content" style="max-width:1600px;" >
							<br>
                        	<div class="w3-container w3-padding  w3-gray">
                            	<h2 style="text-align:center">Change Pre-plan tour Request</h2>
                            </div>
                        	<div class="w3-container w3-white w3-padding-8 w3-center w3-light-gray " style="font-style:Lato;" >
                                <h4><b>Your current tour plan requests</b></h4>
								<p>Please select tour plan you want to change</p><hr class="w3-black">

								<!--form-->
                                <form class="w3-container" action="./config/customer.php" id="form_request_tp_change" method="POST" enctype="multipart/form-data">
                                
								<!--Current tour plan requests-->		
								<?php
							
									$cus_id= $_SESSION['cus_id'];
									$current_date =date("Y-m-d");

									$myrow =$obj ->current_preplanned_tours("pre_planed_tour_reservation",$cus_id,$current_date);
									echo "<td>checkin </td><td> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;</td><td>checkout </td><br><br>" ;

									foreach($myrow as $row){
										$salutation = $row['tour_no'];
										$tour_check_in  = $row ['tour_check_in'];
										$tour_check_out = $row ['tour_check_out'];
										echo "<td><input type='radio' required name='request_num' value='". $row['tour_no'] ."'></td>&nbsp;&nbsp;<tr><td>$tour_check_in <td> &nbsp;&nbsp;- &nbsp;&nbsp;</td>$tour_check_out </td></tr><br><br>" ;
									}
								?>
											
								<!--here chechin,check out and type selection card-->			
                                <div class="w3-card-4 w3-border-black w3-margin w3-padding">
												
									<br>
									<!-- Places to visit-->
									
									<label class="w3-left"><b>Select Tour Plan</b></label>
										<select class="w3-select w3-border " name="option">
											<option value="" disabled selected>Choose your tour plan </option>
											
											<!--pre planned tours list-->
											<?php
											$myrow =$obj ->view_tourPlans("pre_planed_tours");
											foreach($myrow as $row){
													echo "<option value='". $row['tour_id'] ."'>" . $row['tour_name'] . "</option>";
											}	
											?>
											</select>
											
									<!--select check in date-->
									<br>
									<label class="w3-left"><b>Check in Date</b></label>
										<input type="date" class="form-control" name="tour_check_in" placeholder="Enter date of check in" id="checkin" onchange="validateCheckin()"
										value="<?php if(isset($_POST['tour_check_in'])){ echo $_POST['tour_check_in']; }     ?>"> <span class="error_form" id="in"></span>
												
													
									<!--select check out date-->
									<br>
									<label class="w3-left"><b>Check out Date</b></label>
										<input type="date" class="form-control" name="tour_check_out"  placeholder="Enter date of check out" onchange="validateCheckout()" id="checkout"
										value="<?php if(isset($_POST['tour_check_out'])){ echo $_POST['tour_check_out']; }     ?>"> <span class="error_form" id="out"></span>
										
								
									<!--for passs cus_id-->
									<input type="hidden"  name="cus_id" value="<?php echo $_SESSION['cus_id'] ?>">
								
								</div>     

								<p>Are you sure to change your reservation?</p>
									<div class="w3-row">
                                		<button  style="width:500px" class="btn w3-green" name="change_preplan_tours" type="submit">Yes</button>
										<br>
                                		<button  style="width:500px"class="btn w3-red" name="change_preplan_tour_cancel" type="reset" >No</button>
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
