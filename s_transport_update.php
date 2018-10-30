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



        <!-- Page header -->
        <header>
            <?php
            if ($_SESSION['utype'] == '2') {
                include_once './navigations/nav3.php';
            } else if ($_SESSION['utype'] == '3') {
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
                            <li class="active"><span class="last">Transport Services</span></li>
                            <li class="active"><span class="last">Update Transport Services</span></li>

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
                        <!--my coding here-->
                        <div class="container no-padding">
                            <div class="row">



                                <?php
                                if (isset($_GET["id"])) {
                                    $id = $_GET["id"];
                                }


                                $myrow = $obj->UTransport_search($id);

                                foreach ($myrow as $row) {
                                    $vehical_type  = $row["vehical_type"];
                                    $no_of_passangers = $row["no_of_passangers"];
                                    $price_per_km = $row["price_per_km"];
                                    
                                }
                                ?>



                                <div class="container" >
                                    <div class="w3-row">
                                        <div class=" w3-col s12 w3-margin">
                                            <div class="w3-card-4 w3-col s12 w3-margin">			
                                                <div class="w3-container w3-padding ">	
                                                <!--<div class="row  w3-xxxlarge " style="padding-left:16px"><img src="img/Fast-Food-icon.png" style="width:15%">&nbsp;&nbsp;</i> Meal List </div>-->
                                                    <div class="row w3-margin w3-xxlarge "><img src="images/transport.png" style="width:21%">&nbsp;</i> Update Transport services</div>
                                                </div>
                                                <div class="w3-container w3">
                                                    <form   id="s_transport_add" method="post" action="./config/system_user.php" enctype="multipart/form-data">


                                                        <div class="w3-padding">      
																<input class="w3-input w3-border" name="vehical_type" type="text" placeholder=" Vehical Type" id="type" onkeyup="validatetype()" 
																required value="<?php echo $vehical_type; ?>">
																<span class="error_form" id="vehical_type"></span> 
														</div>

                                                        <div class=" w3-padding">      
																<input class="w3-input w3-border" name="no_of_passangers" type="text" placeholder="No of passengers" id="number" onkeyup="validatepassen()" 
																required value="<?php echo $no_of_passangers;?>">
																<span class="error_form" id="no_of_passangers"></span> 
														</div>

                                                         <div class="w3-padding">
																<input class="w3-input w3-border" name="price_per_km" type="text" placeholder="Price per KM(LKR)" id="price" onkeyup="validateprice()" 
																required value="<?php echo $price_per_km; ?>">
																<span class="error_form" id="price_per_km"></span> 
														</div>

                                                        
                                                        <div class="w3-padding" hidden>
                                                            <input class="w3-input w3-border" name="vehical_id" type="text" placeholder="id" value="<?php echo $id; ?>">
                                                            <span class="error_form" id="vehical_id"></span> 
                                                        </div>


                                                        <div class="w3-padding">									
                                                            <button class="btn w3-green" name="transport_update" type="submit" style="width:900px">Update Transport sevice</button>
                                                            <button class="btn w3-red" name="transport_reset" type="reset" style="width:900px">Reset</button>
                                                        </div>

                                                    </form>
                                                </div>		
                                            </div>							
                                        </div> 
                                    </div>
                                </div>    
                            </div>
                        </div>           
                    </div>
                </div>
                <!--end my coding-->


            </div>
        </div> 
    </div> 	
    <!--*******************************************************************************End of content***********************************************************************************-->

    <footer>
<?php
if ($_SESSION['utype'] == '2') {
    include_once './footers/footer3.php';
} else if ($_SESSION['utype'] == '3') {
    include_once './footers/footer4.php';
}
?>	
    </footer>

    <!--java script-->
    <script>


        //open home page
        function openIndexWin() {
            window.location = 'account_staff.php';
        }

        //fuction for sub drop down
        $(document).ready(function () {
            $('.dropdown-submenu a.test').on("click", function (e) {
                $(this).next('ul').toggle();
                e.stopPropagation();
                e.preventDefault();
            });
        });

    </script>
</body>
</html>



