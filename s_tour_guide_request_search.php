

<?php include_once './config/system_user.php'; ?>

<?php
if (isset($_GET["tour_guide"])) {
    $tour_guide = $_GET["tour_guide"];
    $key = "tg_name";
}

if (isset($_GET["tour_date"])) {
    $tour_date = $_GET["tour_date"];
    $key = "tg_checkin";
}



if (isset($tour_guide) && $tour_guide == "") {
    ?>
    <table class="table table-striped table-bordered" id="example">
        <thead>
            <tr class="w3-light-grey">
                <th>Request ID</th>
                <th>Tour Guide </th>
                <th>Customer </th>
                <th>Tour Start Date</th>
                <th>Tour End Date</th>
                <th>Places</th>
                <th>Pick Up Time</th>
                <th>Requested Date</th>
                <th>Action</th>
            </tr>
        </thead>

        <?php
        $myrow = $obj->view_tour_guide_requests("tour_guide_reservation");
        foreach ($myrow as $row) {
            ?>

            <tbody>
                <tr>
                    <td><?php echo $row["tour_guide_no"]; ?></td>
                    <td><?php echo $row["tg_name"]; ?></td>
                    <td><?php echo $row["cus_fname"]; ?></td>
                    <td><?php echo $row["tg_checkin"]; ?></td>		
                    <td><?php echo $row["tg_checkout"]; ?></td>
                    <td><?php echo $row["places_to_visit"]; ?></td>
                    <td><?php echo $row["tg_checkin_time"]; ?></td>
                    <td><?php echo $row["date"]; ?></td>
                    <td>
                        <a class="remove" onclick="myFunction(<?php echo $row["tour_guide_no"]; ?>)"   title="Remove This Tour Guide" id="myDiv1" value="<?php $row["tour_guide_no"] ?>" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:red;"></i></a></td>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php
} else if (isset($tour_guide) && $tour_guide !="") {
    ?>

    <table class="table table-striped table-bordered" id="example">
        <thead>
            <tr class="w3-light-grey">
                <th>Request ID</th>
                <th>Tour Guide </th>
                <th>Customer </th>
                <th>Tour Start Date</th>
                <th>Tour End Date</th>
                <th>Places</th>
                <th>Pick Up Time</th>
                <th>Requested Date</th>
                <th>Action</th>
            </tr>
        </thead>

    <?php
    $myrow = $obj->view_tour_guide_requestsS("tour_guide_reservation", $key, $tour_guide);
    foreach ($myrow as $row) {
        ?>
            <tbody>
                <tr>
                    <td><?php echo $row["tour_guide_no"]; ?></td>
                    <td><?php echo $row["tg_name"]; ?></td>
                    <td><?php echo $row["cus_fname"]; ?></td>
                    <td><?php echo $row["tg_checkin"]; ?></td>		
                    <td><?php echo $row["tg_checkout"]; ?></td>
                    <td><?php echo $row["places_to_visit"]; ?></td>
                    <td><?php echo $row["tg_checkin_time"]; ?></td>
                    <td><?php echo $row["date"]; ?></td>
                    <td>
                        <a class="remove" onclick="myFunction(<?php echo $row["tour_guide_no"]; ?>)"   title="Remove This Tour Guide" id="myDiv1" value="<?php $row["tour_guide_no"] ?>" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:red;"></i></a></td>
                    </td>
                </tr>
    <?php } ?>
        </tbody>
    </table>
    <?php
} else if (isset($tour_date) && $tour_date =="") {
    ?>

    <table class="table table-striped table-bordered" id="example">
        <thead>
            <tr class="w3-light-grey">
                <th>Request ID</th>
                <th>Tour Guide </th>
                <th>Customer </th>
                <th>Tour Start Date</th>
                <th>Tour End Date</th>
                <th>Places</th>
                <th>Pick Up Time</th>
                <th>Requested Date</th>
                <th>Action</th>
            </tr>
        </thead>

    <?php
    $myrow = $obj->view_tour_guide_requests("tour_guide_reservation");
    foreach ($myrow as $row) {
        ?>

            <tbody>
                <tr>
                    <td><?php echo $row["tour_guide_no"]; ?></td>
                    <td><?php echo $row["tg_name"]; ?></td>
                    <td><?php echo $row["cus_fname"]; ?></td>
                    <td><?php echo $row["tg_checkin"]; ?></td>		
                    <td><?php echo $row["tg_checkout"]; ?></td>
                    <td><?php echo $row["places_to_visit"]; ?></td>
                    <td><?php echo $row["tg_checkin_time"]; ?></td>
                    <td><?php echo $row["date"]; ?></td>
                    <td>
                        <a class="remove" onclick="myFunction(<?php echo $row["tour_guide_no"]; ?>)"   title="Remove This Tour Guide" id="myDiv1" value="<?php $row["tour_guide_no"] ?>" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:red;"></i></a></td>
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
                <th>Tour Guide </th>
                <th>Customer </th>
                <th>Tour Start Date</th>
                <th>Tour End Date</th>
                <th>Places</th>
                <th>Pick Up Time</th>
                <th>Requested Date</th>
                <th>Action</th>
            </tr>
        </thead>

    <?php
    $myrow = $obj->view_tour_guide_requestsS("tour_guide_reservation", $key, $tour_date);
    foreach ($myrow as $row) {
        ?>
            <tbody>
                <tr>
                    <td><?php echo $row["tour_guide_no"]; ?></td>
                    <td><?php echo $row["tg_name"]; ?></td>
                    <td><?php echo $row["cus_fname"]; ?></td>
                    <td><?php echo $row["tg_checkin"]; ?></td>		
                    <td><?php echo $row["tg_checkout"]; ?></td>
                    <td><?php echo $row["places_to_visit"]; ?></td>
                    <td><?php echo $row["tg_checkin_time"]; ?></td>
                    <td><?php echo $row["date"]; ?></td>
                    <td>
                        <a class="remove" onclick="myFunction(<?php echo $row["tour_guide_no"]; ?>)"   title="Remove This Tour Guide" id="myDiv1" value="<?php $row["tour_guide_no"] ?>" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:red;"></i></a></td>
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