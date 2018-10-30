<?php
include "./config/customer.php";

?>	

<!DOCTYPE html>

<html lang="en">
    
    <head>
		<?php include_once 'headers/header.php' ?>
		<link rel="stylesheet" href="assets/css/main.css" >
		<link rel="stylesheet" href="assets/css/restaurant.css" >
		<style>
            
			.home-links-box a img {
				width: 273px;
				
				transition: all .6s ease-in;
				height:200px;
			}
			.home-links-box :hover img{
                    
                transform: scale(1.04);
            }
			.home-links-box :hover h2{
                opacity: 1;
			}
			.home-links-box {
				float: left;
				
				overflow: hidden;
				text-align: center
			}
			.home-links-box a h2 {
				z-index: 2;
				float: left;
				background: green;
				padding: 0px 10px;
				font-weight: 500;
				font-family: "Raleway", sans-serif;
				font-size: 12px;
				line-height: 16px;
				opacity: 0.90;
				width: 90%;
				margin: 0px 5%;
				position: absolute;
				bottom: 25px;
			}
			 .home-links-box a strong {
				padding: 15px 35px;
				margin: 0px;
				display: inline-block;
				/*background: url(assets/img/index/line3.png) center repeat-x;*/
				text-decoration: none;
			}
			.home-links-box a strong span {
				background: green;
				padding: 0px 0px;
				font-weight: 500;
				font-family: "Raleway", sans-serif;
				font-size: 15px;
				line-height: 18px;
				color: #B7975B;
				text-transform: uppercase;
			}
			
			.home-links-box button  {
				
				float: left;
				background: green;
				padding: 15px 35px;
				font-weight: 500;
				font-family: "Raleway", sans-serif;
				font-size: 15px;
				line-height: 18px;
				opacity: 0.90;
				width: 90%;
				margin: 0px 5%;
				display: inline;
				position: absolute;
				bottom: 25px;
				left:3px;
				color: #B7975B;
				text-transform: uppercase;
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
							<img class="imgslider"src="assets/img/dinning/meal/main.jpg" >
						</div>
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="assets/img/dinning/meal/dessert1.jpg" >
						</div>
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="assets/img/dinning/meal/coffe1.jpg" >
						</div>
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="assets/img/dinning/meal/main2.jpg" >
						</div>
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="assets/img/dinning/meal/meal2.jpg" >
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
							<li class="active"><span class="last">Dinning</span></li>
							<li class="active"><span class="sep"></span><span class="last">Meals</span></li>
						</ul>
						<div class="breadcrumb-contacts">
							<a class="tellink" href="tel:+94 572 226 220">Tel : +94 572 226 220</a> 
							<a href="contact_us.php">Contact Us</a>
						</div>
						
					</div> 
					<div class="col-md-12 col-lg-10 col-lg-offset-1" >
							<hr>
							<h1><span>Meals</span>
								Activate your taste buds
							</h1>
						</div>
				</div> 
			</div> 	
			<div class="section-page-content row">
				
				<div class="col-lg-10 col-lg-offset-1">
					<p> Our small plates put a new spin on the classics with creative, imaginative and locally relevant dishes that pair perfectly with the tenth hotel's tempting desserts.</p>
				</div>
				<div class="col-lg-10 col-lg-push-1 ">
					<div class="w3-center">
						<img src="assets/img/dinning/meal/menu6.png" style="">
					</div>
				</div>
			</div>
		
			<div class="row service-section section "style="padding-top:20px;padding-bottom:20px;">
				
				<div class="col-lg-3 col-lg-push-1 ">
					<div class="inner">
						<h3 class="w3-border-bottom"style="padding-bottom:16px;"><strong>your selection</strong></h3>
						<div class=" ">													
						</div>
							<div class="attraction-indexes  "style=" height:auto;">
								<div class="w3-bar-block  " style="">
									<div class="w3-bar-item w3-black  w3-panel w3-hover-green"><h3 style="color:grey;"><b>Establishment type</b></h3>
										<form action="">
											<br>
											<h5 style="color:grey;"> Main </h5>
											<br>
											<h5 style="color:grey;"> Dessert </h5>
											<br>
											<h5 style="color:grey;"> Coffee and Tea </h5>
											<br><br>
											
											
										</form> 
									</div>
									<div class="w3-bar-item w3-black w3-panel w3-hover-green "><h3 style="color:grey;"><b> Cuisine</b></h3>
										<form action="">
											<br>
											<h5 style="color:grey;"> Local </h5>
											<br>
											<h5 style="color:grey;"> Assian </h5>
											<br>
											<h5 style="color:grey;"> International </h5>
											<br><br>
										</form>
									</div>
								</div>
							</div>
					</div>
				</div>
					
				<div class="col-lg-7 col-lg-push-1 w3-center">
					
					<?php
					$myrow =$obj ->meal("meal");
					foreach($myrow as $row){ ?>  
					  
					<div class="attractions-wrapper block "style="width:350px; height: 200px;margin-bottom:1px;overflow:hidden;">
						<div class="home-links-box inner ">
							<h3 class="w3-border-bottom"style="padding-bottom:16px;"><?php echo  $row['meal_name'] ?></h3>
							<div class="attraction-indexes  "style=" height:auto;overflow: hidden;">
								<div class="">	
									<p><?php echo  $row['meal_desc'] ?></p> <!-- Max characters - 70 -->
									
								</div>	
							</div>
						</div>
					</div>
					
					<div class="carousel-map-wrapper block w3-display-container w3-center "style="width:273px; height:200px;margin-bottom:1px">
						<div class="home-links-box">
							<a href="">
								<img src="<?php echo  $row['meal_image'] ?>">
								<div>
									<?php if(isset($_SESSION['uid'])) {?>
										<a href="d_orderMeal.php"><h2><strong><span style="margin-bottom: 0px;">ORDER</span></strong></h2></a>
									<?php }else{?>	<?php }	?>	
								</div>
							</a>
						</div> 
					</div> 
					<?php } ?>
														
										
				</div>
				<!--<div class="row">
					<hr>
					<div class="col-md-6 col-lg-5 ">
							<hr>
							<div style="width:100%;background-color:black;color:white;padding:10px;text-align:center;">
								
								<h3 style="color:white;">Activate your Palate</h3>
								<p>It's more than a meal, it's an exploration.</p>
							</div>
					</div>
					<div class="col-md-6 col-lg-5 ">
						<hr>
						<div style="width:100%;background-color:red;color:white;padding:10px;text-align:center;">
							
								
						</div>
					</div>
				</div>	-->
			</div>	
		</div>
<!--*******************************************************************************End of content***********************************************************************************-->
		
		<footer>
		<?php if(isset($_SESSION['uid'])) {
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
