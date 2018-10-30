<?php
session_start();
include_once 'customer.php';
$cus_id=$_SESSION['cus_id'];
$p=$_GET["p"];

  echo  "<select class='w3-select' name='room_no' id='room_no' >
         <option value='' disabled selected>select your room no </option>";
       $myrow =$obj ->showMyReservations1('reservation',$cus_id,$p);
       foreach($myrow as $row){
         
        echo "<option  value='". $row['room_no'] ."'>" . $row['room_no'] . "  </option>";
       
      }
      
  echo"</select>";
  //tooltip to show my reservations
  echo '<span style="position:absolute;left:100%;top:-10%;padding-top:3%;padding-left:2%" class="w3-text  w3-round w3-pale-green w3-center"><strong>My Reservations</strong>
											<table class="w3-table"><tr>	<th>Checkin date</th>			<th>Checkout date</th>		<th>Room No</th></tr>	';		
										
													$cus_id=$_SESSION['cus_id'];
													$myrow =$obj ->showMyReservations('reservation',$cus_id);
													foreach($myrow as $row){
													echo "<tr>	<td>".$row['checkin']."</td>	<td>".$row['checkout']."</td>		<td>".$row['room_no']."</td> </tr>";
													}
											
	echo '										</table>
										</span>  ';  
  
?> 