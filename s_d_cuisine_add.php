
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
							<li class="active"><span class="last">Rooms</span></li>
							
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
				<!--<div class="section-page-content row">
					<div class="col-lg-10 col-lg-offset-1">
						<p>Discover the true meaning of elegance, grace & splendour at The 
							Tenth Hotel, where we bring you regal indulgence, outstanding individual comforts & the best service amongst hotels 
							in Ella.
							<br>
							Our rooms are expertly designed with every luxury in mind. With a host of amenities and dining options; 
							whether in-room or from our restaurants, intuitive service, lavish BVLGARI bath cosmetics & heavenly Frette linen bedding, we guarantee a one of a kind holiday, fit for a king or queen.
						</p>

					</div>
				</div>-->
				<div class="section-page-content row">
					
					<div class="col-lg-10 col-lg-offset-1 w3-white">
						<!--my coding here-->
						<div class="container no-padding w3-border-black">
						    <div class="row">
							    <div class="">
								    <!--<div style="margin-left:12%;">-->
								    <div >
									    <!--<div class="container" style="padding-top:50px">-->
									     <div class="container" >
										    <div class="w3-row">
											    <div class=" w3-col s12 w3-margin">
												    <div class="w3-card-4 w3-col s12 w3-margin w3-border-black">			
													    <div class="w3-container w3-padding ">	
														    <div class="row w3-margin w3-xxxlarge "><img src="assets/img/dinning/admin/meal2.png" style="width:21%">&nbsp;</i>Add New Cuisine
													    </div>
													    <div class="w3-container w3">
														    <form   id="cuisine-add" method="post" action="./config/system_user.php" enctype="multipart/form-data">
			
															    <div class=" w3-padding">      
                                                                    <!--add type-->
																	<div class="w3-padding w3-col s6">
																		<input class="w3-input w3-border" name="cid" type="text" placeholder="Add Cuisine Type" ></div>
																	<div class="w3-padding w3-col s6 ">
																		<input class="w3-input w3-border" name="cname" type="text" placeholder="Add Cuisine Name" ></div> <br><br>
																</div>
																<br><br>
																<div class="w3-row-padding w3-margin-bottom">	
																	<div class="w3-half">						
																		<input type="submit" class="w3-btn w3-green w3-block " name="cuisine-add" value="Add Cuisine">
																	</div> 
																	<div class="w3-half">
																		<input type="reset" class="w3-btn w3-red w3-block " name="customer-add-cancel" value="Cancel">
																	</div>								
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

		</script>
	</body>
</html>
