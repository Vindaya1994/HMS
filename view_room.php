<?php
include "./config/customer.php";

?>	

<!DOCTYPE html>

<html lang="en">
    
    <head>
        <?php include_once'headers/header.php' ?>
        <!-- css to the relevant page  -->
       
		<style>
			
			.bedroomimage{
				width:970px; 
				height:1000px;	
			}
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
							Our rooms are expertly designed with every luxury in mind. With a host of lavish BVLGARI bath cosmetics & heavenly Frette linen bedding, we guarantee a one of a kind holiday, fit for a king or queen.
						</p>

					</div>
				</div>
				<div class="section-page-content row">
				<?php
					$myrow =$obj ->view_rooms("room_category");
					foreach($myrow as $row){ ?>
					<div class="col-lg-10 col-lg-offset-1 w3-white">

						<!-- my codings for view rooms-->
							<div class="w3-row ">
								<div class="w3-col s8  w3-center">
									<img class="bedroomimage" src="<?php echo $row['room_image']?>"   >
								</div>
								<div class="w3-col l4  w3-left w3-dark-gray">
									<div class="w3-container w3-gray w3-margin">
										<h2 class="w3-padding"><?php echo  $row['cat_name'] ?></h2><br>
										<table class="table" class="small"> 
											<tbody>
												<tr>
													<td>Approximate Size:</td>
													<td><?php echo  $row['approximate_size'] ?>square meters</td>                                               
												</tr>
												<tr>
													<td>Maximum Adults:</td>
													<td><?php echo  $row['maximum_adults'] ?></td>                                  
												</tr>
												<tr>
													<td>Bed Type :</td>
													<td><?php echo  $row['bed_type'] ?></td>  
												</tr>
												<tr>
													<td>Connecting Rooms:</td>
													<td><?php echo  $row['connecting_rooms'] ?></td>  
												</tr>
												<tr>
													<td>Free WiFi :</td>
													<td>Connect and Share</td>
												</tr>
												<tr>
													<td>Room Price(per day) :</td>
													<td>LKR <?php echo  $row['room_price'] ?></td>
												</tr>
											</tbody>
										</table>
										<h3>Highlights </h3>
										<br>
										<ol>
										<?php echo  $row['cat_desc'] ?>
										</ol>    
									</div>
									<button type="button" id="my_button" class="btn btn-lg w3-green" style= " width:320px;" >RESERVE</button>
									
								</div>   			
							</div>
							<br>	 
						
						<!--End content-->
							
					</div>
					<?php } ?>
				</div>
			</div> 
		</div> 	
<!--*******************************************************************************End of content***********************************************************************************-->
		
		<footer>
			<?php include_once'./footers/footer1.php'?>
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



			<?php
			if(isset($_SESSION['uid'])) {?>
				$('#my_button').on('click', function(){
                
					window.location='reservation_room.php';
				
				});	
				<?php
		
			}else{?>
				
				$('#my_button').on('click', function(){
                alert('Please login to the system for reservations.');
                $('#my_button').attr("disabled", true);
            });	
				
			<?php }
			?>	
			
			
			/*check availability form*/
			function openAvailability() {
				window.location='availability.php';
			}

		</script>
	</body>
</html>
