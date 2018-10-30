
<?php include_once './config/admin.php'; ?>
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
								<div class="row  w3-xxxlarge " style="padding-left:16px"><img src="assets/img/staff/staff.png" style="width:15%">&nbsp;&nbsp;</i> Staff Members </div>
							</div>
							<div class="w3-container w3">
								
									<div class="row  w3-margin" >
										<button  class="w3-btn w3-block w3-green  col-md-3" type="button" onClick= "window.location.href = 'a_staff_member_add.php';" ><i class="fa fa-plus"></i>&nbsp;Add New Staff Member</button>
									</div>
															
									<div class="row  w3-margin "style="margin-top:0px">
										<div class="w3-col s2 w3-centre ">
											<h5 class="" style="margin-top:0px"><em class="fa fa-search" style="font-size:30px"></em><b>Search By :</b></h5>
										</div>
										<div class="w3-col s3 "style="margin-left:22px">
											<input class="w3-input w3-border " name="user_id" type="text" placeholder="staff id" id="user_id">
										</div>
										<div class="w3-col s3 "style="margin-left:22px">
											<input class="w3-input w3-border " name="email" type="text" placeholder="staff member email" id="email">
										</div>
									</div>
									<div id="result"></div>
							

															
								<div class="row  w3-margin" >
									<table class="table table-striped table-bordered" id="example">
										<thead>
											<tr class="w3-light-grey">
												<th>ID</th>
												<th>First name</th>
												<th>Last name</th>
												<th>Mobile</th>
												<th>Email</th>
												<th>Salary</th>
												<th>User type</th>
											</tr>
										</thead>

										<?php 
										
										$myrow =$obj ->view_users("systemuser");
										foreach($myrow as $row){ ?>
																
										<tbody>
											<tr>
												<td><?php echo $row["user_id"]; ?></td>
												<td><?php echo $row["user_fname"]; ?></td>
												<td><?php echo $row["user_lname"]; ?></td>
												<td><?php echo $row["mobile"]; ?></td>		
												<td><?php echo $row["user_email"]; ?></td>
												<td><?php echo $row["salary"]; ?></td>
												<td><?php echo $row["user_type"]; ?></td>
												<td><a name="view" value="View" id="<?php echo $row["user_id"]; ?>" class=" view_data"><i class="fa fa-eye" style="font-size:20px;color:black;" ></i></a>&nbsp; 
												<a name="edit" value="Edit" id="<?php echo $row["user_id"]; ?>" class=" edit_data"><i class="fa fa-pencil" style="font-size:20px;color:blue;" ></i></a>&nbsp; 
												<a class="remove" onclick="myFunction(<?php echo $row["user_id"]; ?>)"   title="Remove This Customer" id="myDiv1" value="<?php  $row["user_id"] ?>" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:red;"></i></a>	
												<!--message sending code-->
												<a href="a_message.php?id=<?php echo $row['user_id']; ?>"title="Send Message" ><i class="fa fa-envelope-o" aria-hidden="true" style="font-size:20px;"></i></a></div>
											
											
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
											<h2><i class="fa fa-eye"></i> View Staff Member </h2>
										</div>
									</h5>
								</div>	
								<div class="modal-body">
									
										<div id="modal-content">
											<div class="container " style="width:600px">
											
											<input type="hidden" name="eeuser_id" id="eeuser_id" />

											<p>
											<input  disabled class="w3-input" name="eefirstname" value=""  id="eefirstname">
											  <label>First Name</label></p>
											</p>

											<p>
											<input  disabled class="w3-input" name="eelastname" value=""  id="eelastname">
											<label>Last Name</label></p>
											</p>

											<p>
											<input  disabled class="w3-input" name="eeemail" value=""  id="eeemail">
											<label>Email</label></p>
											</p>	
												
											<p>
											<input  disabled class="w3-input" name="eecontactno" value=""  id="eecontactno">
											<label>Conatct no</label></p>
											</p>	

											<p>
											<input  disabled class="w3-input" name="eesalary" value=""  id="eesalary">
											<label>Salary</label></p>
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
											<h2><i class="fa fa-pencil"></i> Edit Staff Member</h2>
										</div>
									</h5>
								</div>	
								<div class="modal-body">
									<!--customer details update form-->
									<form id="customer-edit-form" method="post" action="./config/admin.php" >
										
										<div id="modal-content">
											<div class="container " style="width:600px">
											
											<input type="hidden" name="euser_id" id="euser_id" />
										
											<p>
											<input  class="w3-input" name="efirstname" value=""  id="efirstname">
											  <label>First Name</label></p>
											</p>

											<p>
											<input  class="w3-input" name="elastname" value=""  id="elastname">
											<label>Last Name</label></p>
											</p>

											
											<p>
											<input   class="w3-input" name="eemail" value=""  id="eemail">
											<label>Email</label></p>
											</p>	
												
											<p>
											<input class="w3-input" name="econtactno" value=""  id="econtactno">
											<label>Conatct no</label></p>
											</p>	

											<p>
											<input class="w3-input" name="esalary" value=""  id="esalary">
											<label>Salary</label></p>
											</p>
											</div> 
										</div>
									<!--end-->
								</div>	
										
								
								<div class="modal-footer">
									<input type="submit" class="w3-btn  w3-green w3-margin-bottom w3-padding" id="update-staff" value="Update" name="update-staff" > 
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
				
				var user_id = $(this).attr("id");
				
				$.ajax({
					url:"./config/admin.php",
					method: "POST",
					data:{user_id:user_id},
					dataType:"json",
					success:function(data){
						
						$('#eeuser_id').val(data.user_id);
						$('#eefirstname').val(data.user_fname);
						$('#eelastname').val(data.user_lname);
						
						$('#eeemail').val(data.user_email);
						$('#eecontactno').val(data.mobile);
						$('#eesalary').val(data.salary);

						
						$('#view').modal('show');
					}
				});	
			});
		});


		//coding for edit function
		$(document).ready(function(){		
			$(document).on('click','.edit_data', function(){
				
				var user_id = $(this).attr("id");
				
				$.ajax({
					url:"./config/admin.php",
					method: "POST",
					data:{user_id:user_id},
					dataType:"json",
					success:function(data){
						
						$('#euser_id').val(data.user_id);
						$('#efirstname').val(data.user_fname);
						$('#elastname').val(data.user_lname);
						
						$('#eemail').val(data.user_email);
						$('#econtactno').val(data.mobile);
						$('#esalary').val(data.salary);
						$('#update-staff').val("Update");
						$('#edit').modal('show');
					}
				});	
			});
		});

		//romove customer
		function myFunction(x) {
			if (confirm('Are you sure to remove this staff member')) {
				var number =x; 
				$("#myDiv1").load('config/admin.php', {selectedButtonValue60 : number});
			}	
		}

		//for searching bar
		$(document).ready(function(){
			load_data();
			function load_data(staff_query1){
				$.ajax({
					url:"./config/admin.php",
					method:"POST",
					data:{staff_query1:staff_query1},
					success:function(data){
			
						$('#result').html(data);
					}
				});
			}
			$('#user_id').keyup(function(){
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
			function load_data(staff_query2){
				$.ajax({
					url:"./config/admin.php",
					method:"POST",
					data:{staff_query2:staff_query2},
					success:function(data){
			
						$('#result').html(data);
					}
				});
			}
			$('#email').keyup(function(){
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
