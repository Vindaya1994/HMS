<?php 

    include "db_con.php";
    class user extends database { 
        
        
        public function login($table_name, $where_condition ,$type){
            $condition = '';  
            foreach($where_condition as $key => $value){  
                 $condition .= $key . " = '".$value."' AND ";  
            }  
            $condition = substr($condition, 0, -5);  
            
            $query = "SELECT * FROM ".$table_name." WHERE " . $condition."AND user_type =".$type;  
            $result = mysqli_query($this->con, $query);  
            if(mysqli_num_rows($result)){  
                session_start();		
                return true;
                
                             
            }else{  
                 $this->error = "Wrong Data";  
            }  
        }
       
    }
    $obj =new user;
    if(ISSET($_POST['login'])){
        
        $field = array(
        //getting inputs froms the form
        "username" => $_POST['username'],
        "password" =>  md5($_POST['password']),
        );
    
            if($obj->login("customer", $field,"1")){ 
            $username=$_POST['username'];
                $_SESSION['uid']=$username;
                $_SESSION['utype']='1';
                //echo $username;
                
                $query2="SELECT * FROM `customer` WHERE `username` = '".$username."'";
                $query =mysqli_query($obj->con,$query2);
                $result =mysqli_fetch_assoc($query);
                
                $cus_id1 = $result['cus_id'];
                $fname1 = $result['cus_fname'];
                $lname1 = $result['cus_lname'];
                $dob1 = $result['dob'];
                $country1 = $result['country'];
                $email1 = $result['cus_email'];
                $mobile1 = $result['mobile'];
    
                $_SESSION['cus_id']= $cus_id1;
                $_SESSION['fname']= $fname1;
                $_SESSION['lname']= $lname1;
                $_SESSION['mobile']= $mobile1;
                $_SESSION['email']= $email1;
    
                
    
                echo "<script>window.location='../index.php';</script>";
                //echo $cus_id1;
                   
             } 
            else if($obj->login("systemuser", $field,"2")){
                $username=$_POST['username'];
                $_SESSION['uid']=$username;
                $_SESSION['utype']='2';
                
                //echo $username;
                $query2="SELECT * FROM `systemuser` WHERE `username` = '".$username."' AND user_type='2'";
                $query =mysqli_query($obj->con,$query2);
                $result =mysqli_fetch_assoc($query);
    
                $user_id1 = $result['user_id'];
                $ufname1 = $result['user_fname'];
                $ulname1 = $result['user_lname'];
                $uemail1 = $result['user_email'];
                $umobile1 = $result['mobile'];
    
                $_SESSION['user_id']= $user_id1;
                $_SESSION['fname']= $ufname1;
                $_SESSION['lname']= $ulname1;
                $_SESSION['mobile']= $umobile1;
                $_SESSION['email']= $uemail1;
    
    
                echo "<script>window.location='../staff.php';</script>";
    
            }else if($obj->login("systemuser", $field,"3")){
                $username=$_POST['username'];
                $_SESSION['uid']=$username;
                $_SESSION['utype']='3';
                //echo $username;
                $query2="SELECT * FROM `systemuser` WHERE `username` = '".$username."' AND user_type='3'";
                $query =mysqli_query($obj->con,$query2);
                $result =mysqli_fetch_assoc($query);
    
                $user_id1 = $result['user_id'];
                $ufname1 = $result['user_fname'];
                $ulname1 = $result['user_lname'];
                $uemail1 = $result['user_email'];
                $umobile1 = $result['mobile'];
    
                $_SESSION['user_id']= $user_id1;
                $_SESSION['fname']= $ufname1;
                $_SESSION['lname']= $ulname1;
                $_SESSION['mobile']= $umobile1;
                $_SESSION['email']= $uemail1;
                
    
                echo "<script>window.location='../admin.php';</script>";
            }else{  
                echo "<script type='text/javascript'>alert('The username or password you have entered is invalid.Please try again.');
                window.location='../login.php';
                </script>";  
            }  
    }
        
?>  

