<?php

//var_dump($_POST);
include "user.php";
//customer class
class customer extends user{

    public $fname;
    public $lname;
    public $birthdate;
    public $country;
    public $email;
    public $contactno;
    private $username ;
    private $pwd;

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


    public function register($table,$fields){
        $sql="";
        $sql.="INSERT INTO ".$table;
        $sql.=" (".implode(",",array_keys($fields)).") VALUES";
        $sql.=" ('".implode("','",array_values($fields))."')";
        //echo $sql;
        $query = mysqli_query($this ->con,$sql);
        if($query){
            return true;
        } 
    }

    /************************************************************edit profile********************************************************* */
    public function updateCustomer($cus_id, $fname,$lname,$dob,$country,$email, $mobile,$user_type,$username ){
        $sql="";
        $sql.="UPDATE `customer` SET  `cus_fname` = '".$fname."', `cus_lname` = '".$lname."', `dob` = '".$dob."', `country` = '".$country."', `cus_email` = '".$email."', `mobile` = '".$mobile."', `username` = '".$username."',`user_type` = '".$user_type."' WHERE `customer`.`cus_id` = ".$cus_id ;
        //echo $sql;
        $query = mysqli_query($this ->con,$sql);
        if($query){
            return true;
        } 
    }
    public function updateUser1($user_id, $fname,$lname,$email, $mobile,$username ){
        $sql="";
        $sql="UPDATE `systemuser` SET  `user_fname` = '".$fname."', `user_lname` = '".$lname."', `user_email` = '".$email."', `mobile` = '".$mobile."', `username` = '".$username."' WHERE `systemuser`.`user_id` = ".$user_id ;
        //echo $sql;
        $query = mysqli_query($this ->con,$sql);
        if($query){
            return true;
        } 
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
    public function viewSystemuser($table,$id){
        $sql ="SELECT *  FROM ".$table." WHERE user_id='$id'";
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }
    public function updateCusPassword($cus_id,$npwd,$opwd ){
        $opwd2= md5($opwd);
        $npwd2 = md5($npwd);
        $sql ="SELECT *  FROM  customer WHERE cus_id='$cus_id' AND `password` ='".$opwd2."' ";
        $query =mysqli_query($this->con,$sql);

        if(mysqli_affected_rows($this ->con) >= 1){
            //$query2 = "UPDATE customer SET password='".$npwd."' WHERE cus_id='$cus_id'";
            $query2 ="UPDATE `customer` SET `password` = '".$npwd2."' , `tpassword` = '".$npwd."' WHERE `cus_id` = '$cus_id' ";
            $query3 =mysqli_query($this->con,$query2);
            //echo $query2;
            if(mysqli_affected_rows($this ->con) >= 1){
                echo "<script type='text/javascript'>alert('You have successfullly updated the password');
                window.location='../login.php';
                </script>";
            }else{
                echo "<script type='text/javascript'>alert('Sorry! Unable to update at this moment. Please try again shortly');
                window.location='../edit_profile.php';
                </script>";
            }
            
        }else{
            echo "<script type='text/javascript'>alert('Sorry! Passwords do not match');
            window.location='../edit_profile.php';
            </script>";
        }   
        
    }
    public function updateUserPassword($user_id,$npwd,$opwd ){
        $npwd2 =md5($npwd);
        $opwd2 =md5($opwd);
        $sql ="SELECT *  FROM  systemuser WHERE user_id='$user_id' AND `password` ='".$opwd2."' ";
        $query =mysqli_query($this->con,$sql);

        if(mysqli_affected_rows($this ->con) >= 1){
            //$query2 = "UPDATE customer SET password='".$npwd."' WHERE cus_id='$cus_id'";
            $query2 ="UPDATE `systemuser` SET `password` = '".$npwd2."',`tpassword` = '".$npwd."' WHERE `user_id` = '$user_id' ";
            $query3 =mysqli_query($this->con,$query2);
            //echo $query2;
            if(mysqli_affected_rows($this ->con) >= 1){
                echo "<script type='text/javascript'>alert('You have successfullly updated the password');
                window.location='../login.php';
                </script>";
            }else{
                echo "<script type='text/javascript'>alert('Sorry! Unable to update at this moment. Please try again shortly');
                window.location='../edit_profile3.php';
                </script>";
            }
            
        }else{
            echo "<script type='text/javascript'>alert('Sorry! Passwords do not match');
            window.location='../edit_profile3.php';
            </script>";
        }   
        
    }

    public function contact_us($table,$fields){
        
        $sql="";
        $sql.="INSERT INTO ".$table;
        $sql.=" (".implode(",",array_keys($fields)).") VALUES";
        $sql.=" ('".implode("','",array_values($fields))."')";
        //echo $sql;
        $query = mysqli_query($this ->con,$sql);
        if($query){
            return true;
        } 
    }
    
    
    

    /***********************************************ROOMS*************************************************************************** */
    public function view_rooms($table){
        $sql ="SELECT *  FROM ".$table;
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }


    public function checkRoomAvailability($cat_id, $cus_checkin,$cus_checkout){
        
        $query ="SELECT room_no FROM rooms WHERE cat_id='$cat_id' and room_no not in (select room_no FROM reservation WHERE checkout > '$cus_checkin' AND checkin < '$cus_checkout')";
        $result = mysqli_query($this ->con,$query); 
        if(mysqli_num_rows($result)){  
             return true;  
        }else{  
             $this->error = "Wrong Data";  
        }  
    }


    public function reserveRoom($cat_id, $cus_checkin,$cus_checkout,$reservation_date,$new_cusid){
        
        $query ="SELECT room_no FROM rooms WHERE cat_id='$cat_id' and room_no not in (select room_no FROM reservation WHERE checkout > '$cus_checkin' AND checkin < '$cus_checkout')";
        $result = mysqli_query($this ->con,$query); 
        if(mysqli_num_rows($result)){  
            $rooms=mysqli_fetch_array($result);
            
            $reserved_room =$rooms[0];
            
            $query2 = "INSERT INTO reservation (checkin,checkout,room_no,cus_id,reservation_date) VALUES('".$cus_checkin."','".$cus_checkout."','".$reserved_room."','".$new_cusid."','".$reservation_date."')";
            $result2 = mysqli_query($this ->con,$query2);                                         
            
            if( $result2){    
                echo "<script type='text/javascript'>alert('Your reservation is successfully completed.');
                window.location='../reservation_room.php';
                </script>";    
                   
            }else{
               echo "<script type='text/javascript'>alert('Sorry! Your reservation can not be complete at this moment.Please try again shortly.');
                window.location='../reservation_room.php';
                </script>";
            }  
        }else{  
            echo "<script type='text/javascript'>alert('Sorry! Your reservation can not be completed due to the unavailability of rooms.');
            window.location='../reservation_room.php';
            </script>";        
        }   
    }

    public function currentReservations($table,$cus_id,$current_date){

        $sql ="SELECT *  FROM ".$table." WHERE cus_id='$cus_id' AND checkin  >= '$current_date'";
        $query =mysqli_query($this->con,$sql);

        if(mysqli_affected_rows($this ->con) >= 1){
            $array =array();
            while($row =mysqli_fetch_assoc($query)){
                $array[] = $row;
            }
            return $array;
        }else{
            echo "<script type='text/javascript'>alert('Sorry! No reservationa are found.');
            window.location='reservation_room.php';
            </script>";
        }   
    }


    public function cancelReservation($table,$reservation_id){
        
        $query ="DELETE  FROM ".$table."  where reservation_no='$reservation_id' AND DATEDIFF(checkin,NOW() ) >= 2 ;";
        $result = mysqli_query($this ->con,$query); 
        if(mysqli_affected_rows($this ->con)==1){
            echo "<script type='text/javascript'>alert('You have successfullly canceled the reservation.');
            window.location='../reservation_cancel.php';
            </script>"; 
        }else{ 
            echo "<script type='text/javascript'>alert('Sorry! You are only allow to cancel reservations atleast 2 days before the checkin date.');
            window.location='../reservation_cancel.php';
            </script>";          
        }   
    }

    public function changeReservation($table,$reservation_id,$cat_id,$cus_checkin,$cus_checkout,$cus_id){
        $query ="SELECT room_no FROM rooms WHERE cat_id='$cat_id' and room_no not in (select room_no FROM reservation WHERE checkout > '$cus_checkin' AND checkin < '$cus_checkout')";
        $result = mysqli_query($this ->con,$query); 
        if(mysqli_num_rows($result)){  

            $rooms=mysqli_fetch_array($result); 
            $reserved_room =$rooms[0];

            
            $query2 = "UPDATE reservation SET checkin='".$cus_checkin."', checkout='".$cus_checkout."', room_no='".$reserved_room."', cus_id='".$cus_id."' WHERE reservation_no='".$reservation_id."' AND DATEDIFF(checkin,NOW() ) >= 2 ;  ";
            $result2 = mysqli_query($this ->con,$query2);                                         
            
            if( mysqli_affected_rows($this ->con)==1){    
                echo "<script type='text/javascript'>alert('You heve successfullly update the reservation.');
                window.location='../reservation_change.php';
                </script>";    
                   
            }else{
               echo "<script type='text/javascript'>alert('Sorry! You are only allow to update reservations atleast 2 days before the checkin date.');
                window.location='../reservation_change.php';
                </script>";
            }  
        }else{  
            echo "<script type='text/javascript'>alert('Sorry! Your reservation connot update due to the unavailability of rooms.');
            window.location='../reservation_change.php';
            </script>";        
        }         
    }
    /*********************************************dinning***************************************************************************** */

    public function meal($table){
        
         $sql ="SELECT *  FROM ".$table;
         $array =array();
         $query =mysqli_query($this->con,$sql);
         while($row =mysqli_fetch_assoc($query)){
             $array[] = $row;
         }
         return $array;
     }
     public function meal1($table,$e_id){
         $sql ="SELECT *  FROM ".$table." WHERE e_id='$e_id'";
         $array =array();
         $query =mysqli_query($this->con,$sql);
         while($row =mysqli_fetch_assoc($query)){
             $array[] = $row;
         }
         return $array;
     }
     public function establishment_type($table,$e_id){
         $sql ="SELECT *  FROM ".$table." WHERE e_id='$e_id'";
         $array =array();
         $query =mysqli_query($this->con,$sql);
         while($row =mysqli_fetch_assoc($query)){
             $array[] = $row;
         }
         return $array;
     }
 
      public function showMyReservations($table,$cus_id){
 
         $sql ="SELECT *  FROM ".$table." WHERE cus_id='$cus_id' ";
         $query =mysqli_query($this->con,$sql);
 
         if(mysqli_affected_rows($this ->con) >= 1){
             $array =array();
             while($row =mysqli_fetch_assoc($query)){
                 $array[] = $row;
             }
             return $array;
         }else{
             echo "<script type='text/javascript'>alert('Sorry! No reservations are found. Please Reserve room to place the order.');
             window.location='view_dmeal.php';
             </script>";
         }   
     }
     public function showMyReservations1($table,$cus_id,$p){
 
         $sql ="SELECT *  FROM ".$table." WHERE cus_id='".$cus_id."' AND checkin <='".$p."' AND checkout >='".$p."' ";
         $query =mysqli_query($this->con,$sql);
 
         if(mysqli_affected_rows($this ->con) >= 1){
             $array =array();
             while($row =mysqli_fetch_assoc($query)){
                 $array[] = $row;
             }
             return $array;
         }else{
             echo "<script type='text/javascript'>alert('Sorry! No reservations are found.');
             window.location='d_orderMeal.php';
             </script>";
         }   
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
     public function getTableBookingDetails($table,$cus_id,$p){
 
         $sql ="SELECT *  FROM ".$table." WHERE cus_id='".$cus_id."' AND checkin <='".$p."' AND checkout >='".$p."' ";
         $query =mysqli_query($this->con,$sql);
 
         if(mysqli_affected_rows($this ->con) >= 1){
             $array =array();
             while($row =mysqli_fetch_assoc($query)){
                 $array[] = $row;
             }
             return $array;
         }else{
             echo "<script type='text/javascript'>alert('Sorry! No reservations are found.');
             window.location='d_orderMeal.php';
             </script>";
         }   
     }


    /*********************************************SERVICES***************************************************************************** */
    public function view_tourPlans($table){
        
        $sql ="SELECT *  FROM ".$table;
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }

    public function view_tourGuides($table){
        
        $sql ="SELECT *  FROM ".$table;
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }

    public function view_transportServices($table){
        
        $sql ="SELECT *  FROM ".$table;
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }
	
	/**************************************MAKE TOUR PLAN*************************************************************/
	
	
	
	public function make_tour_plan($cus_id,$checkin,$checkout,$date,$other,$no_of_participant,$pick_up_time,$places){
        
        $query ="INSERT INTO tour_plan (checkin,checkout,date,other,no_of_participant,pick_up_time,places,cus_id ) VALUES('".$checkin."','".$checkout."','".$date."','".$other."','".$no_of_participant."','".$pick_up_time."','".$places."','".$cus_id."')";
        $result = mysqli_query($this ->con,$query); 
        if(mysqli_affected_rows($this ->con)==1){  
             return true;  
        }else{  
            $this->error = "Wrong Data";  
        }  
    }
	
	 public function current_tours($table,$cus_id,$current_date){

        $sql ="SELECT *  FROM ".$table." WHERE cus_id='$cus_id' AND checkin >= '$current_date'";
        $query =mysqli_query($this->con,$sql);

        if(mysqli_affected_rows($this ->con) >= 1){
            $array =array();
            while($row =mysqli_fetch_assoc($query)){
                $array[] = $row;
            }
            return $array;
        }else{
            echo "<script type='text/javascript'>alert('Sorry! No requests are found.');
            window.location='make_tour_plan.php';
            </script>";
        }   
    }
	
	public function change_maked_tourplan($table,$tour_id,$cus_checkin,$cus_checkout,$cus_id,$places,$pick_up_time,$no_of_participant,$other,$date){
                    
        $query = "UPDATE tour_plan SET checkin='".$cus_checkin."', checkout='".$cus_checkout."', date='".$date."',other='".$other."',no_of_participant ='".$no_of_participant."', pick_up_time='".$pick_up_time."', places='".$places."' WHERE tp_id ='".$tour_id."' AND DATEDIFF(checkin,NOW() ) >= 2 ;  ";
        $result = mysqli_query($this ->con,$query);                                         
            
        if( mysqli_affected_rows($this ->con)==1){    
            echo "<script type='text/javascript'>alert('Your reservation has successfully updated. Enjoy well!');
            window.location='../change_tour_plan.php';
            </script>";    
                   
        }else{
             echo "<script type='text/javascript'>alert('Sorry! You are only allow to change reservations atleast days before the tour start date.');
             window.location='../change_tour_plan.php';
             </script>";
            }  
    }  

	public function cancel_made_tours($table,$tour_id){
        
        $query ="DELETE  FROM ".$table."  where tp_id ='$tour_id' AND DATEDIFF(checkin,NOW() ) >= 2 ;";
        $result = mysqli_query($this ->con,$query); 
        if(mysqli_affected_rows($this ->con)==1){
            echo "<script type='text/javascript'>alert('You have successfullly canceled the request.');
            window.location='../make_tour_plan.php';
            </script>"; 
        }else{ 
            echo "<script type='text/javascript'>alert('Sorry! You are only allow to cancel requests atleast 2 days before the tour start date.');
            window.location='../make_tour_plan.php';
            </script>";          
        }   
    }
 
/*******************************PRE PLANED TOURS**************************************************************/
    public function request_preplaned_tours($cus_id,$tour_id,$tour_check_in,$tour_check_out,$date){
        
        $query ="INSERT INTO pre_planed_tour_reservation (tour_check_in,tour_check_out,date,cus_id,tour_id ) VALUES('".$tour_check_in."','".$tour_check_out."','".$date."','".$cus_id."','".$tour_id."')";
        $result = mysqli_query($this ->con,$query); 
        if(mysqli_affected_rows($this ->con)==1){  
             return true;  
        }else{  
            $this->error = "Wrong Data";  
        }  
    }
	
	 public function current_preplanned_tours($table,$cus_id,$current_date){

        $sql ="SELECT *  FROM ".$table." WHERE cus_id='$cus_id' AND tour_check_in   >= '$current_date'";
        $query =mysqli_query($this->con,$sql);

        if(mysqli_affected_rows($this ->con) >= 1){
            $array =array();
            while($row =mysqli_fetch_assoc($query)){
                $array[] = $row;
            }
            return $array;
        }else{
            echo "<script type='text/javascript'>alert('Sorry! No requests are found.');
            window.location='request_preplanned_tours.php';
            </script>";
        }   
    }
	
	  public function cancel_preplanned_tours($table,$request_id){
        
        $query ="DELETE  FROM ".$table."  where tour_no ='$request_id' AND DATEDIFF(tour_check_in ,NOW() ) >= 2 ;";
        $result = mysqli_query($this ->con,$query); 
        if(mysqli_affected_rows($this ->con)==1){
            echo "<script type='text/javascript'>alert('Your request has cancelled successfully.');
            window.location='../request_preplanned_tours.php';
            </script>"; 
        }else{ 
            echo "<script type='text/javascript'>alert('Sorry! You are only allow to cancel requests atleast 2 days before the tour start date.');
            window.location='../request_preplanned_tours.php';
            </script>";          
        }   
    }
	
	public function change_preplaned_tour($table,$request_id,$tour_id,$tp_check_in,$tp_check_out,$cus_id,$date){
                    
            $query2 = "UPDATE pre_planed_tour_reservation SET tour_check_in='".$tp_check_in."', tour_check_out='".$tp_check_out."', cus_id='".$cus_id."', date='".$date."' WHERE tour_no='".$request_id."' AND DATEDIFF(tour_check_in ,NOW() ) >= 2 ;  ";
            $result2 = mysqli_query($this ->con,$query2);                                         
            
            if( mysqli_affected_rows($this ->con)==1){    
                echo "<script type='text/javascript'>alert('Your request has successfully updated. Enjoy well!');
                window.location='../change_preplanned_tours.php';
                </script>";    
                   
            }else{
               echo "<script type='text/javascript'>alert('Sorry! You are only allow to change reservations atleast 2 days before the tour start date.');
                window.location='../change_preplanned_tours.php';
                </script>";
            }  
    }

	
	/*********************************************TOUR GUIDE***********************************************************************/
	
    public function request_touguide($table,$tg_id,$checkin,$checkout,$cus_id,$date,$places,$time){
        
		//$query ="SELECT tg_id FROM tour_guide WHERE tg_id='$tg_id' and tg_id not in (select tg_id FROM tour_guide_reservation WHERE tg_checkout > '$checkin' AND tg_checkin < '$checkout')";
     
        $query ="SELECT tg_id FROM tour_guide_reservation WHERE tg_id='$tg_id' AND tg_checkout > '$checkin' AND tg_checkin < '$checkout'";
        $result = mysqli_query($this ->con,$query); 
        if(mysqli_num_rows($result)){  
            echo "<script type='text/javascript'>alert('Sorry! Your reservation can not be completed due to the unavailability of tour guide.');
					window.location='../request_tourguides.php';
            </script>";     
        }else{
            $tg=mysqli_fetch_array($result);
            
            $query2 = "INSERT INTO tour_guide_reservation(tg_checkin,tg_checkout,places_to_visit,tg_checkin_time,date,cus_id ,tg_id) VALUES('".$checkin."','".$checkout."','".$places."','".$time."','".$date."','".$cus_id ."','".$tg_id."')";
            $result2 = mysqli_query($this ->con,$query2);                                         
            
            if( $result2){    
                echo "<script type='text/javascript'>alert('You have successfully request the tour guide!');
                window.location='../request_tourguides.php';
                </script>";    
                   
            }else{
               echo "<script type='text/javascript'>alert('Sorry! Your request can not complete at this moment.Please try again shortly.');
               window.location='../request_tourguides.php';
                </script>";
            }    
                    
        }   
    }
	
	public function current_tour_guide_request($table,$cus_id,$current_date){

        $sql ="SELECT *  FROM ".$table." WHERE cus_id='$cus_id' AND tg_checkin >= '$current_date'";
        $query =mysqli_query($this->con,$sql);

        if(mysqli_affected_rows($this ->con) >= 1){
            $array =array();
            while($row =mysqli_fetch_assoc($query)){
                $array[] = $row;
            }
            return $array;
        }else{
            echo "<script type='text/javascript'>alert('Sorry! No requests are found.');
            window.location='request_tourguides.php';
            </script>";
        }   
    }
	
	  public function cancel_tour_guide($table,$tg_request_id){
        
        $query ="DELETE  FROM ".$table."  where tour_guide_no ='$tg_request_id' AND DATEDIFF(tg_checkin ,NOW() ) >= 2 ;";
        $result = mysqli_query($this ->con,$query); 
        if(mysqli_affected_rows($this ->con)==1){
            echo "<script type='text/javascript'>alert('Your request has cancelled successfully.');
            window.location='../request_tourguides.php';
            </script>"; 
        }else{ 
            echo "<script type='text/javascript'>alert('Sorry1 You are allow to cancel request atleast 2 days before the tour start date.');
            window.location='../request_tourguides.php';
            </script>";          
        }   
    }
	
	public function change_Tour_guide($table,$tgrequest_id,$tg_id,$tgcheckin,$tgcheckout,$cus_id,$date,$places,$tg_checkin_time){
		
        $query ="SELECT tg_id FROM tour_guide WHERE tg_id='$tg_id' and tg_id not in (select tg_id FROM tour_guide_reservation WHERE tg_checkout > '$tgcheckin' AND tg_checkin < '$tgcheckout')";	
        $result = mysqli_query($this ->con,$query); 
		
			
		/*while($row=mysqli_fetch_array($result)){
			echo $row["tg_id"];
			echo $row["tg_checkout"];
			echo $row["tg_checkin"];
			
		}*/
		
        if(mysqli_num_rows($result)>0){  

		
		 /* echo "<script type='text/javascript'>alert('1');
                
                </script>";*/ 
            $tg=mysqli_fetch_array($result); 
            $reserved_tg =$tg[0];

            
            $query2 = "UPDATE tour_guide_reservation SET tg_checkin='".$tgcheckin."', tg_checkout='".$tgcheckout."', date='".$date."', cus_id='".$cus_id."', places_to_visit ='".$places."',tg_checkin_time ='".$tg_checkin_time."' WHERE tour_guide_no='".$tgrequest_id."' AND DATEDIFF(tg_checkin,NOW() ) >= 2 ;  ";
            $result2 = mysqli_query($this ->con,$query2);                                         
            
            if( mysqli_affected_rows($this ->con)==1){    
                echo "<script type='text/javascript'>alert('Your request has successfully updated.');
                window.location='../change_tourguide.php';
                </script>";    
                   
            }else{
               echo "<script type='text/javascript'>alert('Sorry! You are only allow to change requests atleast 2 days before the tour start date.');
                window.location='../change_tourguide.php';
                </script>";
            }  
        }else{  
		
		
		  /*echo "<script type='text/javascript'>alert('2');
                
                </script>"; */
            echo "<script type='text/javascript'>alert('Sorry! Your request can not update due to the unavailability of the tour guide.');
            window.location='../change_tourguide.php';
            </script>";        
        }         
    }
/*********************************************TRANSPORT*************************************************************************/
	
public function request_transport_service($table,$vehical_id,$checkin,$checkout,$cus_id,$date,$places,$time){
    
    $query ="SELECT vehical_id FROM transport_services_reservation WHERE vehical_id='$vehical_id' AND ts_checkout > '$checkin' AND ts_checkin < '$checkout'";
    $result = mysqli_query($this ->con,$query); 
    if(mysqli_num_rows($result)){  
        echo "<script type='text/javascript'>alert('Sorry! Your request can not be completed due to the unavailability of transport services.');
        window.location='../request_transportservice.php';
        </script>";     
    }else{
        $tg=mysqli_fetch_array($result);
        
        $query2 = "INSERT INTO transport_services_reservation (ts_checkin,ts_checkin_time,ts_checkout,places_to_visit,date,cus_id,vehical_id) VALUES('".$checkin."','".$time."','".$checkout."','".$places."','".$date."','".$cus_id."','".$vehical_id."')";
        $result2 = mysqli_query($this ->con,$query2);                                         
        
        if( $result2){    
            echo "<script type='text/javascript'>alert('Your reservation is successfully completed');
            window.location='../request_transportservice.php';
            </script>";    
               
        }else{
           echo "<script type='text/javascript'>alert('Sorry! Your request can not be complete at this moment.Please try again shortly.');
           window.location='../request_transportservices.php';
            </script>";
        }    
                
    }   
}
	
	public function current_transport_request($table,$cus_id,$current_date){

        $sql ="SELECT *  FROM ".$table." WHERE cus_id='$cus_id' AND ts_checkin >= '$current_date'";
        $query =mysqli_query($this->con,$sql);

        if(mysqli_affected_rows($this ->con) >= 1){
            $array =array();
            while($row =mysqli_fetch_assoc($query)){
                $array[] = $row;
            }
            return $array;
        }else{
            echo "<script type='text/javascript'>alert('Sorry! No requests are found.');
            window.location='request_transportservice.php';
            </script>";
        }   
    }
	
	  public function cancel_transport($table,$t_request_id){
        
        $query ="DELETE  FROM ".$table."  where transport_no ='$t_request_id' AND DATEDIFF(ts_checkin ,NOW() ) >= 2 ;";
        $result = mysqli_query($this ->con,$query); 
        if(mysqli_affected_rows($this ->con)==1){
            echo "<script type='text/javascript'>alert('Your request has canceled successfully.');
            window.location='../request_transportservice.php';
            </script>"; 
        }else{ 
            echo "<script type='text/javascript'>alert('Sorry! You are only allow to cancel requests atleast 2 days before the check in date.');
            window.location='../request_transportservice.php';
            </script>";          
        }   
    }
	
	
	
	public function transport_change($table,$trequest_id,$vehical_id,$cus_checkin,$cus_checkout,$cus_id,$places,$time,$date){

		$query ="SELECT vehical_id FROM transport_services WHERE vehical_id='$vehical_id' and vehical_id not in (select vehical_id FROM transport_services_reservation WHERE ts_checkout  > '$cus_checkin' AND ts_checkin < '$cus_checkout')";

	    //$query ="SELECT vehical_id FROM transport_services_reservation WHERE ts_checkout  > '$cus_checkin' AND ts_checkin < '$cus_checkout'";
        $result = mysqli_query($this ->con,$query); 
        if(mysqli_num_rows($result)>0){  

            $transport=mysqli_fetch_array($result); 
            $request_transport =$transport[0];

            
            $query2 = "UPDATE transport_services_reservation SET ts_checkin ='".$cus_checkin."', ts_checkout='".$cus_checkout."', vehical_id='".$vehical_id."', cus_id='".$cus_id."',places_to_visit ='".$places."',ts_checkin_time='".$time."',date ='".$date."' WHERE transport_no='".$trequest_id."' AND DATEDIFF(ts_checkin,NOW() ) >= 2 ;  ";
            $result2 = mysqli_query($this ->con,$query2);                                         
            
            if( mysqli_affected_rows($this ->con)==1){    
                echo "<script type='text/javascript'>alert('Your request has successfully updated.');
                window.location='../change_transportservice.php';
                </script>";    
                   
            }else{
               echo "<script type='text/javascript'>alert('Sorry! You are only allow to change requests atleast 2 days before the tour start date.');
                window.location='../change_transportservice.php';
                </script>";
            }  	
        }else{  
            echo "<script type='text/javascript'>alert('Sorry! Your request  can not update due to the unavailability of vehicals.');
            window.location='../change_transportservice.php';
            </script>";        
        }         
    }

    /**********************************************PROMOTIONS********************************************************* */
    public function view_promotions($table){
        
        $sql ="SELECT *  FROM ".$table;
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }

    public function view_promotions2($table,$promotionno){
        
        $sql ="SELECT *  FROM ".$table." WHERE  promotion_no =".$promotionno;
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }
    /*********************************************FEEDBACK*********************************************************** */
    public function addFeedback($cus_id,$cus_feedback){
        
        $query ="INSERT INTO feedback (cus_id,fd_msg) VALUES('".$cus_id."','".$cus_feedback."')";
        $result = mysqli_query($this ->con,$query); 
        if($result > 0){  
             return true;  
        }else{  
             $this->error = "Wrong Data";  
        }  
    }

    /*******************************************CHATBOX************************************************************** */
    public function invokeChat($cus_id,$chat_cont,$chat_date,$chat_time){
        
        $query ="INSERT INTO chatbox (cus_id,chat_date,chat_time,chat_content) VALUES('".$cus_id."','".$chat_date."',CURRENT_TIMESTAMP(),'".$chat_cont."')";
        $result = mysqli_query($this ->con,$query); 
        if(mysqli_affected_rows($this ->con)==1){  
            return true;  
        }else{  
        $this->error = "Wrong Data";  
        }  
    }
        
        
    public function view_chat($table,$date){
                
        $sql ="SELECT *  FROM ".$table." where chat_date='$date'";
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
            return $array;
     }
        
    public function view_cusname($table,$cusid){
                
        $sql ="SELECT *  FROM ".$table."  where cus_id='$cusid'";
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
         return $array;
    }
        
    public function view_dates($table){
                
        $sql ="SELECT distinct chat_date  FROM ".$table." order by chat_date";
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }
        
    
} 

//create an object
$obj =new customer;

/****************************************************guest register page functions***********************************************/
if(ISSET($_POST['register'])){
    
    $myArray = array(
    //getting inputs froms the form
    "cus_fname"  => $_POST['fname'],
    "cus_lname"  =>  $_POST['lname'],
    "dob"        => $_POST['birthdate'],
    "country"    =>  $_POST['country'],
    "cus_email"  => $_POST['email'],
    "mobile"     => $_POST['contactno'],
    "username" => $_POST['username'],
    "password" =>  md5($_POST['pwd']),
    "tpassword" =>  $_POST['pwd'],
    "user_type"    => '1'
    );


    //check username and password
    $username    = $_POST['username'];
    $password   = $_POST['pwd'];

    $query1 ="SELECT * FROM customer WHERE username = '".$username."'";
    $result1 = mysqli_query($obj ->con,$query1);

    $query2 ="SELECT * FROM systemuser WHERE username = '".$username."'";
    $result2 = mysqli_query($obj ->con,$query2);
    
    if(mysqli_num_rows($result1)>0  || mysqli_num_rows($result2)>0){    
    
        echo "<script type='text/javascript'>alert('Sorry! An account with this username is already exists. Please try with another username.');
        window.location='../guest_register.php';
        </script>";
        
       
    }else{
        //insert data
        if($obj -> register("customer",$myArray)){
            echo "<script type='text/javascript'>alert('You are successfully registered. Thank You For Contacting Us.');
                window.location='../login.php';
            </script>";
              
        }else{
            echo "<script type='text/javascript'>alert('Sorry! Can not register at this moment. Please try again shortly.');
            window.location='../guest_register.php';
            </script>";
        }
        
        //pass values to the setters
        $obj ->  setUserName($_POST['username']);
        $obj ->  setPassword($_POST['pwd']);

        //get private attributes
        $obj ->   getUserName();
        $obj ->   getPassword();
    }
    
} 


/************************************************edit profile page************************************************************* */
if(ISSET($_POST['updatecus'])){
    
    //getting inputs froms the form
    $cus_id =  $_POST['cus_id'];
    $fname =  $_POST['fname'];
    $lname =  $_POST['lname'];
    $dob        = $_POST['birthdate'];
    $country    =  $_POST['country'];
    $email  = $_POST['email'];
    $mobile     = $_POST['contactno'];
    //$password =  $_POST['pwd'];
    $username    = $_POST['username'];
    $user_type    = '1';

    
    $queryc ="SELECT * FROM customer WHERE username = '".$username."' AND cus_id='$cus_id'";
    $resultc = mysqli_query($obj ->con,$queryc);
    if(mysqli_num_rows($resultc)==1){
        if($obj -> updateCustomer($cus_id, $fname,$lname,$dob,$country,$email, $mobile,$user_type,$username )){
            echo "<script type='text/javascript'>alert('You have successfully updated your details ');
            window.location='../login.php';
            </script>";
            
              
        }else{
            echo "<script type='text/javascript'>alert('Sorry! Can not update at this moment. Please try again shortly.');</script>";
        }
    }else{
        //check username and password
        $query1 ="SELECT * FROM customer WHERE username = '".$username."'";
        $result1 = mysqli_query($obj ->con,$query1);

        $query2 ="SELECT * FROM systemuser WHERE username = '".$username."'";
        $result2 = mysqli_query($obj ->con,$query2);
        
        if(mysqli_num_rows($result1)>=1  || mysqli_num_rows($result2)>=1){    
                echo "<script type='text/javascript'>alert('Sorry! An account with this username already exists. Please try with another username.');</script>";
        }else{
            //insert data
            if($obj -> updateCustomer($cus_id, $fname,$lname,$dob,$country,$email, $mobile,$user_type,$username )){
                echo "<script type='text/javascript'>alert('You have successfully updated ');
                window.location='../login.php';
                </script>";
            }else{
                echo "<script type='text/javascript'>alert('Sorry! Cnnot update at this moment. Please try again shortly.');
                window.location='../edit_profile1.php';   </script>";
            }
        }
        //pass values to the setters
        $obj ->  setUserName($_POST['username']);
       
        //get private attributes
        $obj ->   getUserName();
    }
} 

if(ISSET($_POST['changepwd'])){
    $cus_id =  $_POST['cus_id'];
    
   $opwd =  $_POST['opwd'];
    $npwd =  $_POST['npwd'];
    //$cpwd =  $_POST['con_pwd'];

    //check username and password
    $obj -> updateCusPassword($cus_id,$npwd,$opwd );
} 
if(ISSET($_POST['changepwduser'])){
   
    $user_id =  $_POST['user_id'];
    $opwd =  $_POST['opwd'];
    $npwd =  $_POST['npwd'];
    //check username and password
    $obj -> updateUserPassword($user_id,$npwd,$opwd );
} 
if(ISSET($_POST['updateuser'])){
    
    //getting inputs froms the form
    $user_id =  $_POST['user_id'];
    $fname =  $_POST['fname'];
    $lname =  $_POST['lname'];
    $email  = $_POST['email'];
    $mobile     = $_POST['contactno'];
    $username    = $_POST['username'];
    $user_type    = $_POST['user_type'];;

    $queryc ="SELECT * FROM systemuser WHERE username = '".$username."' AND user_id='$user_id'";
    $resultc = mysqli_query($obj ->con,$queryc);
    if(mysqli_num_rows($resultc)==1){
        if($obj -> updateUser1($user_id, $fname,$lname,$email, $mobile,$username )){
            echo "<script type='text/javascript'>alert('You have successfully updated your details ');
             window.location='../edit_profile3.php';   </script>";
        }else{
            echo "<script type='text/javascript'>alert('Sorry! Cannot update at this moment. Please try again shortly.');
            window.location='../edit_profile3.php';   </script>";
        }
    }else{
        //check username and password
        $query1 ="SELECT * FROM customer WHERE username = '".$username."'";
        $result1 = mysqli_query($obj ->con,$query1);

        $query2 ="SELECT * FROM systemuser WHERE username = '".$username."'";
        $result2 = mysqli_query($obj ->con,$query2);
        
        if(mysqli_num_rows($result1)>=1  || mysqli_num_rows($result2)>=1){    
                echo "<script type='text/javascript'>alert('Sorry! An account with this username already exists.Please try with another username.');
                window.location='../edit_profile3.php';   </script>";
        }else{
            //insert data
            if($obj -> updateUser1($user_id, $fname,$lname,$email, $mobile,$username )){
                echo "<script type='text/javascript'>alert('You have successfully updated ');
                window.location='../edit_profile3.php';   </script>";
            }else{
                echo "<script type='text/javascript'>alert('Sorry! Connot update at this moment. Please try again shortly.');
                window.location='../edit_profile3.php';   </script>";
            }
        }
        //pass values to the setters
        $obj ->  setUserName($_POST['username']);
       
        //get private attributes
        $obj ->   getUserName();
    }
} 



/************************************************************contact us************************************************************ */

if(ISSET($_POST['contact'])){
    
    $myArray = array(
    //getting inputs froms the form
    "full_name"  => $_POST['fullname'],
    "email"  =>  $_POST['email'],
    "country"        => $_POST['country'],
    "subject"    =>  $_POST['subject']
    );

      //insert data
        if($obj -> contact_us("contact_us",$myArray)){
            echo "<script type='text/javascript'>alert('Thank You For Contacting Us.');
                window.location='../contact_us.php';
            </script>";
              
        }else{
            echo "<script type='text/javascript'>alert('Sorry! annot record your feedback at this moment. Please try again shortly.');
            window.location='../contact_us.php';
            </script>";
        }
    
    
} 
/***************************************************login******************************************************************** */

/*************************************************ROOMS***************************************************************************** */


if(ISSET($_POST['availability'])){
    
    //getting bed room type
    $cat_id=$_POST['option'];
        
    //getting customer check in and check out date
    $cus_check_in= $_POST['check_in'];
    $cus_check_out = $_POST['check_out'];
    
    $cus_checkin= date('y-m-d', strtotime($cus_check_in));
    $cus_checkout= date('y-m-d', strtotime($cus_check_out));
    
    //getting reservation date and edition expire date
    $reservation_date =date("Y-m-d H:i:s");
    $reservation_expiredate= date('Y-m-d H:i:s', strtotime($cus_checkin.' - 2 days'));

   

        if($obj->checkRoomAvailability($cat_id, $cus_checkin,$cus_checkout)){  
            echo "<script type='text/javascript'>alert('Your preferred room is available.Please login to the system for reservation.');
            window.location='../availability.php';
            </script>";
        }else{  
            $state2 = "Not Available";
            echo "<script type='text/javascript'>alert('Sorry.Your preferred room is not available due to the unavailability of rooms.');
            window.location='../availability.php';
            </script>";       
        }  
}

if(ISSET($_POST['room-reservation'])){
    
    //getting bed room type
    $cat_id=$_POST['option'];
    $new_cusid =$_POST['cus_id'];

    //getting customer check in and check out date
    $cus_check_in= $_POST['check_in'];
    $cus_check_out = $_POST['check_out'];
    
    $cus_checkin= date('y-m-d', strtotime($cus_check_in));
    $cus_checkout= date('y-m-d', strtotime($cus_check_out));
    
    //getting reservation date and edition expire date
    $reservation_date =date("Y-m-d H:i:s");
    $reservation_expiredate= date('Y-m-d H:i:s', strtotime($cus_checkin.' - 2 days'));

    $obj->reserveRoom($cat_id, $cus_checkin,$cus_checkout,$reservation_date,$new_cusid);  
        
}

if(ISSET($_POST['room-reservation-cancel'])){
      
    $reservation_id=$_POST['reservation_num'];
    $obj->cancelReservation('reservation',$reservation_id);         
}

if(ISSET($_POST['reservation_cancel_button'])){
     echo "<script type='text/javascript'> window.location='../reservation_cancel.php'; </script>";        
}

if(ISSET($_POST['room-reservation-change'])){
    
    $reservation_id=$_POST['reservation_num'];
    //getting bed room type
    $cat_id=$_POST['option'];
    
    $cus_id =$_POST['cus_id'];
    //getting customer check in and check out date
    $cus_check_in= $_POST['check_in'];
    $cus_check_out = $_POST['check_out'];

    $cus_checkin= date('y-m-d', strtotime($cus_check_in));
    $cus_checkout= date('y-m-d', strtotime($cus_check_out));

    $obj->changeReservation('reservation',$reservation_id,$cat_id,$cus_checkin,$cus_checkout,$cus_id);         
}


if(ISSET($_POST['room-reservation-change-cancel'])){
    echo "<script type='text/javascript'> window.location='../reservation_change.php'; </script>";        
}


/************************************************************reservation********************************************* */
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
    
    if($obj->orderMeal($quantity,$order_deli_date,$cus_id,$meal_id,$order_deli_time,$ordered_date,$cus_email,$room_no)){  
        echo  "<script type='text/javascript'>alert('Your order has successfully recorded.');
        window.location='../view_dmeal.php';
        </script>";
    }  else{
        echo "<script type='text/javascript'>alert('Sorry! Unable to record your order at this moment. Please try again shortly.');
        window.location='../d_orderMeal.php';
        </script>";
    }
        }


/************************************************************feedback************************************************ */

if(ISSET($_POST['feedback'])){
    
    //getting feedback message
    $message=$_POST['message'];
    $cus_id=$_POST['cus_id'];  

        if($obj->addFeedback($cus_id,$message)){  
            echo "<script type='text/javascript'>alert('Your feedback is successfully recorded. Thank you for your concern.');
            window.location='../feedback.php';
            </script>";
        }else{  
            echo "<script type='text/javascript'>alert('Sorry! Unable to record your feedback at this moment. Please try again shortly.');
            window.location='../feedback.php';
            </script>";     
        }  
}

/***********************************************************chatbox **************************************************/

if(ISSET($_POST['chatbox'])){
    
    //getting feedback message
    $chat_cont=$_POST['chat'];
    $cus_id=$_POST['cus_id'];
    $chat_date =date("Y-m-d"); 
    $chat_time =time();

        if($obj->invokeChat($cus_id,$chat_cont,$chat_date,$chat_time)){  
            echo "<script type='text/javascript'>
            window.location='../chatbox.php';
            </script>";
        }else{  
            echo "<script type='text/javascript'>alert('Sorry! Unable to invoke chat in this moment. Please try again shortly.');
            window.location='../chatbox.php';
            </script>";     
        }  
}

/**********************************************services************************************************************************************************* */


/************************ MAKE TOUR PLAN********************************/
if(ISSET($_POST['Make-tp'])){
    

    $cus_id=$_POST['cus_id'];
    $checkin= $_POST['checkin'];
    $checkout = $_POST['checkout'];
	
    $checkin= date('y-m-d', strtotime($checkin));
    $checkout= date('y-m-d', strtotime($checkout));
	
	$other=$_POST['other'];
    $no_of_participant= $_POST['no_of_participant'];
    $pick_up_time = $_POST['pick_up_time'];
	$places = $_POST['places'];

    $date =date("Y-m-d H:i:s");

        if($obj->make_tour_plan($cus_id,$checkin,$checkout,$date,$other,$no_of_participant,$pick_up_time,$places)){  
            echo "<script type='text/javascript'>alert('Your request is successfully completed. Enjoy your tour well!');
            window.location='../make_tour_plan.php';
            </script>";
        }else{  
            echo "<script type='text/javascript'>alert('Sorry! Unable makeyour request at this moment .Please try again shortly.);
            window.location='../make_tour_plan.php';
            </script>";     
        }  
}

if(ISSET($_POST['maked_tp_change'])){
    
	//getting tour id
    $tour_id=$_POST['tour_id'];
    
    
    $cus_id =$_POST['cus_id'];
	
    //getting customer check in and check out date
    $cus_check_in= $_POST['checkin'];
    $cus_check_out = $_POST['checkout'];

    $cus_checkin= date('y-m-d', strtotime($cus_check_in));
    $cus_checkout= date('y-m-d', strtotime($cus_check_out));
	
	//getting other details
	$places = $_POST['places'];
	$pick_up_time = $_POST['pick_up_time'];
	$no_of_participant = $_POST['no_of_participant'];
	$other = $_POST['other'];
	
	//getting current date
	$date =date("Y-m-d H:i:s");

    $obj->change_maked_tourplan('tour_plan',$tour_id,$cus_checkin,$cus_checkout,$cus_id,$places,$pick_up_time,$no_of_participant,$other,$date);         
}

if(ISSET($_POST['maked_tp_change_cancel'])){
    echo "<script type='text/javascript'> window.location='../change_tour_plan.php'; </script>";        
}

if(ISSET($_POST['made_tp_cancel'])){
      
    $tour_id=$_POST['tour_id'];
    $obj->cancel_made_tours('tour_plan',$tour_id);         
}

if(ISSET($_POST['made_tp_donot_cancel'])){
     echo "<script type='text/javascript'> window.location='../cancel_made_tp.php'; </script>";        
}




/************************PREPLANNED TOURS***********************************/
if(ISSET($_POST['Request-tp'])){
    

    $tour_id=$_POST['option'];
    $cus_id=$_POST['cus_id'];
    $tour_check_in= $_POST['tour_check_in'];
    $tour_check_out = $_POST['tour_check_out'];

    $tour_check_in= date('y-m-d', strtotime($tour_check_in));
    $tour_check_out= date('y-m-d', strtotime($tour_check_out));

    $date =date("Y-m-d H:i:s");

        if($obj->request_preplaned_tours($cus_id,$tour_id,$tour_check_in,$tour_check_out,$date)){  
            echo "<script type='text/javascript'>alert('Your request is successfully completed. Enjoy well with THE TENTH tourplans!');
            window.location='../request_preplanned_tours.php';
            </script>";
        }else{  
            echo "<script type='text/javascript'>alert('Sorry! Unable to make your request at this moment please try again shortly.');
            window.location='../request_preplanned_tours.php';
            </script>";     
        }  
}

if(ISSET($_POST['cancel_preplanned_tours'])){
      
    $request_id=$_POST['request_num'];
    $obj->cancel_preplanned_tours('pre_planed_tour_reservation',$request_id);         
}

if(ISSET($_POST['preplanned_tour_cancel_button'])){
     echo "<script type='text/javascript'> window.location='../cancel_preplaned_tours.php'; </script>";        
}

if(ISSET($_POST['change_preplan_tours'])){
    
    $request_id=$_POST['request_num'];
    //getting tour id
    $tour_id=$_POST['option'];
    
    $cus_id =$_POST['cus_id'];
    //getting customer check in and check out date
    $checkin= $_POST['tour_check_in'];
    $checkout= $_POST['tour_check_out'];

    $tp_check_in= date('y-m-d', strtotime($checkin));
    $tp_check_out= date('y-m-d', strtotime($checkout));
	$date =date("Y-m-d H:i:s");

    $obj->change_preplaned_tour('pre_planed_tour_reservation',$request_id,$tour_id,$tp_check_in,$tp_check_out,$cus_id,$date);         
}


if(ISSET($_POST['change_preplan_tour_cancel'])){
    echo "<script type='text/javascript'> window.location='../change_preplaned_tours.php'; </script>";        
}



/*****************************************************TOUR GUIDE******************************************************************/

if(ISSET($_POST['Request-tg'])){
    
	
    $tg_id =$_POST['option'];
    $cus_id=$_POST['cus_id'];
    $checkin1   = $_POST['check-in'];
    $checkout1   = $_POST['check-out'];
    $checkin= date('y-m-d', strtotime($checkin1));
    $checkout= date('y-m-d', strtotime($checkout1));

	$date   = date("Y-m-d H:i:s");
	$places = $_POST['places'];
    $time  = $_POST['pick_up_time'];
    
    $obj->request_touguide('tour_guide_reservation',$tg_id,$checkin,$checkout,$cus_id,$date,$places,$time);   

}

if(ISSET($_POST['tour_guide_cancel'])){
      
    $tg_request_id=$_POST['request_tg_num'];
    $obj->cancel_tour_guide('tour_guide_reservation',$tg_request_id);         
}

if(ISSET($_POST['not_tour_guide_cancel'])){
     echo "<script type='text/javascript'> window.location='../cancel_tourguides.php'; </script>";        
}

if(ISSET($_POST['change_tg'])){
    
    $tgrequest_id=$_POST['request_tg_num'];
    //getting tourguide id
    $tg_id=$_POST['option'];
	
	$places = $_POST['places_to_visit'];
    $tg_checkin_time = $_POST['tg_checkin_time'];
    
    $cus_id =$_POST['cus_id'];
    //getting customer check in and check out date
    $tg_check_in= $_POST['tg_checkin'];
    $tg_check_out= $_POST['tg_checkout'];

    $tgcheckin= date('y-m-d', strtotime($tg_check_in));
    $tgcheckout= date('y-m-d', strtotime($tg_check_out));
	
	$date   = date("Y-m-d H:i:s");

    $obj->change_Tour_guide('tour_guide_reservation',$tgrequest_id,$tg_id,$tgcheckin,$tgcheckout,$cus_id,$date,$places,$tg_checkin_time);         
}


if(ISSET($_POST['not_change_tg'])){
    echo "<script type='text/javascript'> window.location='../change_tourguide.php'; </script>";        
}


/************************************************TRANSPORT*************************************************************************/

if(ISSET($_POST['Request-t'])){
    

    $vehical_id=$_POST['option'];
    $cus_id=$_POST['cus_id'];
    $checkin1   = $_POST['check-in'];
    $checkout1   = $_POST['check-out'];
    $checkin= date('y-m-d', strtotime($checkin1));
    $checkout= date('y-m-d', strtotime($checkout1));

	$date   = date("Y-m-d H:i:s");
	$places = $_POST['places'];
    $time  = $_POST['pick_up_time'];
    
    $obj->request_transport_service('transport_services',$vehical_id,$checkin,$checkout,$cus_id,$date,$places,$time);   

}

if(ISSET($_POST['cancel_Transport'])){
      
    $t_request_id=$_POST['request_t_num'];
    $obj->cancel_transport('transport_services_reservation',$t_request_id);         
}

if(ISSET($_POST['not_tour_guide_cancel'])){
     echo "<script type='text/javascript'> window.location='../cancel_transportservice.php'; </script>";        
}

if(ISSET($_POST['change_transport'])){
    
    $trequest_id=$_POST['request_t_num'];
    //getting bed room type
    $vehical_id=$_POST['option'];
    
    $cus_id =$_POST['cus_id'];
    //getting customer check in and check out date
    $cus_check_in= $_POST['ts_checkin'];
    $cus_check_out= $_POST['ts_checkout'];

    $cus_checkin= date('y-m-d', strtotime($cus_check_in));
    $cus_checkout= date('y-m-d', strtotime($cus_check_out));
	
	$places=$_POST['places_to_visit'];
	$time=$_POST['ts_checkin_time'];
	$date=date("Y-m-d H:i:s");

    $obj->transport_change('transport_services_reservation',$trequest_id,$vehical_id,$cus_checkin,$cus_checkout,$cus_id,$places,$time,$date);         
}


if(ISSET($_POST['not_change_transport'])){
    echo "<script type='text/javascript'> window.location='../change_transportservice.php'; </script>";        
}

?>

