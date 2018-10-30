
<!DOCTYPE html>

<html lang="en">
    
    <head>
        <?php include_once'headers/header.php' ?>
        <!-- css to the relevant page  -->
       
		<style>
			/* Style inputs with type="text", select elements and textareas */
input[type=text], select, textarea {
    width: 100%; /* Full width */
    padding: 12px; /* Some padding */  
    border: 1px solid #ccc; /* Gray border */
    border-radius: 4px; /* Rounded borders */
    box-sizing: border-box; /* Make sure that padding and width stays in place */
    margin-top: 6px; /* Add a top margin */
    margin-bottom: 16px; /* Bottom margin */
    resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

/* Style the submit button with a specific background color etc */
input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

/* When moving the mouse over the submit button, add a darker green color */
input[type=submit]:hover {
    background-color: #45a049;
}

/* Add a background color and some padding around the form */
.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
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

				<div id="myslide">
					<!-- Automatic Slideshow Images -->
					<div id="slideht" style="height:500px">
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="img/contact_us/1.jpg" style="height:500px" >
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
							<li class="active"><span class="last">Contact Us</span></li>
						</ul>
						<div class="breadcrumb-contacts">
							<a class="tellink" href="tel:+94 572 226 220">Tel :+94 572 226 220</a> 
							<a href="contact_us.php">Conatct  Us</a>
						</div>
					</div> 
				</div> 
				<div class="col-md-12 col-lg-10 col-lg-offset-1">
				<hr>
					<h1><span></span>
						
					</h1>
				</div>
				<div class="section-page-content row">
					<div class="col-lg-10 col-lg-offset-1">
					<div class="container">
						<form action="./config/customer.php" method="post" id="contact-form">
						

							<label for="fullname"> Name</label>
							<input type="text" id="fullname" name="fullname" placeholder="Your name.."><br><br>

							<label for="email">Email</label>
							<input type="text" id="email" name="email" placeholder="Your email.."><br><br>

							<label for="country">Country</label>
							<input type="text" id="country" name="country" placeholder="Your country.."><br><br>

							<label for="subject">Subject</label>
							<textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea><br><br>

							
							<button class="w3-block btn w3-green w3-text-black" name="contact" type="submit"><b>Submit<b></button><br>
							<button class="w3-block btn w3-red w3-text-black" name="contact_cancel" type="reset"><b>Cancel<b></button>

						</form>
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

			//disable button
				$('#my_button').on('click', function(){
                alert('Please login to the system for reservations.');
                $('#my_button').attr("disabled", true);
            });	

			/*check availability form*/
			function openAvailability() {
				window.location='availability.php';
			}


		

		</script>
	</body>
</html>
