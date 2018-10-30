<?php

//var_dump($_POST);
include "system_user.php";
//admin class
class admin extends system_user{

    public function view_users($table){
        $sql ="SELECT *  FROM systemuser WHERE user_type='2'";
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    } 
    
    public function view_users1($id){
        $sql ="SELECT *  FROM systemuser WHERE   user_id='$id'";
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    } 

    public function addStaff($fname,$lname,$mobile,$email,$salary){
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $password1 = substr( str_shuffle( $chars ), 0, 8 );
        $password=md5($password1);

        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $username1 = substr( str_shuffle( $chars ), 0, 8 );

        $query2 = "INSERT INTO systemuser (user_fname,user_lname,username,password,tpassword,mobile,user_type,user_email,salary) VALUES ('".$fname."','".$lname."','".$username1."','".$password."','".$password1."','".$mobile."','2','".$email."','".$salary."')";
        $result2 = mysqli_query($this ->con,$query2);                                         
        if( $result2 > 0){    
            echo "<script type='text/javascript'>alert('You have successfully edited a staff member');
            window.location='../a_staff_member_add.php';
            </script>";            
        }else{
            echo "<script type='text/javascript'>alert('Sorry.Unable to add this staff memeber in this moent.Please try again shortly');
            window.location='../a_staff_member_add.php';
            </script>";
        }  
    }
    

    public function edit_staff($id){
        $sql ="SELECT *  FROM systemuser WHERE user_id=".$id;
        $result = mysqli_query($this ->con,$sql); 
        $row =mysqli_fetch_assoc($result);
        echo json_encode($row);     
    }

    public function updateStaff($user_id,$fname,$lname,$email,$contact,$salary){
        $sql ="UPDATE systemuser SET user_fname='".$fname."', user_lname='".$lname."',mobile='".$contact."', user_email='".$email."',salary='".$salary."' WHERE user_id=".$user_id;
        $result2 = mysqli_query($this ->con,$sql);                                         
        if( $result2 > 0){    
            echo "<script type='text/javascript'>alert('You have successfully edited a staff member');
            window.location='../a_staff_member.php';
            </script>";            
        }else{
            echo "<script type='text/javascript'>alert('Sorry.Unable to edit this staff memeber in this moent.Please try again shortly');
            window.location='../a_staff_member.php';
            </script>";
        }           
    }

    public function removeStaff($id){
        $sql ="DELETE  FROM  systemuser WHERE user_id=".$id;
        $result = mysqli_query($this ->con,$sql); 
        if(mysqli_affected_rows($this ->con)==1){
            echo "<script type='text/javascript'>alert('You have successfully removed a staff member');
            window.location='./a_staff_member.php';
            </script>"; 
        }else{ 
            echo "<script type='text/javascript'>alert('Sorry.Unable to remove this staff memeber in this moent.Please try again shortly');
            window.location='./a_staff_member.php';
            </script>";          
        }   
    }

    public function searchStaff1($search){
        
        $output = '';
        $query = "SELECT * FROM systemuser WHERE user_id LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>User ID</th>
               <th>First Name</th>
               <th>Last Name</th>
               <th>Mobile</th>
               <th>Email</th>
               <th>Salary</th>
               
               
               
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["user_id"].'</td>
              <td>'.$row["user_fname"].'</td>
              <td>'.$row["user_lname"].'</td>
              <td>'.$row["mobile"].'</td>
              <td>'.$row["user_email"].'</td>
              <td>'.$row["salary"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
           
            echo "<div>";
            echo "<h3>Error!</h3>";
            echo "<p>Your seraching result is not found.</p>";
            echo "</div> ";
        }     
    }

    public function searchStaff2($search){
        
        $output = '';
        $query = "SELECT * FROM systemuser WHERE user_email LIKE '%".$search."%'  ";
        $result = mysqli_query($this ->con,$query);                                         
        if( mysqli_num_rows($result) > 0){   
          
            $output .= '
            <div class="table-responsive">
             <table class="table table bordered">
              <tr>
               <th>User ID</th>
               <th>First Name</th>
               <th>Last Name</th>
               <th>Mobile</th>
               <th>Email</th>
               <th>Salary</th>
               
               
               
              </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
            $output .= '
             <tr>
              <td>'.$row["user_id"].'</td>
              <td>'.$row["user_fname"].'</td>
              <td>'.$row["user_lname"].'</td>
              <td>'.$row["mobile"].'</td>
              <td>'.$row["user_email"].'</td>
              <td>'.$row["salary"].'</td>
             </tr>
            ';
           }
           echo $output;         
        }else{
            echo 'Data Not Found';
        }     
    }


} 

//create an object
$obj =new admin;

/****************************************************staff member***********************************************/
if(ISSET($_POST['staff-add'])){
    
    // Get values from form 
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];
    $salary=$_POST['salary'];

    $obj->addStaff($fname,$lname,$mobile,$email,$salary);
}


//for edition and view model
if(ISSET($_POST["user_id"]))
{      
    $num= $_POST["user_id"];
    $obj->edit_staff($num);
}

if(ISSET($_POST["update-staff"]))
{
    $user_id=$_POST['euser_id'];
    $fname=$_POST['efirstname']; 
    $lname=$_POST['elastname'];
    $email=$_POST['eemail']; 
    $contact=$_POST['econtactno'];
    $salary=$_POST['esalary'];
    
    $obj->updateStaff($user_id,$fname,$lname,$email,$contact,$salary);
}


//for deletion
if(ISSET($_REQUEST["selectedButtonValue60"]))
{
   $buttonPHP = $_REQUEST['selectedButtonValue60'];
   $obj->removeStaff($buttonPHP);
}

//for searching
if(ISSET($_POST["staff_query1"]))
{
    $query =  $_POST["staff_query1"];
    $obj->searchStaff1($query);
}

if(ISSET($_POST["staff_query2"]))
{
    $query =  $_POST["staff_query2"];
    $obj->searchStaff2($query);
}

//sms
if(ISSET($_POST["send-msg-btn"]))
{
if ($_SERVER["REQUEST_METHOD"] == "POST") {
										
    $mobile = $_POST['mobile'];
    $message = $_POST['message'];
    
    
   // echo $mobile;
    //echo $message;
    
   include ( "NexmoMessage.php" );

    $nexmo_sms = new NexmoMessage('92bc7b57', 'huKQ8xBfwXL3snDw');

    $info = $nexmo_sms->sendText('+94'.$mobile.'', 'MyApp', "'.$message.'");

    echo $nexmo_sms->displayOverview($info);
    
    echo "<script type='text/javascript'>
            window.location='../a_staff_member.php';
            </script>"; 
}
}
?>