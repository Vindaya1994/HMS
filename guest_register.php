<<?php
include "./config/customer.php";

?>	

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
			<?php include_once'navigations/nav0.php' ?>	
		</header>

		<!--content-->
		<div style="margin-top:90px;margin-left:85px;margin-bottom:10px">
			<div class="w3-row w3-center">

			
        		<!--******************registration form*****************************-->

        		<form class="form-horizontal w3-left w3-border w3-light-gray w3-padding-16" id="register-form" method="post" action="./config/customer.php"  >

            		<div class="container">
                		<h1>Guest Register</h1>
                		<p>Please fill in this form to create an account.</p>
                		<hr>
						<div class="form-group">
							<label class="control-label col-sm-2" for="firstname">First name:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="fname"  placeholder="Enter first name" id="fname"  >
								<span class="error_form" id="fname_error_message"> </span>
							</div>
						</div>                  
						<div class="form-group">
							<label class="control-label col-sm-2" for="lastname">Last name:</label>
							<div class="col-sm-10"> 
								<input type="text" class="form-control" name="lname"  placeholder="Enter last name" id="lname">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="date of birth">Date of birth:</label>
							<div class="col-sm-10"> 
								<input  type="date" class="form-control" name="birthdate" placeholder="Enter date of birth"  id="birthdate">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="county">Country:</label>
							<div class="col-sm-10"> 
								<input type="text" class="form-control" name="country"  placeholder="Enter country" id="country">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="email">Email:</label>
							<div class="col-sm-10"> 
								<input type="text" class="form-control" name="email"   placeholder="Enter email" id ="email">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="contact number">Contact no:</label>
							<div class="col-sm-10"> 
								<input type="text" class="form-control" name="contactno" placeholder="Enter conatact number" id="contactno">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="username">Username:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="username" placeholder="Enter username"  id="username">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="pwd">Password:</label>
							<div class="col-sm-10">          
								<input type="password" class="form-control" name="pwd" placeholder="Enter password" id="pwd"  >
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="confirmpwd">Confirm Password:</label>
							<div class="col-sm-10">          
								<input type="password" class="form-control" name="con_pwd"  placeholder="Confirm password" id="con_pwd" >
							</div>
						</div>
						<p>By creating an account you agree to our Terms & Privacy.</p>
						<div class="form-group"> 
							<div class="col-sm-offset-2 col-sm-10 ">
								<button type="submit" class="button w3-green" name="register" id="submit-button" style="width:900px; height:40px"	>Register</button><br><br>
								<button type="reset" class="button w3-red" name="cancel" id="cancel-button" style="width:900px; height:40px"	>Cancel</button> 
							</div>
						</div>
						<p>Already have an account? <a href="login.php"><lable class="w3-blue w3-padding">Sign in</lable></a></p>
            		</div> 
        		</form>
			</div>
		</div>	
		<footer>
			<?php	include_once'./footers/footer1.php'?>
		</footer>
   		<!-- End Page Content -->

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
				window.open("Guest_register.php");
			}
			//open login form
			function openLogWin() {
				window.open("Login.php");
			}

			/*check availability form*/
			function openAvailability() {
				window.location='Availability.php';
			}

			
		</script>
	</body>
</html>
