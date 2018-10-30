
<?php include_once './config/system_user.php'; ?>
<!DOCTYPE html>

<html lang="en">
    
    <head>
		<?php include_once 'headers/header.php';
		 ?>
		
        <!-- css to the relevant page  -->
       
		<style>
		</style>
    </head>

 
	<body class="w3-white" >
	
		<script>
		
			function s_preplan_tour_request_search_date(){

				var xhr=new XMLHttpRequest();
				var tour_date=document.getElementById("tour_date").value;
				//var EMP_NO=document.getElementById("EMP_NO").value;
		
				xhr.onreadystatechange=function(){
					if(xhr.readyState==4){
	
						document.getElementById("s_preplan_tour_request_search").innerHTML=xhr.responseText;
						//changeContent('Promotions');
					}		
				}
				xhr.open("GET","s_preplan_tour_request_search.php?tour_date="+tour_date+"&key="+"tour_check_in",true);

				xhr.send(null);
				return false;

			}
		
		</script>
	
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
							<li class="active"><span class="last">Services</span></li>
							<li class="active"><span class="last">Pre Planned Tours</span></li>
							<li class="active"><span class="last">Pre Planned Tour Request</span></li>
							
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
			
				<div class="section-page-content row">
					
					<div class="col-lg-10 col-lg-offset-1 w3-white">
						<!--**********************************************************************my coding here****************************************************************************************-->
						<div class="w3-card-4 w3-col s12 w3-margin">
							<div class="w3-container w3-padding ">
								<div class="row  w3-xxxlarge " style="padding-left:16px"><img src="images/preplan.jpg" style="width:15%">&nbsp;&nbsp;</i> Pre Planned Tours requests</div>
							</div>
							
							<div class="w3-container w3">
								<form  action="GET" id="form">
																	
									
															
									<div class="row  w3-margin "style="margin-top:0px">
										<div class="w3-col s2 w3-centre ">
											<h5 class="" style="margin-top:0px"><em class="fa fa-search" style="font-size:30px"></em><b>Search By :</b></h5>
										</div>
										
										<div class="w3-col s3 "style="margin-left:22px">
											<input class="w3-input w3-border " name="date" type="date" placeholder="tour date" id="tour_date" onchange="s_preplan_tour_request_search_date()">
										</div>
									</div>
								</form>

															
								<div class="row  w3-margin" id="s_preplan_tour_request_search">
									<table class="table table-striped table-bordered" id="example">
										<thead>
											<tr class="w3-light-grey">
												<th>Request ID</th>
												<th>Tour</th>
												<th>Customer</th>
												<th>Tour Start Date</th>
												<th>Tour End Date</th>
												<th>Requested Date</th>
												<th>Action</th>
											</tr>
										</thead>

										<?php 
										
										$myrow =$obj ->view_preplan_tour_requests("pre_planed_tour_reservation");
										foreach($myrow as $row){ ?>
											<?php	$id= $row["tour_no"];		?>						
										<tbody>
											<tr>
												<td><?php echo $row["tour_no"]; ?></td>
												<td><?php echo $row["tour_name"]; ?></td>
												<td><?php echo $row["cus_fname"]; ?></td>
												<td><?php echo $row["tour_check_in"]; ?></td>		
												<td><?php echo $row["tour_check_out"]; ?></td>
												<td><?php echo $row["date"]; ?></td>
												<td>
													<a class="remove" onclick="myFunction(<?php echo $row["tour_no"]; ?>)"   title="Remove This Tour Plan Request" id="myDiv1" value="<?php  $row["tour_no"] ?>" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:red;"></i></a></td>
											</tr>
										<?php } ?>
										</tbody>
									</table>
								</div>	
							</div>
						</div>
						
							</div> 
									</div>
									
								</div>
							</div>
						</div
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

					
			//romove preplan tour request
			function myFunction(x) {
				if (confirm('Are you sure to remove this tour plan request')) {
					var number =x; 
					$("#myDiv1").load('config/system_user.php', {selectedButtonValue100 : number});
                }	
			}

			

		</script>


	</body>
</html>
