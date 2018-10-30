

<?php include_once './config/system_user.php'; ?>

<?php
if (isset($_GET["vehical_type"])) {
    $vehical_type = $_GET["vehical_type"];
    $key = "vehical_type";
}

if (isset($_GET["no_of_passangers"])) {
    $no_of_passangers = $_GET["no_of_passangers"];
    $key = "no_of_passangers";
}



if (isset($vehical_type) && $vehical_type == "") {
    ?>
    <table class="table table-striped table-bordered" id="example">
										<thead>
											<tr class="w3-light-grey">
												<th>ID</th>
												<th>Vehical Type</th>
												<th>No of Passengers</th>
												<th>Price per Km(LKR)</th>
												
												<th>Action</th>
											</tr>
										</thead>

										<?php 
										
										$myrow =$obj ->view_transport("transport_services");
										foreach($myrow as $row){ ?>
										
										 
											<?php	$id= $row["vehical_id"];		?>
																
										<tbody>
											<tr>
												<td><?php echo $row["vehical_id"]; ?></td>
												<td><?php echo $row["vehical_type"]; ?></td>
												<td><?php echo $row["no_of_passangers"]; ?></td>
												<td><?php echo $row["price_per_km"]; ?></td>
												<td><a href="s_transport_update.php?id=<?php echo $id;?>" class="openModal1" ><i class="fa fa-pencil" style="font-size:20px;color:blue;" ></i></a>&nbsp; 
													
													<a class="remove" onclick="myFunction(<?php echo $row["vehical_id"]; ?>)"   title="Remove This Transport" id="myDiv1" value="<?php  $row["vehical_id"] ?>" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:red;"></i></a></td>
											</td>
											</tr>
										<?php } ?>
										</tbody>
									</table>
    <?php
} else if (isset($vehical_type) && $vehical_type !="") {
    ?>

    <table class="table table-striped table-bordered" id="example">
										<thead>
											<tr class="w3-light-grey">
												<th>ID</th>
												<th>Vehical Type</th>
												<th>No of Passengers</th>
												<th>Price per Km(LKR)</th>
												
												<th>Action</th>
											</tr>
										</thead>

										<?php 
										
										$myrow =$obj ->view_transportS("transport_services",$key, $vehical_type);
										foreach($myrow as $row){ ?>
										
										 
											<?php	$id= $row["vehical_id"];		?>
																
										<tbody>
											<tr>
												<td><?php echo $row["vehical_id"]; ?></td>
												<td><?php echo $row["vehical_type"]; ?></td>
												<td><?php echo $row["no_of_passangers"]; ?></td>
												<td><?php echo $row["price_per_km"]; ?></td>
												<td><a href="s_transport_update.php?id=<?php echo $id;?>" class="openModal1" ><i class="fa fa-pencil" style="font-size:20px;color:blue;" ></i></a>&nbsp; 
													
													<a class="remove" onclick="myFunction(<?php echo $row["vehical_id"]; ?>)"   title="Remove This Transport" id="myDiv1" value="<?php  $row["vehical_id"] ?>" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:red;"></i></a></td>
											</td>
											</tr>
										<?php } ?>
										</tbody>
									</table>
    <?php
} else if (isset($no_of_passangers) && $no_of_passangers =="") {
    ?>

    <table class="table table-striped table-bordered" id="example">
										<thead>
											<tr class="w3-light-grey">
												<th>ID</th>
												<th>Vehical Type</th>
												<th>No of Passengers</th>
												<th>Price per Km(LKR)</th>
												
												<th>Action</th>
											</tr>
										</thead>

										<?php 
										
										$myrow =$obj ->view_transport("transport_services");
										foreach($myrow as $row){ ?>
										
										 
											<?php	$id= $row["vehical_id"];		?>
																
										<tbody>
											<tr>
												<td><?php echo $row["vehical_id"]; ?></td>
												<td><?php echo $row["vehical_type"]; ?></td>
												<td><?php echo $row["no_of_passangers"]; ?></td>
												<td><?php echo $row["price_per_km"]; ?></td>
												<td><a href="s_transport_update.php?id=<?php echo $id;?>" class="openModal1" ><i class="fa fa-pencil" style="font-size:20px;color:blue;" ></i></a>&nbsp; 
													
													<a class="remove" onclick="myFunction(<?php echo $row["vehical_id"]; ?>)"   title="Remove This Transport" id="myDiv1" value="<?php  $row["vehical_id"] ?>" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:red;"></i></a></td>
											</td>
											</tr>
										<?php } ?>
										</tbody>
									</table>
            <?php
        } else if (isset($no_of_passangers) && $no_of_passangers !="") {
            ?>

    <table class="table table-striped table-bordered" id="example">
										<thead>
											<tr class="w3-light-grey">
												<th>ID</th>
												<th>Vehical Type</th>
												<th>No of Passengers</th>
												<th>Price per Km(LKR)</th>
												
												<th>Action</th>
											</tr>
										</thead>

										<?php 
										
										$myrow =$obj ->view_transportS("transport_services",$key, $no_of_passangers);
										foreach($myrow as $row){ ?>
										
										 
											<?php	$id= $row["vehical_id"];		?>
																
										<tbody>
											<tr>
												<td><?php echo $row["vehical_id"]; ?></td>
												<td><?php echo $row["vehical_type"]; ?></td>
												<td><?php echo $row["no_of_passangers"]; ?></td>
												<td><?php echo $row["price_per_km"]; ?></td>
												<td><a href="s_transport_update.php?id=<?php echo $id;?>" class="openModal1" ><i class="fa fa-pencil" style="font-size:20px;color:blue;" ></i></a>&nbsp; 
													
													<a class="remove" onclick="myFunction(<?php echo $row["vehical_id"]; ?>)"   title="Remove This Transport" id="myDiv1" value="<?php  $row["vehical_id"] ?>" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:red;"></i></a></td>
											</td>
											</tr>
										<?php } ?>
										</tbody>
									</table>


        <?php } ?>
<body>
     <script>
			
			
			//open home page
			function openIndexWin() {
				window.location='account_staff.php';
			}

			//romove transport
			function myFunction(x) {
				if (confirm('Are you sure to remove this transport service')) {
					var number =x; 
					$("#myDiv1").load('config/system_user.php', {selectedButtonValue103 : number});
                }	
			}

		</script>

</body>