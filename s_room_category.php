<?php include_once './config/system_user.php'; ?>
<!DOCTYPE html>

<html lang="en">
    
    <head>
		<?php include_once 'headers/header.php';
		 ?>
		
        <!-- css to the relevant page  -->
       
		<style>
		</style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
						<div class="w3-card-4 w3-col s12 w3-margin">
							<div class="w3-container w3-padding ">
								<div class="row  w3-xxxlarge " style="padding-left:16px"><img src="assets/img/bedRooms/Roomicon.png" style="width:15%">&nbsp;&nbsp;</i> ROOM CATEGORIES </div>
							</div>
							<div class="w3-container w3">
								
								<!--searching bar-->	
								<div class="row  w3-margin" >
										<button  class="w3-btn w3-block w3-green  col-md-3" type="button" onClick= "window.location.href = 's_room_category_add.php';" ><i class="fa fa-plus"></i>&nbsp;Add New Room Category</button>
									</div>
															
									<div class="row  w3-margin "style="margin-top:0px">
										<div class="w3-col s2 w3-centre ">
											<h5 class="" style="margin-top:0px"><em class="fa fa-search" style="font-size:30px"></em><b>Search By :</b></h5>
										</div>
										<div class="w3-col s3 "style="margin-left:22px">
											<input class="w3-input w3-border " name="cat_id" type="text" placeholder="Category ID" id="cat_id">
										</div>
										<div class="w3-col s3 "style="margin-left:22px">
											<input class="w3-input w3-border " name="cat_name" type="text" placeholder="Category Name" id="cat_name">
										</div>
										<div class="w3-col s3 "style="margin-left:22px">
											<input class="w3-input w3-border " name="bed" type="text" placeholder="Bed Type" id="bed">
										</div>
									</div>
									<div id="result"></div>
								<!--end search bar-->
								

															
								<div class="row  w3-margin" >
									<table class="table table-striped table-bordered" id="example">
										<thead>
											<tr class="w3-light-grey">
												
												<th>No</th>
												<th>Category Name</th>
												<th>Size</th>
												<th>Maximum adults</th>
												<th>Bed type</th>
												<th>Connecting rooms</th>
												<th>Room price</th>
												<th>Description</th>
												<th style="width:20px;">Image</th>
												<th>Action</th>
												
											</tr>
										</thead>

										<?php
										
										$myrow =$obj ->view_roomCategory("room_category");
										foreach($myrow as $row){ ?>							
										<tbody>
											<tr>
												
												<td><?php echo $row["cat_id"]; ?></td>
												<td><?php echo $row["cat_name"]; ?></td>
												<td><?php echo $row["approximate_size"]; ?></td>
												<td><?php echo $row["maximum_adults"]; ?></td>
												<td><?php echo $row["bed_type"]; ?></td>
												<td><?php echo $row["connecting_rooms"]; ?></td>
												<td><?php echo $row["room_price"]; ?></td>
												<td><?php echo $row["cat_desc"]; ?></td>
												<td style="width:20px;"><?php echo '<img src="'.$row['room_image'].'" height="150" width="225" class="" />'; ?></td>
												
												<td><a name="view" value="View" id="<?php echo $row["cat_id"]; ?>" class=" view_data"><i class="fa fa-eye" style="font-size:20px;color:black;" ></i></a>&nbsp; 
													<a name="edit" value="Edit" id="<?php echo $row["cat_id"]; ?>" class=" edit_data"><i class="fa fa-pencil" style="font-size:20px;color:blue;" ></i></a>&nbsp; 
													<a class="remove" onclick="myFunction(<?php echo $row["cat_id"]; ?>)"   title="Remove This Customer" id="myDiv1" value="<?php  $row["cat_id"] ?>" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:red;"></i></a>	
												</td>
											</tr>
										<?php } ?>
										</tbody>
									</table>
								</div>	
							</div>
						</div>

						<!--view model-->
						<div  class="modal fade"  id="view">
							<div class="modal-dialog">
								<div class="modal-content" >
									<div class="modal-header">
										<button type="button" class="close " data-dismiss="modal" aria-label="Close">
											<span class="w3-text-black w3-xxlarge" aria-hidden="true">&times;</span>
										</button>
										<h5 class="modal-title" id="exampleModalLabel">
											<div class="w3-container" style="background-color: #8cd98c">
												<h2><i class="fa fa-eye"></i> View Room Category Details</h2>
											</div>
										</h5>
									</div>	
									<div class="modal-body">
										
											<div id="modal-content">
												<div class="container " style="width:600px">
												
												<!--<input type="hidden" name="ecat_idd" id="ecat_idd" />-->

												<p>
												<input  disabled class="w3-input" name="eecat_id" value=""  id="eecat_id">
  												<label>Room Category ID</label></p>
												</p>

												<p>
												<input  disabled class="w3-input" name="eename" value=""  id="eename">
												<label>Category Name</label></p>
												</p>

												<p>
												<input  disabled class="w3-input" name="eesize" value=""  id="eesize">
												<label>Room Size</label></p>
												</p>

												<p>
												<input  disabled class="w3-input" name="eeadults" value=""  id="eeadults">
												<label>Maximum Adults</label></p>
												</p>


												<p>
												<input  disabled class="w3-input" name="eebedType" value=""  id="eebedType">
												<label>Room Type</label></p>
												</p>

												<p>
												<input  disabled class="w3-input" name="eeconnectingRooms" value=""  id="eeconnectingRooms">
												<label>Connecting Rooms</label></p>
												</p>		

												<p>Rs
												<input  disabled class="w3-input" name="eeroomPrice" value=""  id="eeroomPrice">
												<label>Price</label></p>
												</p>	
													
												<p>
												<input  disabled class="w3-input" name="eedescription" value=""  id="eedescription">
												<label>Description</label></p>
												</p>

												<p>
												<input  disabled class="w3-input" name="eeimage" value=""  id="eeimage">
												<label>Image</label></p>
												</p>	
													
												</div> 
											</div>
										</div>	
											
									<div class="modal-footer">	
										<button type="button" name="" class="w3-btn  w3-red w3-margin-bottom w3-padding" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
						<!--end view model-->

						<!--edit model-->
						<div  class="modal fade"  id="edit">
							<div class="modal-dialog">
								<div class="modal-content" >
									<div class="modal-header">
										<button type="button" class="close " data-dismiss="modal" aria-label="Close">
											<span class="w3-text-black w3-xxlarge" aria-hidden="true">&times;</span>
										</button>
										<h5 class="modal-title" id="exampleModalLabel">
											<div class="w3-container" style="background-color: #8cd98c">
												<h2><i class="fa fa-pencil"></i> Edit Room Category Details</h2>
											</div>
										</h5>
									</div>	
									<div class="modal-body">
										<!--customer details update form-->
										<form id="room-category-edit-form" method="post" action="./config/system_user.php" >
											
											<div id="modal-content">
												<div class="container " style="width:600px">
												
												<input type="hidden" name="ecaty_id" id="ecaty_id" />

												<p>
												<input  disabled class="w3-input" name="ecat_id" value=""  id="ecat_id">
  												<label>Room Category ID</label></p>
												</p>

												<p>
												<input   class="w3-input" name="ename" value=""  id="ename">
												<label>Category Name</label></p>
												</p>

												<p>
												<input   class="w3-input" name="esize" value=""  id="esize">
												<label>Room Size</label></p>
												</p>

												<p>
												<input  class="w3-input" name="eadults" value=""  id="eadults">
												<label>Maximum Adults</label></p>
												</p>


												<p>
												<input   class="w3-input" name="ebedType" value=""  id="ebedType">
												<label>Room Type</label></p>
												</p>

												<p>
												<input  class="w3-input" name="econnectingRooms" value=""  id="econnectingRooms">
												<label>Connecting Rooms</label></p>
												</p>		

												<p>Rs
												<input   class="w3-input" name="eroomPrice" value=""  id="eroomPrice">
												<label>Price</label></p>
												</p>	
													
												<p>
												<input   class="w3-input" name="edescription" value=""  id="edescription">
												<label>Description</label></p>
												</p>

												<!--<p>
												<input   class="w3-input" name="eimage" value=""  id="eimage">
												<label>Image</label></p>
												</p>-->	
												</div> 
											</div>
										<!--end-->
									</div>	
											
									
									<div class="modal-footer">
										<input type="submit" class="w3-btn  w3-green w3-margin-bottom w3-padding" id="update-customer" value="Update" name="update-room-category" > 
										</form>
										<button type="button" name="" class="w3-btn  w3-red w3-margin-bottom w3-padding" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
						<!--end model-->
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


			//coding for view function
			$(document).ready(function(){		
				$(document).on('click','.view_data', function(){
					
					var cat_id = $(this).attr("id");
					
					$.ajax({
						url:"./config/system_user.php",
						method: "POST",
						data:{cat_id:cat_id},
						dataType:"json",
						success:function(data){
							
							$('#eecat_id').val(data.cat_id);
							$('#eename').val(data.cat_name);
							$('#eesize').val(data.approximate_size	);
							$('#eeadults').val(data.maximum_adults);
							$('#eebedType').val(data.bed_type);
							$('#eeconnectingRooms').val(data.connecting_rooms);
							$('#eeroomPrice').val(data.room_price);
							$('#eedescription').val(data.cat_desc);
							$('#eeimage').val(data.room_image);
							
							$('#view').modal('show');
						}
					});	
				});
			});


			//coding for edit function
			$(document).ready(function(){		
				$(document).on('click','.edit_data', function(){
					
					var cat_id = $(this).attr("id");
					
					$.ajax({
						url:"./config/system_user.php",
						method: "POST",
						data:{cat_id:cat_id},
						dataType:"json",
						success:function(data){

							$('#ecaty_id').val(data.cat_id);
							$('#ecat_id').val(data.cat_id);
							$('#ename').val(data.cat_name);
							$('#esize').val(data.approximate_size	);
							$('#eadults').val(data.maximum_adults);
							$('#ebedType').val(data.bed_type);
							$('#econnectingRooms').val(data.connecting_rooms);
							$('#eroomPrice').val(data.room_price);
							$('#edescription').val(data.cat_desc);
							$('#eimage').val(data.room_image);

							$('#update-room-category').val("Update");
							$('#edit').modal('show');
						}
					});	
				});
			});
			
			//romove customer
			function myFunction(x) {
				if (confirm('Are you sure to remove this room category')) {
					var number =x; 
					$("#myDiv1").load('config/system_user.php', {selectedButtonValue4 : number});
                }	
			}

			//for searching bar
			$(document).ready(function(){
				load_data();
				function load_data(room_category_query1){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{room_category_query1:room_category_query1},
						success:function(data){
				
							$('#result').html(data);
						}
					});
				}
				$('#cat_id').keyup(function(){
					var search = $(this).val();
					if(search != ''){
						load_data(search);
					}else{
						load_data();
					}
				});
			});

			$(document).ready(function(){
				load_data();
				function load_data(room_category_query2){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{room_category_query2:room_category_query2},
						success:function(data){
				
							$('#result').html(data);
						}
					});
				}
				$('#cat_name').keyup(function(){
					var search = $(this).val();
					if(search != ''){
						load_data(search);
					}else{
						load_data();
					}
				});
			});

			$(document).ready(function(){
				load_data();
				function load_data(room_category_query3){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{room_category_query3:room_category_query3},
						success:function(data){
				
							$('#result').html(data);
						}
					});
				}
				$('#bed').keyup(function(){
					var search = $(this).val();
					if(search != ''){
						load_data(search);
					}else{
						load_data();
					}
				});
			});
	
			
		</script>
	</body>
</html>
