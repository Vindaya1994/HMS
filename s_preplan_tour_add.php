<?php include_once './config/system_user.php'; ?>
<!DOCTYPE html>

<html lang="en">
    
    <head>
		<?php include_once 'headers/header.php';
		 ?>
		
        <!-- css to the relevant page  -->
       
		<style>
		</style>
    </head>

 
	<body class="w3-white" >
	
	

        <!-- Page header -->
		<header>
			<?php
			if($_SESSION['utype']=='2') {
				include_once './navigations/nav3.php';

			}else if($_SESSION['utype']=='3'){
				include_once './navigations/nav4.php';
			}
			?>	
		</header>
		
<!--*************************************************************************************content***********************************************************************************-->
		<div class="site-main container">
			<div class="section-page-heading row  ">
				<div class="breadcrumb-leftnav-wrapper ">
					<div class="col-md-12 col-lg-10 col-lg-offset-1 ">
						<ul class="breadcrumb">
							<li><a href="index.php" title="The Tenth Hotel" class="bolds">Home</a><span class="sep"></span></li>
							<li class="active"><span class="last">Services</span></li>
							<li class="active"><span class="last">Pre Plan Tours</span></li>
							<li class="active"><span class="last">Add Pre Plan Tours</span></li>
							
						</ul>
						<div class="breadcrumb-contacts">
							<a class="tellink" href="tel:+94 572 226 220">Tel :+94 572 226 220</a> 
							<a href="contact_us.php">Contact Us</a>
						</div>
					</div> 
				</div> 
				<div class="col-md-12 col-lg-10 col-lg-offset-1">
				<hr>
					<h1>THE TENTH HOTEL
					<span>ELLA , SRI LANKA</span>
					</h1>
				</div>
				
				<div class="section-page-content row">
					
					<div class="col-lg-10 col-lg-offset-1 w3-white">
						<!--my coding here-->
						<div class="container no-padding">
						<div class="row">
							
							<div class="">
								<!--<div style="margin-left:12%;">-->
								<div >
									<!--<div class="container" style="padding-top:50px">-->
									 <div class="container" >
										<div class="w3-row">
											<div class=" w3-col s12 w3-margin">
												<div class="w3-card-4 w3-col s12 w3-margin">			
													<div class="w3-container w3-padding ">	
													<!--<div class="row  w3-xxxlarge " style="padding-left:16px"><img src="img/Fast-Food-icon.png" style="width:15%">&nbsp;&nbsp;</i> Meal List </div>-->
														<div class="row w3-margin w3-xxlarge "><img src="images/preplan.jpg" style="width:21%">&nbsp;</i> Add Pre Plan Tours </div>
													</div>
													<div class="w3-container w3">
														<form   id="s_preplan_tour_add" method="post" action="./config/system_user.php" enctype="multipart/form-data">
															<div class="w3-padding">      
																<input class="w3-input w3-border" name="tour_name" type="text" placeholder=" Tour Name" id="name" onkeyup="validatename()" 
																required value="<?php if(isset($_POST['tour_name'])){ echo $_POST['tour_name']; } ?>">
																<span class="error_form" id="tour_name"></span> 
															</div>
															<div class=" w3-padding">      
																<input class="w3-input w3-border" name="places_to_visit" type="text" placeholder="Places To Visit" id="places" onkeyup="validateplaces()" 
																required value="<?php if(isset($_POST['places_to_visit'])){ echo $_POST['places_to_visit']; } ?>">
																<span class="error_form" id="places_to_visit"></span> 
															</div>
															
                                                            <div class="w3-padding">
																<input class="w3-input w3-border" name="price" type="text" placeholder="Price per Person(LKR)" id="pricepp" onkeyup="validateplrice()" 
																required value="<?php if(isset($_POST['price'])){ echo $_POST['price']; } ?>">
																<span class="error_form" id="price"></span> 
															</div>
															
                                                            <div class="w3-padding">
																<input class="w3-input w3-border" name="no_of_participant" type="text" placeholder="No of Participants" id="participants" onkeyup="validateparticipants()" 
																required value="<?php if(isset($_POST['no_of_participant'])){ echo $_POST['no_of_participant']; } ?>">
																<span class="error_form" id="no_of_participant"></span> 
															</div>
															
                                                            <div class="w3-padding">
																<input class="w3-input w3-border" name="no_of_days" type="text" placeholder="No of days" id="day" onkeyup="validatedate()" 
																required value="<?php if(isset($_POST['no_of_days'])){ echo $_POST['no_of_days']; } ?>">
																<span class="error_form" id="no_of_days"></span> 
															</div>
															
															<div class="w3-padding">
																<input class="w3-input w3-border" name="description" type="text" placeholder="Description" id="decs" onkeyup="validatedes()" 
																required value="<?php if(isset($_POST['description'])){ echo $_POST['description']; } ?>">
																<span class="error_form" id="description"></span> 
															</div>
                                                            <div class="w3-padding">
																<input class="w3-input w3-border" name="image" type="file">
															</div> 										
															
															<div class="w3-padding">									
															<button class="btn w3-green" name="preplan_tour_add" type="submit" style="width:900px">Add Preplan Tour</button>
															<button class="btn w3-red" name="preplant_reset" type="reset" style="width:900px">Reset</button>
															</div>
															
														</form>
												</div>		
											</div>							
										</div> 
									</div>
								</div>    
							</div>
						</div>           
					</div>
				</div>
						<!--end my coding-->

						
				</div>
			</div> 
		</div> 	
<!--*******************************************************************************End of content***********************************************************************************-->
		
		<footer>
				<?php
				if($_SESSION['utype']=='2') {
					include_once './footers/footer3.php';

				}else if($_SESSION['utype']=='3'){
					include_once './footers/footer4.php';
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

		

