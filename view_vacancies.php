
	

<!DOCTYPE html>

<html lang="en">
    
    <head>
        <?php include_once'headers/header.php' ?>
        <!-- css to the relevant page  -->
       <?php






include_once './config/candidate.php';


?>
		<style>
			
			.jobimage{
				width:500px; 
				height:500px;	
			}
		</style>
    </head>

 
	<body class="w3-white" >
        <!-- Page header -->
		<header>
			<?php include_once'navigations/nav1.php' ?>	
		</header>


				<!--Slideshow Images related to the content of the page -->
				<div id="myslide">
					<!-- Automatic Slideshow Images -->
					<div id="slideht">
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="assets/img/vacancies/slide5.jpg" >
						</div>
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="assets/img/vacancies/slide2	.jpg" >
						</div>
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="assets/img/vacancies/slide3.jpg" >
						</div>
						<div class="mySlides w3-display-container w3-center">
							<img class="imgslider"src="assets/img/vacancies/slide1.jpg" >
						</div>
					</div>	
				</div>
			
<!--*************************************************************************************content***********************************************************************************-->
		<div class="site-main container">
			<div class="section-page-heading row  ">
				<div class="breadcrumb-leftnav-wrapper ">
					<div class="col-md-12 col-lg-10 col-lg-offset-1 ">
						<ul class="breadcrumb">
							<li><a href="index.php" title="The Tenth Hotel" class="bolds">Home</a><span class="sep"></span></li>
							<li class="active"><span class="last">Vacancies</span></li>
						</ul>
						<div class="breadcrumb-contacts">
							<a class="tellink" href="+94 572 226 220">Tel :+94 572 226 220</a> 
							<a href="contact_us.php">Contact Us</a>
						</div>
					</div> 
				</div> 
				<div class="col-md-12 col-lg-10 col-lg-offset-1">
				<hr>
					<h1><span>VACANCIES</span>
						VALUING YOUR TALENT
					</h1>
				</div>
				<div class="section-page-content row">
					<div class="col-lg-10 col-lg-offset-1">
						<p>Outstanding opportunities exit for enthusiastic and reliable individulas to join our professional
                        team at Tenth Hotel Ella. Whetheryou are experienced in hospitility sector ,or just strating out.
                        <br><br>
                        The selected cadidate expect an attractive remuneration package in accordance to industry standards.</p>

					</div>
				</div>
				<div class="section-page-content row">
					<?php
					$myrow =$obj ->view_vacancies("job_vacancy");
					foreach($myrow as $row){?>

					<div class="col-lg-10 col-lg-offset-1 w3-white">

						<!-- my codings for view vacancies-->
                        <div class="w3-row ">
                        
                            <!--job vacancies-->
                            <div class="w3-col m6 w3-black w3-left">
                            <img class="jobimage" src="<?php echo $row['job_image']?>"   >
                            </div>
                            <div class="w3-col m5 w3-white w3-border ">
                                <div class="w3-panel w3-light-grey w3-bottombar w3-border w3-hover-border-green w3-margin w3-padding-16" >
                                <h3><span class="glyphicon glyphicon-user w3-border"></span><?php echo  $row['position'] ?></h3>
                                <p>Tenth Hotel Ella Sri Lanaka<p>
                                <p>LKR <?php echo  $row['salary'] ?>  salary + Bonus</p>
                                <p><?php echo  $row['contract'] ?> </p>
                                <p><div class="w3-tag w3-xxlarge w3-orange">Available</div></p>
                                <br>
                                <?php echo  $row['job_description'] ?>
                                <br><br>
                                <button type="button" class="btn btn-info btn-lg w3-green" data-toggle="modal" data-target="#model1">Apply</button>
                                <br><br><br>

                                    <!-- Modal -->
                                    <div class="modal fade" id="model1" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="w3-row" style="font-family:Verdana; font-size: 0.8em;"
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title w3-border w3-margin w3-light-gray w3-padding">Candidate Application</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        

                                                        <!--candidate application-->
                                                        <form action="./config/candidate.php" id="jobvacancy-form" method="post" enctype="multipart/form-data" class="w3-container w3-card-4 w3-light-grey w3-text-green w3-margin">

                                                            <div class="w3-row w3-section">
                                                            <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
                                                                <div class="w3-rest">
                                                                <input class="w3-input w3-border" name="fullname" type="text" placeholder="Full Name" required>
                                                                </div>
                                                            </div>

                                                            <div class="w3-row w3-section">
                                                            <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-envelope-o"></i></div>
                                                                <div class="w3-rest">
                                                                <input class="w3-input w3-border" name="email" type="email" placeholder="Email" required>
                                                                </div>
                                                            </div>

                                                            <!--drop down for positions-->
                                                            <div class="w3-row w3-section">   
                                                            <select class="w3-select w3-border w3-padding w3-margin" name="type" required id="type">
                                                                
                                                                <option value="" disabled selected>Choose job position</option>       
                                                                <?php 
																	$myrow =$obj ->view_vacancies("job_vacancy");
																	foreach($myrow as $row){
																		echo "<option value='". $row['vac_id'] ."'>" . $row['position'] . "</option>";
																	}
                                                           		?>
                                                                
                                                            </select>
                                                            </div>

                                                            <!--upload cv-->
                                                            <div class="w3-row w3-section">
                                                            <div class="w3-col" style="width:50px"><i class=" w3-xxlarge glyphicon glyphicon-file"></i></div>
                                                                <div class="w3-rest">
                                                                <input type="file" name="fileToUpload" id="fileToUpload" class="w3-btn w3-block w3-green w3-padding-large">
																	<div class="w3-padding ">
																		<div id="cv uploading"></div>
																	</div>
                                                                </div>
                                                                <p>Upload your curriculum vitae here.</p>
                                                            </div>

															<button class="w3-block btn w3-green w3-text-black" name="apply" type="submit" value="SUBMIT"><b>Apply<b></button>
                                                            <button class="w3-block btn w3-red w3-text-black" name="apply-cancel" type="reset"><b>Cancel<b></button>
                                                                              
                                                        </form>
                                                        
                                                    </div>
                                                    <div class="modal-footer">
                                                        <p>We will contact you again regarding your application in due vacancy</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>                        
                            </div>
                            <br>
                        </div>
                        <!--End content-->
                            <?php }	?>	
				</div>
			</div> 
		</div> 	
<!--*******************************************************************************End of content***********************************************************************************-->
		
		<footer>
			<?php include_once'./footers/footer1.php'?>
		</footer>
   		
        <!--java script-->
        <script>
			// Automatic Slideshow - change image every 4 seconds
			var myIndex = 0;
			carousel();

			function carousel() {
				var i;
				var x = document.getElementsByClassName("mySlides");
				for (i = 0; i < x.length; i++) {
				x[i].style.display = "none";  
				}
				myIndex++;
				if (myIndex > x.length) {myIndex = 1}    
				x[myIndex-1].style.display = "block";  
				setTimeout(carousel, 4000);    
			}
			
			//open register form
			function openRegWin() {
				window.location='guest_register.php';
			}
			//open login form
			function openLogWin() {
				window.location='login.php';
			}

			/*check availability form*/
			function openAvailability() {
				window.location='availability.php';
			}



		</script>
	</body>
</html>
