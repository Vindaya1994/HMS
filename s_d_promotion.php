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
							<li class="active"><span class="last">Promotion</span></li>
							
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
								<div class="row  w3-xxxlarge " style="padding-left:16px"><img class="w3-circle" src="assets/img/promotions/promo.png" style="width:21%">&nbsp;&nbsp;</i> Promotions </div>
							</div>
							<div class="w3-container w3">
									<!--searching bar-->	
								
									<div class="row  w3-margin" >
										<button  class="w3-btn w3-block w3-green  col-md-3" type="button" onClick= "window.location.href = 's_d_promotion_add.php';" ><i class="fa fa-plus"></i>&nbsp;Add New Promotion</button>
									</div>
															
									<div class="row  w3-margin "style="margin-top:0px">
										<div class="w3-col s2 w3-centre ">
											<h5 class="" style="margin-top:0px"><em class="fa fa-search" style="font-size:30px"></em><b>Search By :</b></h5>
										</div>
										<div class="w3-col s2 "style="margin-left:22px">
											<input class="w3-input w3-border " name="promotion_nos" type="text" placeholder="Promotion No" id="promotion_no">
										</div>
										<div class="w3-col s2 "style="margin-left:22px">
											<input class="w3-input w3-border " name="prm_captions" type="text" placeholder="Promotion caption" id="prm_caption">
										</div>
										<div class="w3-col s2 "style="margin-left:22px">
											<input class="w3-input w3-border " name="promotion_cat_ids" type="text" placeholder="Category " id="promotion_cat_id">
										</div>
										<div class="w3-col s2 "style="margin-left:22px">
											<input class="w3-input w3-border " name="promotion_names" type="text" placeholder="Promotion name" id="promotion_name">
										</div>
										
									</div>
									<div id="result"></div>
								
								<!--end search bar-->	
								<div class="row  w3-margin" >
									<table class="table table-striped table-bordered" id="example">
										<thead>
											<tr>
												<th>Promotion No</th>
												<th>Promotion caption</th>
												<th>Description</th>
												<th>Category</th>
												<th>Name</th>
												<th>Image</th>
												<th>Package Details</th>
                                                <th>Action</th>
											</tr>
										</thead>

										<?php //while ($row = mysqli_fetch_array($result)) {?> 	
										<?php										
										$myrow =$obj ->viewDetails("Promotion");
										foreach($myrow as $row){ ?>						
										<tbody>
											<tr>
												<td><span id="promotion_no"><?php echo $row["promotion_no"];?></span></td>
												<td><span id="prm_caption"> <?php echo $row['prm_caption']; ?></span></td>
												<td><span id="prm_desc"> <?php echo $row['prm_desc']; ?></span></td>
												<td><span id="promotion_cat_id"> <?php
													$x =$row["promotion_cat_id"];
													$myrow2 =$obj ->view_promotion_cat($x);
													foreach($myrow2 as $row2){	
													echo $row2["cat_name"];
													}
												?></span></td>
												<td><span id="promotion_name"> <?php echo $row['promotion_name']; ?></span></td>
                                                <td><span id="promotion_img"> <?php echo '<img src="'.$row['promotion_img'].'" height="150" width="225" class="" />'; ?></span></td>	
												<td><span id="package_details"> <?php echo $row['package_details']; ?></span></td>
														
												<td><a name="view" value="View" id="<?php echo $row["promotion_no"]; ?>" class=" view_data"><i class="fa fa-eye" style="font-size:20px;color:black;" ></i></a>&nbsp; 
													<a name="edit" value="Edit" id="<?php echo $row["promotion_no"]; ?>" class=" edit_data"><i class="fa fa-pencil" style="font-size:20px;color:blue;" ></i></a>
													<a class="remove" onclick="myFunction(<?php echo $row["promotion_no"]; ?>)"   title="Remove This Customer" id="myDiv1" value="<?php  $row["promotion_no"] ?>" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:red;"></i></a>&nbsp; 	
												
												<!--message sending code-->
												<a href="s_message.php?promotion_no=<?php echo $row['promotion_no']; ?>"title="Send Message" ><i class="fa fa-envelope-o" aria-hidden="true" style="font-size:20px;"></i></a>
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
												<h2><i class="fa fa-eye"></i> View Promotion Details</h2>
											</div>
										</h5>
									</div>	
									<div class="modal-body">
										
											<div id="modal-content">
												<div class="container " style="width:600px">
												
												<input type="hidden" name="eeprm_no1" id="eeprm_no1" />

												<p>
												<input  disabled class="w3-input" name="eeprm_no" value=""  id="eeprm_no">
  												<label>Promotion No</label></p>
												</p>

												<p>
												<input  disabled class="w3-input" name="eeprm_cap" value=""  id="eeprm_cap">
												<label>Caption</label></p>
												</p>

												<p>
												<textarea disabled class="w3-select w3-border" name="eedescription" type="text" placeholder=" Meal Description"  id="eedescription" rows="6" cols="40"  > </textarea></div>
												<label>Promotion Description</label></p>
												</p>

												<p>
												<input  disabled class="w3-input" name="eepromo_cat" value=""  id="eepromo_cat">
												<label>Promotion Category</label></p>
												</p>	
													
												<p>
												<input  disabled class="w3-input" name="eeprmname" value=""  id="eeprmname">
												<label>Promotion Name</label></p>
												</p>

                                                <p>         
												<textarea disabled class="w3-select w3-border" name="eepckgdtl" type="text" placeholder=" Meal Description"  id="eepckgdtl" rows="6" cols="40"  > </textarea></div>
												<label>Package Details</label></p>
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
												<h2><i class="fa fa-pencil"></i> Edit Promotion Details</h2>
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
												<input disabled  required class="w3-input" name="eprm_no" value=""  id="eprm_no">
  												<label>Promotion No</label></p>
												</p>

												<p>
												<input  required  class="w3-input" name="eprm_cap" value=""  id="eprm_cap">
												<label>Caption</label></p>
												</p>

												<p>
												<textarea class="w3-select w3-border" name="edescription" type="text" placeholder=" Meal Description"  id="edescription" rows="6" cols="40"  > </textarea></div>
												<label>Promotion Description</label></p>
												</p>

												
												<p>
												<input  required class="w3-input" name="epromo_cat" value=""  id="epromo_cat">
												<label>Promotion Categoy </label></p>
												</p>	
													
												<p>
												<input   required  class="w3-input" name="eprmname" value=""  id="eprmname">
												<label>Promotion Name</label></p>
												</p>

												<p>
												<textarea class="w3-select w3-border" name="epckgdtl" type="text" placeholder="Package details "  id="epckgdtl" rows="6" cols="40"  > </textarea></div>
												<label>Package details</label></p>
												</p>	
												</div>
												<div class="modal-footer">
										<input type="submit" class="w3-btn  w3-green w3-margin-bottom w3-padding" id="update-promotion" value="Update" name="update-promotion" > 
										
										<button type="button" name="" class="w3-btn  w3-red w3-margin-bottom w3-padding" data-dismiss="modal">Close</button>
									</div> 
											</div>
										<!--end-->
									</div>	
									
									
									</form>
								</div>
							</div>
						</div>
						<!--end model-->
						<!--**********************************end my content***********************************************************************************************-->


						
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
					
					var promotion_no = $(this).attr("id");
					
					$.ajax({
						url:"./config/system_user.php",
						method: "POST",
						data:{promotion_no:promotion_no},
						dataType:"json",
						success:function(data){
							
							$('#eeprm_no').val(data.promotion_no);
							$('#eeprm_cap').val(data.prm_caption);
							$('#eedescription').val(data.prm_desc);
							$('#eepromo_cat').val(data.promotion_cat_id);
							$('#eeprmname').val(data.promotion_name);
							$('#eepckgdtl').val(data.package_details);
							
							$('#view').modal('show');
						}
					});	
				});
			});

			//coding for edit function
			$(document).ready(function(){		
				$(document).on('click','.edit_data', function(){
					
					var promotion_no = $(this).attr("id");
					
					$.ajax({
						url:"./config/system_user.php",
						method: "POST",
						data:{promotion_no:promotion_no},
						dataType:"json",
						success:function(data){

                            $('#id').val(data.promotion_no);
                            $('#eprm_no').val(data.promotion_no);
							$('#eprm_cap').val(data.prm_caption);
							$('#edescription').val(data.prm_desc);
							$('#epromo_cat').val(data.promotion_cat_id);
							$('#eprmname').val(data.promotion_name);
							$('#epckgdtl').val(data.package_details);
							
							$('#update-promotion').val("Update");
							$('#edit').modal('show');
						}
					});	
				});
			});

			//romove customer
			function myFunction(x) {
				if (confirm('Are you sure to remove this promotion')) {
					var number =x; 
					$("#myDiv1").load('config/system_user.php', {selectedButtonValue55 : number});
                }	
			}

			//for searching bar
			$(document).ready(function(){
				load_data();
				function load_data(prm_query1){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{prm_query1:prm_query1},
						success:function(data){
				
							$('#result').html(data);
						}
					});
				}
				$('#promotion_no1').keyup(function(){
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
				function load_data(prm_query2){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{prm_query2:prm_query2},
						success:function(data){
				
							$('#result').html(data);
						}
					});
				}
				$('#prm_captions').keyup(function(){
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
				function load_data(prm_query3){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{prm_query3:prm_query3},
						success:function(data){
				
							$('#result').html(data);
						}
					});
				}
				$('#promotion_cat_ids').keyup(function(){
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
				function load_data(prm_query4){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{prm_query4:prm_query4},
						success:function(data){
				
							$('#result').html(data);
						}
					});
				}
				$('#promotion_names').keyup(function(){
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
