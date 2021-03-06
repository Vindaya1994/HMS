
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
														    <div class="row w3-margin w3-xxxlarge "><img src="assets/img/inventory/file.png" style="width:21%">&nbsp;</i>Issue item
                                                            </div>
													    </div>
													    <div class="w3-container w3">
														    <form   id="item-add" method="post" action="./config/system_user.php" enctype="multipart/form-data">
									
                                                            <div class="w3-half w3-padding">      
                                                                    <!--select bedroom type-->
                                                                    <select class="w3-select w3-border " name="option">
                                                                    <option value="" disabled selected>Choose item name </option>
                                                                                    
																	<?php
																		$myrow =$obj ->view_inventory("inventory");
																		foreach($myrow as $row){
																			echo "<option value='". $row['item_id'] ."'>" . $row['item_name'] . "</option>";
																		}
																	?>
                                                                    </select>
                                                                </div>
													    </div>
												    </div>
													
													<div class="w3-padding">									
														<button class="btn w3-green" name="issue" type="submit" style="width:950px;height:50px;">Issue Item</button>
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
