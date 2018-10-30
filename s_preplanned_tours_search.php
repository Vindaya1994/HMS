

<?php include_once './config/system_user.php'; ?>

	<?php 
	if(isset($_GET["tour_plan"])){
	$tour_plan=$_GET["tour_plan"];
	$key="tour_name";
	}
	
	/*if(isset($_GET["tour_date"])){
	$tour_date=$_GET["tour_date"];
	//echo $tour_date;
	$key="checkin";
	}*/

	
	if(isset($tour_plan) && $tour_plan==""){

	?>
	<table class="table table-striped table-bordered" id="example">
										<thead>
											<tr class="w3-light-grey">
												<th>ID</th>
												<th>Tour</th>
												<th>Places per Person(LKR)</th>
												<th>Price</th>
												<th>No of Participants</th>
												<th>No of Days</th>
												<th>Description</th>
												<th>Action</th>
											</tr>
										</thead>

										<?php 
										
										$myrow =$obj ->s_preplan_tour("pre_planed_tours",$key,$tour_plan);
										foreach($myrow as $row){ ?>
														<?php	$id= $row["tour_id"];		?>		
										<tbody>
											<tr>
												<td><?php echo $row["tour_id"]; ?></td>
												<td><?php echo $row["tour_name"]; ?></td>
												<td><?php echo $row["places_to_visit"]; ?></td>
												<td><?php echo $row["price"]; ?></td>		
												<td><?php echo $row["no_of_participant"]; ?></td>
												<td><?php echo $row["no_of_days"]; ?></td>
												<td><?php echo $row["description"]; ?></td>
												<td>
													<a href="s-preplan_tour_update.php?id=<?php echo $id;?>" class="openModal1" ><i class="fa fa-pencil" style="font-size:20px;color:blue;" ></i></a>&nbsp; 
													
													<a class="remove" onclick="myFunction(<?php echo $row["tour_id"]; ?>)"   title="Remove This our plan" id="myDiv1" value="<?php  $row["tour_id"] ?>" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:red;"></i></a></td>
											</td>
											</tr>
										<?php } ?>
										</tbody>
									</table>
<?php 

		
	}else if(isset($tour_plan) && $tour_plan!=""){

	?>

<table class="table table-striped table-bordered" id="example">
										<thead>
											<tr class="w3-light-grey">
												<th>ID</th>
												<th>Tour</th>
												<th>Places per Person(LKR)</th>
												<th>Price</th>
												<th>No of Participants</th>
												<th>No of Days</th>
												<th>Description</th>
												<th>Action</th>
											</tr>
										</thead>

										<?php 
										
										$myrow =$obj ->s_preplan_tour("pre_planed_tours",$key,$tour_plan);
										foreach($myrow as $row){ ?>
										<?php	$id= $row["tour_id"];		?>
																
										<tbody>
											<tr>
												<td><?php echo $row["tour_id"]; ?></td>
												<td><?php echo $row["tour_name"]; ?></td>
												<td><?php echo $row["places_to_visit"]; ?></td>
												<td><?php echo $row["price"]; ?></td>		
												<td><?php echo $row["no_of_participant"]; ?></td>
												<td><?php echo $row["no_of_days"]; ?></td>
												<td><?php echo $row["description"]; ?></td>
												<td>
													<a href="s-preplan_tour_update.php?id=<?php echo $id;?>" class="openModal1" ><i class="fa fa-pencil" style="font-size:20px;color:blue;" ></i></a>&nbsp; 
													
													<a class="remove" onclick="myFunction(<?php echo $row["tour_id"]; ?>)"   title="Remove This our plan" id="myDiv1" value="<?php  $row["tour_id"] ?>" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:red;"></i></a></td>
											</td>
											</tr>
										<?php } ?>
										</tbody>
									</table>
<?php 
		
	}else if(isset($tour_date) && $tour_date==""){

	?>
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
												<th>Customer ID</th>
												<th>Action</th>
											</tr>
										</thead>

										<?php 
										
										$myrow =$obj ->view_tourplans("tour_plan");
										foreach($myrow as $row){ ?>
																
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
												<td><?php echo $row["cus_id"]; ?></td>
												<td><!--<a href="Customer_view.php?room_no=<?php echo $row["tp_id"]; ?>" data-toggle="tooltip" id="myDiv" title="View This Customer"><i class="fa fa-eye" style="font-size:20px;color:black;" ></i></a>&nbsp;
													<a onclick="myFunction1(<?php echo $row["tp_id"]; ?>)" class="openModal1" data-toggle="modal" id="myDiv1" data-target="#myModal" data-id="<?php echo $row['tour_id'] ?>"><i class="fa fa-pencil" style="font-size:20px;color:blue;" ></i></a>&nbsp; 
													-->
													<a onclick="myFunction(<?php echo $row["tp_id"]; ?>)"   title="Remove This Customer" id="myDiv" value="<?php  $row["tp_id"] ?>" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:red;"></i></a>
												</td>
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

					
			//romove preplanTour
			function myFunction(x) {
				if (confirm('Are you sure to remove this tour plan')) {
					var number =x; 
					$("#myDiv1").load('config/system_user.php', {selectedButtonValue106 : number});
                }	
			}


		</script>
	</body>
	