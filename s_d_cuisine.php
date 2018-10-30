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
								<div class="row  w3-xxxlarge " style="padding-left:16px"><img src="assets/img/dinning/admin/meal2.png" style="width:30%">&nbsp;&nbsp;</i> CUISINE TYPES </div>
							</div>
							<div class="w3-container w3">
									<!--searching bar-->	
								
									<div class="row  w3-margin" >
										<button  class="w3-btn w3-block w3-green  col-md-4" type="button" onClick= "window.location.href = 's_d_cuisine_add.php';" ><i class="fa fa-plus"></i>&nbsp;Add New Cuisine Type</button>
									</div>
															
									<div class="row  w3-margin "style="margin-top:0px">
										<div class="w3-col s2 w3-centre ">
											<h5 class="" style="margin-top:0px"><em class="fa fa-search" style="font-size:30px"></em><b>Search By :</b></h5>
										</div>
										<div class="w3-col s3 "style="margin-left:22px">
											<input class="w3-input w3-border " name="c_id" type="text" placeholder="Cuisine Id" id="c_id">
										</div>
										<div class="w3-col s3 "style="margin-left:22px">
											<input class="w3-input w3-border " name="c_name" type="text" placeholder="Cuisine Name" id="c_name">
										</div>
									</div>
									<div id="result"></div>
								
								<!--end search bar-->	

															
								<div class="row  w3-margin" >
									<table class="table table-striped table-bordered" id="example">
										<thead>
											<tr>
												<th>Cuisine ID</th>
												<th>Cuisine Name</th>
		
											</tr>
										</thead>

										<?php //while ($row = mysqli_fetch_array($result)) {?> 	
										<?php										
										$myrow =$obj ->view_cuisine("cuisine");
										foreach($myrow as $row){ ?>						
										<tbody>
											<tr>
												<td><span id="meal_id"><?php echo $row["cuisine_id"];?></span></td>
												<td><span id="meal_name"> <?php echo $row['c_name']; ?></span></td>
														
												<td><a name="view" value="View" id="<?php echo $row["cuisine_id"]; ?>" class=" view_data"><i class="fa fa-eye" style="font-size:20px;color:black;" ></i></a>&nbsp; 
													<a name="edit" value="Edit" id="<?php echo $row["cuisine_id"]; ?>" class=" edit_data"><i class="fa fa-pencil" style="font-size:20px;color:blue;" ></i></a>&nbsp; 
													<a class="remove" onclick="myFunction(<?php echo $row["cuisine_id"]; ?>)"   title="Remove This Customer" id="myDiv1" value="<?php  $row["cuisine_id"] ?>" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:red;"></i></a>	
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
												<h2><i class="fa fa-eye"></i> View Cuisine Details</h2>
											</div>
										</h5>
									</div>	
									<div class="modal-body">
										
											<div id="modal-content">
												<div class="container " style="width:600px">
												
												<input type="hidden" name="eemeall_id" id="eemeall_id" />

												<p>
												<input  disabled class="w3-input" name="eec_id" value=""  id="eec_id">
  												<label>Cuisine ID</label></p>
												</p>

												<p>
												<input  disabled class="w3-input" name="eec_name" value=""  id="eec_name">
												<label>Cuisine Name</label></p>
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
												<h2><i class="fa fa-pencil"></i> Edit Cuisine Type</h2>
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
												<input  disabled class="w3-input" name="ec_id" value=""  id="ec_id">
  												<label>Cuisine ID</label></p>
												</p>

												<p>
												<input   class="w3-input" name="ec_name" value=""  id="ec_name">
												<label>Cuisine Name</label></p>
												</p>
												
												</div> 
											</div>
										<!--end-->
									</div>	
											
									
									<div class="modal-footer">
										<input type="submit" class="w3-btn  w3-green w3-margin-bottom w3-padding" id="update-cuisine" value="Update" name="update-cuisine" > 
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
					
					var c_id = $(this).attr("id");
					
					$.ajax({
						url:"./config/system_user.php",
						method: "POST",
						data:{c_id:c_id},
						dataType:"json",
						success:function(data){
							
							$('#eec_id').val(data.cuisine_id);
							$('#eec_name').val(data.c_name);
							
							$('#view').modal('show');
						}
					});	
				});
			});

			//coding for edit function
			$(document).ready(function(){		
				$(document).on('click','.edit_data', function(){
					
					var c_id = $(this).attr("id");
					
					$.ajax({
						url:"./config/system_user.php",
						method: "POST",
						data:{c_id:c_id},
						dataType:"json",
						success:function(data){
							$('#id').val(data.cuisine_id);
							$('#ec_id').val(data.cuisine_id);
							$('#ec_name').val(data.c_name);
						
							

							$('#update-cuisine').val("Update");
							$('#edit').modal('show');
						}
					});	
				});
			});

			//romove type
			function myFunction(x) {
				if (confirm('Are you sure to remove this cuisine type')) {
					var number =x; 
					$("#myDiv1").load('config/system_user.php', {selectedButtonValue79 : number});
                }	
			}

			//for searching bar
			$(document).ready(function(){
				load_data();
				function load_data(cuisine_query1){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{cuisine_query1:cuisine_query1},
						success:function(data){
				
							$('#result').html(data);
						}
					});
				}
				$('#c_id').keyup(function(){
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
				function load_data(cuisine_query2){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{cuisine_query2:cuisine_query2},
						success:function(data){
				
							$('#result').html(data);
						}
					});
				}
				$('#c_name').keyup(function(){
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
