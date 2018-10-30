<?php include_once './config/system_user.php';
   
	
//$query_1 = "SELECT * FROM meal"  ;
//$result = mysqli_query($conn, $query_1);
?>
<!DOCTYPE html>

<html lang="en">
    <head>
		<?php include_once 'headers/header.php'; ?>
		<!-- css to the relevant page  -->
       	<style>	</style>
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
		<div class="site-main container" style="margin-bottom:40px">
			<div class="section-page-heading row  ">
				<div class="breadcrumb-leftnav-wrapper ">
					<div class="col-md-12 col-lg-10 col-lg-offset-1 ">
						<ul class="breadcrumb">
							<li><a href="index.php" title="The Tenth Hotel" class="bolds">Home</a><span class="sep"></span></li>
							<li class="active"><span class="last">Meals</span></li>
							
						</ul>
						<div class="breadcrumb-contacts">
							<a class="tellink" href="tel:+94 572 226 220">Tel :+94 572 226 220</a> 
							<a href="contact_us.php">Contact Us</a>
						</div>
					</div>
					<div class="col-md-12 col-lg-10 col-lg-offset-1">
					<hr>
					<h1>THE TENTH HOTEL
					<span>ELLA , SRI LANKA</span>
					</h1>
				</div>		
				</div> 
			</div>	
			<div class="section-page-content row">
					
				<div class="col-lg-10 col-lg-offset-1 w3-white">
			<!--****************************************************************my content here*****************************************************************************-->
						<div class="w3-card-4 w3-col s12 w3-margin">
							<div class="w3-container w3-padding ">
								<div class="row  w3-xxxlarge " style="padding-left:16px"><img src="assets/img/dinning/admin/meal2.png" style="width:30%">&nbsp;&nbsp;</i> Orders </div>
							</div>
							<div class="w3-container w3">
									<!--searching bar-->

									<div class="row  w3-margin" >
										<button  class="w3-btn w3-block w3-green  col-md-3" type="button" onClick= "window.location.href = 's_d_order_add.php';" ><i class="fa fa-plus"></i>&nbsp;Add New Order</button>
									</div>	
														
									<div class="row  w3-margin "style="margin-top:0px">
										<div class="w3-col s2 w3-centre ">
											<h5 class="" style="margin-top:0px"><em class="fa fa-search" style="font-size:30px"></em><b>Search By :</b></h5>
										</div>
										<div class="w3-col s2 "style="margin-left:22px">
											<input class="w3-input w3-border " name="order_id" type="text" placeholder="Order ID" id="order_id">
										</div>
										<div class="w3-col s2 "style="margin-left:22px">
											<input class="w3-input w3-border " name="meal_id" type="text" placeholder="Meal ID" id="meal_id">
										</div>
										<div class="w3-col s2 "style="margin-left:22px">
											<input class="w3-input w3-border " name="cus_id" type="text" placeholder="Customer ID" id="cus_id">
										</div>
										<div class="w3-col s2 "style="margin-left:22px">
											<input class="w3-input w3-border " name="room_no" type="text" placeholder="Room No" id="room_no">
										</div>
									</div>
									<div id="result"></div>
								
								<!--end search bar-->	

															
								<div class="row  w3-margin" >
									<table class="table table-striped table-bordered" id="example">
										<thead>
											<tr>
												<th>Order ID</th>
												<th>Meal ID</th>
												<th>Quantity</th>
												<th>Customer ID</th>
												<th>Room No</th>
												<th>Deliver Date</th>
												<th>Deliver Time </th>
												<th>Ordered Date</th>
											</tr>
										</thead>

										<?php //while ($row = mysqli_fetch_array($result)) {?> 	
										<?php										
										$myrow =$obj ->viewOrders("order_meal");
										foreach($myrow as $row){ ?>						
										<tbody>
											<tr>
												<td><span id="order_id"><?php echo $row["order_id"];?></span></td>
												<td><span id="establishment"> <?php
													$x =$row["meal_id"];
													$myrow2 =$obj ->order_meal_name("establishment_type",$x);
													foreach($myrow2 as $row2){	
													echo $row2["meal_name"];
													}
												?></span></td>
												<td><span id="quantity"> <?php echo $row['quantity']; ?></span></td>
												<td><span id="room"><?php echo $row["cus_id"];?></span></td>
												<td><span id="room"><?php echo $row["room_no"];?></span></td>
												<td><span id="d_date"> <?php echo $row['order_deli_date']; ?></span></td>
												<td><span id="d_time"> <?php echo $row['order_deli_time']; ?></span></td>
												<td><span id="o_date"> <?php echo $row['ordered_date']; ?></span></td>	
												
														
												<td><a name="view" value="View" id="<?php echo $row["order_id"]; ?>" class=" view_data"><i class="fa fa-eye" style="font-size:20px;color:black;" ></i></a>&nbsp; 
													
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
												<h2><i class="fa fa-eye"></i> View Meal Details</h2>
											</div>
										</h5>
									</div>	
									<div class="modal-body">
										
											<div id="modal-content">
												<div class="container " style="width:600px">
												
												<input type="hidden" name="order_id" id="order_id" />

												<p>
												<input  disabled class="w3-input" name="eeorder_id" value=""  id="eeorder_id">
  												<label>Order ID</label></p>
												</p>

												<p>
												<select disabled class="w3-select w3-border " name="eemeal_id"  id="eemeal_id">
                                                    
                                                                                    
														<?php
														$myrow =$obj ->viewDetails("meal");
														foreach($myrow as $row){
															echo "<option disabled value='". $row['meal_id'] ."'>" . $row['meal_name'] . "</option>";
														}
														?>
                                                 </select>
												<label>Meal Name</label></p>
												</p>	
													

												<p>
												<input  disabled class="w3-input" name="eequantity" value=""  id="eequantity">
												<label>Quantity</label></p>
												</p>

												<!--<p>
												<input  disabled class="w3-input" name="eeimage" value=""  id="eeimage">
												<label>Meal Image</label></p>
												</p>-->		
												<p>
												<input  disabled class="w3-input" name="eecus" value=""  id="eecus">
												<label>Customer ID</label></p>
												</p>
												
												<p>
												<input  disabled class="w3-input" name="eeroom" value=""  id="eeroom">
												<label>Room No</label></p>
												</p>

												<p>
												<input   class="w3-input" name="eed_date" value=""  id="eed_date">
												<label>Deliver Date</label></p>
												</p>

												<p>
												<input   class="w3-input" name="eed_time" value=""  id="eed_time">
												<label>Deliver Time</label></p>
												</p>

												<p>
												<input   class="w3-input" name="eeo_date" value=""  id="eeo_date">
												<label>Ordered Date</label></p>
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
						
						<!--**********************************end my content***********************************************************************************************-->


						
					</div>
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
				window.location='index.php';
			}

			
			//coding for view function
			$(document).ready(function(){		
				$(document).on('click','.view_data', function(){
					
					var order_id = $(this).attr("id");
					
					$.ajax({
						url:"./config/system_user.php",
						method: "POST",
						data:{order_id:order_id},
						dataType:"json",
						success:function(data){
							$('#eeorder_id').val(data.order_id);
							$('#eemeal_id').val(data.meal_id);
							$('#eequantity').val(data.quantity);
							$('#eecus').val(data.cus_id);
							$('#eeroom').val(data.room_no);
							
							$('#eed_date').val(data.order_deli_date);
							$('#eed_time').val(data.order_deli_time);
							$('#eeo_date').val(data.ordered_date);

							
							$('#view').modal('show');
						}
					});	
				});
			});

			


			//for searching bar
			$(document).ready(function(){
				load_data();
				function load_data(order_query1){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{order_query1:order_query1},
						success:function(data){
				
							$('#result').html(data);
						}
					});
				}
				$('#order_id').keyup(function(){
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
				function load_data(order_query2){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{order_query2:order_query2},
						success:function(data){
				
							$('#result').html(data);
						}
					});
				}
				$('#meal_id').keyup(function(){
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
				function load_data(order_query3){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{order_query3:order_query3},
						success:function(data){
				
							$('#result').html(data);
						}
					});
				}
				$('#cus_id').keyup(function(){
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
				function load_data(meal_query4){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{meal_query4:meal_query4},
						success:function(data){
				
							$('#result').html(data);
						}
					});
				}
				$('#price').keyup(function(){
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
				function load_data(order_query4){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{order_query4:order_query4},
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


		</script>
	</body>
</html>
