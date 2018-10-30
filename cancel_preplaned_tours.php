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
							<li class="active"><span class="last">Cancel Pre-planned Tour Request</span></li>
						</ul>
						<div class="breadcrumb-contacts">
							<a class="tellink" href="tel:+94 572 226 220">Tel :+94 572 226 220</a> 
							<a href="contact_us.php">Contact Us</a>
						</div>
					</div> 
				</div> 
				<div class="col-md-12 col-lg-10 col-lg-offset-1">
				<hr>
					<h1><span>Tour plans</span>
					enjoy tour plans with The tenth		
					</h1>
				</div>
				<div class="section-page-content row">
					<div class="col-lg-10 col-lg-offset-1">
						<div class="col-lg-10 col-lg-offset-1">
						<p>The Tenth Hotel Ella is always there to make your jorney perfect. We allow you to cancel your request in sudden cases. Please be kind to cancel your
						request atleast two days before.</p>
						
					</div>

					</div>
				</div>
				<div class="section-page-content row">
					
					<div class="col-lg-10 col-lg-offset-1 w3-white">

						<!-- my codings cancel tour plan-->
						<div class="w3-row">
                            <div class="w3-display-container w3-content" style="max-width:1600px;">
								
                                	<div class="w3-container w3-padding w3-gray">
                                		<h2 style="text-align:center">Cancel Tour Plans</h2>
                                	</div>
                                	<div class="w3-container w3-white w3-padding-16 w3-center">
                                		
										<h4><b>Your current Tour plans</b></h4>
										<p>Please select tour you want to cancel</p><br>

										<!--form-->
                                        <form class="w3-container" action="./config/customer.php" id="preplan_tour_cancel_form" method="POST" enctype="multipart/form-data">
                                
										<!-- current requested tour plans-->
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

										<p>Are you sure to cancel your request?</p>
											<div class="w3-row">
                                				<button class="btn w3-green" style="width:500px" name="cancel_preplanned_tours" type="submit">Yes</button><br>     
                                				<button class="btn w3-red"  style="width:500px" name="preplanned_tour_cancel_button"type="reset"  >No</button>
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

			function cancel_button(){
				window.location='reservation_cancel.php';	
			}
			
		</script>
	</body>
</html>
