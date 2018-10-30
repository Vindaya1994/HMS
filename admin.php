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
				include_once './navigations/nav4.php';
			}else{
				include_once './navigations/nav1.php';	
			}
			?>	
		</header>
<!--*************************************************************************************content***********************************************************************************-->
		<div class="site-main container">
		<img src="assets/img/index/horel.jpg" style="width:100%; height:550px;">
		<div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-16 w3-hide-small ">
			<h2 class="w3-xxxlarge w3-text-white w3-center"style="letter-spacing: 3px;text-shadow:3px 2px 0 #444"><b>THE TENTH HOTEL <b></h2>
			<p class="w3-center"><b>ELLA , SRI LANKA</b></p>   
		</div>
		</div> 	
<!--*******************************************************************************End of content***********************************************************************************-->
		
		<footer>
			<?php
				if(isset($_SESSION['uid'])) {
					include_once './footers/footer4.php';

				}else{
					include_once './footers/footer1.php';
				}
			?>		
		</footer>
   		
        <!--java script-->
        <script>
			
			
			//open home page
			function openIndexWin() {
				window.location='account_staff.php';
			}

			//fuction for sub drop down
			$(document).ready(function(){
				$('.dropdown-submenu a.test').on("click", function(e){
				$(this).next('ul').toggle();
				e.stopPropagation();
				e.preventDefault();
				});
			});

		</script>
	</body>
</html>
