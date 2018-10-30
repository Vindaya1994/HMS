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
						<div class="container no-padding">
						<div class="row">
							
							<div class="">
								<!--<div style="margin-left:12%;">-->
								<div >
									<!--<div class="container" style="padding-top:50px">-->
									 <div class="container" >
										<div class="w3-row">
											<div class=" w3-col s12 w3-margin">
												<div class="w3-card-4 w3-col s7 w3-margin">			
													<div class="w3-container w3-padding ">	
													<!--<div class="row  w3-xxxlarge " style="padding-left:16px"><img src="img/Fast-Food-icon.png" style="width:15%">&nbsp;&nbsp;</i> Meal List </div>-->
														<div class="row w3-margin w3-xxlarge "><img src="assets/img/bedRooms/Roomicon.png" style="width:21%">&nbsp;</i>Enter Room Category </div>
													</div>
													<div class="w3-container w3">
														<form   id="room-cat-add" method="post" action="./config/system_user.php" enctype="multipart/form-data">
															
															<div class="w3-half w3-padding">      
																<input class="w3-input w3-border" name="cat_name" type="text" placeholder="Category name"></div>
															<div class="w3-padding">
																<input class="w3-input w3-border" name="approximate_size" type="text" placeholder="Approximate size" ></div>
                                                            <div class="w3-padding">
																<input class="w3-input w3-border" name="maximum_adults" type="text" placeholder="Maximum adults" ></div>
                                                            <div class="w3-padding">
																<input class="w3-input w3-border" name="bed_type" type="text" placeholder="Bed type" ></div>
                                                            <div class="w3-padding">
																<input class="w3-input w3-border" name="connecting_rooms" type="text" placeholder="Connecting rooms" ></div>
                                                            <div class="w3-padding">
																<input class="w3-input w3-border" name="room_price" type="text" placeholder="Room price" ></div>    
															<div class="w3-padding">
																<textarea class="w3-select w3-border" name="cat_desc" type="text" placeholder=" Room Description"  rows="6" cols="40"  ></textarea></div>
													</div>
												</div>
												<div class="w3-card-4 w3-col s4 w3-margin w3-padding w3-center" >
													<div class="w3-padding ">
														<h2>Upload a photo</h2><hr/>
															<div id="imageVal" style="width:100%;height:100%"><img id="myImg" src="assets/img/bedRooms/Roomicon2.png" alt="meal image" class="w3-image" /></div>
															<input type="file" name="file" id="file" class="w3-btn w3-block w3-black w3-padding-large">
															<div class="w3-padding ">
																<span id="uploaded_image"></span>
															</div>
														</div>
													</div>
													<div class="w3-row-padding w3-margin-bottom">	
														<div class="w3-half">
															<input type="submit" class="w3-btn w3-green w3-block " name="room-cat-add" value="Add Room Category">
														</div> 
														<div class="w3-half">
															<input type="reset" class="w3-btn w3-red w3-block " name="customer-add-cancel" value="Cancel">
														</div>								
													</div>
													<!--nus code-->


													<!--end-->				
												</form>
												<div id="result"></div>			
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

			//validation to upload image 
			$(document).ready(function(){
				$(document).on('change', '#file', function(){
				var name = document.getElementById("file").files[0].name;
				var form_data = new FormData();
				var ext = name.split('.').pop().toLowerCase();
				if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
				{
					$("#file").val('');  
					$('#uploaded_image').html("<label class='text-danger'>Invalid Image File</label>");
					return false;  
				
				}
				var oFReader = new FileReader();
				oFReader.readAsDataURL(document.getElementById("file").files[0]);
				var f = document.getElementById("file").files[0];
				var fsize = f.size||f.fileSize;
				if(fsize > 2000000)
				{
					$('#uploaded_image').html("<label class='text-danger'>Image File Size is very big</label>");
					return false;   
				}
				else
				{
				form_data.append("file", document.getElementById('file').files[0]);
				$.ajax({
					url:"upload2.php",
					method:"POST",
					data: form_data,
					contentType: false,
					cache: false,
					processData: false,
					beforeSend:function(){
					$('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
					},   
					success:function(data)
					{
					$('#imageVal').html(data);
					}
				});
				}
				});
			});	

		</script>
	</body>
</html>
