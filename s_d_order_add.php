<?php
  /* 
	function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
	*/
	
?>

<?php include_once './config/system_user.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<?php include_once 'headers/header.php'; ?>
		
	    <!-- css to the relevant page  -->
    	<style>	</style>
        <script>
function showMealDetails(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","config/dgetMealDetails.php?q="+str,true);
xmlhttp.send();
}
</script>    
 <script>
function showcustomerEmail(str)
{
if (str=="")
  {
  document.getElementById("txtHint2").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint2").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","config/dgetcustomerEmail.php?r="+str,true);
xmlhttp.send();
}
</script>        
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
		<div class="site-main container" style="margin-bottom:40px">
			<div class="section-page-heading row  ">
				<div class="breadcrumb-leftnav-wrapper ">
					<div class="col-md-12 col-lg-10 col-lg-offset-1 ">
						<ul class="breadcrumb">
							<li><a href="index.php" title="The Tenth Hotel" class="bolds">Home</a><span class="sep"></span></li>
							<li class="active"><span class="last">Meals</span></li>
							
						</ul>
						<div class="breadcrumb-contacts">
							<a class="tellink" href="tel:+94 572 226 220">Tel :+94 572 226 220</a> 
							<a href="contact_us.php">Contact Us</a>
						</div>
					</div>
					<div class="col-md-12 col-lg-10 col-lg-offset-1">
                        <hr>
                        <h1>THE TENTH HOTEL
                        <span>ELLA , SRI LANKA</span>
                        </h1>
				    </div>		
				</div> 
			</div>	
			<!--****************************************************************my content here*****************************************************************************-->
					
			<div class="section-page-content row">
				<div class="col-lg-10 col-lg-offset-1 w3-white">
				<div class="w3-card-4 w3-col s12 w3-margin">
					<div class="w3-margin">			
						<div class="w3-container w3-padding ">
							<a href="s_d_orders.php"><i style="font-size:24px" class="w3-button w3-margin w3-display-topright fa">&#xf00d;</i></a>
							
							<div class="row w3-margin w3-xxxlarge "><img src="assets/img/dinning/admin/food1.png" style="width:21%">&nbsp;</i>Add New Order </div>
						</div>
						<div class="w3-container w3-col ">
							<form   id="add_meal" method="post" action="config/system_user.php" enctype="multipart/form-data">
                                <div class="w3-half w3-padding">      
								    <select class="w3-select w3-border " name="cus_id" id="customer" onchange="showcustomerEmail(this.value)">
                                        <option value="" disabled selected>Choose customer  </option>
											<?php $myrow =$obj ->viewDetails("customer");
												foreach($myrow as $row){               
                                                    echo "<option value='". $row['cus_id'] ."'>" . $row['cus_fname'] ." ". $row['cus_lname'] . "</option>";
											} ?>  
                                    </select>  </div>
                                <div class="w3-half w3-padding" id="txtHint2" >      
                                    <input class="w3-input w3-border" name="cus_email" type="text"value="" placeholder="Customer email"></div>
							 	<div class="w3-padding">
									<select class="w3-select w3-border" name="eType" data-validation="required" data-validation-error-msg="Please Select a Category" id="eType">
										<option value=""  selected>---Select establishment type---</option>
                                        <?php
											$myrow =$obj ->viewDetails("establishment_type");
											foreach($myrow as $row){
											echo "<option value='". $row['e_id'] ."'>" . $row['e_type'] . "</option>";
											}
										?>
										</select></div>
                                        <div class="w3-padding">
									
                                    <select class="w3-select w3-border" name="meal" id="meal" onchange="showMealDetails(this.value)" required >
									
                                    	<option value=""  selected>---Select a meal---</option>
                                        <?php
											$myrow =$obj ->viewDetails("meal");
											foreach($myrow as $row){
											echo "<option data-parent='". $row['e_id'] ."' value='". $row['meal_id'] ."'>" . $row['meal_name'] . "</option>";
											}
										?>
										</select></div>        
                                        <div id="txtHint">							
									<div class="w3-row-padding"  >
										<div class="w3-col w3-border-right"style="margin-left:3%;width:45%;height:200px;background: url(assets/img/dinning/meal/mealicon2.png) center">
																		
										</div>
										<div class="w3-col-6"style="width:50%;height:200px;">
											<p></p>							 
										</div>
									</div>
								</div>	
								<div class="w3-padding w3-half ">
                                    <input class="w3-input w3-border" name="order_deli_date" type="date" min="<?php echo date('Y-m-d');?> " max=""  ></div>
                                <div class="w3-half w3-padding ">                      
                                    <select class="w3-select w3-border" name="room_no" id="room_no"  required>
                                        <option value="" disabled selected>select your room no </option>
                                        <?php
											$myrow =$obj ->viewDetails("reservation");
											foreach($myrow as $row){
											echo "<option data-parent='". $row['cus_id'] ."' value='". $row['room_no'] ."'>" . $row['room_no'] . "</option>";
											}
										?>
                                    </select> </div>
                                <div class="w3-padding w3-half ">
                                    <input class="w3-input w3-border" name="quantity" type="number" min="1" max="41" placeholder="Quantity" required></div>
                                          
                                <div class="w3-half w3-padding "> 
                                    <input class="w3-input w3-border" name="order_deli_time" type="time"  placeholder="Order Deliveery time"required>
                                </div>                     
                                                  
						</div>
								
								<div class="w3-row-padding w3-margin-bottom">	
									<div class="w3-half">
                                        <input type="submit" class="w3-btn w3-green w3-block " name="order-meal" value="Order">
                                    </div> 
									<div class="w3-half">
                                        <input type="reset" class="w3-btn w3-red w3-block " name="cancel-meal" value="Cancel">   
									</div>								
								</div>
																
							</form>
							<div id="result"></div>
																				
					</div> 
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
				window.location='index.php';
			}

			//fuction for sub drop down
			$(document).ready(function(){
				$('.dropdown-submenu a.test').on("click", function(e){
				$(this).next('ul').toggle();
				e.stopPropagation();
				e.preventDefault();
				});
			});


	
        </script>
        <script>
                $('#eType').change(function() {
                        var parent = $(this).val();
                        $('#meal').children().each(function() {
                            if($(this).data('parent') != parent) {
                                $(this).hide();
                            } else    $(this).show();
                        });
                });

                 $('#customer').change(function() {
                        var parent = $(this).val();
                        $('#room_no').children().each(function() {
                            if($(this).data('parent') != parent) {
                                $(this).hide();
                            } else    $(this).show();
                        });
                });

 
  </script>
	</body>
</html>
