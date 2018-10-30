<?php
include "./config/customer.php";

?>
<!DOCTYPE html>

<html lang="en">
    
    <head>
        <?php include_once'headers/header.php' ?>
        <!-- css to the relevant page  -->
        <link rel="stylesheet" href="assets/css/promotion.css" >
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
		
				<!-- ********************************************include the relevant Slideshow Images*********************************************** -->
				<div id="myslide">
					<!-- Automatic Slideshow Images -->
					<div id="slideht">
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="assets/img/promotions/p3.jpg" >
						</div>
						
					</div>
					
				</div>
		<!-- End Page header -->	
		
		<!--*****************************************************Page Content***************************************************************-->
		<div class="site-main container">
			<div class="section-page-heading row  ">
				<div class="breadcrumb-leftnav-wrapper ">
					<div class="col-md-12 col-lg-10 col-lg-offset-1 ">
						<ul class="breadcrumb">
							<li><a href="index.php" title="The Tenth Hotel" class="bolds">Home</a><span class="sep"></span></li>
							<li class="active"><span class="last">Promotions</span></li>
							
						</ul>
						<div class="breadcrumb-contacts">
							<a class="tellink" href="tel:+94 572 226 220">Tel : +94 572 226 220</a> 
							<a href="contact_us.php">Contact Us</a>
						</div>
					</div> 
				</div> 
			</div> 
					<?php
					$promotion_no = $_REQUEST['promotion_no'];

					$myrow =$obj ->view_promotions2("promotion",$promotion_no);
					foreach($myrow as $row){ ?>

				<div class="section-offer-content row"style="margin-top:40px;">
					<div class="images-wrapper col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-0 col-lg-5 col-lg-offset-1">
						<img style="height:301.172px;width:470px;"class="" src="<?php echo $row['promotion_img']?>" alt="BEST RATE GUARANTEED – 22% OFF">
					</div>
					<div class="content-wrapper col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-0 col-lg-5" >
						<h1 style=" margin-bottom: 40px; font-size: 25px;"><?php echo  $row['promotion_name'] ?></h1>

						
						<div class="section-page-content"></div>

						<hr>
						<!--<a href="" id="my_button" class="button1">Book Now</a>-->
					</div>
				</div>
				<div class="section-content-bottom section-page-content row">
					<div class="col-sm-10 col-sm-offset-1 col-md-12 col-md-offset-0 col-lg-10 col-lg-offset-1">
						<hr>
						<p><?php echo  $row['prm_desc'] ?></p>
						<p>&nbsp;</p>
						<p>Included in the package:</p>
						<ul><?php echo  $row['package_details'] ?>
						</ul>
					</div>
				</div>
				
				<?php } ?>
		</div> 	
		
            
		<!--***************************************************** End Page Content************************************************************* -->
		
		<!-- Footer -->
		<footer>
			<?php
				if(isset($_SESSION['uid'])) {
					include_once './footers/footer2.php';

				}else{
					include_once './footers/footer1.php';
				}
			?>
		</footer>
   		<!-- End Footer -->

        <!-- ***********************************************************include needed java script*****************************************************************-->
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
