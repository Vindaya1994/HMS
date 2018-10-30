
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
			<?php
				if(isset($_SESSION['uid'])) {
					include_once './navigations/nav2.php';

				}else{
					include_once './navigations/nav1.php';
				}
			?>	
		</header>
		<!--content-->
		<div style="margin-top:90px;">
		
			<!-- login form -->
			<div class="w3-row" style="margin-top:90px;">
			<div class="w3-display-container w3-content" style="max-width:1800px;">
								
            	<img class="w3-image" src="assets/img/bedRooms/masterBedroom.jpg" alt="The Hotel" style="min-width:1000px" width="1800" height="200">                                     
				<div class="w3-display-topmiddle  w3-padding w3-col l8 m8">
                    <div class="w3-card-4 w3-border w3-margin w3-padding">
						<!--heading of the card-->                               
                        <div class="w3-container w3-gray w3-padding">
                            <h2><i class="fa fa-bed w3-margin-right"></i><b>Check Room Availability</b></h2>
							<hr>
							<p><span class="glyphicon glyphicon-record"></span>You can check-in from 14:00 on the day of arrival and must check-out at 12:00 (noon) on the day of departure. </p>
							<p><span class="glyphicon glyphicon-record"></span>You are allow to cancel or change reservation  2 days before the check in date.</p>
						</div>
											
						<!--form-->
                        	<form class="w3-container" action="./config/customer.php" id="availability-form" method="POST">

							<br>
							<!--select bedroom type-->
                            <label><b><i class="fa fa-bed"></i>Bed room type</b></label>
                            <select class="w3-select w3-border " name="option">
							<option value="" disabled selected>Choose bedroom type </option>
											 
							<?php

								$myrow =$obj ->view_rooms("room_category");
								foreach($myrow as $row){
									echo "<option value='". $row['cat_id'] ."'>" . $row['cat_name'] . "</option>";
								}
							?>
							</select>

							<!--select check in date-->
                            <br><br>
                            <label><b><i class="fa fa-calendar-o"></i>Check in</b></label>
                            <input type="date" class="form-control" name="check_in" required placeholder="Enter date of check in" 
                            value="<?php if(isset($_POST['check_in'])){ echo $_POST['check_in']; }     ?>">
										
											
							<!--select check out date-->
                            <br><br>
                            <label><b><i class="fa fa-calendar-o"></i>Check out</b></label>
                            <input type="date" class="form-control" name="check_out" required placeholder="Enter date of check in"
                            value="<?php if(isset($_POST['check_out'])){ echo $_POST['check_out']; }     ?>">

                            <br>
                        	<button class="w3-block btn w3-green w3-text-black" name="availability" type="submit"><b>Check Availability<b></button>
							<button class="w3-block btn w3-red w3-text-black" name="availability2" type="reset"><b>Cancel<b></button>
                            </form>
						</div>     
                    </div> 
				</div>
			
            </div>
			
            
		</div>	
		<footer>
			<?php
				if(isset($_SESSION['uid'])) {
					include_once './footers/footer2.php';

				}else{
					include_once './footers/footer1.php';
				}
			?>
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
				window.location='guest_register.php';
			}
			//open login form
			function openLogWin() {
				window.location='login.php';
			}

			
		</script>
	</body>
</html>
