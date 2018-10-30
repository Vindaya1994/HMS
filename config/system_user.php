<?php

//var_dump($_POST);
include "user.php";

//system user class
class system_user extends user{

    public $user_fname;
    public $user_lname;
    private $username;
    private $password;
    public $email;
    public $mobile;
    public $user_type ;
    public $user_email;
    public $salary;

    //setters
    public function setUserName($x){
        $this ->username =$x;
    }
    public function setPassword($y){
        $this ->pwd =$y;
    }

    //getters
    public function getUserName(){
        return $this ->username;
    } 
    public function getPassword(){
        return $this ->pwd;
    } 

    /********************************************************************************customer**************************************************** */
    public function view_customers($table){
        $sql ="SELECT *  FROM ".$table;
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }

    public function viewCustomer($table,$id){
        $sql ="SELECT *  FROM ".$table." WHERE cus_id='$id'";
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }

    public function view_customer_name($table,$field){
        $sql ="SELECT *  FROM customer WHERE cus_id=".$field;
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }


    public function addCustomer($fname,$lname,$dob,$country, $email,$mobile){
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $password1 = substr( str_shuffle( $chars ), 0, 8 );
        $password=md5($password1);

        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $username1 = substr( str_shuffle( $chars ), 0, 8 );
        
        $query2 = "INSERT INTO customer (cus_fname,cus_lname,dob,country,cus_email,mobile,username,password,tpassword,user_type) VALUES ('".$fname."','".$lname."','".$dob."','".$country."','".$email."','".$mobile."','".$username1."','".$password."','".$password1."','1')";
        
        $result2 = mysqli_query($this ->con,$query2);                                         
        if( $result2 > 0){    
           echo "<script type='text/javascript'>alert('You have successfully added a customer.');
            window.location='../s_customer_add.php';
            </script>";           
        }else{
            echo "<script type='text/javascript'>alert('Sorry! Unable add customer at this moment. Please try again shortly.');
            window.location='../s_customer_add.php';
            </script>";
        }  
    }

    public function edit($id){
        $sql ="SELECT *  FROM  customer WHERE cus_id=".$id;
        $result = mysqli_query($this ->con,$sql); 
        $row =mysqli_fetch_assoc($result);
        echo json_encode($row);     
    }

    public function updateCustomer($cus_id,$fname,$lname,$dob,$country, $email,$mobile){
        $sql ="UPDATE customer SET cus_fname='".$fname."', cus_lname='".$lname."', dob='".$dob."', country='".$country."',cus_email='".$email."', mobile='".$mobile."'  WHERE cus_id=".$cus_id;
        $result2 = mysqli_query($this ->con,$sql);                                         
        if( $result2 > 0){    
            echo "<script type='text/javascript'>alert('You have sucessfully update the customer details.');
            window.location='../s_customer.php';
            </script>";            
        }else{
            echo "<script type='text/javascript'>alert('Sorry! Unable update the customer deatails at this moment. Please try again shortly.');
            window.location='../s_customer.php';
            </script>";
        }      
    }

    public function removeCustomer($id){
        $sql ="DELETE  FROM  customer WHERE cus_id=".$id;
        $result = mysqli_query($this ->con,$sql); 
        if(mysqli_affected_rows($this ->con)==1){
            echo "<script type='text/javascript'>alert('You have removed the customer successfully.');
            window.location='s_customer.php';
            </script>"; 
        }else{ 
            echo "<script type='text/javascript'>alert('Sorry. Unable to remove this customer at this moment. Please try again shortly');
            window.location='../s_customer.php';    
            </script>";          
        }   
    }

    public function searchCustomer1($search){
        
        $output = '';
        $query = "SELECT * FROM customer WHERE cus_fname LIKE '%".$search."%'
        OR cus_id LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>CustomerId</th>
               <th>Customer Firstname</th>
               <th>Customer Lastname</th>
               <th>DOB</th>
               <th>Country</th>
               <th>Email</th>
               <th>Conatact Number</th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["cus_id"].'</td>
              <td>'.$row["cus_fname"].'</td>
              <td>'.$row["cus_lname"].'</td>
              <td>'.$row["dob"].'</td>
              <td>'.$row["country"].'</td>
              <td>'.$row["cus_email"].'</td>
              <td>'.$row["mobile"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
            echo 'Sorry! Not found matching data.';
        }     
    }

    public function searchCustomer2($search){
        
        $output = '';
        $query = "SELECT * FROM customer WHERE cus_fname LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>CustomerId</th>
               <th>Customer Firstname</th>
               <th>Customer Lastname</th>
               <th>DOB</th>
               <th>Country</th>
               <th>Email</th>
               <th>Conatact Number</th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["cus_id"].'</td>
              <td>'.$row["cus_fname"].'</td>
              <td>'.$row["cus_lname"].'</td>
              <td>'.$row["dob"].'</td>
              <td>'.$row["country"].'</td>
              <td>'.$row["cus_email"].'</td>
              <td>'.$row["mobile"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
            echo 'Sorry! Not found matching data.';
        }     
    }

    public function searchCustomer3($search){
        
        $output = '';
        $query = "SELECT * FROM customer WHERE cus_email LIKE '%".$search."%'
        OR cus_id LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>CustomerId</th>
               <th>Customer Firstname</th>
               <th>Customer Lastname</th>
               <th>DOB</th>
               <th>Country</th>
               <th>Email</th>
               <th>Conatact Number</th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["cus_id"].'</td>
              <td>'.$row["cus_fname"].'</td>
              <td>'.$row["cus_lname"].'</td>
              <td>'.$row["dob"].'</td>
              <td>'.$row["country"].'</td>
              <td>'.$row["cus_email"].'</td>
              <td>'.$row["mobile"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
            echo 'Sorry! Not found matching data.';
        }     
    }

    public function searchCustomer4($search){
        
        $output = '';
        $query = "SELECT * FROM customer WHERE country LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>CustomerId</th>
               <th>Customer Firstname</th>
               <th>Customer Lastname</th>
               <th>DOB</th>
               <th>Country</th>
               <th>Email</th>
               <th>Conatact Number</th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["cus_id"].'</td>
              <td>'.$row["cus_fname"].'</td>
              <td>'.$row["cus_lname"].'</td>
              <td>'.$row["dob"].'</td>
              <td>'.$row["country"].'</td>
              <td>'.$row["cus_email"].'</td>
              <td>'.$row["mobile"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
            echo 'Sorry! Not found matching data.';
        }     
    }
    
    /*******************************************************************rooms*********************************************************************** */
    public function view_rooms($table){
        $sql ="SELECT *  FROM ".$table;
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }

    public function addRoom($cat_id){
        
        $query2 = "INSERT INTO rooms (cat_id) VALUES ('".$cat_id."')";
        $result2 = mysqli_query($this ->con,$query2);                                         
        if( $result2 > 0){    
            echo "<script type='text/javascript'>alert('You have successfully added a new room.');
            window.location='../s_room_add.php';
            </script>";           
        }else{
            echo "<script type='text/javascript'>alert('Soryy! The room yor are trying to add is already exsists.');
            window.location='../s_room_add.php';
            </script>";
        }  
    }

    public function edit_room($id){
        $sql ="SELECT *  FROM  rooms WHERE room_no=".$id;
        $result = mysqli_query($this ->con,$sql); 
        $row =mysqli_fetch_assoc($result);
        echo json_encode($row);     
    }

    public function updateRoom($room_no,$cat_id){
        $sql ="UPDATE rooms SET room_no='".$room_no."', cat_id='".$cat_id."' WHERE room_no=".$room_no;
        $result2 = mysqli_query($this ->con,$sql);                                         
        if( $result2 > 0){    
            echo "<script type='text/javascript'>alert('You have successfully updated the room.');
            window.location='../s_room.php';
            </script>";            
        }else{
            echo "<script type='text/javascript'>alert('Sorry. Unable to update this room at this moment. Please try again shortly');
            window.location='../s_room.php';
            </script>";
        }           
    }

    public function removeRoom($id){
        $sql ="DELETE  FROM  rooms WHERE room_no=".$id;
        $result = mysqli_query($this ->con,$sql); 
        if(mysqli_affected_rows($this ->con)==1){
            echo "<script type='text/javascript'>alert('You have successfully removed the room.');
            window.location='s_room.php';
            </script>"; 
        }else{ 
            echo "<script type='text/javascript'>alert('Sorry. Unable to remove this room at this moment.Please try again shortly');
            window.location='../s_room.php';    
            </script>";          
        }   
    }

    public function searchRoom1($search){
        
        $output = '';
        $query = "SELECT * FROM rooms WHERE room_no LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>Room No</th>
               <th>Room Category</th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["room_no"].'</td>
              <td>'.$row["cat_id"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
           
            echo "<div>";
            echo "<h3>Error!</h3>";
            echo "<p>Sorry! Not found matching data.</p>";
            echo "</div> ";
        }     
    }

    public function searchRoom2($search){
        
        $output = '';
        $query = "SELECT * FROM rooms WHERE cat_id LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>Room No</th>
               <th>Room Category</th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["room_no"].'</td>
              <td>'.$row["cat_id"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
            echo 'Sorry! Not found matching data.';
        }     
    }




    /***********************************************************room category********************************************************************* */
    
    public function view_roomCategory($table){
        $sql ="SELECT *  FROM ".$table;
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }

    public function view_roomCategory_name($table,$field){
        $sql ="SELECT cat_name  FROM room_category WHERE cat_id=".$field;
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }


    public function addRoomcat($cat_name,$size,$adults,$bed,$connect,$price,$desc,$meal_image){
        $query2 = "INSERT INTO room_category (cat_name,approximate_size,maximum_adults,bed_type,connecting_rooms,room_price,cat_desc,room_image) VALUES('".$cat_name."','".$size."','".$adults."','".$bed."','".$connect."','".$price."','".$desc."','".$meal_image."')";
        $result2 = mysqli_query($this ->con,$query2);                                       
        if( $result2 > 0){    
            echo "<script type='text/javascript'>alert('You have successfully added the room category.');
                window.location='../s_room_category_add.php';
            </script>";            
        }else{
            echo "<script type='text/javascript'>alert('Sorry! The room you are trying to add is already exists.');
                window.location='../s_room_category_add.php';
            </script>";
        }         
    }

    public function edit_room_category($id){
        $sql ="SELECT *  FROM  room_category WHERE cat_id=".$id;
        $result = mysqli_query($this ->con,$sql); 
        $row =mysqli_fetch_assoc($result);
        echo json_encode($row);     
    }

    public function updateRoomCategory($cat_id,$name, $size,$adults,$bed,$connecting,$price,$description){
        $sql ="UPDATE room_category SET cat_name='".$name."', approximate_size='".$size."', maximum_adults='".$adults."', bed_type='".$bed."', connecting_rooms='".$connecting."', room_price='".$price."',cat_desc='".$description."' WHERE cat_id=".$cat_id;
        $result2 = mysqli_query($this ->con,$sql);                                         
        if( $result2 > 0){    
            echo "<script type='text/javascript'>alert('You have successfully updated the room category.');
            window.location='../s_room_category.php';
            </script>";            
        }else{
			echo "<script type='text/javascript'>alert('Sorry. Unable to update this room category at this moment.Please try again shortly.');
            window.location='../s_room_category.php';
            </script>"; 
        }      
    }

    public function removeRoomCategory($id){
        $sql ="DELETE  FROM  room_category WHERE cat_id=".$id;
        $result = mysqli_query($this ->con,$sql); 
        if(mysqli_affected_rows($this ->con)==1){
            echo "<script type='text/javascript'>alert('You have successfully removed the room category.');
            window.location='s_room_category.php';
            </script>"; 
        }else{ 
            echo "<script type='text/javascript'>alert('Sorry.Unable to remove this rooom category at this moment.Please try again shortly');
            window.location='../s_room_category.php';    
            </script>";          
        }   
    }

    public function searchRoomCategory1($search){
        
        $output = '';
        $query = "SELECT * FROM room_category WHERE cat_id LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>Category ID</th>
               <th>Category Name</th>
               <th>Size</th>
               <th>Maximum adults</th>
               <th>Bed Type</th>
               <th>Connecting Rooms</th>
               <th>Room Price</th>
               <th>Description</th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["cat_id"].'</td>
              <td>'.$row["cat_name"].'</td>
              <td>'.$row["approximate_size"].'</td>
              <td>'.$row["maximum_adults"].'</td>
              <td>'.$row["bed_type"].'</td>
              <td>'.$row["connecting_rooms"].'</td>
              <td>'.$row["room_price"].'</td>
              <td>'.$row["cat_desc"].'</td>
              
             </tr>
            ';
           }
           echo $output;         
        }else{
           echo 'Sorry! Not found matching data.';
        }     
    }

    public function searchRoomCategory2($search){
        
        $output = '';
        $query = "SELECT * FROM room_category WHERE cat_name LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>Category ID</th>
               <th>Category Name</th>
               <th>Size</th>
               <th>Maximum adults</th>
               <th>Bed Type</th>
               <th>Connecting Rooms</th>
               <th>Room Price</th>
               <th>Description</th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["cat_id"].'</td>
              <td>'.$row["cat_name"].'</td>
              <td>'.$row["approximate_size"].'</td>
              <td>'.$row["maximum_adults"].'</td>
              <td>'.$row["bed_type"].'</td>
              <td>'.$row["connecting_rooms"].'</td>
              <td>'.$row["room_price"].'</td>
              <td>'.$row["cat_desc"].'</td>
              
             </tr>
            ';
           }
           echo $output;         
        }else{
           echo 'Sorry! Not found matching data.';
        }     
    }

    public function searchRoomCategory3($search){
        
        $output = '';
        $query = "SELECT * FROM room_category WHERE bed_type LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>Category ID</th>
               <th>Category Name</th>
               <th>Size</th>
               <th>Maximum adults</th>
               <th>Bed Type</th>
               <th>Connecting Rooms</th>
               <th>Room Price</th>
               <th>Description</th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["cat_id"].'</td>
              <td>'.$row["cat_name"].'</td>
              <td>'.$row["approximate_size"].'</td>
              <td>'.$row["maximum_adults"].'</td>
              <td>'.$row["bed_type"].'</td>
              <td>'.$row["connecting_rooms"].'</td>
              <td>'.$row["room_price"].'</td>
              <td>'.$row["cat_desc"].'</td>
              
             </tr>
            ';
           }
           echo $output;         
        }else{
           echo 'Sorry! Not found matching data.';
        }     
    }

    /********************************************************reservation********************************************************** *****/
    public function view_reservation($table){
        $sql ="SELECT *  FROM ".$table;
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }


    public function addReservation($cat_id,$cus_id,$cus_checkin,$cus_checkout,$reservation_date){
        $query1 ="SELECT room_no FROM rooms WHERE cat_id='$cat_id' and room_no not in (select room_no FROM reservation WHERE checkout > '$cus_checkin' AND checkin < '$cus_checkout')";
        $result1 = mysqli_query($this ->con,$query1);
            if( mysqli_affected_rows($this ->con) >= 1){
                                                                                                                                  
                 //make reservation to the first elemet to the array
                 $rooms=mysqli_fetch_array($result1);
                 $reserved_room =$rooms[0];
                                                     
                 $query2 = "INSERT INTO reservation (checkin,checkout,room_no,cus_id,reservation_date) VALUES('".$cus_checkin."','".$cus_checkout."','".$reserved_room."','".$cus_id."','".$reservation_date."')";
                 $result2 = mysqli_query($this ->con,$query2);                                        
                if ($result2 > 0) {
                     echo "<script type='text/javascript'>alert('Your reservation is successfully completed.');
                     window.location='../s_reservation_add.php';
                     </script>";
                }else{
                     echo "Error: " . $sql_1 . "<br>" . $con->error;
                }
            }else{
                 echo "<script type='text/javascript'>alert('Sorry! Reservation can not be completed due to the unavailability of rooms.');
                 window.location='../s_reservation_add.php';
                 </script>";                                                   
            }          
    }

    public function edit_reservation($id){
        $sql ="SELECT *  FROM reservation WHERE reservation_no=".$id;
        $result = mysqli_query($this ->con,$sql); 
        $row =mysqli_fetch_assoc($result);
        echo json_encode($row);     
    }

    public function updateReservation($reservation_no,$checkin,$checkout,$room_no,$cus_id,$reservation_date){

        $cus_checkin= date('y-m-d', strtotime($checkin));
        $cus_checkout= date('y-m-d', strtotime($checkout));

        $query ="SELECT room_no FROM rooms WHERE room_no='$room_no' and room_no not in (select room_no FROM reservation WHERE checkout > '$cus_checkin' AND checkin < '$cus_checkout')";
        $result = mysqli_query($this ->con,$query); 
        if(mysqli_num_rows($result)){  

            $query2 = "UPDATE reservation SET checkin='".$cus_checkin."', checkout='".$cus_checkout."', room_no='".$room_no."', cus_id='".$cus_id."' WHERE reservation_no='".$reservation_no."' AND DATEDIFF(checkin,NOW() ) >= 2 ;  ";
            $result2 = mysqli_query($this ->con,$query2);                                         
            
            if( mysqli_affected_rows($this ->con)==1){    
                echo "<script type='text/javascript'>alert('You have successfully updated the reservation.');
                window.location='../s_reservation.php';
                </script>";    
                   
            }else{
               echo "<script type='text/javascript'>alert('Sorry! You are only allow to update the reservations atleast 2 days before the check in date.');
               window.location='../s_reservation.php'
                </script>";
            }  
        }else{  
            echo "<script type='text/javascript'>alert('Sorry! Your reservation can not be updated due to the unavailability of rooms.');
            window.location='../s_reservation.php';
            </script>";          
        }         
    }


    public function removeReservation($id){
        $query ="DELETE  FROM reservation  where reservation_no='$id'";
        $result = mysqli_query($this ->con,$query); 
        if(mysqli_affected_rows($this ->con)==1){
            echo "<script type='text/javascript'>alert('Your reservation has been cancelled successfully.');
            window.location='s_reservation.php';
            </script>"; 
        }else{ 
            echo "<script type='text/javascript'>alert('Sorry! You are noly allow to cancel reservations atleast 2 days before the check in date.');
            window.location='s_reservation.php';
            </script>";          
        }   
    }


    public function searchReservation1($search){
        
        $output = '';
        $query = "SELECT * FROM reservation WHERE reservation_no LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>Reservation No</th>
               <th>Checkin date</th>
               <th>Checkout date</th>
               <th>Room No</th>
               <th>Customer ID</th>
               <th>Reservation date</th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["reservation_no"].'</td>
              <td>'.$row["checkin"].'</td>
              <td>'.$row["checkout"].'</td>
              <td>'.$row["room_no"].'</td>
              <td>'.$row["cus_id"].'</td>
              <td>'.$row["reservation_date"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
           
            echo "<div>";
            echo "<h3>Error!</h3>";
            echo "<p>Sorry! Not found matching data.</p>";
            echo "</div> ";
        }     
    }

    public function searchReservation2($search){
        
        $output = '';
        $query = "SELECT * FROM reservation WHERE checkin LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>Reservation No</th>
               <th>Checkin date</th>
               <th>Checkout date</th>
               <th>Room No</th>
               <th>Customer ID</th>
               <th>Reservation date</th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["reservation_no"].'</td>
              <td>'.$row["checkin"].'</td>
              <td>'.$row["checkout"].'</td>
              <td>'.$row["room_no"].'</td>
              <td>'.$row["cus_id"].'</td>
              <td>'.$row["reservation_date"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
           
            echo "<div>";
            echo "<h3>Error!</h3>";
            echo "<p>Sorry! Not found matching data.</p>";
            echo "</div> ";
        }     
    }

    public function searchReservation3($search){
        
        $output = '';
        $query = "SELECT * FROM reservation WHERE checkout LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>Reservation No</th>
               <th>Checkin date</th>
               <th>Checkout date</th>
               <th>Room No</th>
               <th>Customer ID</th>
               <th>Reservation date</th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["reservation_no"].'</td>
              <td>'.$row["checkin"].'</td>
              <td>'.$row["checkout"].'</td>
              <td>'.$row["room_no"].'</td>
              <td>'.$row["cus_id"].'</td>
              <td>'.$row["reservation_date"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
           
            echo "<div>";
            echo "<h3>Error!</h3>";
            echo "<p>Sorry! Not found matching data.</p>";
            echo "</div> ";
        }     
    }

    public function searchReservation4($search){
        
        $output = '';
        $query = "SELECT * FROM reservation WHERE room_no LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>Reservation No</th>
               <th>Checkin date</th>
               <th>Checkout date</th>
               <th>Room No</th>
               <th>Customer ID</th>
               <th>Reservation date</th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["reservation_no"].'</td>
              <td>'.$row["checkin"].'</td>
              <td>'.$row["checkout"].'</td>
              <td>'.$row["room_no"].'</td>
              <td>'.$row["cus_id"].'</td>
              <td>'.$row["reservation_date"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
           
            echo "<div>";
            echo "<h3>Error!</h3>";
            echo "<p>Sorry! Not found matching data.</p>";
            echo "</div> ";
        }     
    }

    public function searchReservation5($search){
        
        $output = '';
        $query = "SELECT * FROM reservation WHERE reservation_date LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>Reservation No</th>
               <th>Checkin date</th>
               <th>Checkout date</th>
               <th>Room No</th>
               <th>Customer ID</th>
               <th>Reservation date</th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["reservation_no"].'</td>
              <td>'.$row["checkin"].'</td>
              <td>'.$row["checkout"].'</td>
              <td>'.$row["room_no"].'</td>
              <td>'.$row["cus_id"].'</td>
              <td>'.$row["reservation_date"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
           
            echo "<div>";
            echo "<h3>Error!</h3>";
            echo "<p>Sorry! Not found matching data.</p>";
            echo "</div> ";
        }     
    }
    /***********************************************************dining********************************************************************* */
    public function viewDetails($table){
        $sql ="SELECT *  FROM ".$table;
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array; 
    }
    public function addmeal($meal_id,$meal_name,$meal_desc,$meal_image,$e_id,$price_per_meal,$cuisine_id){
        $query2 = "INSERT INTO meal(meal_id,meal_name,meal_desc,meal_image,e_id,price_per_meal,cuisine_id) VALUES('".$meal_id."','".$meal_name."','".$meal_desc."','".$meal_image."','".$e_id."','".$price_per_meal."','".$cuisine_id."')";
        $result2 = mysqli_query($this ->con,$query2);                                       
        if( $result2 > 0){    
            echo "<script type='text/javascript'>alert('You have successfully added a meal.');
            window.location='../s_d_meal.php';
            </script>";            
        }else{
            echo "<script type='text/javascript'>alert('Sorry! cannot add a meal at this moment. Please try again shortly.');
            window.location='../s_d_meal_add.php';
            </script>";
        }      
        
    }

    public function edit_meal($id){
        $sql ="SELECT *  FROM  meal WHERE meal_id='$id' ";
        $result = mysqli_query($this ->con,$sql); 
        $row =mysqli_fetch_assoc($result);
        echo json_encode($row);     
    }

    public function updateMeal($meal_id,$meal_name, $description,$eid,$price,$cuisine,$meal_id){
        
      $sql ="UPDATE meal SET meal_name='".$meal_name."', meal_desc='".$description."', e_id='".$eid."', price_per_meal='".$price."', cuisine_id='".$cuisine."' WHERE meal_id='$meal_id' ";
        $result2 = mysqli_query($this ->con,$sql);                                         
        if( $result2 > 0){    
            echo "<script type='text/javascript'>alert('You have successfully updated the meal.');
            window.location='../s_d_meal.php';
            </script>";                
        }else{
			echo "<script type='text/javascript'>alert('Sorry! cannot update the meal at this moment. Please try again shortly.');
            window.location='../s_d_meal_add.php';
            </script>";
        }      
    }

    public function removeMeal($id){
        echo $id;
        
        $sql ="DELETE  FROM meal  where meal_id='$id' ";
        echo $sql;
        $result = mysqli_query($this ->con,$sql); 
        if(mysqli_affected_rows($this ->con)==1){
            echo "<script type='text/javascript'>alert('You have removed the meal successfully.');
            window.location='s_d_meal.php';
            </script>"; 
        }else{ 
            echo "<script type='text/javascript'>alert('Sorry! cannot remove the meal at this moment. Please try again shortly..');
            window.location='../s_d_meal_add.php';
            </script>";        
        }  
    }

    public function searchMeal1($search){
        $output = '';
        $query = "SELECT * FROM meal WHERE meal_id LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>Meal ID</th>
               <th>Meal Name</th>
               <th>Description</th>
               <th>Establishment Type</th>
               <th>Price</th>
               <th>Cuisine Type</th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["meal_id"].'</td>
              <td>'.$row["meal_name"].'</td>
              <td>'.$row["meal_desc"].'</td>
              <td>'.$row["e_id"].'</td>
              <td>'.$row["price_per_meal"].'</td>
              <td>'.$row["cuisine_id"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
           echo 'Sorry! Not found matching data.';
        }     
    }

    public function searchMeal2($search){
        $output = '';
        $query = "SELECT * FROM meal WHERE meal_name LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>Meal ID</th>
               <th>Meal Name</th>
               <th>Description</th>
               <th>Establishment Type</th>
               <th>Price</th>
               <th>Cuisine Type</th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["meal_id"].'</td>
              <td>'.$row["meal_name"].'</td>
              <td>'.$row["meal_desc"].'</td>
              <td>'.$row["e_id"].'</td>
              <td>'.$row["price_per_meal"].'</td>
              <td>'.$row["cuisine_id"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
           echo 'Sorry! Not found matching data.';
        }     
    }

    public function searchMeal3($search){
        $output = '';
        $query = "SELECT * FROM meal WHERE e_id LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>Meal ID</th>
               <th>Meal Name</th>
               <th>Description</th>
               <th>Establishment Type</th>
               <th>Price</th>
               <th>Cuisine Type</th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["meal_id"].'</td>
              <td>'.$row["meal_name"].'</td>
              <td>'.$row["meal_desc"].'</td>
              <td>'.$row["e_id"].'</td>
              <td>'.$row["price_per_meal"].'</td>
              <td>'.$row["cuisine_id"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
           echo 'Sorry! Not found matching data.';
        }     
    }

    public function searchMeal4($search){
        $output = '';
        $query = "SELECT * FROM meal WHERE price_per_meal LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>Meal ID</th>
               <th>Meal Name</th>
               <th>Description</th>
               <th>Establishment Type</th>
               <th>Price</th>
               <th>Cuisine Type</th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["meal_id"].'</td>
              <td>'.$row["meal_name"].'</td>
              <td>'.$row["meal_desc"].'</td>
              <td>'.$row["e_id"].'</td>
              <td>'.$row["price_per_meal"].'</td>
              <td>'.$row["cuisine_id"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
           echo 'Sorry! Not found matching data.';
        }     
    }

    public function searchMeal5($search){
        $output = '';
        $query = "SELECT * FROM meal WHERE cuisine_id LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>Meal ID</th>
               <th>Meal Name</th>
               <th>Description</th>
               <th>Establishment Type</th>
               <th>Price</th>
               <th>Cuisine Type</th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["meal_id"].'</td>
              <td>'.$row["meal_name"].'</td>
              <td>'.$row["meal_desc"].'</td>
              <td>'.$row["e_id"].'</td>
              <td>'.$row["price_per_meal"].'</td>
              <td>'.$row["cuisine_id"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
           echo 'Sorry! Not found matching data.';
        }     
    }



    /***********************************************************establishment type************************************************************ */
    public function view_establishment_type($table){
        $sql ="SELECT *  FROM ".$table;
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }

    public function view_establishment_type_name($table,$field){
        $sql ="SELECT e_type  FROM establishment_type WHERE e_id='$field' ";
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }

    public function addEstablishment($e_id,$e_name){
        
        $query2 = "INSERT INTO establishment_type (e_id,e_type) VALUES ('".$e_id."','".$e_name."')";
        $result2 = mysqli_query($this ->con,$query2);                                         
        if( $result2 > 0){    
            echo "<script type='text/javascript'>alert('You have successfully added a new establishment type.');
            window.location='../s_d_establishment_type_add.php';
            </script>";           
        }else{
            echo "<script type='text/javascript'>alert('Sorry! The estableshment type you are tyring to add is already exists.');
            window.location='../s_d_establishment_type_add.php';
            </script>";
        }  
    }
    

    public function edit_establishment($id){
        $sql ="SELECT *  FROM  establishment_type WHERE e_id='$id' ";
        $result = mysqli_query($this ->con,$sql); 
        $row =mysqli_fetch_assoc($result);
        echo json_encode($row);     
    }

    public function updateEstablishment($e_id,$e_name){
       
      $sql ="UPDATE establishment_type SET e_type='".$e_name."' WHERE e_id='$e_id' ";
        $result2 = mysqli_query($this ->con,$sql);                                         
        if( $result2 > 0){    
            echo "<script type='text/javascript'>alert('You have successfully updated the establishment type.');
            window.location='../s_d_establishment_type.php';
            </script>";                
        }else{
            echo "<script type='text/javascript'>alert('Sorry! Unable to update the establishment type at this moment. Please try again later.');
            window.location='../s_d_establishment_type.php';
            </script>";      
        }      
    }

    public function removeEstablishment($id){
        echo $id;
        $sql ="DELETE  FROM establishment_type  where e_id='$id' ";
        echo $sql;
        $result = mysqli_query($this ->con,$sql); 
        if(mysqli_affected_rows($this ->con)==1){
            echo "<script type='text/javascript'>alert('You have successfully removed the establishment type.');
            window.location='s_d_establishment_type.php';
            </script>"; 
        }else{ 
            echo "<script type='text/javascript'>alert('('Sorry! Unable to remove the establishment type at this moment. Please try again later.');
            window.location='s_d_establishment_type.php';
            </script>";        
        }   
    }

    public function searchEstablishment1($search){
        
        $output = '';
        $query = "SELECT * FROM establishment_type where e_id LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>Establishment Type ID</th>
               <th>Type Name</th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["e_id"].'</td>
              <td>'.$row["e_type"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
            echo 'Sorry! Not found matching data.';
        }     
    }


    public function searchEstablishment2($search){
        
        $output = '';
        $query = "SELECT * FROM establishment_type where e_type LIKE '%".$search."%'  ";
      
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>Establishment Type ID</th>
               <th>Type Name</th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["e_id"].'</td>
              <td>'.$row["e_type"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
            echo 'Sorry! Not found matching data.';
        }     
    }

    /********************************************************************cuisine************************************************************************ */
    public function view_cuisine($table){
        $sql ="SELECT *  FROM ".$table;
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }
    
    public function view_cuisine_name($table,$field){
        $sql ="SELECT c_name  FROM cuisine WHERE cuisine_id='$field' ";
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }

    public function addCuisine($c_id,$c_name){
        
        $query2 = "INSERT INTO cuisine (cuisine_id,c_name) VALUES ('".$c_id."','".$c_name."')";
        $result2 = mysqli_query($this ->con,$query2);                                         
        if( $result2 > 0){    
            echo "<script type='text/javascript'>alert('You have successfully added a new cuisine type.');
            window.location='../s_d_establishment_type_add.php';
            </script>";           
        }else{
            echo "<script type='text/javascript'>alert('Soory! The cuisine type you are trying to add is already exsists!.');
            window.location='../s_d_establishment_type_add.php';
            </script>";
        }  
    }
    

    public function edit_cuisine($id){
        $sql ="SELECT *  FROM  cuisine WHERE cuisine_id='$id' ";
        $result = mysqli_query($this ->con,$sql); 
        $row =mysqli_fetch_assoc($result);
        echo json_encode($row);     
    }

    public function updateCuisine($c_id,$c_name){
       
      $sql ="UPDATE cuisine SET c_name='".$c_name."' WHERE cuisine_id='$c_id' ";
        $result2 = mysqli_query($this ->con,$sql);                                         
        if( $result2 > 0){    
            echo "<script type='text/javascript'>alert('You have successfully updated the cuisine type.');
            window.location='../s_d_cuisine.php';
            </script>";                
        }else{
            echo "<script type='text/javascript'>alert('Sorry! Unable to update the cuisine at this moment. Please try again shortly.');
            window.location='../s_d_cuisine.php';
            </script>";      
        }      
    }

    public function removeCuisine($id){
        echo $id;
        $sql ="DELETE  FROM cuisine  where cuisine_id='$id' ";
        echo $sql;
        $result = mysqli_query($this ->con,$sql); 
        if(mysqli_affected_rows($this ->con)==1){
            echo "<script type='text/javascript'>alert('You have successfully removed the cuisine type.');
            window.location='../s_d_cuisine.php';
            </script>"; 
        }else{ 
            echo "<script type='text/javascript'>alert('Sorry! Unable to remove the cuisine at this moment. Please try again shortly.');
            window.location='../s_d_cuisine.php';
            </script>";        
        }   
    }

    public function searchCuisine1($search){
        
        $output = '';
        $query = "SELECT * FROM cuisine where cuisine_id LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>Cuisine ID</th>
               <th>Cuisine Name</th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["cuisine_id"].'</td>
              <td>'.$row["c_name"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
            echo 'Sorry! Not found matching data.';
        }     
    }


    public function searchCuisine2($search){
        
        $output = '';
        $query = "SELECT * FROM cuisine where c_name LIKE '%".$search."%'  ";
      
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>Cuisine ID</th>
               <th>Cuisine Name</th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["cuisine_id"].'</td>
              <td>'.$row["c_name"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
            echo 'Sorry! Not found matching data.';
        }     
    }


    /*****************************************************************orders************************************************************************** */
    public function viewOrders($table){
        $sql ="SELECT *  FROM ".$table;
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }

    public function order_meal_name($table,$x){
        $sql ="SELECT meal_name FROM meal WHERE meal_id='$x' ";
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }

    //for view
    public function edit_order($id){
        $sql ="SELECT *  FROM order_meal WHERE order_id=".$id;
        $result = mysqli_query($this ->con,$sql); 
        $row =mysqli_fetch_assoc($result);
        echo json_encode($row);     
    }

    public function orderMeal($quantity,$order_deli_date,$cus_id,$meal_id,$order_deli_time,$ordered_date,$cus_email,$room_no){
        $queryo = "INSERT INTO order_meal(order_id,quantity,order_deli_date,cus_id,meal_id,order_deli_time,ordered_date,cus_email,room_no) VALUES(null,'".$quantity."','".$order_deli_date."','".$cus_id."','".$meal_id."','".$order_deli_time."','".$ordered_date."','".$cus_email."','".$room_no."')";
        $result = mysqli_query($this ->con,$queryo); 
        if($result > 0){
             
             return true;  
        }else{  
             $this->error = "Wrong Data";  
        }  
    }


    public function searchOrder1($search){
        
        $output = '';
        $query = "SELECT * FROM order_meal WHERE order_id LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>Order ID</th>
               <th>Meal ID</th>
               <th>Quantity</th>
               <th>Customer ID</th>
               <th>Room No  </th>
               <th>Deliver Date</th>
               <th>Deliver Time</th>
               <th>Ordered Date</th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["order_id"].'</td>
              <td>'.$row["meal_id"].'</td>
              <td>'.$row["quantity"].'</td>
              <td>'.$row["cus_id"].'</td>
              <td>'.$row["room_no"].'</td>
              <td>'.$row["order_deli_date"].'</td>
              <td>'.$row["order_deli_time"].'</td>
              <td>'.$row["ordered_date"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
           echo 'Sorry! Not found matching data.';
        }     
    }

    public function searchOrder2($search){
        
        $output = '';
        $query = "SELECT * FROM order_meal WHERE meal_id LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>Order ID</th>
               <th>Meal ID</th>
               <th>Quantity</th>
               <th>Customer ID</th>
               <th>Room No  </th>
               <th>Deliver Date</th>
               <th>Deliver Time</th>
               <th>Ordered Date</th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["order_id"].'</td>
              <td>'.$row["meal_id"].'</td>
              <td>'.$row["quantity"].'</td>
              <td>'.$row["cus_id"].'</td>
              <td>'.$row["room_no"].'</td>
              <td>'.$row["order_deli_date"].'</td>
              <td>'.$row["order_deli_time"].'</td>
              <td>'.$row["ordered_date"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
           echo 'Sorry! Not found matching data.';
        }     
    }

    public function searchOrder3($search){
        
        $output = '';
        $query = "SELECT * FROM order_meal WHERE cus_id LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>Order ID</th>
               <th>Meal ID</th>
               <th>Quantity</th>
               <th>Customer ID</th>
               <th>Room No  </th>
               <th>Deliver Date</th>
               <th>Deliver Time</th>
               <th>Ordered Date</th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["order_id"].'</td>
              <td>'.$row["meal_id"].'</td>
              <td>'.$row["quantity"].'</td>
              <td>'.$row["cus_id"].'</td>
              <td>'.$row["room_no"].'</td>
              <td>'.$row["order_deli_date"].'</td>
              <td>'.$row["order_deli_time"].'</td>
              <td>'.$row["ordered_date"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
           echo 'Sorry! Not found matching data.';
        }     
    }

    public function searchOrder4($search){
        
        $output = '';
        $query = "SELECT * FROM order_meal WHERE room_no LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>Order ID</th>
               <th>Meal ID</th>
               <th>Quantity</th>
               <th>Customer ID</th>
               <th>Room No  </th>
               <th>Deliver Date</th>
               <th>Deliver Time</th>
               <th>Ordered Date</th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["order_id"].'</td>
              <td>'.$row["meal_id"].'</td>
              <td>'.$row["quantity"].'</td>
              <td>'.$row["cus_id"].'</td>
              <td>'.$row["room_no"].'</td>
              <td>'.$row["order_deli_date"].'</td>
              <td>'.$row["order_deli_time"].'</td>
              <td>'.$row["ordered_date"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
           echo 'Sorry! Not found matching data.';
        }     
    }
    /*********************************************************services***********************************************************************************/
    /*****************************************************Make tour plan******************************************/
	//for view tour plans
	public function view_tourplans($table){
		//$sql ="SELECT *  FROM ".$table.",pre_planed_tours,customer where pre_planed_tour_reservation.tour_id =pre_planed_tours.tour_id  AND pre_planed_tour_reservation.cus_id =customer.cus_id ";
        $sql ="SELECT *  FROM ".$table.",customer where tour_plan.cus_id =customer.cus_id";
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
	}
	
	//search tour plans
	public function s_tourplans($table,$key,$value){
        $sql ="SELECT *  FROM ".$table.",customer where tour_plan.cus_id =customer.cus_id and ".$key."='".$value."'";
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
	}
	
	//remove tour plans
	public function removeTourplan($tp_id){
        $sql ="DELETE  FROM  tour_plan WHERE tp_id=".$tp_id;
        $result = mysqli_query($this ->con,$sql); 
        if(mysqli_affected_rows($this ->con)==1){
            echo "<script type='text/javascript'>alert('Removed Tour Plan Successfully.');
            window.location='s_tour_plans.php';
            </script>"; 
        }else{ 
            echo "<script type='text/javascript'>alert('Sorry.Unable to remove this TourPlan in this moent.Please try again shortly');
            window.location='../s_tour_plans.php';    
            </script>";          
        }   
    }
	
	/*****************************************************Preplan tours******************************************/
	
	//view preplan tours
	public function view_preplan_tours($table){
        $sql ="SELECT *  FROM ".$table;
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
	}
	
	//search pre plan tours
	public function s_preplan_tour($table,$key,$tour_plan){
        $sql ="SELECT *  FROM ".$table." where ".$key."='".$tour_plan."'";
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
	}
	
	//search preplan tour requests
	public function s_preplan_tour_search($table,$key,$value){
        $sql ="SELECT *  FROM ".$table.",pre_planed_tours,customer where pre_planed_tour_reservation.tour_id =pre_planed_tours.tour_id  AND pre_planed_tour_reservation.cus_id =customer.cus_id and ".$key."='".$value."'";
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
	}

	//remove pre plan tour
	public function remove_PreplanTour($id){
		$sql ="DELETE  FROM  pre_planed_tours WHERE tour_id=".$id;
        $result = mysqli_query($this->con,$sql); 
        if(mysqli_affected_rows($this ->con)==1){
            echo "<script type='text/javascript'>alert('You haverRemoved Tour Plan Successfully.');
            window.location='s_preplanned_tours.php';
            </script>"; 
        }else{ 
            echo "<script type='text/javascript'>alert('Sorry! Unable to remove this TourPlan at this moent.Please try again shortly');
            window.location='../s_preplanned_tours.php';    
            </script>";          
        } 
	}	
   
	
	//remove preplan tour request
	public function removePrePlanTourRequests($id){
        $sql ="DELETE  FROM  pre_planed_tour_reservation WHERE tour_no=".$id;
        $result = mysqli_query($this ->con,$sql); 
        if(mysqli_affected_rows($this ->con)==1){
            echo "<script type='text/javascript'>alert('You have removed Tour Plan request successfully.');
            window.location='s_preplan_tour_request.php';
            </script>"; 
        }else{ 
            echo "<script type='text/javascript'>alert('Sorry! Unable to remove this Tour Plan request at this moment.Please try again shortly');
            window.location='../s_preplan_tour_request.php';    
            </script>";          
        }   
    }
	
	//view pre plan tour requests
	public function view_preplan_tour_requests($table){
        $sql ="SELECT *  FROM ".$table.",pre_planed_tours,customer where pre_planed_tour_reservation.tour_id =pre_planed_tours.tour_id  AND pre_planed_tour_reservation.cus_id =customer.cus_id ";
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
	}
	
	//add pre plan tour
	public function addpreplanT($tour_name,$places_to_visit,$price,$no_of_participant,$no_of_days,$description,$p){
		
        $id=0;
		$query ="INSERT INTO pre_planed_tours(tour_id,tour_name,places_to_visit,price,no_of_participant,no_of_days,description,tp_image) VALUES('".$id."','".$tour_name."','".$places_to_visit."','".$price."','".$no_of_participant."','".$no_of_days."','".$description."','".$p."')";
        $result = mysqli_query($this ->con,$query); 
        if(mysqli_affected_rows($this ->con)==1){  
             return true;  
        }else{  
            $this->error = "Wrong Data";  
        }  
    }
	
	//pre plan tour search(update)
	public function PPT_Search($id){
        $sql ="SELECT *  FROM pre_planed_tours where tour_id=".$id;
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }
	
	//update preplan tour
	public function update_pre_plan_tour($table,$tour_id,$places_to_visit,$price,$no_of_participant,$no_of_days,$description){
                    
        $query = "UPDATE pre_planed_tours SET places_to_visit='".$places_to_visit."', price='".$price."',no_of_participant ='".$no_of_participant."', no_of_days='".$no_of_days."', description='".$description."' WHERE tour_id ='".$tour_id."'";
        $result = mysqli_query($this ->con,$query);                                         
            
        if( mysqli_affected_rows($this ->con)==1){    
            echo "<script type='text/javascript'>alert('You have successfully updated the Tour Plan.');
            window.location='../s_preplanned_tours.php';
            </script>";    
                   
        }else{
             echo "<script type='text/javascript'>alert('Sorry! Unable to update this Tour Plan at this moment.Please try again shortly.');
             window.location='../s_preplanned_tours.php';
             </script>";
            }  
    }  

	
	
	/*******************************************************************Tour guide*************************************************************/
	//view tour guides
	public function view_tour_guides($table){
        $sql ="SELECT *  FROM ".$table;
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
	}
	
	//add tour guide
	public function addtg($tg_name,$NIC,$contact_no,$experience,$language,$path,$price_per_hour){
		
        $id=0;
		$query ="INSERT INTO tour_guide (tg_id,tg_name,NIC,contact_no,experience,language,tg_image,price_per_hour ) VALUES('".$id."','".$tg_name."','".$NIC."','".$contact_no."','".$experience."','".$language."','".$path."','".$price_per_hour."')";
        $result = mysqli_query($this ->con,$query); 
        if(mysqli_affected_rows($this ->con)==1){  
             return true;  
        }else{  
            $this->error = "Wrong Data";  
        }  
    }
	
	//view tour guide requests
	public function view_tour_guide_requests($table){
		//$sql ="SELECT *  FROM ".$table.",tour_guide,customer where tour_guide_reservation.tg_id =tour_guide.tg_id  AND tour_guide_reservation.cus_id =customer.cus_id ";
        
        $sql ="SELECT *  FROM ".$table.",tour_guide,customer where tour_guide_reservation.tg_id =tour_guide.tg_id  AND tour_guide_reservation.cus_id =customer.cus_id ";
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
	}
	
	//tour guide search
	public function view_tour_guides_search($table,$key,$value){
        $sql ="SELECT *  FROM ".$table." where ".$key."='".$value."'";
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
	}
	
	//deletion of tour guide
	public function removeTourGuide($id){
        $sql ="DELETE  FROM  tour_guide WHERE tg_id =".$id;
        $result = mysqli_query($this ->con,$sql); 
        if(mysqli_affected_rows($this ->con)==1){
            echo "<script type='text/javascript'>alert('You have removed the Tour Guide successfully.');
            window.location='s_tour_guides.php';
            </script>"; 
        }else{ 
            echo "<script type='text/javascript'>alert('Sorry.Unable to remove this Tour Guide at this moment. Please try again shortly');
            window.location='../s_tour_guides.php';    
            </script>";          
        }   
    }
	
	//deletion of tour guide request
	public function removeTourGuideRequest($id){
        $sql ="DELETE  FROM  tour_guide_reservation WHERE tour_guide_no =".$id;
        $result = mysqli_query($this ->con,$sql); 
        if(mysqli_affected_rows($this ->con)==1){
            echo "<script type='text/javascript'>alert('You have removed the Tour Guide request successfully.');
            window.location='s_tour_guide_request.php';
            </script>"; 
        }else{ 
            echo "<script type='text/javascript'>alert('Sorry.Unable to remove this Tour Guide request at this moment.Please try again shortly');
            window.location='../s_tour_guide_request.php';    
            </script>";          
        }   
    }
	
	//tour guide search(update)
	public function UTourGuide_search($id){
        $sql ="SELECT *  FROM tour_guide where tg_id =".$id;
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }
	
	//update tour guide
	public function update_tourguide($table,$tg_id,$tg_name,$NIC,$contact_no,$experience,$language,$price_per_hour){
                    
        $query = "UPDATE tour_guide SET tg_name='".$tg_name."', NIC='".$NIC."',contact_no ='".$contact_no."', experience='".$experience."', language='".$language."', price_per_hour='".$price_per_hour."' WHERE tg_id ='".$tg_id."'";
        $result = mysqli_query($this ->con,$query);                                         
            
        if( mysqli_affected_rows($this ->con)==1){    
            echo "<script type='text/javascript'>alert('You have successfully update the Tour Guide details.');
            window.location='../s_tour_guides.php';
            </script>";    
                   
        }else{
             echo "<script type='text/javascript'>alert('Sorry! Cannot update Tour Guide details at this moment. Please try again later.');
             window.location='../s_tour_guides.php';
             </script>";
            }  
    } 
	
	//search tour guide requests
	public function view_tour_guide_requestsS($table,$key,$value){
        $sql ="SELECT *  FROM ".$table.",tour_guide,customer where tour_guide_reservation.tg_id =tour_guide.tg_id  AND tour_guide_reservation.cus_id =customer.cus_id and ".$key."='".$value."'";
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
	}
	
	/*****************************************************************************transport service*******************************************/
	//view transport
	public function view_transport($table){
        $sql ="SELECT *  FROM ".$table;
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
	}

	//view transport requests
	public function view_transport_requests($table){
		       
        $sql ="SELECT *  FROM ".$table.",transport_services,customer where transport_services_reservation.vehical_id  =transport_services.vehical_id  AND transport_services_reservation.cus_id =customer.cus_id ";
        
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
	}
	
	//Add transport
	public function transport_add($vehical_type,$no_of_passangers,$price_per_km,$p){
		
        $id=0;
		$query ="INSERT INTO transport_services(vehical_id,vehical_type,no_of_passangers,price_per_km,vehical_image) VALUES('".$id."','".$vehical_type."','".$no_of_passangers."','".$price_per_km."','".$p."')";
        $result = mysqli_query($this ->con,$query); 
        if(mysqli_affected_rows($this ->con)==1){  
             return true;  
        }else{  
            $this->error = "Wrong Data";  
        }  
    }
	
	//deletion of transport
	public function removeTransport($id){
        $sql ="DELETE  FROM  transport_services WHERE vehical_id  =".$id;
        $result = mysqli_query($this ->con,$sql); 
        if(mysqli_affected_rows($this ->con)==1){
            echo "<script type='text/javascript'>alert('You have successfully removed Transport Service.');
            window.location='s_transport.php';
            </script>"; 
        }else{ 
            echo "<script type='text/javascript'>alert('Sorry.Unable to remove this Transport Service at this moment.Please try again shortly');
            window.location='../s_transport.php';    
            </script>";          
        }   
    }
	
	//deletion of transport service request
	public function removeTransportServiceRequest($id){
        $sql ="DELETE  FROM transport_services_reservation WHERE transport_no =".$id;
        $result = mysqli_query($this ->con,$sql); 
        if(mysqli_affected_rows($this ->con)==1){
            echo "<script type='text/javascript'>alert('You have successfully removed Transport Service request.');
            window.location='s_transport_request.php';
            </script>"; 
        }else{ 
            echo "<script type='text/javascript'>alert('Sorry! Unable to remove this Transport Service request at this moment. Please try again shortly');
            window.location='../s_transport_request.php';    
            </script>";          
        }   
    }
	
	//transport search(update)
	public function UTransport_search($id){
        $sql ="SELECT *  FROM transport_services where vehical_id =".$id;
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }
	
	//update transport
	public function update_transport($table,$vehical_id,$vehical_type,$no_of_passangers,$price_per_km){
                    
        $query = "UPDATE transport_services SET vehical_type='".$vehical_type."', no_of_passangers='".$no_of_passangers."',price_per_km='".$price_per_km."' WHERE vehical_id ='".$vehical_id."'";
        $result = mysqli_query($this ->con,$query);                                         
            
        if( mysqli_affected_rows($this ->con)==1){    
            echo "<script type='text/javascript'>alert('Your have successfully update Transport Service details.');
            window.location='../s_transport.php';
            </script>";    
                   
        }else{
             echo "<script type='text/javascript'>alert('Sorry! Unable to update this Transport Service details at this moment.Please try again shortly.');
             window.location='../s_transport.php';
             </script>";
            }  
    }
	
	//transport search
	public function view_transportS($table,$key,$value){
        $sql ="SELECT *  FROM ".$table." where ".$key."='".$value."'";
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
	}
	
	//search transport requests
	public function view_transport_requestsS($table,$key,$value){
        $sql ="SELECT *  FROM ".$table.",transport_services,customer where transport_services_reservation.vehical_id  =transport_services.vehical_id  AND transport_services_reservation.cus_id =customer.cus_id  and ".$key."='".$value."'";
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }
    
    /**********************************************************promotions****************************************************************************** */
    
    public function view_promotion_cat($field){
        $sql ="SELECT cat_name  FROM promotion_category WHERE promotion_cat_id='$field' ";
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }

    public function viewpromotion($promotion_no){
        $sql ="SELECT * FROM promotion WHERE promotion_no='$promotion_no' ";
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }

    public function addpromotion($prm_caption,$prm_desc,$promotion_cat_id,$promotion_name,$promotion_img,$package_details) {
        //$query2 = "INSERT INTO `promotion` (`promotion_no`, `prm_caption`, `prm_desc`, `promotion_cat_id`, `promotion_name`, `promotion_img`, `package _details`) VALUES(NULL, '".$prm_caption."', '".$prm_desc."', '".$promotion_cat_id."', '".$promotion_name."', '".$promotion_img."','".$package_details."')";
        $query2 ="INSERT INTO promotion(prm_caption,prm_desc,promotion_cat_id,promotion_name,promotion_img,package_details) VALUES('".$prm_caption."','".$prm_desc."','".$promotion_cat_id."','".$promotion_name."','".$promotion_img."','".$package_details."')";
        
       
        $result2 = mysqli_query($this ->con,$query2);                                         
        if(mysqli_affected_rows($this ->con)==1){    
            echo "<script type='text/javascript'>alert('You have successfully added the promotion.');
            window.location='../s_d_promotion_add.php';
            </script>";           
        }else{
            echo "<script type='text/javascript'>alert('Entered room no is already exsits.please try with another room no.');
            window.location='../s_d_promotion_add.php';
            </script>";
        }     
    }
    public function removePromotion($id){
        echo $id;
        $sql ="DELETE  FROM promotion  where promotion_no='$id' ";
        echo $sql;
        $result = mysqli_query($this ->con,$sql); 
        if(mysqli_affected_rows($this ->con)==1){
            echo "<script type='text/javascript'>alert('You have successfully removed the promotion.');
            window.location='./s_d_promotion.php';
            </script>"; 
        }else{ 
            echo "<script type='text/javascript'>alert('Sorry! Unable to remove this promotion at this moment.Please try again shortly.');
            window.location='./s_d_promotion.php';
            </script>";        
        }   
    }

    public function edit_prm($id){
        $sql ="SELECT *  FROM  promotion WHERE promotion_no='$id' ";
        $result = mysqli_query($this ->con,$sql); 
        $row =mysqli_fetch_assoc($result);
        echo json_encode($row);     
    }
    public function updatePrm($promotion_no,$p_cap,$description,$p_cat,$p_name,$pkgdtl){
       
        $sql ="UPDATE promotion SET package_details='".$pkgdtl."', prm_caption='".$p_cap."', prm_desc='".$description."', promotion_cat_id='".$p_cat."', promotion_name='".$p_name."' WHERE promotion_no='$promotion_no' ";
        $result2 = mysqli_query($this ->con,$sql);                                         
                                              
          if( $result2 > 0){    
              echo "<script type='text/javascript'>alert('You have successfully updated the promotion deatails.');
              window.location='../s_d_promotion.php';
              </script>";                
          }else{
              echo "<script type='text/javascript'>alert('Sorry! Unable to update this promotion deatails at this moment.Please try again shortly.');
              window.location='../s_d_promotion.php';
              </script>";      
          }      
      }
  public function searchprm1($search){
        
      $output = '';
      $query = "SELECT * FROM promotion WHERE promotion_no LIKE '%".$search."%'  ";
      $result = mysqli_query($this ->con,$query);                                         
      if( mysqli_num_rows($result) > 0){   
        
          $output .= '
          <div class="table-responsive">
           <table class="table table bordered">
            <tr>
                <th>Promotion No</th>
                <th>Promotion caption</th>
                <th>Description</th>
                <th>Category</th>
                <th>Name</th>
                <th>Image</th>
                <th>Package Details</th>
            </tr>
         ';
         while($row = mysqli_fetch_array($result))
         {
          $output .= '
           <tr>
            <td>'.$row["promotion_no"].'</td>
            <td>'.$row["prm_caption"].'</td>
            <td>'.$row["prm_desc"].'</td>
            <td>'.$row["promotion_cat_id"].'</td>
            <td>'.$row["promotion_name"].'</td>
            <td>'.$row["package_details"].'</td>
           </tr>
          ';
         }
         echo $output;         
      }else{
         echo 'Sorry! Not found matching data.';
      }     
  }

    /*********************************************************candidates******************************************************************************* */
    public function view_candidates($table){
        $sql ="SELECT *  FROM ".$table;
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }

    public function edit_candidate($id){
        $sql ="SELECT *  FROM  candidate WHERE cand_id=".$id;
        $result = mysqli_query($this ->con,$sql); 
        $row =mysqli_fetch_assoc($result);
        echo json_encode($row);     
    }

    public function searchCandidate1($search){
        
        $output = '';
        $query = "SELECT * FROM candidate WHERE cand_id LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>Candidate ID</th>
               <th>Vacancy ID</th>
               <th>Candidate Name</th>
               <th>Candidate Email</th>
               <th>Candidate CV</th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["cand_id"].'</td>
              <td>'.$row["vac_id"].'</td>
              <td>'.$row["cand_name"].'</td>
              <td>'.$row["cand_email"].'</td>
              <td>'.$row["cand_cv"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
           echo ' Sorry! Not found matching data.';
        }     
    }

    public function searchCandidate2($search){
        
        $output = '';
        $query = "SELECT * FROM candidate WHERE vac_id LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>Candidate ID</th>
               <th>Vacancy ID</th>
               <th>Candidate Name</th>
               <th>Candidate Email</th>
               <th>Candidate CV</th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["cand_id"].'</td>
              <td>'.$row["vac_id"].'</td>
              <td>'.$row["cand_name"].'</td>
              <td>'.$row["cand_email"].'</td>
              <td>'.$row["cand_cv"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
           echo 'DSorry! Not found matching data.';
        }     
    }

    public function searchCandidate3($search){
        
        $output = '';
        $query = "SELECT * FROM candidate WHERE cand_name LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>Candidate ID</th>
               <th>Vacancy ID</th>
               <th>Candidate Name</th>
               <th>Candidate Email</th>
               <th>Candidate CV</th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["cand_id"].'</td>
              <td>'.$row["vac_id"].'</td>
              <td>'.$row["cand_name"].'</td>
              <td>'.$row["cand_email"].'</td>
              <td>'.$row["cand_cv"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
           echo 'Sorry! Not found matching data.';
        }     
    }

    public function searchCandidate4($search){
        
        $output = '';
        $query = "SELECT * FROM candidate WHERE cand_email LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>Candidate ID</th>
               <th>Vacancy ID</th>
               <th>Candidate Name</th>
               <th>Candidate Email</th>
               <th>Candidate CV</th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["cand_id"].'</td>
              <td>'.$row["vac_id"].'</td>
              <td>'.$row["cand_name"].'</td>
              <td>'.$row["cand_email"].'</td>
              <td>'.$row["cand_cv"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
           echo 'Sorry! Not found matching data.';
        }     
    }

    /******************************************************job vacancies******************************************************************* */
    public function view_jobVacancies($table){
        $sql ="SELECT *  FROM ".$table;
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }

    public function addJobVacancy($vac_id,$position,$salary,$contract,$desc,$vacancy_image){
        $query2 = "INSERT INTO job_vacancy (vac_id,position,salary,contract,job_description,job_image) VALUES('".$vac_id."','".$position."','".$salary."','".$contract."','".$desc."','".$vacancy_image."')";
        $result2 = mysqli_query($this ->con,$query2);                                       
        if( $result2 > 0){    
            echo "<script type='text/javascript'>alert('You have successfully added a job vacancy.');
                window.location='../s_jobvacancies_add.php';
            </script>";            
        }else{
            echo "<script type='text/javascript'>alert('Sorry! The job vacancy you are trying to add is already exists.');
                 window.location='../s_jobvacancies_add.php';   
            </script>";
        }        
    }

    public function edit_vacancy($id){
        $sql ="SELECT *  FROM  job_vacancy WHERE vac_id=".$id;
        $result = mysqli_query($this ->con,$sql); 
        $row =mysqli_fetch_assoc($result);
        echo json_encode($row);     
    }

    public function updateVacancy($vac_id,$position,$salary,$contract,$description){
        $sql ="UPDATE job_vacancy SET position='".$position."', salary='".$salary."', contract='".$contract."', job_description='".$description."'  WHERE vac_id=".$vac_id;
        $result2 = mysqli_query($this ->con,$sql);                                         
        if( $result2 > 0){    
            echo "<script type='text/javascript'>alert('You have successfully updated the job vacancy.');
            window.location='../s_job_vacancies.php';
            </script>";            
        }else{
            echo "<script type='text/javascript'>alert('Sorry! Unable to update this job vacancy at this moment.Please try again shortly');
            window.location='../s_job_vacancies.php';
            </script>";
        }      
    }

    public function removeVacancy($id){
        $sql ="DELETE  FROM  job_vacancy WHERE vac_id=".$id;
        $result = mysqli_query($this ->con,$sql); 
        if(mysqli_affected_rows($this ->con)==1){
            echo "<script type='text/javascript'>alert('You have successfully removed this job vacancy.');
            window.location='s_job_vacancies.php';
            </script>"; 
        }else{ 
            echo "<script type='text/javascript'>alert('Sorry! Unable to remove this job vacancy at this moent.Please try again shortly');
            window.location='../s_job_vacancies.php';    
            </script>";          
        }   
    }

    public function searchVacancy1($search){
        
        $output = '';
        $query = "SELECT * FROM job_vacancy WHERE vac_id LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>Vacancy ID</th>
               <th>Position</th>
               <th>Salary</th>
               <th>Contract</th>
               <th>Job Description  </th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["vac_id"].'</td>
              <td>'.$row["position"].'</td>
              <td>'.$row["salary"].'</td>
              <td>'.$row["contract"].'</td>
              <td>'.$row["job_description"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
           echo 'Sorry! Not found matching data.';
        }     
    }

    public function searchVacancy2($search){
        
        $output = '';
        $query = "SELECT * FROM job_vacancy WHERE position LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>Vacancy ID</th>
               <th>Position</th>
               <th>Salary</th>
               <th>Contract</th>
               <th>Job Description  </th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["vac_id"].'</td>
              <td>'.$row["position"].'</td>
              <td>'.$row["salary"].'</td>
              <td>'.$row["contract"].'</td>
              <td>'.$row["job_description"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
           echo 'Sorry! Not found matching data.';
        }     
    }

    public function searchVacancy3($search){
        
        $output = '';
        $query = "SELECT * FROM job_vacancy WHERE salary LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>Vacancy ID</th>
               <th>Position</th>
               <th>Salary</th>
               <th>Contract</th>
               <th>Job Description  </th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["vac_id"].'</td>
              <td>'.$row["position"].'</td>
              <td>'.$row["salary"].'</td>
              <td>'.$row["contract"].'</td>
              <td>'.$row["job_description"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
           echo 'Sorry! Not found matching data.';
        }     
    }

    public function searchVacancy4($search){
        
        $output = '';
        $query = "SELECT * FROM job_vacancy WHERE contract LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>Vacancy ID</th>
               <th>Position</th>
               <th>Salary</th>
               <th>Contract</th>
               <th>Job Description  </th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["vac_id"].'</td>
              <td>'.$row["position"].'</td>
              <td>'.$row["salary"].'</td>
              <td>'.$row["contract"].'</td>
              <td>'.$row["job_description"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
           echo 'Sorry! Not found matching data.';
        }     
    }

    /******************************************************feedback************************************************************** */
    public function view_feedback($table){
        $sql ="SELECT *  FROM ".$table;
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }

    public function edit_feedback($id){
        $sql ="SELECT *  FROM  feedback WHERE fd_id=".$id;
        $result = mysqli_query($this ->con,$sql); 
        $row =mysqli_fetch_assoc($result);
        echo json_encode($row);     
    }


    public function searchFeedback1($search){
        
        $output = '';
        $query = "SELECT * FROM feedback WHERE fd_id LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>Feedback ID</th>
               <th>Customer ID</th>
               <th>Feedback</th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["fd_id"].'</td>
              <td>'.$row["cus_id"].'</td>
              <td>'.$row["fd_msg"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
           echo 'Data Not Found';
        }     
    }

    public function searchFeedback2($search){
        
        $output = '';
        $query = "SELECT * FROM feedback WHERE cus_id LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>Feedback ID</th>
               <th>Customer ID</th>
               <th>Feedback</th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["fd_id"].'</td>
              <td>'.$row["cus_id"].'</td>
              <td>'.$row["fd_msg"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
           echo 'Sorry! Not found matching data.';
        }     
    }

    /***************************************************inventory******************************************************************************** */
    public function view_inventory($table){
        $sql ="SELECT *  FROM ".$table;
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }

    public function addItem($item_name,$unit_price,$minimum_stock,$total_stock){
        $query2 = "INSERT INTO inventory (item_name,minimum_stock,total_stock,unitprice,current_stock) VALUES('".$item_name."','".$minimum_stock."','".$total_stock."','".$unit_price."','".$total_stock."')";
        $result2 = mysqli_query($this ->con,$query2);                                       
        if( $result2 > 0){    
            echo "<script type='text/javascript'>alert('You have successfully added a item.');
                window.location='../s_inventory_add.php';
            </script>";            
        }else{
            echo "<script type='text/javascript'>alert('Sorry! The item you are trying to add is already exists.');
                 window.location='../s_inventory_add.php';   
            </script>";
        }         
    }

    public function addingItem($item_id){
        
        $query1 ="SELECT * FROM inventory where item_id= ".$item_id;
        $result1 = mysqli_query($this ->con,$query1);
            if( mysqli_affected_rows($this ->con) >= 1){
                                                                                                                                  
                 //adding item to the current stock
                 $items=mysqli_fetch_array($result1);
                 $previous_amount =$items['current_stock'];
                 $total_amount =$items['total_stock'];
                 $current_amount = $previous_amount + 1;
                   
                 if($current_amount < $total_amount ){
                    $query2 = "UPDATE inventory SET current_stock='".$current_amount."' where item_id='".$item_id."'";
                    $result2 = mysqli_query($this ->con,$query2);                                        
                    if ($result2 > 0) {
                         echo "<script type='text/javascript'>alert('Current stock is upadated successfully.');
                         window.location='../s_inventory_add_item.php';
                         </script>";
                    }else{
                         echo "Error: " . $sql_1 . "<br>" . $con->error;
                    }

                 }else{
                    echo "<script type='text/javascript'>alert('Sorry! Unable to add this item becasue the current stock is greater than total stock.');
                    window.location='../s_inventory_add_item.php';
                    </script>";
                 }
            }           
    }

    
    public function issueItem($item_id){
        
        $query1 ="SELECT * FROM inventory where item_id= ".$item_id;
        $result1 = mysqli_query($this ->con,$query1);
            if( mysqli_affected_rows($this ->con) >= 1){
                                                                                                                                  
                 //adding item to the current stock
                 $items=mysqli_fetch_array($result1);
                 $previous_amount =$items['current_stock'];
                 $total_amount =$items['total_stock'];
                 $current_amount = $previous_amount - 1;
                   
                 if($current_amount > 0 ){
                    $query2 = "UPDATE inventory SET current_stock='".$current_amount."' where item_id='".$item_id."'";
                    $result2 = mysqli_query($this ->con,$query2);                                        
                    if ($result2 > 0) {
                         echo "<script type='text/javascript'>alert('Current stock is upadated successfully.');
                         window.location='../s_inventory_add_item.php';
                         </script>";
                    }else{
                         echo "Error: " . $sql_1 . "<br>" . $con->error;
                    }

                 }else{
                    echo "<script type='text/javascript'>alert('Sorry! Unable to issue this item.');
                    window.location='../s_inventory_add_item.php';
                    </script>";
                 }
            }           
    }

    public function edit_item($id){
        $sql ="SELECT *  FROM  inventory WHERE item_id=".$id;
        $result = mysqli_query($this ->con,$sql); 
        $row =mysqli_fetch_assoc($result);
        echo json_encode($row);     
    }

    public function updateItem($item_id,$name,$minimum,$total,$price,$current){
        $sql ="UPDATE inventory SET item_name='".$name."', minimum_stock='".$minimum."', total_stock='".$total."', unitprice='".$price."',current_stock='".$current."'  WHERE item_id=".$item_id;
        $result2 = mysqli_query($this ->con,$sql);                                         
        if( $result2 > 0){    
            echo "<script type='text/javascript'>alert('You have successfully updated the inventory item.');
            window.location='../s_inventory.php';
            </script>";            
        }else{
            echo "<script type='text/javascript'>alert('Sorry! Unable to update this item at this moment. Please try again shortly.');
            window.location='../s_inventory.php';
            </script>";
        }      
    }

    public function removeItem($id){
        $sql ="DELETE  FROM  inventory WHERE item_id=".$id;
        $result = mysqli_query($this ->con,$sql); 
        if(mysqli_affected_rows($this ->con)==1){
            echo "<script type='text/javascript'>alert('You have successfully removed the item.');
            window.location='s_inventory.php';
            </script>"; 
        }else{ 
            echo "<script type='text/javascript'>alert('Sorry! Unable to remove this item in this moment. Please try again shortly');
            window.location='s_inventory.php';    
            </script>";          
        }   
    }

    public function searchItem1($search){
        
        $output = '';
        $query = "SELECT * FROM inventory WHERE item_id LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>Item ID</th>
               <th>Item Name</th>
               <th>Minimum Stock</th>
               <th>Total Stock</th>
               <th>Unit Price</th>
               <th>Current Stock</th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["item_id"].'</td>
              <td>'.$row["item_name"].'</td>
              <td>'.$row["minimum_stock"].'</td>
              <td>'.$row["total_stock"].'</td>
              <td>'.$row["unitprice"].'</td>
              <td>'.$row["current_stock"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
           echo 'Sorry! Not found matching data.';
        }     
    }

    public function searchItem2($search){
        
        $output = '';
        $query = "SELECT * FROM inventory WHERE item_name LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>Item ID</th>
               <th>Item Name</th>
               <th>Minimum Stock</th>
               <th>Total Stock</th>
               <th>Unit Price</th>
               <th>Current Stock</th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["item_id"].'</td>
              <td>'.$row["item_name"].'</td>
              <td>'.$row["minimum_stock"].'</td>
              <td>'.$row["total_stock"].'</td>
              <td>'.$row["unitprice"].'</td>
              <td>'.$row["current_stock"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
           echo 'Sorry! Not found matching data.';
        }     
    }

    public function searchItem3($search){
        
        $output = '';
        $query = "SELECT * FROM inventory WHERE unitprice LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>Item ID</th>
               <th>Item Name</th>
               <th>Minimum Stock</th>
               <th>Total Stock</th>
               <th>Unit Price</th>
               <th>Current Stock</th>
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["item_id"].'</td>
              <td>'.$row["item_name"].'</td>
              <td>'.$row["minimum_stock"].'</td>
              <td>'.$row["total_stock"].'</td>
              <td>'.$row["unitprice"].'</td>
              <td>'.$row["current_stock"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
           echo 'Sorry! Not found matching data.';
        }     
    }




}   
//create an object
$obj =new system_user;

/*****************************************************customer*********************************************************************** */

//for addition
if(ISSET($_POST['customer-add'])){
    
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $dob=$_POST['dob'];
    $country=$_POST['country'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    
    //$obj->generate_password();
    $obj->addCustomer($fname,$lname,$dob,$country, $email,$mobile);
}


//for edition and view model
if(ISSET($_POST["cus_id"]))
{
    $num= $_POST["cus_id"];
    $obj->edit($num);
}

if(ISSET($_POST["update-customer"]))
{
    $cus_id=$_POST['ecus_id'];
    $fname=$_POST['efirstname'];
    $lname=$_POST['elastname'];
    $dob=$_POST['ebirthdate'];
    $country=$_POST['ecountry'];
    $email=$_POST['eemail'];
    $mobile=$_POST['econtactno'];   
    $obj->updateCustomer($cus_id,$fname,$lname,$dob,$country, $email,$mobile);
}




//for deletion
if(ISSET($_REQUEST["selectedButtonValue"]))
{
   $buttonPHP = $_REQUEST['selectedButtonValue'];
   $obj->removeCustomer($buttonPHP);
}


//for customer searching
if(ISSET($_POST["customer_query1"]))
{
    $query =  $_POST["customer_query1"];
    $obj->searchCustomer1($query);
}

if(ISSET($_POST["customer_query2"]))
{
    $query =  $_POST["customer_query2"];
    $obj->searchCustomer2($query);
}

if(ISSET($_POST["customer_query3"]))
{
    $query =  $_POST["customer_query3"];
    $obj->searchCustomer3($query);
}

if(ISSET($_POST["customer_query4"]))
{
    $query =  $_POST["customer_query4"];
    $obj->searchCustomer4($query);
}


//sms
if(ISSET($_POST["send-msg-btn2"]))
{
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                            
        $mobile = $_POST['mobile'];
        $message = $_POST['message'];
        //echo $mobile;
        //echo $message;
        
      
        
        include ( "NexmoMessage.php" );
    
        $nexmo_sms = new NexmoMessage('92bc7b57', 'huKQ8xBfwXL3snDw');
    
        $info = $nexmo_sms->sendText('+94'.$mobile.'', 'MyApp', "'.$message.'");
    
        echo $nexmo_sms->displayOverview($info);
        
        echo "<script type='text/javascript'>window.location='../s_customer.php';
                </script>"; 
    }
    }


/****************************************************************room************************************************************* */

if(ISSET($_POST['room-add'])){
    
    $option=$_POST['option'];
    $obj->addRoom($option);
}

//for edition and view model
if(ISSET($_POST["room_no"]))
{
    $num= $_POST["room_no"];
    $obj->edit_room($num);
}

if(ISSET($_POST["update-room"]))
{
    $room_no=$_POST['r_no'];
    $cat_id=$_POST['eecat_id'];  
    $obj->updateRoom($room_no,$cat_id);
}

//for deletion
if(ISSET($_REQUEST["selectedButtonValue2"]))
{
   $buttonPHP = $_REQUEST['selectedButtonValue2'];
   $obj->removeRoom($buttonPHP);
}

//for searching
if(ISSET($_POST["room_query1"]))
{
    $query =  $_POST["room_query1"];
    $obj->searchRoom1($query);
}

if(ISSET($_POST["room_query2"]))
{
    $query =  $_POST["room_query2"];
    $obj->searchRoom2($query);
}

/*************************************************************room category******************************************************* */

if(ISSET($_POST['room-cat-add'])){
    
    // Get values from form 
   
    $cat_name=$_POST['cat_name'];
    $size=$_POST['approximate_size'];
    $adults=$_POST['maximum_adults'];
    $bed=$_POST['bed_type'];
    $connect=$_POST['connecting_rooms'];
    $price=$_POST['room_price'];
    $desc=$_POST['cat_desc'];
    $room_image='uploads/upload_room/'.basename($_FILES["file"]["name"]);
    $obj->addRoomcat($cat_name,$size,$adults,$bed,$connect,$price,$desc,$room_image);
}

//for edition and view model
if(ISSET($_POST["cat_id"]))
{
    $num= $_POST["cat_id"];
    $obj->edit_room_category($num);
}

if(ISSET($_POST["update-room-category"]))
{
    $cat_id=$_POST['ecaty_id'];  
    echo $cat_id;
    $name=$_POST['ename'];

    $size=$_POST['esize'];  
    $adults=$_POST['eadults'];  
    $bed=$_POST['ebedType'];  
    $connecting=$_POST['econnectingRooms']; 
    $price=$_POST['eroomPrice'];   
    $description=$_POST['edescription'];  

    $obj->updateRoomCategory($cat_id,$name, $size,$adults,$bed,$connecting,$price,$description);
}

//for deletion
if(ISSET($_REQUEST["selectedButtonValue4"]))
{
   $buttonPHP = $_REQUEST['selectedButtonValue4'];
   $obj->removeRoomCategory($buttonPHP);
}

//for searching
if(ISSET($_POST["room_category_query1"]))
{
    $query =  $_POST["room_category_query1"];
    $obj->searchRoomCategory1($query);
}

if(ISSET($_POST["room_category_query2"]))
{
    $query =  $_POST["room_category_query2"];
    $obj->searchRoomCategory2($query);
}

if(ISSET($_POST["room_category_query3"]))
{
    $query =  $_POST["room_category_query3"];
    $obj->searchRoomCategory3($query);
}

/************************************************************reservation******************************************************** */
if(ISSET($_POST['reservation-add'])){
    
    // Get values from form 
    $cus_id=$_POST['option1'];
    $cat_id=$_POST['option2'];
    
    $cus_check_in= $_POST['check_in'];
    $cus_check_out = $_POST['check_out'];

    $cus_checkin= date('y-m-d', strtotime($cus_check_in));
    $cus_checkout= date('y-m-d', strtotime($cus_check_out));
    
    //getting reservation date and edition expire date
    $reservation_date =date("Y-m-d H:i:s");

    $obj->addReservation($cat_id,$cus_id,$cus_checkin,$cus_checkout,$reservation_date);
}

//for edition and view model
if(ISSET($_POST["reservation_no"]))
{      
    $num= $_POST["reservation_no"];
    $obj->edit_reservation($num);
}

if(ISSET($_POST["update-reservation"]))
{
    $reservation_no=$_POST['ereserve_no'];
    $checkin_date=$_POST['echeckin']; 
    $checkout_date=$_POST['echeckout'];
    $room_no=$_POST['eroom_no']; 
    $cus_id=$_POST['ecus_id'];
    $reservation_date=$_POST['edate'];
    $obj->updateReservation($reservation_no,$checkin_date,$checkout_date,$room_no,$cus_id,$reservation_date);
}

//for deletion
if(ISSET($_REQUEST["selectedButtonValue3"]))
{
   $buttonPHP = $_REQUEST['selectedButtonValue3'];
   $obj->removeReservation($buttonPHP);
}

//for searching
if(ISSET($_POST["reservation_query1"]))
{
    $query =  $_POST["reservation_query1"];
    $obj->searchReservation1($query);
}

if(ISSET($_POST["reservation_query2"]))
{
    $query =  $_POST["reservation_query2"];
    $obj->searchReservation2($query);
}

if(ISSET($_POST["reservation_query3"]))
{
    $query =  $_POST["reservation_query3"];
    $obj->searchReservation3($query);
}

if(ISSET($_POST["reservation_query4"]))
{
    $query =  $_POST["reservation_query4"];
    $obj->searchReservation4($query);
}

if(ISSET($_POST["reservation_query5"]))
{
    $query =  $_POST["reservation_query5"];
    $obj->searchReservation5($query);
}

/********************************************************dining***************************************************** */

if(ISSET($_POST['meal_add'])){
    
    /*	function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
        }*/
        
    $meal_id=$_POST['meal_id'];
    $meal_name=$_POST['meal_name'];
    $meal_desc=$_POST['meal_desc'];
    $e_id=$_POST['eType'];
    $price_per_meal=$_POST['price_per_meal'];
    $cuisine_id=$_POST['cType'];
    $meal_image='uploads/upload_meal/'.basename($_FILES["file"]["name"]);
    //	$image2 = addslashes(file_get_contents($_FILES['file']['tmp_name']));
    
        
        try{
        $obj->addmeal($meal_id,$meal_name,$meal_desc,$meal_image,$e_id,$price_per_meal,$cuisine_id);           
            
      }catch(Exception $ex){
            echo $ex->getMessage();
            
      } 
}

if(ISSET($_POST["update-meal"]))
{  
    $meal_id=$_POST['id'];  
    $meal_name=$_POST['emeal_name'];
    $description=$_POST['edescription'];  
    $eid=$_POST['eeid']; 
    $price=$_POST['eprice'];   
    $cuisine=$_POST['ecuisine'];
   

    $obj->updateMeal($meal_id,$meal_name, $description,$eid,$price,$cuisine,$meal_id);
   
}

//for deletion
if(ISSET($_REQUEST["selectedButtonValue9"]))
{
$buttonPHP = $_REQUEST['selectedButtonValue9'];
echo $buttonPHP;
$obj->removeMeal($buttonPHP);
}

//for edition and view model
if(ISSET($_POST["meal_id"]))
{
    $num= $_POST["meal_id"];
    $obj->edit_meal($num);
}

//for searching
if(ISSET($_POST["meal_query1"]))
{
    $query =  $_POST["meal_query1"];
    $obj->searchMeal1($query);
}

if(ISSET($_POST["meal_query2"]))
{
    $query =  $_POST["meal_query2"];
    $obj->searchMeal2($query);
}

if(ISSET($_POST["meal_query3"]))
{
    $query =  $_POST["meal_query3"];
    $obj->searchMeal3($query);
}

if(ISSET($_POST["meal_query4"]))
{
    $query =  $_POST["meal_query4"];
    $obj->searchMeal4($query);
}

if(ISSET($_POST["meal_query5"]))
{
    $query =  $_POST["meal_query5"];
    $obj->searchMeal5($query);
}

/*********************************************************order******************************************************************* */

//for edition and view model
if(ISSET($_POST["order_id"]))
{      
    $num= $_POST["order_id"];
    $obj->edit_order($num);
}


//for searching
if(ISSET($_POST["order_query1"]))
{
    $query =  $_POST["order_query1"];
    $obj->searchOrder1($query);
}

if(ISSET($_POST["order_query2"]))
{
    $query =  $_POST["order_query2"];
    $obj->searchOrder2($query);
}

if(ISSET($_POST["order_query3"]))
{
    $query =  $_POST["order_query3"];
    $obj->searchOrder3($query);
}

if(ISSET($_POST["order_query4"]))
{
    $query =  $_POST["order_query4"];
    $obj->searchOrder4($query);
}

if(ISSET($_POST['order-meal'])){
    
    $cus_id=$_POST['cus_id']; 
    $cus_email=$_POST['cus_email'];
    $meal_id=$_POST['meal'];
    $order_deli_date= $_POST['order_deli_date'];
    
    $room_no=$_POST['room_no'];
    //$room_no= (int)$room_no;  
    $quantity=$_POST['quantity'];
   
    $order_deli_time=$_POST['order_deli_time'];  
    //getting customer check in and check out date
   
    date_default_timezone_set('Asia/Colombo');
    $ordered_date= date('Y-m-d  H:i:s') ;
    
    $sql ="SELECT *  FROM reservation WHERE cus_id='".$cus_id."' AND checkin <='".$order_deli_date."' AND checkout >='".$order_deli_date."' ";
    $query =mysqli_query($obj->con,$sql);
    $result = mysqli_query($obj ->con,$sql); 
    if( mysqli_num_rows($result) > 0){
        echo "Sorry! No orders on this date. Please check";  
    }elseif($obj->orderMeal($quantity,$order_deli_date,$cus_id,$meal_id,$order_deli_time,$ordered_date,$cus_email,$room_no)){  
        echo  "<script type='text/javascript'>alert('Your order is recorded successfully.');
        window.location='../s_d_orders.php';
        </script>";
    }  else{
        echo  "<script type='text/javascript'>alert('Sorry! Unable to record your order at this moment.Please try again shortly.');
        window.location='../s_d_orders.php';
        </script>";
    }
        }


/*********************************************************establishment type******************************************************* */
//add new one
if(ISSET($_POST['establishment-add'])){
    
    // Get values from form 
    $e_id=$_POST['eid'];
    $e_name=$_POST['ename'];
    $obj->addEstablishment($e_id,$e_name);
}

//for edition and view model
if(ISSET($_POST["e_id"]))
{      
    $num= $_POST["e_id"];
    $obj->edit_establishment($num);
}

if(ISSET($_POST["update-establishment"]))
{  
    $e_id=$_POST['id'];  
    $e_name=$_POST['ee_name'];
    
    $obj->updateEstablishment($e_id,$e_name);
   
}

//for deletion
if(ISSET($_REQUEST["selectedButtonValue78"]))
{
   $buttonPHP = $_REQUEST['selectedButtonValue78'];
   $obj->removeEstablishment($buttonPHP);

}

//for searching
if(ISSET($_POST["establishment_query1"]))
{
    $query =  $_POST["establishment_query1"];
    
    $obj->searchEstablishment1($query);
}

if(ISSET($_POST["establishment_query2"]))
{
    $query =  $_POST["establishment_query2"];
    $obj->searchEstablishment2($query);
}

/*********************************************************cuisine***************************************************************** */

//add new one
if(ISSET($_POST['cuisine-add'])){
    
    // Get values from form 
    $c_id=$_POST['cid'];
    $c_name=$_POST['cname'];
    $obj->addCuisine($c_id,$c_name);
}

//for edition and view model
if(ISSET($_POST["c_id"]))
{      
    $num= $_POST["c_id"];
    $obj->edit_cuisine($num);
}

if(ISSET($_POST["update-cuisine"]))
{  
    $c_id=$_POST['id'];  
    $c_name=$_POST['ec_name'];
    
    $obj->updateCuisine($c_id,$c_name);
   
}

//for deletion
if(ISSET($_REQUEST["selectedButtonValue79"]))
{
   $buttonPHP = $_REQUEST['selectedButtonValue79'];
   $obj->removeCuisine($buttonPHP);

}

//for searching
if(ISSET($_POST["cuisine_query1"]))
{
    $query =  $_POST["cuisine_query1"];
    
    $obj->searchCuisine1($query);
}

if(ISSET($_POST["cuisine_query2"]))
{
    $query =  $_POST["cuisine_query2"];
    $obj->searchCuisine2($query);
}
/***************************************************************services********************************************************** */
if(ISSET($_REQUEST["selectedButtonValue105"]))
{
   $buttonPHP = $_REQUEST['selectedButtonValue105'];
   $obj->removeTourplan($buttonPHP);
}


/**************************************************************Preplan tours***********************************************************************/
//add pre plan tours
if(ISSET($_POST['preplan_tour_add'])){
    
	$tour_name =$_POST['tour_name'];
	$places_to_visit = $_POST['places_to_visit'];
	$price  = $_POST['price'];
	$no_of_participant = $_POST['no_of_participant'];
	$no_of_days = $_POST['no_of_days'];
	$description =$_POST['description'];
	$img=$_FILES["image"]["tmp_name"];
	$name=$_FILES["image"]["name"];
	$path="../images/".$name;
	move_uploaded_file($img,$path);
	$p="images/".$name;
	
   
    if($obj->addpreplanT($tour_name,$places_to_visit,$price,$no_of_participant,$no_of_days,$description,$p)){
        echo "<script type='text/javascript'>alert('You have successfully added a new tour plan');
        window.location='../s_preplan_tour_add.php';
        </script>";
    }else{  
        echo "<script type='text/javascript'>alert('Sorry! Unable to add the tour plan at this moment. Please try again shortly!');
        window.location='../s_preplan_tour_add.php';
        </script>";     
    }  
}

//for update
if(ISSET($_POST['preplan_tour_update'])){
    
	//getting tour id
    $tour_id =$_POST['tour_id'];
    
    $places_to_visit = $_POST['places_to_visit'];
    $price= $_POST['price'];
	$no_of_participant  = $_POST['no_of_participant'];
	$no_of_days = $_POST['no_of_days'];
	$description = $_POST['description'];


    $obj->update_pre_plan_tour('pre_planed_tours',$tour_id,$places_to_visit,$price,$no_of_participant,$no_of_days,$description);         
}

//for delete pre plan tours
if(ISSET($_REQUEST["selectedButtonValue106"]))
{
   $buttonPHP = $_REQUEST['selectedButtonValue106'];
   $obj->remove_PreplanTour($buttonPHP);
}

//for deletion pre plan tour request
if(ISSET($_REQUEST["selectedButtonValue100"]))
{
   $buttonPHP = $_REQUEST['selectedButtonValue100'];
   $obj->removePrePlanTourRequests($buttonPHP);
}

/**************************************************************Tour Guide***********************************************************************/
//add tour guide
if(ISSET($_POST['tourguide_add'])){
    

    //$tg_id=$_POST['tg_id'];
    $tg_name =$_POST['tg_name'];
    $NIC = $_POST['NIC'];
    $contact_no = $_POST['contact_no'];
    $experience = $_POST['experience'];
    $language= $_POST['language'];
	$img=$_FILES["image"]["tmp_name"];
	$name=$_FILES["image"]["name"];
	$path="../images/".$name;
	move_uploaded_file($img,$path);
$p="images/".$name;
   $price_per_hour =$_POST['price_per_hour'];

   
        if($obj->addtg($tg_name,$NIC,$contact_no,$experience,$language,$p,$price_per_hour)){
            echo "<script type='text/javascript'>alert('Your have successfully added a new tour guide');
            window.location='../s_tour_guides.php';
            </script>";
        }else{  
            echo "<script type='text/javascript'>alert('Sorry! Unable to add the tour guide at this moment. Please try again shortly!');
            window.location='../s_tour_guides.php';
            </script>";     
        }  
}

//for deletion tour guide
if(ISSET($_REQUEST["selectedButtonValue101"]))
{
   $buttonPHP = $_REQUEST['selectedButtonValue101'];
   $obj->removeTourGuide($buttonPHP);
}

//to delete tour guide request
if(ISSET($_REQUEST["selectedButtonValue102"]))
{
   $buttonPHP = $_REQUEST['selectedButtonValue102'];
   $obj->removeTourGuideRequest($buttonPHP);
}

//for update
if(ISSET($_POST['tourguide_update'])){
    
	//getting tour id
    $tg_id =$_POST['tg_id'];
    
    $tg_name = $_POST['tg_name'];
    $NIC = $_POST['NIC'];
	$contact_no = $_POST['contact_no'];
	$experience = $_POST['experience'];
	$language = $_POST['language'];
	$price_per_hour = $_POST['price_per_hour'];


    $obj->update_tourguide('tour_guide',$tg_id,$tg_name,$NIC,$contact_no,$experience,$language,$price_per_hour);         
}

/**************************************************************Transport***********************************************************************/
//add transport
if(ISSET($_POST['transport_add'])){
    

    $vehical_type =$_POST['vehical_type'];
    $no_of_passangers = $_POST['no_of_passangers'];
    $price_per_km = $_POST['price_per_km'];
       
	$img=$_FILES["image"]["tmp_name"];
	$name=$_FILES["image"]["name"];
	$path="../images/".$name;
	move_uploaded_file($img,$path);
	$p="images/".$name;
	

   
        if($obj->transport_add($vehical_type,$no_of_passangers,$price_per_km,$p)){
            echo "<script type='text/javascript'>alert('Your have successfully added a new Transport service');
            window.location='../s_transport_add.php';
            </script>";
        }else{  
            echo "<script type='text/javascript'>alert('Sorry! Unable to add the tour guide at this moment. Please try again later!');
            window.location='../s_transport_add.php';
            </script>";     
        }  
}

//delete transport
if(ISSET($_REQUEST["selectedButtonValue103"]))
{
   $buttonPHP = $_REQUEST['selectedButtonValue103'];
   $obj->removeTransport($buttonPHP);
}

//delete transport request
if(ISSET($_REQUEST["selectedButtonValue104"]))
{
   $buttonPHP = $_REQUEST['selectedButtonValue104'];
   $obj->removeTransportServiceRequest($buttonPHP);
}

//for update
if(ISSET($_POST['transport_update'])){
    
	//getting vehical id
    $vehical_id =$_POST['vehical_id'];
    
    $vehical_type = $_POST['vehical_type'];
    $no_of_passangers  = $_POST['no_of_passangers'];
	$price_per_km  = $_POST['price_per_km'];
	


    $obj->update_transport('transport_services',$vehical_id,$vehical_type,$no_of_passangers,$price_per_km);         
}
/*********************************************************promotion*************************************************************** */
/***************************************************************promotion********************************************************** */

//sms
if(ISSET($_POST["send-msg-btn1"]))
{
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                            
        $mobile = $_POST['mobile'];
        $message = $_POST['message'];
        echo $mobile;
        echo $message;
        
      
        
        include ( "NexmoMessage.php" );
    
        $nexmo_sms = new NexmoMessage('92bc7b57', 'huKQ8xBfwXL3snDw');
    
        $info = $nexmo_sms->sendText('+94'.$mobile.'', 'MyApp', "'.$message.'");
    
        echo $nexmo_sms->displayOverview($info);
        
        echo "<script type='text/javascript'>window.location='../s_d_promotion.php';
                </script>"; 
    }
}

//for deletion
if(ISSET($_REQUEST["selectedButtonValue55"]))
{
   $buttonPHP = $_REQUEST['selectedButtonValue55'];
   $obj->removePromotion($buttonPHP);

}

//for edition and view model
if(ISSET($_POST["promotion_no"]))
{
    $num= $_POST["promotion_no"];
    $obj->edit_prm($num);
}
if(ISSET($_POST["update-promotion"]))
{  
    $promotion_no=$_POST['id'];  
    $p_cap=$_POST['eprm_cap'];
    $description=$_POST['edescription'];  
    $p_cat=$_POST['epromo_cat']; 
    $p_name=$_POST['eprmname'];   
    $pkgdtl=$_POST['epckgdtl']; 
    
    $obj->updatePrm($promotion_no,$p_cap,$description,$p_cat,$p_name,$pkgdtl);
   
    
}

//add new one
if(ISSET($_POST['promotion-add'])){
    
    // Get values from form 
   // $promotion_no=$_POST['promotion_no'];  y
    $prm_caption=$_POST['prm_caption'];
    $prm_desc=$_POST['prm_desc'];  
    $promotion_cat_id=$_POST['promotion_cat_id']; 
    $promotion_name=$_POST['promotion_name']; 
    $promotion_img='uploads/promotions/'.basename($_FILES["file"]["name"]);
    $package_details=$_POST['package_details']; 

    /*echo $prm_caption."<br>" ;
    echo $prm_desc."<br>" ;
    echo $promotion_cat_id."<br>" ;
    echo $promotion_name."<br>" ;
    echo $promotion_img."<br>"   ;     
    echo $package_details."<br>" ;*/
        try{
        $obj->addpromotion($prm_caption,$prm_desc,$promotion_cat_id,$promotion_name,$promotion_img,$package_details);           
            
      }catch(Exception $ex){
            echo $ex->getMessage();
            
      } 
    
}
//for searching
if(ISSET($_POST["prm_query1"]))
{
    $query =  $_POST["prm_query1"];
    
    $obj->searchPrm1($query);
}

if(ISSET($_POST["prm_query2"]))
{
    $query =  $_POST["prm_query2"];
    $obj->searchPrm2($query);
}
if(ISSET($_POST["prm_query3"]))
{
    $query =  $_POST["prm_query3"];
    
    $obj->searchPrm3($query);
}

if(ISSET($_POST["prm_query4"]))
{
    $query =  $_POST["prm_query4"];
    $obj->searchPrm4($query);
}

/********************************************************job vacancy************************************************************** */

if(ISSET($_POST['job_vacany_add'])){
    
    // Get values from form 
    $vac_id=$_POST['vac_id'];
    $position=$_POST['position'];
    $salary=$_POST['salary'];
    $contract=$_POST['contract'];
    $desc=$_POST['desc'];
    $vacancy_image='uploads/upload_vacancy/'.basename($_FILES["file"]["name"]);
    $obj->addJobVacancy($vac_id,$position,$salary,$contract,$desc,$vacancy_image);
}

//for edition and view model
if(ISSET($_POST["vac_id"]))
{      
    $num= $_POST["vac_id"];
    $obj->edit_vacancy($num);
}

if(ISSET($_POST["update-vacancy"]))
{
    $vac_id=$_POST['evacancy_id'];
    $position=$_POST['eposition']; 
    $salary=$_POST['esalary'];
    $contract=$_POST['econtract']; 
    $description=$_POST['edescription'];
    
    $obj->updateVacancy($vac_id,$position,$salary,$contract,$description);
}


//for deletion
if(ISSET($_REQUEST["selectedButtonValue5"]))
{
   $buttonPHP = $_REQUEST['selectedButtonValue5'];
   $obj->removeVacancy($buttonPHP);
}

//for searching
if(ISSET($_POST["vacancy_query1"]))
{
    $query =  $_POST["vacancy_query1"];
    $obj->searchVacancy1($query);
}

if(ISSET($_POST["vacancy_query2"]))
{
    $query =  $_POST["vacancy_query2"];
    $obj->searchVacancy2($query);
}

if(ISSET($_POST["vacancy_query3"]))
{
    $query =  $_POST["vacancy_query3"];
    $obj->searchVacancy3($query);
}

if(ISSET($_POST["vacancy_query4"]))
{
    $query =  $_POST["vacancy_query4"];
    $obj->searchVacancy4($query);
}

/*******************************************************candidate***************************************************************** */

//for edition and view model
if(ISSET($_POST["candidate_id"]))
{      
    $num= $_POST["candidate_id"];
    $obj->edit_candidate($num);
}

//for searching
if(ISSET($_POST["candidate_query1"]))
{
    $query =  $_POST["candidate_query1"];
    $obj->searchCandidate1($query);
}

if(ISSET($_POST["candidate_query2"]))
{
    $query =  $_POST["candidate_query2"];
    $obj->searchCandidate2($query);
}

if(ISSET($_POST["candidate_query3"]))
{
    $query =  $_POST["candidate_query3"];
    $obj->searchCandidate3($query);
}

if(ISSET($_POST["candidate_query4"]))
{
    $query =  $_POST["candidate_query4"];
    $obj->searchCandidate4($query);
}

//for download
if(ISSET($_POST["file_name"]))
{
    $file =  $_POST["file_name"];
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.$file.'"');
    readfile('downloads/'.$file);
    exit;
    
}


/*******************************************************feedback***************************************************************** */
//for edition and view model
if(ISSET($_POST["feedback_id"]))
{      
    $num= $_POST["feedback_id"];
    $obj->edit_feedback($num);
}

//for searching
if(ISSET($_POST["feedback_query1"]))
{
    $query =  $_POST["feedback_query1"];
    $obj->searchFeedback1($query);
}

if(ISSET($_POST["feedback_query2"]))
{
    $query =  $_POST["feedback_query2"];
    $obj->searchFeedback2($query);
}


/*****************************************************inventory************************************************************ */

if(ISSET($_POST['item-add'])){
    
    // Get values from form 
    $item_name=$_POST['name'];
    $unit_price=$_POST['price'];
    $minimum_stock=$_POST['minimum'];
    $total_stock=$_POST['total'];

    $obj->addItem($item_name,$unit_price,$minimum_stock,$total_stock);
}

if(ISSET($_POST['adding'])){
    
    // Get values from form 
    $item_id=$_POST['option'];
    $obj->addingItem($item_id);
}

if(ISSET($_POST['issue'])){
    
    // Get values from form 
    $item_id=$_POST['option'];
    $obj->issueItem($item_id);
}

//for edition and view model
if(ISSET($_POST["item_id"]))
{      
    $num= $_POST["item_id"];
    $obj->edit_item($num);
}

if(ISSET($_POST["update-item"]))
{
    $item_id=$_POST['item'];
    $name=$_POST['eitemName']; 
    $minimum=$_POST['emaximumStock'];
    $total=$_POST['etotalStock']; 
    $price=$_POST['eprice'];
    $current=$_POST['ecurrentStock'];
    
    $obj->updateItem($item_id,$name,$minimum,$total,$price,$current);
}

//for deletion
if(ISSET($_REQUEST["selectedButtonValue6"]))
{
   $buttonPHP = $_REQUEST['selectedButtonValue6'];
   $obj->removeItem($buttonPHP);
}

//for searching
if(ISSET($_POST["item_query1"]))
{
    $query =  $_POST["item_query1"];
    $obj->searchItem1($query);
}

if(ISSET($_POST["item_query2"]))
{
    $query =  $_POST["item_query2"];
    $obj->searchItem2($query);
}

if(ISSET($_POST["item_query3"]))
{
    $query =  $_POST["item_query3"];
    $obj->searchItem3($query);
}
/*****************************************************customer*************************************************************************** */
 



?>