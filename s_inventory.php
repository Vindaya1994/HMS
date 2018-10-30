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
								<div class="row  w3-xxxlarge " style="padding-left:16px"><img src="assets/img/inventory/file.png" style="width:15%">&nbsp;&nbsp;</i>INVENTORY</div>
							</div>
							<div class="w3-container w3">
								
								<!--searching bar-->	
								
								<div class="row  w3-margin" >
										<button  class="w3-btn w3-block w3-green  col-md-3" type="button" onClick= "window.location.href = 's_inventory_add.php';" ><i class="fa fa-plus"></i>&nbsp;Add New Item</button>
									</div>
															
									<div class="row  w3-margin "style="margin-top:0px">
										<div class="w3-col s2 w3-centre ">
											<h5 class="" style="margin-top:0px"><em class="fa fa-search" style="font-size:30px"></em><b>Search By :</b></h5>
										</div>
										<div class="w3-col s3 "style="margin-left:22px">
											<input class="w3-input w3-border " name="item_id" type="text" placeholder="Item Id" id="item_id">
										</div>
										<div class="w3-col s3 "style="margin-left:22px">
											<input class="w3-input w3-border " name="item_name" type="text" placeholder="Item Name" id="item_name">
										</div>
										<div class="w3-col s3 "style="margin-left:22px">
											<input class="w3-input w3-border " name="item_price" type="text" placeholder="Unit Price" id="item_price">
										</div>
									</div>
									<div id="result"></div>
								
								<!--end search bar-->

															
								<div class="row  w3-margin" >
									<table class="table table-striped table-bordered" id="example">
										<thead>
											<tr class="w3-light-grey">
												<th>Item id</th>
												<th>Item name</th>
												<!--<th>Minimum stock</th>-->
												<th>Total stock</th>
												<th>Unit Price</th>
                                                <th>Current stock</th>
											</tr>
										</thead>

										<?php 
										$myrow =$obj ->view_inventory("inventory");
										foreach($myrow as $row){ ?>						
									<tbody>
											<tr>
												<td><?php echo $row["item_id"]; ?></td>
												<td><?php echo $row["item_name"]; ?></td>
												
												<td><?php echo $row["total_stock"]; ?></td>
												<td><?php echo $row["unitprice"]; ?></td>
												<td><?php echo $row["current_stock"]; ?></td>
												<td><a name="view" value="View" id="<?php echo $row["item_id"]; ?>" class=" view_data"><i class="fa fa-eye" style="font-size:20px;color:black;" ></i></a>&nbsp; 
													<a name="edit" value="Edit" id="<?php echo $row["item_id"]; ?>" class=" edit_data"><i class="fa fa-pencil" style="font-size:20px;color:blue;" ></i></a>&nbsp; 
													<a class="remove" onclick="myFunction(<?php echo $row["item_id"]; ?>)"   title="Remove This Customer" id="myDiv1" value="<?php  $row["item_id"] ?>" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:red;"></i></a>	
												</td>
											</tr>
										<?php } ?>
										</tbody>
									</table>
                                    <button class="btn w3-green" onClick= "window.location.href = 's_inventory_add_item.php';" name="add" type="submit" style="width:420px;height:50px;"><i class="fa fa-mail-reply" style="font-size:20px;color:black;" >Add</i> </button>
                                    <button class="btn w3-green" onClick= "window.location.href = 's_inventory_issue_item.php';" name="issue" type="submit" style="width:420px;height:50px;"><i class="fa fa-mail-forward" style="font-size:20px;color:black;" >Issue</i> </button>
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
												<h2><i class="fa fa-eye"></i> View Inventory Details</h2>
											</div>
										</h5>
									</div>	
									<div class="modal-body">
										
											<div id="modal-content">
												<div class="container " style="width:600px">
												
												<input type="hidden" name="eeitem" id="eeitem" />

												<p>
												<input  disabled class="w3-input" name="eeitemid" value=""  id="eeitemId">
  												<label>Item ID</label></p>
												</p>

												<p>
												<input  disabled class="w3-input" name="eeitemname" value=""  id="eeitemName">
												<label>Item Name</label></p>
												</p>

												<p>
												<input  disabled class="w3-input" name="eemaximumStock" value=""  id="eemaximumStock">
												<label>Minimum Stock</label></p>
												</p>

												<p>
												<input  disabled class="w3-input" name="eetotalStock" value=""  id="eetotalStock">
												<label>Total Stock</label></p>
												</p>		

												<p>
												<input  disabled class="w3-input" name="eeprice" value=""  id="eeprice">
												<label>Unit Price</label></p>
												</p>	
													
												<p>
												<input  disabled class="w3-input" name="eecurrentStock" value=""  id="eecurrentStock">
												<label>Current Stock</label></p>
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
												<h2><i class="fa fa-pencil"></i> Edit Item Details</h2>
											</div>
										</h5>
									</div>	
									<div class="modal-body">
										<!--item details update form-->
										<form id="customer-edit-form" method="post" action="./config/system_user.php" >
											
											<div id="modal-content">
												<div class="container " style="width:600px">
												
												<input type="hidden" name="item" id="item" />
											
												<p>
												<input  disabled class="w3-input" name="eitemid" value=""  id="eitemId">
  												<label>Item ID</label></p>
												</p>

												<p>
												<input   class="w3-input" name="eitemName" value=""  id="eitemName">
												<label>Item Name</label></p>
												</p>

												<p>
												<input  class="w3-input" name="emaximumStock" value=""  id="emaximumStock">
												<label>Minimum Stock</label></p>
												</p>

												<p>
												<input  class="w3-input" name="etotalStock" value=""  id="etotalStock">
												<label>Total Stock</label></p>
												</p>		

												<p>
												<input  class="w3-input" name="eprice" value=""  id="eprice">
												<label>Unit Price</label></p>
												</p>	
													
												<p>
												<input   class="w3-input" name="ecurrentStock" value=""  id="ecurrentStock">
												<label>Current Stock</label></p>
												</p>	
												</div> 
											</div>
										<!--end-->
									</div>	
											
									
									<div class="modal-footer">
										<input type="submit" class="w3-btn  w3-green w3-margin-bottom w3-padding" id="update-item" value="Update" name="update-item" > 
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
				window.location='index.php';
			}

			//coding for view function
			$(document).ready(function(){		
				$(document).on('click','.view_data', function(){
					
					var item_id = $(this).attr("id");
					
					$.ajax({
						url:"./config/system_user.php",
						method: "POST",
						data:{item_id:item_id},
						dataType:"json",
						success:function(data){
							
							$('#eeitemId').val(data.item_id);
							$('#eeitemName').val(data.item_name);
							$('#eemaximumStock').val(data.minimum_stock);
							$('#eetotalStock').val(data.total_stock);
							$('#eeprice').val(data.unitprice);
							$('#eecurrentStock').val(data.current_stock);
								
							$('#view').modal('show');
						}
					});	
				});
			});

			//coding for edit function
			$(document).ready(function(){		
				$(document).on('click','.edit_data', function(){
					
					var item_id = $(this).attr("id");
					
					$.ajax({
						url:"./config/system_user.php",
						method: "POST",
						data:{item_id:item_id},
						dataType:"json",
						success:function(data){
							
							$('#item').val(data.item_id);
							$('#eitemId').val(data.item_id);
							$('#eitemName').val(data.item_name);
							$('#emaximumStock').val(data.minimum_stock);
							$('#etotalStock').val(data.total_stock);
							$('#eprice').val(data.unitprice);
							$('#ecurrentStock').val(data.current_stock);

							$('#update-item').val("Update");
							$('#edit').modal('show');
						}
					});	
				});
			});

			//romove item
			function myFunction(x) {
				if (confirm('Are you sure to remove this item')) {
					var number =x; 
					$("#myDiv1").load('config/system_user.php', {selectedButtonValue6 : number});
                }	
			}

			//for searching bar
			$(document).ready(function(){
				load_data();
				function load_data(item_query1){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{item_query1:item_query1},
						success:function(data){
				
							$('#result').html(data);
						}
					});
				}
				$('#item_id').keyup(function(){
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
				function load_data(item_query2){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{item_query2:item_query2},
						success:function(data){
				
							$('#result').html(data);
						}
					});
				}
				$('#item_name').keyup(function(){
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
				function load_data(item_query3){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{item_query3:item_query3},
						success:function(data){
				
							$('#result').html(data);
						}
					});
				}
				$('#item_price').keyup(function(){
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
