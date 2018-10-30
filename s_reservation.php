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
								<div class="row  w3-xxxlarge " style="padding-left:16px"><img src="assets/img/bedRooms/Roomicon.png" style="width:15%">&nbsp;&nbsp;</i> RESERVATIONS</div>
							</div>
							<div class="w3-container w3">
								
								<!--searching bar-->									
									<div class="row  w3-margin" >
										<button  class="w3-btn w3-block w3-green  col-md-3" type="button" onClick= "window.location.href = 's_reservation_add.php';" ><i class="fa fa-plus"></i>&nbsp;Add New Reservation</button>
									</div>
															
									<div class="row  w3-margin "style="margin-top:0px">
										<div class="w3-col s2 w3-centre ">
											<h5 class="" style="margin-top:0px"><em class="fa fa-search" style="font-size:30px"></em><b>Search By :</b></h5>
										</div>
										<div class="w3-col s1 "style="margin-left:18px">
											<input class="w3-input w3-border " name="reservation_no" type="text" placeholder="Reservation No" id="reservation_no">	
										</div>
										<div class="w3-col s2 "style="margin-left:18px">
											<input class="w3-input w3-border " name="checkin" type="text" placeholder="Checkin date" id="checkin">
										</div>
										<div class="w3-col s2 "style="margin-left:18px">
											<input class="w3-input w3-border " name="checkout" type="text" placeholder="Checkout date" id="checkout">
										</div>
										<div class="w3-col s1 "style="margin-left:18px">
											<input class="w3-input w3-border " name="room_no" type="text" placeholder="Room no " id="room_no">
										</div>
										<div class="w3-col s2 "style="margin-left:18px">
											<input class="w3-input w3-border " name="date" type="text" placeholder="Reservation date " id="date">
										</div>
									</div>
									<div id="result"></div>
								<!--end search bar-->

															
								<div class="row  w3-margin" >
									<table class="table table-striped table-bordered" id="example">
										<thead>
											<tr class="w3-light-grey">
												<th>Reservation  No</th>
												<th>Checkin date</th>
												<th>Checkout date</th>
												<th>Room No</th>
												<th>Customer ID</th>
												<th>Customer Name</th>
												<th>Reservation date</th>
												<th>Action</th>
											</tr>
										</thead>

										<?php
										$myrow =$obj ->view_reservation("reservation");
										foreach($myrow as $row){ ?>							
										<tbody>
											<tr>
												<td><?php echo $row["reservation_no"]; ?></td>
												<td><?php echo $row["checkin"]; ?></td>
												<td><?php echo $row["checkout"]; ?></td>
												<td><?php echo $row["room_no"]; ?></td>
												<td><?php echo $row["cus_id"]; ?></td>
												<td><span id="cus_id"> <?php
													$x =$row["cus_id"];
													$myrow2 =$obj ->view_customer_name("customer",$x);
													foreach($myrow2 as $row2){	
													echo $row2["cus_fname"].' ' .$row2["cus_lname"];
													}
												?></span>
												</td>
												<td><?php echo $row["reservation_date"]; ?></td>		
												<td><a name="view" value="View" id="<?php echo $row["reservation_no"]; ?>" class=" view_data"><i class="fa fa-eye" style="font-size:20px;color:black;" ></i></a>&nbsp; 
													
													<a class="remove" onclick="myFunction(<?php echo $row["reservation_no"]; ?>)"   title="Remove This Room Category" id="myDiv1" value="<?php  $row["reservation_no"] ?>" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:red;"></i></a>	
												</td>
											</tr>
										<?php } ?>
										</tbody>
									</table>
								</div>	
							</div>
						</div>
						<!--end my coding-->

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
												<h2><i class="fa fa-eye"></i> View Room Reservations</h2>
											</div>
										</h5>
									</div>	
									<div class="modal-body">
										
											<div id="modal-content">
												<div class="container " style="width:600px">
												
												<input type="hidden" name="eereserve_no" id="eereserve_no" />

												<p>
												<input  disabled class="w3-input" name="eereservation_no" value=""  id="eereservation_no">
  												<label>Reservation Number</label></p>
												</p>

												<p>
												<input  disabled class="w3-input" name="eecheckin" value=""  id="eecheckin">
												<label>Checkin date</label></p>
												</p>

												<p>
												<input  disabled class="w3-input" name="eecheckout" value=""  id="eecheckout">
												<label>Checkout date</label></p>
												</p>

												<p>
												<input  disabled class="w3-input" name="eeroom_no" value=""  id="eeroom_no">
												<label>Room No</label></p>
												</p>		

												<p>
												<input  disabled class="w3-input" name="eecus_id" value=""  id="eecus_id">
												<label>Customer ID</label></p>
												</p>	
													
												<p>
												<input  disabled class="w3-input" name="eedate" value=""  id="eedate">
												<label>Reservation date</label></p>
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
												<h2><i class="fa fa-pencil"></i> Edit Room Reservations</h2>
											</div>
										</h5>
									</div>	
									<div class="modal-body">
										<!--customer details update form-->
										<form id="room-reservation-form" method="post" action="./config/system_user.php" >
											
											<div id="modal-content">
												<div class="container " style="width:600px">
												
												<input type="hidden" name="ereserve_no" id="ereserve_no" />

												<p>
												<input  disabled class="w3-input" name="ereservation_no" value=""  id="ereservation_no">
  												<label>Reservation Number</label></p>
												</p>
											
												<p>
												<input type="date" class="w3-input" name="echeckin" value=""  id="echeckin">
  												<label>Checkin date</label></p>
												</p>

												<p>
												<input type="date" class="w3-input" name="echeckout" value=""  id="echeckout">
												<label>Checkout date</label></p>
												</p>

												<p>
												<input  class="w3-input" name="eroom_no" value=""  id="eroom_no">
												<label>Room No</label></p>
												</p>

												<p>
												<input   class="w3-input" name="ecus_id" value=""  id="ecus_id">
												<label>Customer ID</label></p>
												</p>		

												<p>
												<input type="date"  class="w3-input" name="edate" value=""  id="edate">
												<label>Reservation Date</label></p>
												</p>	
													
												</div> 
											</div>
										<!--end-->
										</div>	
									<div class="modal-footer">
										<input type="submit" class="w3-btn  w3-green w3-margin-bottom w3-padding" id="update-reservation" value="Update" name="update-reservation" > 
										</form>
										<button type="button" name="" class="w3-btn  w3-red w3-margin-bottom w3-padding" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
						<!--end model-->
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

			//coding for view function
			$(document).ready(function(){		
				$(document).on('click','.view_data', function(){
					
					var reservation_no = $(this).attr("id");
					
					$.ajax({
						url:"./config/system_user.php",
						method: "POST",
						data:{reservation_no:reservation_no},
						dataType:"json",
						success:function(data){
							
							$('#eereservation_no').val(data.reservation_no);
							$('#eecheckin').val(data.checkin);
							$('#eecheckout').val(data.checkout);
							$('#eeroom_no').val(data.room_no);
							$('#eecus_id').val(data.cus_id);
							$('#eedate').val(data.reservation_date);
							$('#view').modal('show');
						}
					});	
				});
			});


			//coding for edit function
			$(document).ready(function(){		
				$(document).on('click','.edit_data', function(){
					
					var reservation_no = $(this).attr("id");
					
					$.ajax({
						url:"./config/system_user.php",
						method: "POST",
						data:{reservation_no:reservation_no},
						dataType:"json",
						success:function(data){
							$('#ereserve_no').val(data.reservation_no);
							$('#ereservation_no').val(data.reservation_no);
							$('#echeckin').val(data.checkin);
							$('#echeckout').val(data.checkout);
							$('#eroom_no').val(data.room_no);
							$('#ecus_id').val(data.cus_id);
							$('#edate').val(data.reservation_date);

							$('#update-reservation').val("Update");
							$('#edit').modal('show');
						}
					});	
				});
			});

			//romove customer
			function myFunction(x) {
				if (confirm('Are you sure to remove this reservation')) {
					var number =x; 
					$("#myDiv1").load('config/system_user.php', {selectedButtonValue3 : number});
                }	
			}

			//for searching bar
			$(document).ready(function(){
				load_data();
				function load_data(reservation_query1){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{reservation_query1:reservation_query1},
						success:function(data){
				
							$('#result').html(data);
						}
					});
				}
				$('#reservation_no').keyup(function(){
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
				function load_data(reservation_query2){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{reservation_query2:reservation_query2},
						success:function(data){
				
							$('#result').html(data);
						}
					});
				}
				$('#checkin').keyup(function(){
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
				function load_data(reservation_query3){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{reservation_query3:reservation_query3},
						success:function(data){
				
							$('#result').html(data);
						}
					});
				}
				$('#checkout').keyup(function(){
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
				function load_data(reservation_query4){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{reservation_query4:reservation_query4},
						success:function(data){
				
							$('#result').html(data);
						}
					});
				}
				$('#room_no').keyup(function(){
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
				function load_data(reservation_query5){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{reservation_query5:reservation_query5},
						success:function(data){
				
							$('#result').html(data);
						}
					});
				}
				$('#date').keyup(function(){
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
