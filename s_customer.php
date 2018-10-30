
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
						<!--**********************************************************************my coding here****************************************************************************************-->
						<div class="w3-card-4 w3-col s12 w3-margin">
							<div class="w3-container w3-padding ">
								<div class="row  w3-xxxlarge " style="padding-left:16px"><img src="assets/img/customer/customericon.png" style="width:15%">&nbsp;&nbsp;</i> CUSTOMERS </div>
							</div>
							<div class="w3-container w3">

								<!--searching bar-->	
								
									<div class="row  w3-margin" >
										<button  class="w3-btn w3-block w3-green  col-md-3" type="button" onClick= "window.location.href = 's_customer_add.php';" ><i class="fa fa-plus"></i>&nbsp;Add New Customer</button>
									</div>
															
									<div class="row  w3-margin "style="margin-top:0px">
										<div class="w3-col s2 w3-centre ">
											<h5 class="" style="margin-top:0px"><em class="fa fa-search" style="font-size:30px"></em><b>Search By :</b></h5>
										</div>
										<div class="w3-col s2 "style="margin-left:22px">
											<input class="w3-input w3-border " name="cus_id" type="text" placeholder="customer id" id="cus_id">
										</div>
										<div class="w3-col s2 "style="margin-left:22px">
											<input class="w3-input w3-border " name="cus_name" type="text" placeholder="customer name" id="cus_name">
										</div>
										<div class="w3-col s2 "style="margin-left:22px">
											<input class="w3-input w3-border " name="cus_email" type="text" placeholder="Customer email" id="cus_email">
										</div>
										<div class="w3-col s2 "style="margin-left:22px">
											<input class="w3-input w3-border " name="cus_country" type="text" placeholder="Customer country" id="cus_country">
										</div>
									</div>
									<div id="result"></div>
								
								<!--end search bar-->

								
																								
								<div class="row  w3-margin" >
									<table class="table table-striped table-bordered" id="example">
										<thead>
											<tr class="w3-light-grey">
												<th>ID</th>
												<th>First name</th>
												<th>Last name</th>
												<th>DOB</th>
												<th>Country</th>
												<th>Email</th>
												<th>Mobile</th>
												<th>Action</th>
											</tr>
										</thead>

										<?php 
										
										$myrow =$obj ->view_customers("customer");
										foreach($myrow as $row){ ?>
																
										<tbody>
											<tr>
												
												<td><span id="id"><?php echo $row['cus_id']; ?></span></td>
												<td><span id="firstname"> <?php echo $row['cus_fname']; ?></span></td>
												<td><span id="lastname"> <?php echo $row['cus_lname']; ?></span></td>
												<td><span id="dob"> <?php echo $row['dob']; ?></span></td>	
												<td><span id="country"> <?php echo $row['country']; ?></span></td>
												<td><span id="email"> <?php echo $row['cus_email']; ?></span></td>
												<td><span id="mobile"> <?php echo $row['mobile']; ?></span></td>

												<td><a name="view" value="View" id="<?php echo $row["cus_id"]; ?>" class=" view_data"><i class="fa fa-eye" style="font-size:20px;color:black;" ></i></a>&nbsp; 
													<a name="edit" value="Edit" id="<?php echo $row["cus_id"]; ?>" class=" edit_data"><i class="fa fa-pencil" style="font-size:20px;color:blue;" ></i></a>&nbsp; 
													<a class="remove" onclick="myFunction(<?php echo $row["cus_id"]; ?>)"   title="Remove This Customer" id="myDiv1" value="<?php  $row["cus_id"] ?>" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:red;"></i></a>	
													<a href="s_customermessage.php?cus_id=<?php echo $row['cus_id']; ?>"title="Send Message" ><i class="fa fa-envelope-o" aria-hidden="true" style="font-size:20px;"></i></a>
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
												<h2><i class="fa fa-eye"></i> View Customer Details</h2>
											</div>
										</h5>
									</div>	
									<div class="modal-body">
										
											<div id="modal-content">
												<div class="container " style="width:600px">
												
												<input type="hidden" name="eecus_id" id="eecus_id" />

												<p>
												<input  disabled class="w3-input" name="eefirstname" value=""  id="eefirstname">
  												<label>First Name</label></p>
												</p>

												<p>
												<input  disabled class="w3-input" name="eelastname" value=""  id="eelastname">
												<label>Last Name</label></p>
												</p>

												<p>
												<input  disabled class="w3-input" name="eebirthdate" value=""  id="eebirthdate">
												<label>Birthdate</label></p>
												</p>

												<p>
												<input  disabled class="w3-input" name="eecountry" value=""  id="eecountry">
												<label>Country</label></p>
												</p>		

												<p>
												<input  disabled class="w3-input" name="eeemail" value=""  id="eeemail">
												<label>Email</label></p>
												</p>	
													
												<p>
												<input  disabled class="w3-input" name="eecontactno" value=""  id="eecontactno">
												<label>Conatct no</label></p>
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
												<h2><i class="fa fa-pencil"></i> Edit Customer Details</h2>
											</div>
										</h5>
									</div>	
									<div class="modal-body">
										<!--customer details update form-->
										<form id="customer-edit-form" method="post" action="./config/system_user.php" >
											
											<div id="modal-content">
												<div class="container " style="width:600px">
												
												<input type="hidden" name="ecus_id" id="ecus_id" />
											
												<p>
												<input  class="w3-input" name="efirstname" value=""  id="efirstname">
  												<label>First Name</label></p>
												</p>

												<p>
												<input  class="w3-input" name="elastname" value=""  id="elastname">
												<label>Last Name</label></p>
												</p>

												<p>
												<input  class="w3-input" name="ebirthdate" value=""  id="ebirthdate">
												<label>Birthdate</label></p>
												</p>

												<p>
												<input   class="w3-input" name="ecountry" value=""  id="ecountry">
												<label>Country</label></p>
												</p>		

												<p>
												<input   class="w3-input" name="eemail" value=""  id="eemail">
												<label>Email</label></p>
												</p>	
													
												<p>
												<input class="w3-input" name="econtactno" value=""  id="econtactno">
												<label>Conatct no</label></p>
												</p>	
												</div> 
											</div>
										<!--end-->
									</div>	
											
									
									<div class="modal-footer">
										<input type="submit" class="w3-btn  w3-green w3-margin-bottom w3-padding" id="update-customer" value="Update" name="update-customer" > 
										</form>
										<button type="button" name="" class="w3-btn  w3-red w3-margin-bottom w3-padding" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
						<!--end model-->
						<!--*******************************************************************end my coding******************************************************************************************************************-->


						
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
					
					var cus_id = $(this).attr("id");
					
					$.ajax({
						url:"./config/system_user.php",
						method: "POST",
						data:{cus_id:cus_id},
						dataType:"json",
						success:function(data){
							
							$('#eecus_id').val(data.cus_id);
							$('#eefirstname').val(data.cus_fname);
							$('#eelastname').val(data.cus_lname);
							$('#eebirthdate').val(data.dob);
							$('#eecountry').val(data.country);
							$('#eeemail').val(data.cus_email);
							$('#eecontactno').val(data.mobile);

							
							$('#view').modal('show');
						}
					});	
				});
			});


			//coding for edit function
			$(document).ready(function(){		
				$(document).on('click','.edit_data', function(){
					
					var cus_id = $(this).attr("id");
					
					$.ajax({
						url:"./config/system_user.php",
						method: "POST",
						data:{cus_id:cus_id},
						dataType:"json",
						success:function(data){
							
							$('#ecus_id').val(data.cus_id);
							$('#efirstname').val(data.cus_fname);
							$('#elastname').val(data.cus_lname);
							$('#ebirthdate').val(data.dob);
							$('#ecountry').val(data.country);
							$('#eemail').val(data.cus_email);
							$('#econtactno').val(data.mobile);

							$('#update-customer').val("Update");
							$('#edit').modal('show');
						}
					});	
				});
			});

			//romove customer
			function myFunction(x) {
				if (confirm('Are you sure to remove this customer')) {
					var number =x; 
					$("#myDiv1").load('config/system_user.php', {selectedButtonValue : number});
                }	
			}

			//for searching bar
			$(document).ready(function(){
				load_data();
				function load_data(customer_query1){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{customer_query1:customer_query1},
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
				function load_data(customer_query2){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{customer_query2:customer_query2},
						success:function(data){
				
							$('#result').html(data);
						}
					});
				}
				$('#cus_name').keyup(function(){
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
				function load_data(customer_query3){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{customer_query3:customer_query3},
						success:function(data){
				
							$('#result').html(data);
						}
					});
				}
				$('#cus_email').keyup(function(){
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
				function load_data(customer_query4){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{customer_query4:customer_query4},
						success:function(data){
				
							$('#result').html(data);
						}
					});
				}
				$('#cus_country').keyup(function(){
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
