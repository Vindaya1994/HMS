

<?php include_once './config/system_user.php'; ?>

<?php
if (isset($_GET["tour_date"])) {
    $tour_date = $_GET["tour_date"];
    $key = "ts_checkin";
}

if (isset($_GET["vehical_type"])) {
    $vehical_type = $_GET["vehical_type"];
    $key = "vehical_type";
}

if (isset($_GET["places_to_visit"])) {
    $places_to_visit = $_GET["places_to_visit"];
    $key = "places_to_visit";
}



if (isset($tour_date) && $tour_date == "") {
    ?>
    <table class="table table-striped table-bordered" id="example">
										<thead>
											<tr class="w3-light-grey">
												<th>Request ID</th>
												<th>Vehical</th>
												<th>Customer</th>
												<th>Tour Start Date</th>
												<th>Tour End Date</th>
												<th>Requested Date</th>
												<th>Pick up Time</th>
												<th>Places</th>
												<th>Action</th>
											</tr>
										</thead>

										<?php 
										
										$myrow =$obj ->view_transport_requests("transport_services_reservation");
										foreach($myrow as $row){ ?>
																
										<tbody>
											<tr>
												<td><?php echo $row["transport_no"]; ?></td>
												<td><?php echo $row["vehical_type"]; ?></td>
												<td><?php echo $row["cus_fname"]; ?></td>
												<td><?php echo $row["ts_checkin"]; ?></td>		
												<td><?php echo $row["ts_checkout"]; ?></td>
												<td><?php echo $row["date"]; ?></td>
												<td><?php echo $row["ts_checkin_time"]; ?></td>		
												<td><?php echo $row["places_to_visit"]; ?></td>
												<td>
													<a class="remove" onclick="myFunction(<?php echo $row["transport_no"]; ?>)"   title="Remove This Transport request" id="myDiv1" value="<?php  $row["transport_no"] ?>" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:red;"></i></a></td>
											</td>
											</tr>
										<?php } ?>
										</tbody>
									</table>
    <?php
} else if (isset($tour_date) && $tour_date !="") {
    ?>

    <table class="table table-striped table-bordered" id="example">
										<thead>
											<tr class="w3-light-grey">
												<th>Request ID</th>
												<th>Vehical</th>
												<th>Customer</th>
												<th>Tour Start Date</th>
												<th>Tour End Date</th>
												<th>Requested Date</th>
												<th>Pick up Time</th>
												<th>Places</th>
												<th>Action</th>
											</tr>
										</thead>

										<?php 
										
										$myrow =$obj ->view_transport_requestsS("transport_services_reservation",$key, $tour_date);
										foreach($myrow as $row){ ?>
																
										<tbody>
											<tr>
												<td><?php echo $row["transport_no"]; ?></td>
												<td><?php echo $row["vehical_type"]; ?></td>
												<td><?php echo $row["cus_fname"]; ?></td>
												<td><?php echo $row["ts_checkin"]; ?></td>		
												<td><?php echo $row["ts_checkout"]; ?></td>
												<td><?php echo $row["date"]; ?></td>
												<td><?php echo $row["ts_checkin_time"]; ?></td>		
												<td><?php echo $row["places_to_visit"]; ?></td>
												<td>
													<a class="remove" onclick="myFunction(<?php echo $row["transport_no"]; ?>)"   title="Remove This Transport request" id="myDiv1" value="<?php  $row["transport_no"] ?>" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:red;"></i></a></td>
											</td>
											</tr>
										<?php } ?>
										</tbody>
									</table>
    <?php
} else if (isset($vehical_type) && $vehical_type =="") {
    ?>

    <table class="table table-striped table-bordered" id="example">
										<thead>
											<tr class="w3-light-grey">
												<th>Request ID</th>
												<th>Vehical</th>
												<th>Customer</th>
												<th>Tour Start Date</th>
												<th>Tour End Date</th>
												<th>Requested Date</th>
												<th>Pick up Time</th>
												<th>Places</th>
												<th>Action</th>
											</tr>
										</thead>

										<?php 
										
										$myrow =$obj ->view_transport_requests("transport_services_reservation");
										foreach($myrow as $row){ ?>
																
										<tbody>
											<tr>
												<td><?php echo $row["transport_no"]; ?></td>
												<td><?php echo $row["vehical_type"]; ?></td>
												<td><?php echo $row["cus_fname"]; ?></td>
												<td><?php echo $row["ts_checkin"]; ?></td>		
												<td><?php echo $row["ts_checkout"]; ?></td>
												<td><?php echo $row["date"]; ?></td>
												<td><?php echo $row["ts_checkin_time"]; ?></td>		
												<td><?php echo $row["places_to_visit"]; ?></td>
												<td>
													<a class="remove" onclick="myFunction(<?php echo $row["transport_no"]; ?>)"   title="Remove This Transport request" id="myDiv1" value="<?php  $row["transport_no"] ?>" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:red;"></i></a></td>
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
												<th>Request ID</th>
												<th>Vehical</th>
												<th>Customer</th>
												<th>Tour Start Date</th>
												<th>Tour End Date</th>
												<th>Requested Date</th>
												<th>Pick up Time</th>
												<th>Places</th>
												<th>Action</th>
											</tr>
										</thead>

										<?php 
										
										$myrow =$obj ->view_transport_requestsS("transport_services_reservation",$key, $vehical_type);
										foreach($myrow as $row){ ?>
																
										<tbody>
											<tr>
												<td><?php echo $row["transport_no"]; ?></td>
												<td><?php echo $row["vehical_type"]; ?></td>
												<td><?php echo $row["cus_fname"]; ?></td>
												<td><?php echo $row["ts_checkin"]; ?></td>		
												<td><?php echo $row["ts_checkout"]; ?></td>
												<td><?php echo $row["date"]; ?></td>
												<td><?php echo $row["ts_checkin_time"]; ?></td>		
												<td><?php echo $row["places_to_visit"]; ?></td>
												<td>
													<a class="remove" onclick="myFunction(<?php echo $row["transport_no"]; ?>)"   title="Remove This Transport request" id="myDiv1" value="<?php  $row["transport_no"] ?>" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:red;"></i></a></td>
											</td>
											</tr>
										<?php } ?>
										</tbody>
									</table>

	<?php
} else if (isset($places_to_visit) && $places_to_visit =="") {
    ?>

    <table class="table table-striped table-bordered" id="example">
										<thead>
											<tr class="w3-light-grey">
												<th>Request ID</th>
												<th>Vehical</th>
												<th>Customer</th>
												<th>Tour Start Date</th>
												<th>Tour End Date</th>
												<th>Requested Date</th>
												<th>Pick up Time</th>
												<th>Places</th>
												<th>Action</th>
											</tr>
										</thead>

										<?php 
										
										$myrow =$obj ->view_transport_requests("transport_services_reservation");
										foreach($myrow as $row){ ?>
																
										<tbody>
											<tr>
												<td><?php echo $row["transport_no"]; ?></td>
												<td><?php echo $row["vehical_type"]; ?></td>
												<td><?php echo $row["cus_fname"]; ?></td>
												<td><?php echo $row["ts_checkin"]; ?></td>		
												<td><?php echo $row["ts_checkout"]; ?></td>
												<td><?php echo $row["date"]; ?></td>
												<td><?php echo $row["ts_checkin_time"]; ?></td>		
												<td><?php echo $row["places_to_visit"]; ?></td>
												<td>
													<a class="remove" onclick="myFunction(<?php echo $row["transport_no"]; ?>)"   title="Remove This Transport request" id="myDiv1" value="<?php  $row["transport_no"] ?>" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:red;"></i></a></td>
											</td>
											</tr>
										<?php } ?>
										</tbody>
									</table>
            <?php
        } else if (isset($places_to_visit) && $places_to_visit !="") {
            ?>

    <table class="table table-striped table-bordered" id="example">
										<thead>
											<tr class="w3-light-grey">
												<th>Request ID</th>
												<th>Vehical</th>
												<th>Customer</th>
												<th>Tour Start Date</th>
												<th>Tour End Date</th>
												<th>Requested Date</th>
												<th>Pick up Time</th>
												<th>Places</th>
												<th>Action</th>
											</tr>
										</thead>

										<?php 
										
										$myrow =$obj ->view_transport_requestsS("transport_services_reservation",$key, $places_to_visit);
										foreach($myrow as $row){ ?>
																
										<tbody>
											<tr>
												<td><?php echo $row["transport_no"]; ?></td>
												<td><?php echo $row["vehical_type"]; ?></td>
												<td><?php echo $row["cus_fname"]; ?></td>
												<td><?php echo $row["ts_checkin"]; ?></td>		
												<td><?php echo $row["ts_checkout"]; ?></td>
												<td><?php echo $row["date"]; ?></td>
												<td><?php echo $row["ts_checkin_time"]; ?></td>		
												<td><?php echo $row["places_to_visit"]; ?></td>
												<td>
													<a class="remove" onclick="myFunction(<?php echo $row["transport_no"]; ?>)"   title="Remove This Transport request" id="myDiv1" value="<?php  $row["transport_no"] ?>" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:red;"></i></a></td>
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
            window.location = 'account_staff.php';
        }

        //romove transport
        function myFunction(x) {
            if (confirm('Are you sure to remove this tour plan')) {
                var number = x;
                $("#myDiv1").load('config/system_user.php', {selectedButtonValue105: number});
            }
        }

    </script>

</body>