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
								<div class="row  w3-xxxlarge " style="padding-left:16px"><img src="assets/img/vacancies/candidate2.png" style="width:15%">&nbsp;&nbsp;</i>CANDIDATES</div>
							</div>
							<div class="w3-container w3">
								<!--searching bar-->
															
								<div class="row  w3-margin "style="margin-top:0px">
										<div class="w3-col s2 w3-centre ">
											<h5 class="" style="margin-top:0px"><em class="fa fa-search" style="font-size:30px"></em><b>Search By :</b></h5>
										</div>
										<div class="w3-col s2 "style="margin-left:22px">
											<input class="w3-input w3-border " name="camd_id" type="text" placeholder="Candidate ID" id="cand_id">
										</div>
										<div class="w3-col s2 "style="margin-left:22px">
											<input class="w3-input w3-border " name="vac_id" type="text" placeholder="Vacancy ID" id="vac_id">
										</div>
										<div class="w3-col s2 "style="margin-left:22px">
											<input class="w3-input w3-border " name="cand_name" type="text" placeholder="Candidate Name" id="cand_name">
										</div>
										<div class="w3-col s2 "style="margin-left:22px">
											<input class="w3-input w3-border " name="cand_email" type="text" placeholder="Candidate Email" id="cand_email">
										</div>
									</div>
									<div id="result"></div>
								
								<!--end search bar-->

															
								<div class="row  w3-margin" >
									<table class="table table-striped table-bordered" id="example">
										<thead>
											<tr class="w3-light-grey">
												<th>Candidate no</th>
												<th>Vacancy no</th>
												<th>Candidate name</th>
												<th>Candidate email</th>
												<?php if($_SESSION['utype']=='3') {?>
												<th>Candidate CV</th>
												<?php } ?>
											</tr>
										</thead>

										<?php 
										$myrow =$obj ->view_candidates("candidate");
										foreach($myrow as $row){ ?>						
										<tbody>
											<tr>
												<td><?php echo $row["cand_id"]; ?></td>
												<td><?php echo $row["vac_id"]; ?></td>
												<td><?php echo $row["cand_name"]; ?></td>
												<td><?php echo $row["cand_email"]; ?></td>
												
												<?php

												if($_SESSION['utype']=='3') {?>
												<td>
												<form name="downloadform" method="post" action="./config/system_user.php">
													<input   class="w3-input" name="file_name" value="<?php echo $row["cand_cv"]; ?>" >
													<input   class="w3-input w3-blue" type="submit" value="Download CV">
										
												</form>
												</td>
												<?php } ?>
												
												
												<td><a name="view" value="View" id="<?php echo $row["cand_id"]; ?>" class=" view_data"><i class="fa fa-eye" style="font-size:20px;color:black;" ></i></a>&nbsp; 
												
												
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
												<h2><i class="fa fa-eye"></i> View Candidates</h2>
											</div>
										</h5>
									</div>	
									<div class="modal-body">
										
											<div id="modal-content">
												<div class="container " style="width:600px">
												
												<input type="hidden" name="eecand_id" id="eecand_id" />

												<p>
												<input  disabled class="w3-input" name="ecand_id" value=""  id="ecand_id">
  												<label>Candidate ID</label></p>
												</p>

												<p>
												<input  disabled class="w3-input" name="evac_id" value=""  id="evac_id">
												<label>Vacancy ID</label></p>
												</p>

												<p>
												<input  disabled class="w3-input" name="ecand_name" value=""  id="ecand_name">
												<label>Candidate Name/label></p>
												</p>

												<p>
												<input  disabled class="w3-input" name="ecand_email" value=""  id="ecand_email">
  												<label>Candidate Email</label></p>
												</p>

												<p>
												<input  disabled class="w3-input" name="ecand_cv" value=""  id="ecand_cv">
												<label>Candidate CV</label></p>
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

			//coding for download function
			$(document).ready(function(){		
				$(document).on('click','.download_data', function(){
					
					var cv_id = $(this).attr("id");
					
					$.ajax({
						url:"./config/system_user.php",
						method: "POST",
						data:{candidate_id:candidate_id},
						dataType:"json",
						success:function(data){
							
							$('#ecand_id').val(data.cand_id);
							$('#evac_id').val(data.vac_id);
							$('#ecand_name').val(data.cand_name);
							$('#ecand_email').val(data.cand_email);
							$('#ecand_cv').val(data.cand_cv);
							
							$('#view').modal('show');
						}
					});	
				});
			});

			//coding for view function
			$(document).ready(function(){		
				$(document).on('click','.view_data', function(){
					
					var candidate_id = $(this).attr("id");
					
					$.ajax({
						url:"./config/system_user.php",
						method: "POST",
						data:{candidate_id:candidate_id},
						dataType:"json",
						success:function(data){
							
							$('#ecand_id').val(data.cand_id);
							$('#evac_id').val(data.vac_id);
							$('#ecand_name').val(data.cand_name);
							$('#ecand_email').val(data.cand_email);
							$('#ecand_cv').val(data.cand_cv);
							
							$('#view').modal('show');
						}
					});	
				});
			});

			//for searching bar
			$(document).ready(function(){
				load_data();
				function load_data(candidate_query1){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{candidate_query1:candidate_query1},
						success:function(data){
				
							$('#result').html(data);
						}
					});
				}
				$('#cand_id').keyup(function(){
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
				function load_data(candidate_query2){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{candidate_query2:candidate_query2},
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
				function load_data(candidate_query3){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{candidate_query3:candidate_query3},
						success:function(data){
				
							$('#result').html(data);
						}
					});
				}
				$('#cand_name').keyup(function(){
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
				function load_data(candidate_query4){
					$.ajax({
						url:"./config/system_user.php",
						method:"POST",
						data:{candidate_query4:candidate_query4},
						success:function(data){
				
							$('#result').html(data);
						}
					});
				}
				$('#cand_email').keyup(function(){
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
