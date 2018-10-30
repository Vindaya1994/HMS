
<?php include_once './config/system_user.php'; ?>
<!DOCTYPE html>

<html lang="en">
    
    <head>
		<?php include_once 'headers/header.php';
		 ?>
		
        <!-- css to the relevant page  -->
       
		<style>
		</style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>     
    </head>

 
	<body class="w3-white" >
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
							<li class="active"><span class="last">Message</span></li>
							
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
                        
                        <?php
                        $promotion_no = $_REQUEST['promotion_no'];

                        $myrow =$obj ->viewpromotion($promotion_no);
						foreach($myrow as $row1){ ?>

                        
                    	<div class="w3-card-4 w3-col s12 "style="padding-left:16px; margin-bottom:40px">
							<div class="w3-container w3-padding ">
								<div class="row  w3-xxxlarge " style="padding-left:16px"><img src="assets/img/sms/sendsms1.png" style="width:15%">&nbsp;&nbsp;</i> SEND MESSAGE </div>
							</div>
                            <div class="w3-container w3-col s3 "></div>
							<div class="w3-container w3-col s6">
                            <?php $myrow =$obj ->viewDetails("customer");
                                    foreach($myrow as $row){ ?>
                                <form   id="send-msg-form" method="post" action="config/system_user.php" enctype="multipart/form-data">
                                  
                                    <input type="hidden" name="id" id="id" />
											  
                                    <div class="w3-full w3-padding">      
                                        <input class="w3-input w3-border" name="mobile" type="text" placeholder="Phone Number"  id="mobile" value="<?php echo $row['mobile']?>"></div>
                                    <div class="w3-full w3-padding">      
                                        <textarea class="w3-input w3-border" name="message" type="text" placeholder="Message"  id="message" rows="6" cols="40">TENTH HOTEL ELLA, <?php echo  $row1['prm_caption']?> visit www.tenthhotel.com for more details  </textarea></div>
                                       
								
                                    <div class="w3-row-padding w3-margin-bottom">	
                                        <div class="w3-half">
                                            <input type="submit" class="w3-btn w3-green w3-block " name="send-msg-btn1" value="Send message">
                                        </div> 
                                        <div class="w3-half">
                                            <input type="reset" class="w3-btn w3-red w3-block " name="msg-cancel" value="Cancel">
                                        </div>								
                                    </div>
                                                                    
                                </form>
                                <?php } ?>
								
                                																	
									
							</div>
						</div>
                        
						 
                        <?php } ?>    
                            
						<!--*******************************************************************end my coding******************************************************************************************************************-->


						
				</div>
			</div> 
		</div> 	
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
			

		
		</script>


	</body>
</html>
