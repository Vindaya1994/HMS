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
								<div class="row  w3-xxxlarge " style="padding-left:16px"><img src="assets/img/vacancies/job2.png" style="width:15%">&nbsp;&nbsp;</i> JOB VACANCIES</div>
							</div>
							<div class="w3-container w3">
							
								<!--searching bar-->								
								<div class="row  w3-margin" >
										<button  class="w3-btn w3-block w3-green  col-md-3" type="button" onClick= "window.location.href = 's_jobvacancies_add.php';" ><i class="fa fa-plus"></i>&nbsp;Add New Job Vacancy</button>
									</div>
															
									<div class="row  w3-margin "style="margin-top:0px">
										<div class="w3-col s2 w3-centre ">
											<h5 class="" style="margin-top:0px"><em class="fa fa-search" style="font-size:30px"></em><b>Search By :</b></h5>
										</div>
										<div class="w3-col s2 "style="margin-left:22px">
											<input class="w3-input w3-border " name="vac_id" type="text" placeholder="Vacancy ID" id="vac_id">
										</div>
										<div class="w3-col s2 "style="margin-left:22px">
											<input class="w3-input w3-border " name="position" type="text" placeholder="Position" id="position">
										</div>
										<div class="w3-col s2 "style="margin-left:22px">
											<input class="w3-input w3-border " name="salary" type="text" placeholder="Salary" id="salary">
										</div>
										<div class="w3-col s2 "style="margin-left:22px">
											<input class="w3-input w3-border " name="contract" type="text" placeholder="Contract" id="contract">
										</div>
									</div>
									<div id="result"></div>
								
								<!--end search bar-->

															
								<div class="row  w3-margin" >
									<table class="table table-striped table-bordered" id="example">
										<thead>
											<tr class="w3-light-grey">
												<th>Vacancy  No</th>
												<th>Position</th>
												<th>Salary</th>
												<th>Contract</th>
												<th>Job description</th>
												<th>Job image</th>
											</tr>
										</thead>

										<?php 
						
										$myrow =$obj ->view_jobVacancies("job_vacancy");
										foreach($myrow as $row){ ?>							
										<tbody>
											<tr>
												<td><?php echo $row["vac_id"]; ?></td>
												<td><?php echo $row["position"]; ?></td>
												<td><?php echo $row["salary"]; ?></td>
												<td><?php echo $row["contract"]; ?></td>
												<td><?php echo $row["job_description"]; ?></td>	
												<td style="width:20px;"><?php echo '<img src="'.$row['job_image'].'" height="150" width="225" class="" />'; ?></td>	
												
												<td><a name="view" value="View" id="<?php echo $row["vac_id"]; ?>" class=" view_data"><i class="fa fa-eye" style="font-size:20px;color:black;" ></i></a>&nbsp; 
													<a name="edit" value="Edit" id="<?php echo $row["vac_id"]; ?>" class=" edit_data"><i class="fa fa-pencil" style="font-size:20px;color:blue;" ></i></a>&nbsp; 
													<a class="remove" onclick="myFunction(<?php echo $row["vac_id"]; ?>)"   title="Remove This Customer" id="myDiv1" value="<?php  $row["vac_id"] ?>" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:red;"></i></a>	
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
												<h2><i class="fa fa-eye"></i> View Job Vacancy Details</h2>
											</div>
										</h5>
									</div>	
									<div class="modal-body">
										
											<div id="modal-content">
												<div class="container " style="width:600px">
												
												<input type="hidden" name="eecus_id" id="eecus_id" />

												<p>
												<input  disabled class="w3-input" name="eevac_id" value=""  id="eevac_id">
  												<label>Vacancy ID</label></p>
												</p>

												<p>
												<input  disabled class="w3-input" name="eeposition" value=""  id="eeposition">
  												<label>Position</label></p>
												</p>

												<p>
												<input  disabled class="w3-input" name="eesalary" value=""  id="eesalary">
												<label>Salary</label></p>
												</p>

												<p>
												<input  disabled class="w3-input" name="eecontract" value=""  id="eecontract">
												<label>Contarcat</label></p>
												</p>

												<p>
												<input  disabled class="w3-input" name="eedescription" value=""  id="eedescription">
												<label>Job Description</label></p>
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
												<h2><i class="fa fa-pencil"></i> Edit Job Vancancy</h2>
											</div>
										</h5>
									</div>	
									<div class="modal-body">
										<!--customer details update form-->
										<form id="customer-edit-form" method="post" action="./config/system_user.php" >
											
											<div id="modal-content">
												<div class="container " style="width:600px">
												
												<input type="hidden" name="evacancy_id" id="evacancy_id" />
											
												<p>
												<input disabled class="w3-input" name="evac_id" value=""  id="evac_id">
  												<label>Vacancy ID</label></p>
												</p>

												<p>
												<input  class="w3-input" name="eposition" value=""  id="eposition">
  												<label>Position</label></p>
												</p>

												<p>
												<input  class="w3-input" name="esalary" value=""  id="esalary">
												<label>Salary</label></p>
												</p>

												<p>
												<input  class="w3-input" name="econtract" value=""  id="econtract">
												<label>Contarcat</label></p>
												</p>

												<p>
												<input class="w3-input" name="edescription" value=""  id="edescription">
												<label>Job Description</label></p>
												</p>		
												</div> 
											</div>
										<!--end-->
									</div>	
											
									
									<div class="modal-footer">
										<input type="submit" class="w3-btn  w3-green w3-margin-bottom w3-padding" id="update-vacancy" value="Update" name="update-vacancy" > 
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
				window.location='index.php';
			}

			//coding for view function
			$(document).ready(function(){		
				$(document).on('click','.view_data', function(){
					
					var vac_id = $(this).attr("id");
					
					$.ajax({
						url:"./config/system_user.php",
						method: "POST",
						data:{vac_id:vac_id},
						dataType:"json",
						success:function(data){
							
							$('#eevac_id').val(data.vac_id);
							$('#eeposition').val(data.position);
							$('#eesalary').val(data.salary);
							$('#eecontract').val(data.contract);
							$('#eedescription').val(data.job_description);
							$('#eeimage').val(data.job_image);
							
							$('#view').modal('show');
						}
					});	
				});
			});

			//coding for edit function
			$(document).ready(function(){		
				$(document).on('click','.edit_data', function(){
					
					var vac_id = $(this).attr("id");
					
					$.ajax({
						url:"./config/system_user.php",
						method: "POST",
						data:{vac_id:vac_id},
						dataType:"json",
						success:function(data){
							
							$('#evacancy_id').val(data.vac_id);
							$('#evac_id').val(data.vac_id);
							$('#eposition').val(data.position);
							$('#esalary').val(data.salary);
							$('#econtract').val(data.contract);
							$('#edescription').val(data.job_description);

							$('#update-vacancy').val("Update");
							$('#edit').modal('show');
						}
					});	
				});
			});

			//romove job vacancy
			function myFunction(x) {
				if (confirm('Are you sure to remove this job vacancy')) {
					var number =x; 
					$("#myDiv1").load('config/system_user.php', {selectedButtonValue5 : number});
                }	
			}

			//for searching bar
			$(document).ready(function(){
				load_data();
				function load_data(vacancy_query1){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{vacancy_query1:vacancy_query1},
						success:function(data){
				
							$('#result').html(data);
						}
					});
				}
				$('#vac_id').keyup(function(){
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
				function load_data(vacancy_query2){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{vacancy_query2:vacancy_query2},
						success:function(data){
				
							$('#result').html(data);
						}
					});
				}
				$('#position').keyup(function(){
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
				function load_data(vacancy_query3){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{vacancy_query3:vacancy_query3},
						success:function(data){
				
							$('#result').html(data);
						}
					});
				}
				$('#salary').keyup(function(){
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
				function load_data(vacancy_query4){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{vacancy_query4:vacancy_query4},
						success:function(data){
				
							$('#result').html(data);
						}
					});
				}
				$('#contract').keyup(function(){
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
