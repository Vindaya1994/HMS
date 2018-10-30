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
								<div class="row  w3-xxxlarge " style="padding-left:16px"><img src="assets/img/dinning/admin/meal2.png" style="width:30%">&nbsp;&nbsp;</i> Meals </div>
							</div>
							<div class="w3-container w3">
									<!--searching bar-->	
								
									<div class="row  w3-margin" >
										<button  class="w3-btn w3-block w3-green  col-md-3" type="button" onClick= "window.location.href = 's_d_meal_add.php';" ><i class="fa fa-plus"></i>&nbsp;Add New Meal</button>
									</div>
															
									<div class="row  w3-margin "style="margin-top:0px">
										<div class="w3-col s2 w3-centre ">
											<h5 class="" style="margin-top:0px"><em class="fa fa-search" style="font-size:30px"></em><b>Search By :</b></h5>
										</div>
										<div class="w3-col s1 "style="margin-left:22px">
											<input class="w3-input w3-border " name="meal_id" type="text" placeholder="Meal Id" id="meal_id">
										</div>
										<div class="w3-col s2 "style="margin-left:22px">
											<input class="w3-input w3-border " name="meal_name" type="text" placeholder="Name" id="meal_name">
										</div>
										<div class="w3-col s2 "style="margin-left:22px">
											<input class="w3-input w3-border " name="establishment" type="text" placeholder="Establishment ID" id="establishment">
										</div>
										<div class="w3-col s1 "style="margin-left:22px">
											<input class="w3-input w3-border " name="price" type="text" placeholder="Price" id="price">
										</div>
										<div class="w3-col s2 "style="margin-left:22px">
											<input class="w3-input w3-border " name="cuisine" type="text" placeholder="Cuisine ID" id="cuisine">
										</div>
									</div>
									<div id="result"></div>
								
								<!--end search bar-->	

															
								<div class="row  w3-margin" >
									<table class="table table-striped table-bordered" id="example">
										<thead>
											<tr>
												<th>Meal ID</th>
												<th>Meal Name</th>
												<th>Meal Description</th>
												<th>Meal image</th>
												<th>Establishment type</th>
												<th>Price</th>
												<th>Cuisine </th>
												<th>Action</th>
											</tr>
										</thead>

										<?php //while ($row = mysqli_fetch_array($result)) {?> 	
										<?php										
										$myrow =$obj ->viewDetails("meal");
										foreach($myrow as $row){ ?>						
										<tbody>
											<tr>
												<td><span id="meal_id"><?php echo $row["meal_id"];?></span></td>
												<td><span id="meal_name"> <?php echo $row['meal_name']; ?></span></td>
												<td><span id="meal_desc"> <?php echo $row['meal_desc']; ?></span></td>
												<td><span id="meal_image"> <?php echo '<img src="'.$row['meal_image'].'" height="150" width="225" class="" />'; ?></span></td>	
												<td><span id="establishment"> <?php
													$x =$row["e_id"];
													$myrow2 =$obj ->view_establishment_type_name("establishment_type",$x);
													foreach($myrow2 as $row2){	
													echo $row2["e_type"];
													}
												?></span></td>
												<td><span id="email"> <?php echo $row['price_per_meal']; ?></span></td>
												<td><span id="cuisine"> <?php
													$x =$row["cuisine_id"];
													$myrow3 =$obj ->view_cuisine_name("establishment_type",$x);
													foreach($myrow3 as $row3){	
													echo $row3["c_name"];
													}
												?></span></td>
														
												<td><a name="view" value="View" id="<?php echo $row["meal_id"]; ?>" class=" view_data"><i class="fa fa-eye" style="font-size:20px;color:black;" ></i></a>&nbsp; 
													<a name="edit" value="Edit" id="<?php echo $row["meal_id"]; ?>" class=" edit_data"><i class="fa fa-pencil" style="font-size:20px;color:blue;" ></i></a>&nbsp; 
													<a class="remove" onclick="myFunction(<?php echo $row["meal_id"]; ?>)"   title="Remove This Customer" id="myDiv1" value="<?php  $row["meal_id"] ?>" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:red;"></i></a>	
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
												<h2><i class="fa fa-eye"></i> View Meal Details</h2>
											</div>
										</h5>
									</div>	
									<div class="modal-body">
										
											<div id="modal-content">
												<div class="container " style="width:600px">
												
												<input type="hidden" name="eemeall_id" id="eemeall_id" />

												<p>
												<input  disabled class="w3-input" name="eemeal_id" value=""  id="eemeal_id">
  												<label>Meal ID</label></p>
												</p>

												<p>
												<input  disabled class="w3-input" name="eemeal_name" value=""  id="eemeal_name">
												<label>Meal Name</label></p>
												</p>

												<p>
												<input  disabled class="w3-input" name="eedescription" value=""  id="eedescription">
												<label>Meal Description</label></p>
												</p>

												<!--<p>
												<input  disabled class="w3-input" name="eeimage" value=""  id="eeimage">
												<label>Meal Image</label></p>
												</p>-->		

												<p>
												<select disabled class="w3-select w3-border " name="eeeid"  id="eeeid">
                                                    
                                                                                    
														<?php
														$myrow =$obj ->view_establishment_type("establishment_type");
														foreach($myrow as $row){
															echo "<option disabled value='". $row['e_id'] ."'>" . $row['e_type'] . "</option>";
														}
														?>
                                                 </select>
												<label>Establishment Type</label></p>
												</p>	
													
												<p>
												<input  disabled class="w3-input" name="eeprice" value=""  id="eeprice">
												<label>Price Per Meal</label></p>
												</p>

												<p>
												
												<select disabled class="w3-select w3-border " name="eecuisine"  id="eecuisine">
                                                    
                                                                                    
														<?php
														$myrow =$obj ->view_cuisine("cuisine");
														foreach($myrow as $row){
															echo "<option disabled value='". $row['cuisine_id'] ."'>" . $row['c_name'] . "</option>";
														}
														?>
                                                 </select>
												<label>Cusisine</label></p>
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
												<h2><i class="fa fa-pencil"></i> Edit Meal Details</h2>
											</div>
										</h5>
									</div>	
									<div class="modal-body">
										<!--customer details update form-->
										<form id="meal-edit-form" method="post" action="./config/system_user.php" >
											
											<div id="modal-content">
												<div class="container " style="width:600px">
												
												<input type="hidden" name="id" id="id" />

												<p>
												<input   disabled  class="w3-input" name="emeal_id" value=""  id="emeal_id">
  												<label>Meal ID</label></p>
												</p>

												<p>
												<input  required  class="w3-input" name="emeal_name" value=""  id="emeal_name">
												<label>Meal Name</label></p>
												</p>

												<p>
												<input  required  class="w3-input" name="edescription" value=""  id="edescription">
												<label>Meal Description</label></p>
												</p>

												<!--<p>
												<input   required  class="w3-input" name="eimage" value=""  id="eimage">
												<label>Meal Image</label></p>
												</p>	-->	

												<p>
												<!--<input   required  class="w3-input" name="eeid" value=""  id="eeid">-->
												<select class="w3-select w3-border " name="eeid"  id="eeid">
                                                    <option value="" disabled selected>Choose establishment type </option>
                                                                                    
														<?php
														$myrow =$obj ->view_establishment_type("establishment_type");
														foreach($myrow as $row){
															echo "<option value='". $row['e_id'] ."'>" . $row['e_type'] . "</option>";
														}
														?>
                                                 </select>

												<label>Establishment Type</label></p>
												</p>	
													
												<p>
												<input   required  class="w3-input" name="eprice" value=""  id="eprice">
												<label>Price Per Meal</label></p>
												</p>

												<p>
												<select class="w3-select w3-border " name="ecuisine"  id="ecuisine">
                                                    
                                                                                    
														<?php
														$myrow =$obj ->view_cuisine("cuisine");
														foreach($myrow as $row){
															echo "<option  value='". $row['cuisine_id'] ."'>" . $row['c_name'] . "</option>";
														}
														?>
                                                 </select>
												<label>Cusisine</label></p>
												</p>	
												</div> 
											</div>
										<!--end-->
									</div>	
											
									
									<div class="modal-footer">
										<input type="submit" class="w3-btn  w3-green w3-margin-bottom w3-padding" id="update-meal" value="Update" name="update-meal" > 
										</form>
										<button type="button" name="" class="w3-btn  w3-red w3-margin-bottom w3-padding" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
						<!--end model-->
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
					
					var meal_id = $(this).attr("id");
					
					$.ajax({
						url:"./config/system_user.php",
						method: "POST",
						data:{meal_id:meal_id},
						dataType:"json",
						success:function(data){
							
							$('#eemeal_id').val(data.meal_id);
							$('#eemeal_name').val(data.meal_name);
							$('#eedescription').val(data.meal_desc);
							$('#eeimage').val(data.meal_image);
							$('#eeeid').val(data.e_id);
							$('#eeprice').val(data.price_per_meal);
							$('#eecuisine').val(data.cuisine_id);

							
							$('#view').modal('show');
						}
					});	
				});
			});

			//coding for edit function
			$(document).ready(function(){		
				$(document).on('click','.edit_data', function(){
					
					var meal_id = $(this).attr("id");
					
					$.ajax({
						url:"./config/system_user.php",
						method: "POST",
						data:{meal_id:meal_id},
						dataType:"json",
						success:function(data){
							$('#id').val(data.meal_id);
							$('#emeal_id').val(data.meal_id);
							$('#emeal_name').val(data.meal_name);
							$('#edescription').val(data.meal_desc);
							//$('#eimage').val(data.meal_image);
							$('#eeid').val(data.e_id);
							$('#eprice').val(data.price_per_meal);
							$('#ecuisine').val(data.cuisine_id);

							$('#update-meal').val("Update");
							$('#edit').modal('show');
						}
					});	
				});
			});

			//romove customer
			function myFunction(x) {
				if (confirm('Are you sure to remove this meal')) {
					var number =x; 
					$("#myDiv1").load('config/system_user.php', {selectedButtonValue9 : number});
                }	
			}

			//for searching bar
			$(document).ready(function(){
				load_data();
				function load_data(meal_query1){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{meal_query1:meal_query1},
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
				function load_data(meal_query2){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{meal_query2:meal_query2},
						success:function(data){
				
							$('#result').html(data);
						}
					});
				}
				$('#meal_name').keyup(function(){
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
				function load_data(meal_query3){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{meal_query3:meal_query3},
						success:function(data){
				
							$('#result').html(data);
						}
					});
				}
				$('#establishment').keyup(function(){
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
				function load_data(meal_query5){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{meal_query5:meal_query5},
						success:function(data){
				
							$('#result').html(data);
						}
					});
				}
				$('#cuisine').keyup(function(){
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
