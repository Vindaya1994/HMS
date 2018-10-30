
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
	
	function s_tour_plans_search(){

		var xhr=new XMLHttpRequest();
		var tour_plan=document.getElementById("tour_plan").value;
				
		xhr.onreadystatechange=function(){
			if(xhr.readyState==4){
			document.getElementById("s_tour_plans_search").innerHTML=xhr.responseText;
		
			}		
		}
		xhr.open("GET","s_tour_plans_search.php?tour_plan="+tour_plan+"&key="+"places",true);

		xhr.send(null);
		return false;

	}


	function s_tour_plans_search_date(){

		var xhr=new XMLHttpRequest();
		var tour_date=document.getElementById("tour_date").value;
				
		xhr.onreadystatechange=function(){
			if(xhr.readyState==4){
				document.getElementById("s_tour_plans_search").innerHTML=xhr.responseText;
			}		
		}
		xhr.open("GET","s_tour_plans_search.php?tour_date="+tour_date+"&key="+"checkin",true);

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
							<li class="active"><span class="last">Tours Plans</span></li>
							
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
								<div class="row  w3-xxxlarge " style="padding-left:16px"><img src="images/preplan.jpg" style="width:15%">&nbsp;&nbsp;</i> Requested Tours </div>
							</div>
							
							<div class="w3-container w3">
								<form  action="GET" id="form">
						
									<div class="row  w3-margin "style="margin-top:0px">
										<div class="w3-col s2 w3-centre ">
											<h5 class="" style="margin-top:0px"><em class="fa fa-search" style="font-size:30px"></em><b>Search By :</b></h5>
										</div>
										<div class="w3-col s3 "style="margin-left:22px">
											<input class="w3-input w3-border " name="tour_plan" type="text" placeholder="Places" id="tour_plan" onkeyup="s_tour_plans_search();">
										</div>
										<div class="w3-col s3 "style="margin-left:22px">
											<input class="w3-input w3-border " name="date" type="date" placeholder="tour date" id="tour_date" onchange="s_tour_plans_search_date()">
										</div>
									</div>
								</form>

															
								<div class="row  w3-margin" id="s_tour_plans_search">
									<table class="table table-striped table-bordered" id="example">
										<thead>
											<tr class="w3-light-grey">
												<th>ID</th>
												<th>Tour Start Day</th>
												<th>Tour End Date </th>
												<th>Requested Date</th>
												<th>Other</th>
												<th>No of Participants</th>
												<th>Pick up Time</th>
												<th>Places</th>
												<th>Customer Name</th>
												<th>Action</th>
											</tr>
										</thead>

										<?php 
										
										$myrow =$obj ->view_tourplans("tour_plan");
										foreach($myrow as $row){ ?>
												<?php	$id= $row["tp_id"];		?>	
										<tbody>
											<tr>
												<td><?php echo $row["tp_id"]; ?></td>
												<td><?php echo $row["checkin"]; ?></td>
												<td><?php echo $row["checkout"]; ?></td>
												<td><?php echo $row["date"]; ?></td>		
												<td><?php echo $row["other"]; ?></td>
												<td><?php echo $row["no_of_participant"]; ?></td>
												<td><?php echo $row["pick_up_time"]; ?></td>
												<td><?php echo $row["places"]; ?></td>
												<td><?php echo $row["cus_fname"]; ?></td>
												<td>
													<a class="remove" onclick="myFunction(<?php echo $row["tp_id"]; ?>)"   title="Remove This our plan" id="myDiv1" value="<?php  $row["tp_id"] ?>" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:red;"></i></a></td>
											</td>
											</tr>
										<?php } ?>
										</tbody>
									</table>
								</div>	
							</div>
						</div>
						</div>
						</div>
						
						
									
<!--*******************************************************************end my coding******************************************************************************************************************-->

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

			//romove transport
			function myFunction(x) {
				if (confirm('Are you sure to remove this tour plan')) {
					var number =x; 
					$("#myDiv1").load('config/system_user.php', {selectedButtonValue105 : number});
                }	
			}

		</script>


	</body>
</html>
