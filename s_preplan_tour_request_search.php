<?php include_once './config/system_user.php'; ?>

	<?php 
		
	if(isset($_GET["tour_date"])){
	$tour_date=$_GET["tour_date"];
	
	$key="tour_check_in";
	}

	
	if(isset($tour_date) && $tour_date==""){

	?>
	<table class="table table-striped table-bordered" id="example">
										<thead>
											<tr class="w3-light-grey">
												<th>Request ID</th>
												<th>Tour</th>
												<th>Customer Name</th>
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
<?php 

		
	}else if(isset($tour_date) && $tour_date!=""){

	
	?>

<table class="table table-striped table-bordered" id="example">
										<thead>
											<tr class="w3-light-grey">
												<th>Request ID</th>
												<th>Tour</th>
												<th>Customer Name</th>
												<th>Tour Start Date</th>
												<th>Tour End Date</th>
												<th>Requested Date</th>
												<th>Action</th>
											</tr>
										</thead>

										<?php 
										
										$myrow =$obj ->s_preplan_tour_search("pre_planed_tour_reservation",$key,$tour_date);;
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
		
	<?php }?>
	
	<body>
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