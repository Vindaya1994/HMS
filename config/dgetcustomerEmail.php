<?php
session_start();
include_once 'customer.php';

$r=$_GET["r"];

    
       $myrow =$obj ->viewCustomer('customer',$r);
       foreach($myrow as $row){
      
        echo "<input class='w3-input w3-border' name='cus_email' type='text' value='". $row['cus_email']."' placeholder='Customer email'> ";
       
      }
      
    
  
?> 