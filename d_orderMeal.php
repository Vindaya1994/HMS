<?php
include_once '/config/customer.php';
include_once 'config/establishment_type.php';
?>
<!doctype html>
<html>
    <head>
    <?php include_once 'headers/header.php' ?>
    <link rel="stylesheet" href="assets/css/main.css" >
    <link rel="stylesheet" href="assets/css/restaurant.css" >
    <style> </style>
    
    	
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
function showReservationDetails(str)
{
if (str=="")
  {
  document.getElementById("txtHint1").innerHTML="";
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
    document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","config/dgetReservationDetails.php?p="+str,true);
xmlhttp.send();
}
</script>
    </head>
    <body class="w3-white" >
    <!-- Page header -->
		<header>
            <?php
                if(isset($_SESSION['uid'])) {
                    include_once './navigations/nav2.php';
                }else{
                    include_once './navigations/nav1.php';	
                }
            ?>	
		</header>

		<!--*************************************************************content*************************************************************-->

<div class="site-main container"style="margin-top:90px;margin-bottom:30px;">
    <div class="section-page-heading row  ">
		<div class="breadcrumb-leftnav-wrapper ">
			<div class="col-md-12 col-lg-10 col-lg-offset-1 ">
				<ul class="breadcrumb">
					<li><a href="index.php" title="The Tenth Hotel" class="bolds">Home</a><span class="sep"></span></li>
					<li class="active"><span class="last">Dining</span></li>
					<li class="active"><span class="last">Order Meal</span></li>
				</ul>
				<div class="breadcrumb-contacts">
					<a class="tellink" href="tel:+94 572 226 220">Tel :+94 572 226 220</a> 
					<a href="contact_us.php">Contact Us</a>
				</div>
			</div> 
		</div>
		<div class="col-md-12 col-lg-10 col-lg-offset-1">
			<hr>
		</div>
	</div> 		
  
	<div class="section-page-content row"style="">
		<div class="col-md-12 col-lg-10 col-lg-offset-1 w3-display-container "style="">
			<div class="     "style="width:100%; height:auto;" >
				<div class="w3-container">
					<div class="w3-card-4">
              <div class="w3-container w3-margin  w3-center w3-green"style="padding-bottom:10px;">
                <img src="assets/img/dinning/meal/order1.png"style="width:30%; height:30%;">
                <h1 ><span class=""style="font-size: 11px;">Dining</span><br>Order Meal </h1>
              </div>
								
              <form class="w3-container" action="config/customer.php" method="post" id="meal-order-form">

              <input type="hidden"  name="cus_id" value="<?php echo $_SESSION['cus_id'] ?>">

              <div class="w3-row-padding w3-margin-bottom">
							  <div class="w3-half">	
									<input class="w3-input" name="cus_name" type="text" value="<?php echo $_SESSION['fname']." ".$_SESSION['lname'] 	?>" disabled>
										<label>Customer Name</label>  </div>
								<div class="w3-half">
									<input class="w3-input" name="cus_email" type="text"value="<?php echo $_SESSION['email'] 	?>">
							 	    <label>Customer Email</label>	</div>  
							</div>

              <div class="w3-row-padding w3-margin-bottom">
									<div class="w3-half">
										<select class="w3-select" name="eType" id="eType" >
											<option value="" disabled selected>Select establishment type</option>
											<?php
													$myrow =$obje ->getEstablishment_type('establishment_type');
													foreach($myrow as $row){
													echo "<option value='". $row['e_id'] ."'>" . $row['e_type'] . "</option>";
													}
											?>
										</select></div>	
									<div class="w3-half">	
										<select class="w3-select" name="meal" id="meal" onchange="showMealDetails(this.value)" required >
											<option value=""disabled selected>select a meal</option>
												<?php
													$myrow =$obj ->meal('meal');
													foreach($myrow as $row){
													echo "<option data-parent='". $row['e_id'] ."' value='". $row['meal_id'] ."'>" . $row['meal_name'] . "</option>";
													}
												?> 
										</select></div>     
								</div>
                <div id="txtHint">							
									<div class="w3-row-padding"  >
										<div class="w3-col w3-border-right"style="margin-left:3%;width:45%;height:200px;background: url(assets/img/dinning/meal/mealicon2.png) center">
																		
										</div>
										<div class="w3-col-6"style="width:50%;height:200px;">
											<p></p>							 
										</div>
									</div>
								</div>		

                                <div class="w3-row-padding w3-margin-bottom">                    
                                    <div class="w3-half w3-tooltip" >
                                    <span style="position:absolute;left:15%;top:70%" class="w3-text  w3-round  w3-pale-green w3-padding">Date on order to be delivered</span>				
								
                                        <input class="w3-input" name="order_deli_date" type="date" min="<?php echo date('Y-m-d');?> " max=""  onchange="showReservationDetails(this.value)">
                                            <label>Date</label> </div>	
                                    <div class="w3-half w3-tooltip" id="txtHint1">				
                                        <select class="w3-select" name="room_no" id="room_no" required>
                                            <option value="" disabled selected>select your room no </option>
                                        </select>
                                        <span style="position:absolute;left:100%;top:-10%;padding-top:3%;padding-left:2%" class="w3-text  w3-round w3-pale-green w3-center"><strong>My Reservations</strong>
											<table class="w3-table"><tr>	<th>Checkin date</th>			<th>Checkout date</th>		<th>Room No</th></tr>			
											<?php
													$cus_id=$_SESSION['cus_id'];
													$myrow =$obj ->showMyReservations('reservation',$cus_id);
													foreach($myrow as $row){
													echo "<tr>	<td>".$row['checkin']."</td>	<td>".$row['checkout']."</td>		<td>".$row['room_no']."</td> </tr>";
													}
												?>
											</table>
										</span>
                                        </div>    
                                </div> 

                                <div class="w3-row-padding w3-margin-bottom">
                                    <div class="w3-half">
                                        <input class="w3-input" name="quantity" type="number" min="1" max="41"required>
                                                <label>Quantity</label></div>
                                    <div class="w3-half">
                                        <input class="w3-input" name="order_deli_time" type="time" required>
                                                <label>Time</label>	 </div>
							    </div>

                                <div class="w3-row-padding w3-margin-bottom" style="padding:10px;">
								     <div class="w3-half">
											<input type="submit" class="w3-btn w3-green w3-block " name="order-meal" value="Order">
                     
								        <!--<button class="w3-btn w3-green" name="order-meal" type="submit">Oder</button> --> </div>
									<div class="w3-half">
											<input type="reset" class="w3-btn w3-red w3-block " name="order-meal" value="Cancel">
                  
								       <!-- <button class="w3-btn w3-red" name="order-meal-cancel"  >Cancel</button>-->	</div>
								</div>
                                </form>    
                            </div>       
                         </div>
				    </div>
			    </div>
		    </div>
	    </div>
</div>

<!--***********************************************************************************************-->
<footer>
<?php
				if(isset($_SESSION['uid'])) {
					include_once './footers/footer2.php';

				}else{
					include_once './footers/footer1.php';
				}
			?>	
</footer>

  <script>
  $('#eType').change(function() {
          var parent = $(this).val();
          $('#meal').children().each(function() {
            if($(this).data('parent') != parent) {
                  $(this).hide();
            } else    $(this).show();
          });
  });

 
  </script>

</body>
</html>