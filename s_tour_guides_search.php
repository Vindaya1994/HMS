

<?php include_once './config/system_user.php'; ?>

<?php
if (isset($_GET["tour_guide"])) {
    $tour_guide = $_GET["tour_guide"];
    $key = "tg_name";
}

if (isset($tour_guide) && $tour_guide == "") {
    ?>
    <table class="table table-striped table-bordered" id="example">
        <thead>
            <tr class="w3-light-grey">
                <th>ID</th>
                <th>Name</th>
                <th>NIC</th>
                <th>Contact No</th>
                <th>Experience</th>
                <th>Languages</th>
                <th>Price per Hour(LKR)</th>
                <th>Action</th>
            </tr>
        </thead>

        <?php
        $myrow = $obj->view_tour_guides("tour_guide");
        foreach ($myrow as $row) {
            ?>

            <tbody>
                <tr>
                    <td><?php echo $row["tg_id"]; ?></td>
                    <td><?php echo $row["tg_name"]; ?></td>
                    <td><?php echo $row["NIC"]; ?></td>
                    <td><?php echo $row["contact_no"]; ?></td>		
                    <td><?php echo $row["experience"]; ?></td>
                    <td><?php echo $row["language"]; ?></td>
                    <td><?php echo $row["price_per_hour"]; ?></td>
                    <td>
                        <a class="remove" onclick="myFunction(<?php echo $row["tg_id"]; ?>)"   title="Remove This Tour Guide" id="myDiv1" value="<?php $row["tg_id"] ?>" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:red;"></i></a></td>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php
} else if (isset($tour_guide) && $tour_guide != "") {
    ?>

    <table class="table table-striped table-bordered" id="example">
        <thead>
            <tr class="w3-light-grey">
                <th>ID</th>
                <th>Name</th>
                <th>NIC</th>
                <th>Contact No</th>
                <th>Experience</th>
                <th>Languages</th>
                <th>Price per Hour(LKR)</th>
                <th>Action</th>
            </tr>
        </thead>

        <?php
        $myrow = $obj->view_tour_guides_search("tour_guide", $key, $tour_guide);
        foreach ($myrow as $row) {
            ?>


            <tbody>
                <tr>
                    <td><?php echo $row["tg_id"]; ?></td>
                    <td><?php echo $row["tg_name"]; ?></td>
                    <td><?php echo $row["NIC"]; ?></td>
                    <td><?php echo $row["contact_no"]; ?></td>		
                    <td><?php echo $row["experience"]; ?></td>
                    <td><?php echo $row["language"]; ?></td>
                    <td><?php echo $row["price_per_hour"]; ?></td>
                    <td>
                        <a class="remove" onclick="myFunction(<?php echo $row["tg_id"]; ?>)"   title="Remove This Tour Guide" id="myDiv1" value="<?php $row["tg_id"] ?>" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:red;"></i></a></td>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php }
?>

<body>
    <script>


        //open home page
        function openIndexWin() {
            window.location = 'account_staff.php';
        }


        //romove tour guide
        function myFunction(x) {
            if (confirm('Are you sure to remove this tour guide')) {
                var number = x;
                $("#myDiv1").load('config/system_user.php', {selectedButtonValue101: number});
            }
        }

    </script>
</body>