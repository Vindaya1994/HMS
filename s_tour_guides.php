
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
            function s_tour_guide_search() {

                var xhr = new XMLHttpRequest();
                var tour_guide = document.getElementById("tour_guide").value;


                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4) {

                        document.getElementById("s_tg_search").innerHTML = xhr.responseText;

                    }
                }
                xhr.open("GET", "s_tour_guides_search.php?tour_guide=" + tour_guide, true);

                xhr.send(null);
                return false;

            }

        </script>
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
                            <li class="active"><span class="last">Tour Guides</span></li>

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
                                <div class="row  w3-xxxlarge " style="padding-left:16px"><img src="images/tg.jpg" style="width:15%">&nbsp;&nbsp;</i> Tour Guides </div>
                            </div>

                            <div class="w3-container w3">
                                <form  action="GET" id="form">

                                    <div class="row  w3-margin" >
                                        <button  class="w3-btn w3-block w3-green  col-md-3" type="button" onClick= "window.location.href = 's_tour_guide_add.php';" ><i class="fa fa-plus"></i>&nbsp;Add New Tour Guides</button>
                                    </div>



                                    <div class="row  w3-margin "style="margin-top:0px">
                                        <div class="w3-col s2 w3-centre ">
                                            <h5 class="" style="margin-top:0px"><em class="fa fa-search" style="font-size:30px"></em><b>Search By :</b></h5>
                                        </div>
                                        <div class="w3-col s3 "style="margin-left:22px">
                                            <input class="w3-input w3-border " name="first" type="text" placeholder="Tour Guide" id="tour_guide" onkeyup="s_tour_guide_search()";>
                                        </div>

                                    </div>
                                </form>


                                <div class="row  w3-margin" id="s_tg_search">
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
											<?php	$id= $row["tg_id"];		?>

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
                                                        <a href="s_tour_guide_update.php?id=<?php echo $id;?>" class="openModal1" ><i class="fa fa-pencil" style="font-size:20px;color:blue;" ></i></a>&nbsp; 
													
                                                        <a class="remove" onclick="myFunction(<?php echo $row["tg_id"]; ?>)"   title="Remove This Tour Guide" id="myDiv1" value="<?php $row["tg_id"] ?>" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;color:red;"></i></a></td>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>	
                            </div>
                        </div>

                        <div class="row  w3-margin" >
                            <button  class="w3-btn w3-block w3-green  col-md-3" type="button" onClick= "window.location.href = 's_tour_guide_request.php';" >&nbsp;View Requested Tour Guides</button>
                        </div>

                        <!--edt model-->
                        <div  class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content" id="">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-pencil"></i> Update Customer Details</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" id="form2" action="config/updateBookCat.php" >
                                            <div id="modal-content">
                                                <!--customer details update form-->
                                                <div class="container " style="width:600px">
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="fname"  placeholder="Enter first name" id="fname"  >
                                                        <span class="error_form" id="fname_error_message"> </span>
                                                    </div>
                                                    <br><br>                  
                                                    <div class="col-sm-10"> 
                                                        <input type="text" class="form-control" name="lname"  placeholder="Enter last name" id="lname">
                                                    </div>
                                                    <br><br>
                                                    <div class="col-sm-10"> 
                                                        <input  type="date" class="form-control" name="birthdate" placeholder="Enter date of birth"  id="birthdate">
                                                    </div>
                                                    <br><br>
                                                    <div class="col-sm-10"> 
                                                        <input type="text" class="form-control" name="country"  placeholder="Enter country" id="country">
                                                    </div>
                                                    <br><br>	
                                                    <div class="col-sm-10"> 
                                                        <input type="text" class="form-control" name="email"   placeholder="Enter email" id ="email">
                                                    </div>
                                                    <br><br>
                                                    <div class="col-sm-10"> 
                                                        <input type="text" class="form-control" name="contactno" placeholder="Enter conatact number" id="contactno">
                                                    </div>	
                                                </div> 
                                                <!--end-->
                                            </div> 
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="w3-btn  w3-red w3-margin-bottom w3-padding" data-dismiss="modal">Close</button>
                                        <input type="submit" class="w3-btn  w3-green w3-margin-bottom w3-padding" id="update" value="Update" name="update" onClick="click1()">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
<!--end model-->
<!--*******************************************************************end my coding******************************************************************************************************************-->



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


                //romove tour guide
                function myFunction(x) {
                    if (confirm('Are you sure to remove this tour guide')) {
                        var number = x;
                        $("#myDiv1").load('config/system_user.php', {selectedButtonValue101: number});
                    }
                }

            </script>


    </body>
</html>
