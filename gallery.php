
<!DOCTYPE html>

<html lang="en">
    
    <head>
        <?php include_once'headers/header.php' ?>
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
							<img class="imgslider"src="assets/img/dinning/dinning10.jpg" >
						</div>
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="assets/img/dinning/indinning1.jpg" >
						</div>
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="assets/img/dinning/dinning3.jpg" >
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
							<li class="active"><span class="last">Gallery</span></li>
						</ul>
						<div class="breadcrumb-contacts">
							<a class="tellink" href="tel:+94 572 226 220">Tel :+94 572 226 220</a> 
							<a href="contact_us.php">Contact Us</a>
						</div>
					</div> 
				</div> 
				<div class="col-md-12 col-lg-10 col-lg-offset-1">
				<hr>
					<h1><span></span>
						GALLERY	
					</h1>
				</div>
				<div class="section-page-content row">
					<div class="col-lg-10 col-lg-offset-1">

					<style type="text/css">
body {
	/*background: #222;
	color: #eee;*/
	margin-top: 20px;
	font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
}
a {
	/*color: #FFF;*/
}
a:hover {
	color: yellow;
	text-decoration: underline;
}
.thumbnails img {
	height: 80px;
	border: 4px solid #555;
	padding: 1px;
	margin: 0 10px 10px 0;
}

.thumbnails img:hover {
	border: 4px solid #00ccff;
	cursor:pointer;
}

.preview img {
	border: 4px solid #444;
	padding: 1px;
	width: 800px;
}
</style>



<div class="gallery" align="center">
	
	

	<br />

	<div class="thumbnails">
		
  <img onmouseover="preview.src=gal1.src" name="gal1" src="assets/img/gallery/gal1.jpg" alt=""/>
    <img onmouseover="preview.src=gal2.src" name="gal2" src="assets/img/gallery/gal2.jpg" alt=""/>
      <img onmouseover="preview.src=gal3.src" name="gal3" src="assets/img/gallery/gal3.jpg" alt=""/>
        <img onmouseover="preview.src=gal4.src" name="gal4" src="assets/img/gallery/gal4.jpg" alt=""/>
          <img onmouseover="preview.src=gal5.src" name="gal5" src="assets/img/gallery/gal5.jpg" alt=""/>
            <img onmouseover="preview.src=gal6.src" name="gal6" src="assets/img/gallery/gal6.jpg" alt=""/>
              <img onmouseover="preview.src=gal7.src" name="gal7" src="assets/img/gallery/gal7.jpg" alt=""/>
                <img onmouseover="preview.src=gal8.src" name="gal8" src="assets/img/gallery/gal8.jpg" alt=""/>
                  <img onmouseover="preview.src=gal9.src" name="gal9" src="assets/img/gallery/gal9.jpg" alt=""/>
                   


	</div><br/>

	<div class="preview" align="center">
		<img name="preview" src="assets/img/gallery/gal1.jpg" alt=""/>
	</div>

</div>

					</div>
				</div>
			
			</div>	
		</div>

		 <!---->		
				


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
