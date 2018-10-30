
<?php include_once './config/customer.php'; ?>
<!DOCTYPE html>

<html lang="en">
    
    <head>
		<?php include_once 'headers/header.php';
		 ?>
		
        <!-- css to the relevant page  -->
       
		<style>
		
			.container3 {
				border: 2px solid #dedede;
				background-color: #f1f1f1;
				border-radius: 5px;
				padding: 10px;
				margin: 1px;
			}

			.container3::after {
				content: "";
				clear: both;
				display: table;
			}

			/*.container3 img {
				float: left;
				max-width: 60px;
				width: 100%;
				margin-right: 20px;
				border-radius: 50%;
			}*/

			/*.container3 img.right {
				float: right;
				margin-left: 8px;
				margin-right:0;
			}*/

			.time-right {
				float: right;
				color: #aaa;
			}

			.time-left {
				float: left;
				color: #999;
			}

			/* background image*/
			.container2 img {
				vertical-align: middle;
			}

			.container2 .content {
				position: absolute;
				bottom: 0;
				background: rgba(0, 0, 0, 0.5); /* Black background with transparency */
				color: #f1f1f1;
				width: 97%;
				height:100%;
				padding: 10px;
				overflow-y: scroll;
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
							<img class="imgslider"src="assets/img/chatbox/slide1.jpg" >
						</div>
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="assets/img/chatbox/slide2.jpg" >
						</div>
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="assets/img/chatbox/slide3.jpg" >
						</div>
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="assets/img/chatbox/slide4.jpg" >
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
							<li class="active"><span class="last">Chatbox</span></li>
							
						</ul>
						<div class="breadcrumb-contacts">
							<a class="tellink" href="tel:+94 572 226 220">Tel :+94 572 226 220</a> 
							<a href="contact_us.php">Contact Us</a>
						</div>
					</div> 
				</div> 
				<div class="col-md-12 col-lg-10 col-lg-offset-1">
				<hr>
					<h1><span>CHATBOX</span>
						SHARE WITH US
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

						<!-- my codings for chatbox-->
						<div class="container2 ">
  							<img  class="w3-opacity-min" src="assets/img/chatbox/bg1.jpg" alt="Notebook" style="width:100%; ">
							<div class="content" >
								<?php 
								$cus_id= $_SESSION['cus_id'];
								$myrow0 =$obj ->view_dates("chatbox");
								foreach($myrow0 as $row0){ ?>
								
								
								
								<p class="w3-center"><?php echo  $row0['chat_date'] ?></p>

								<?php 
								$myrow =$obj ->view_chat("chatbox",$row0['chat_date']);

								
								
								
								foreach($myrow as $row){ ?> 


								<?php if($cus_id===$row['cus_id']){ ?>
									<div  class="container3 w3-light-gray  w3-padding-0" style=" display: inline-block; right: 0; position: absolute; ">
									<?php 
								
									$myrow2 =$obj ->view_cusname("customer",$row['cus_id']);
									foreach($myrow2 as $row2){?>
									<p><b><?php echo  $row2['cus_fname']."  ".$row2['cus_lname'];?></b></p>
									<?php }
									?>

									<p><!--<img src="assets/img/customer/customericon.png" alt="Avatar" style="width:120%; height:120%; ">-->
									<?php echo  $row['chat_content'] ?>
									<br><span class="time-right"><?php echo  $row['chat_time'] ?></span></p>
									</div><br><br><br><br>
									<hr>

								<?php }else{ ?>
									<div  class="container3 w3-light-gray  w3-padding-0" style=" display: inline-block ">
									<?php 
								
									$myrow2 =$obj ->view_cusname("customer",$row['cus_id']);
									foreach($myrow2 as $row2){?>
									<p><b><?php echo  $row2['cus_fname']."  ".$row2['cus_lname'];?></b></p>
									<?php }
									?>

									<p><!--<img src="assets/img/customer/customericon.png" alt="Avatar" style="width:120%; height:120%; ">-->
									<?php echo  $row['chat_content'] ?>
									<br><span class="time-right"><?php echo  $row['chat_time'] ?></span></p>
									</div><br><br><br><br>
										


								<?php } ?>
								
								
								<?php } ?>

								<?php } ?>
								<div id="sticker" class="container3 w3-white w3-padding-0 w3-light-gray" style="width:900px; position: sticky">
								<form method="post" action="./config/customer.php"> 
							
									<textarea class="form-control" name="chat" placeholder="Enter Message" style="width:800px"></textarea> 
									<input class="w3-right w3-btn w3-round-xxlarge" type="submit" name="chatbox" value="Send!" style="background-color: #0066cc" /> 

									<!--for passs cus_id-->
									<input type="hidden"  name="cus_id" value="<?php echo $_SESSION['cus_id'] ?>">
								</form>
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

			//reservation cancel page button
				$('#my_button2').on('click', function(){
					window.location='main.php';
            	});	

			//room reserve page button
			$('#my_button').on('click', function(){
					window.location='Reseve_room2.php';
            	});
				
			//fuction for sub drop down
			$(document).ready(function(){
			$('.dropdown-submenu a.test').on("click", function(e){
			$(this).next('ul').toggle();
			e.stopPropagation();
			e.preventDefault();
			});
			});	

			/*check availability form*/
			function openAvailability2() {
				window.location='Availability2.php';
			}	


			$(document).ready(function() {
				var s = $("#sticker");
				var pos = s.offset().top+s.height(); //offset that you need is actually the div's top offset + it's height
				$(window).scroll(function() {
					var windowpos = $(window).scrollTop(); //current scroll position of the window
					var windowheight = $(window).height(); //window height
					if (windowpos+windowheight>pos) s.addClass('stick'); //Currently visible part of the window > greater than div offset + div height, add class
					else s.removeClass('stick');
				});
			});

		</script>
	</body>
</html>
