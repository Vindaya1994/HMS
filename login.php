<?php
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
		<div style="margin-top:90px;">
		
			<!-- login form -->
			<div class="w3-row" style="margin-top:90px;">
				<div class=" w3-display-container w3-center w3-text-white ">
					<img src="assets/img/index/horel.jpg" style="width:100%; height:650px;">
					<div class="w3-display-topmiddle w3-container w3-border   w3-margin" style="padding: 16px;">
						
						<div class="content w3-card-4 " style="  max-width:400px;max-height:auto">
  
							<div class="w3-center" style="width:100%">
								<img src="assets/img/login/loginicon.png" alt="Avatar"  class="w3-circle w3-margin-top" style="width:25%; height:25%;">
							</div>	
							<form class="w3-container" action="./config/user.php"id="login-form"method="POST">
								<div class="w3-section ">
								  <label for="uname" class="w3-left"><b>Username</b></label>
								  <input class="w3-input w3-border w3-margin-bottom w3-text-black" type="text" placeholder="Enter Username" name="username" required>
								  
								  <br>
								  <label for="psw"class="w3-left"><b>Password</b></label>
								  <input class="w3-input w3-border  w3-text-black" type="password" placeholder="Enter Password" name="password" required>
								  
								  <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name="login">Login</button>
								  <!--<input class="w3-check  w3-left" type="checkbox" checked="checked"name="remember" value="ree"><p class=" w3-left"style="padding-top:10px; padding-left: 10px;"> Remember me<p>-->
								</div>
							</form>
							<div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
								<button  type="button" class="w3-button w3-red w3-left" onclick="cancel()">Cancel</button>
								<!--<span class="w3-right w3-padding w3-hide-small">Forgot <a href="#">password?</a></span>-->
								<span class="w3-right w3-padding w3-hide-small">Not registerd?  <a href="guest_register.php">Register now</a></span>
							</div>

						</div>
							
					</div>
					
					
				</div>
			
            </div>
			
            
		</div>	
		<footer>
		<?php	include_once'./footers/footer1.php'?>	
		</footer>
   		<!-- End Page Content -->

        <!--java script-->
        <script>
			/*check availability form*/
			function openAvailability() {
				window.location='availability.php';
			}

			//open register form
			function openRegWin() {
				window.open("guest_register.php");
			}
			//open login form
			function openLogWin() {
				window.open("login.php");
			}
			//cancel login
			function cancel() {
				window.location='login.php';
			}
		</script>
	</body>
</html>
