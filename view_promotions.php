<?php
	include "./config/customer.php";
?>

<!DOCTYPE html>

<html lang="en">
    
    <head>
		<?php include_once'headers/header.php' ?>
        <!-- css to the relevant page  -->
        <link rel="stylesheet" href="assets/css/promotion.css" >
		<style>
			button1, .button1 {
    display: inline-block;
    min-width: 130px;
    padding: 12px 20px;
    background: #af861b;
    background: #e4b22d;
    background: -moz-linear-gradient(top, #e4b22d 0%, #c99718 44%, #b07d03 100%);
    background: -webkit-linear-gradient(top, #e4b22d 0%, #c99718 44%, #b07d03 100%);
    background: linear-gradient(to bottom, #5bd02d 0%, #7b9e10 44%, #378c1b 100%);
	border: none;
    position: relative;
    color: white;
    font-size: 12px;
    line-height: 1;
    text-align: center;
    text-transform: uppercase;
    vertical-align: top;
    cursor: pointer;
    -webkit-transition: all .3s ease-out;
    -moz-transition: all .3s ease-out;
    -o-transition: all .3s ease-out;
    transition: all .3s ease-out;
}
		</style>
    </head>


    <body class="" >
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
		<div id="myslide">
					<!-- Automatic Slideshow Images -->
					<div id="slideht">
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="assets/img/promotions/p3.jpg" >
						</div>
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="assets/img/promotions/p2.jpg" >
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
							<li class="active"><span class="last">Promotions</span></li>
						</ul>
						<div class="breadcrumb-contacts">
							<a class="tellink" href="tel:+94 572 226 220">Tel : +94 572 226 220</a> 
							<a href="contact_us.php">Contact Us</a>
						</div>
					</div>
					<div class="col-md-12 col-lg-10 col-lg-offset-1">
						<hr>
						<h1><span>PROMOTIONS</span>
							CELEBRATE WITH US	
						</h1>
					</div>		
				</div> 
				
			</div>
			<div class="section-page-content row">
				<div class="col-lg-10 col-lg-offset-1">
					<p>Offering you the best Ella hotel deals, The Tenth Hotel provides you with a plethora of dining and entertainment options throughout the year. There’s always a reason to celebrate with us – whether it’s exciting weekly promotions at New Year’s Eve celebrations, credit card offers, Valentine’s day or Easter! Don’t forget to check up on the dining offers and restaurant promos to enjoy a wide range of benefits with us.<br>
					&nbsp;</p>
					<div style="border-color: #c79516; border-style: solid; margin: 20px; padding: 15px;">
						We are delighted to offer you some of the best hotel deals in Ella, designed with every intention to provide for the perfect stay.<p></p>
						<p><strong>Exclusively for you:</strong></p>
						<ul>
							<li>Free 30-minute jet-lag massage</li>
							<li>Complimentary early check-in &amp; late check-out (subject to availability)</li>
						</ul>
						<p><strong>Fantastic Discounts:</strong></p>
						<ul>
							<li>1<sup>st</sup> day onwards: 15% off lunch &amp; dinner at the restaurant.</li>
							<li>2<sup>nd</sup> day onwards: 25% off spa treatments</li>
						</ul>
						<p><strong>Complimentary Services:</strong></p>
						<ul>
							<li>Complimentary laundry service for a dress or a trouser &amp; shirt</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="section-child-page-blocks row">
					
					<?php
					$myrow =$obj ->view_promotions("promotion");
					foreach($myrow as $row){ ?>

					<div class="col-sm-10 custom-offer col-sm-offset-1 col-md-6 col-md-offset-3 col-lg-10 col-lg-offset-1">
						<div class="image-wrapper" style="background-image: url(<?php echo $row['promotion_img']?>);"></div>

						<div class="description-wrapper noimg">
							<div class="description-inner">
								<h2><?php echo  $row['promotion_name'] ?></h2>
									<div class="description">
										<p><?php echo  $row['prm_caption'] ?></p></div>
								<br>
								<a href="view_promotions2.php?promotion_no=<?php echo $row['promotion_no']; ?>" class="button1">Find Out More</a></div>
						</div>
					</div>
					<?php } ?>												
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
