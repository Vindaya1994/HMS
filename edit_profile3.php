<?php
include_once '/config/customer.php';

    
?>
<!doctype html>
<html>
    <head>
    <?php include_once 'headers/header.php' ?>
    <!--<link rel="stylesheet" href="assets/css/main.css" >-->
    <!--<link rel="stylesheet" href="assets/css/restaurant.css" >-->
    <link rel="stylesheet" href="assets/css/edit_profile.css" >
    <style> </style>
    
    	
    <script>
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

		<!--*************************************************************content*************************************************************-->

<div class="site-main container"style="margin-top:90px;margin-bottom:30px;">
    <div class="section-page-heading row  ">
		<div class="breadcrumb-leftnav-wrapper ">
			<div class="col-md-12 col-lg-10 col-lg-offset-1 ">
				<ul class="breadcrumb">
					<li><a href="index.php" title="The Tenth Hotel" class="bolds">Home</a><span class="sep"></span></li>
					<li class="active"><span class="last">User account</span></li>
					<li class="active"><span class="last">Edit profile</span></li>
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
  
    <div class="section-page-content row" style="">
		<div class="col-md-12 col-lg-10 col-lg-offset-1 w3-display-container "style="">
            <div class=" w3-border w3-row">

                <div class="w3-col  w3-bar-block" style="width:30%; margin-top:2%;" >
                    <h5 class="w3-bar-item w3-xlarge">My Profile</h5>
                    <button style="margin:4%; width:90%;" class="w3-bar-item w3-button tablink   w3-hover-light-grey" onclick="openLink(event, 'ep')">Edit Profile</button>
                    <button  style="margin:4%;width:90%;"class="w3-bar-item w3-button tablink  w3-hover-light-grey" onclick="openLink(event, 'pc')">Change Password</button>
                </div>
                    
                <div class="w3-col w3-border-left" style="width:70%">
                    <!--******************edit profile form*****************************-->
                    <div id="ep" class="w3-container city w3-animate-right" style="display:">
                        <div class=" w3-center">
                        <?php
                                                    $user_id=$_SESSION['user_id'];
                                                   
													$myrow =$obj ->viewSystemuser('systemuser',$user_id);
													foreach($myrow as $row){
													
													
												?>
                            <form class="form-horizontal w3-left   w3-padding-16" id="register-form" method="post" action="./config/customer.php" style="width:90%;"  >
                            <input type="hidden"  name="user_id" value="<?php echo $user_id ?>">
                            <input type="hidden"  name="user_type" value="<?php echo $row['user_type'] ?>">
                                <div class="">
                                    <div class="w3-row " style="margin-bottom:40px;">
                                        <div class="w3-quarter fw3-left" style="">
                                            
                                            <button class="" title="Change Profile Photo" style="border: 0;cursor: pointer; padding: 0;">
                                                <img src="assets/img/main/usericon.ico" alt="Change Profile Photo" style="height: 15%;left:10%;position: absolute;top: 1%;width: 15%;" class="w3-left" > 
                                            </button>
                                    </div>
                                        <div class="w3-rest w3-left w3-padding">
                                            <h1><?php echo $row['username'] ?></h1>
                                            <a class="">Change profile photo</a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="firstname">First name:</label>
                                        <div class="col-sm-10">
                                            <input type="text" value="<?php echo $row['user_fname'] ?>"class="form-control" name="fname"  placeholder="Enter first name" id="fname"  >
                                            <span class="error_form" id="fname_error_message"> </span>
                                        </div>
                                    </div>                  
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="lastname">Last name:</label>
                                        <div class="col-sm-10"> 
                                            <input type="text" value="<?php echo $row['user_lname'] ?>"class="form-control" name="lname"  placeholder="Enter last name" id="lname">
                                        </div>
                                    </div>    
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">Email:</label>
                                        <div class="col-sm-10"> 
                                            <input type="text"value="<?php echo $row['user_email'] ?>" class="form-control" name="email"   placeholder="Enter email" id ="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="contact number">Contact no:</label>
                                        <div class="col-sm-10"> 
                                            <input type="text" value="<?php echo $row['mobile'] ?>"class="form-control" name="contactno" placeholder="Enter conatact number" id="contactno">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="username">Username:</label>
                                        <div class="col-sm-10">
                                            <input type="text"value="<?php echo $row['username'] ?>" class="form-control" name="username" placeholder="Enter username"  id="username">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="salary">Salary:</label>
                                        <div class="col-sm-10"> 
                                            <input disabled type="text"value="<?php echo $row['salary'] ?>" class="form-control" name="salary"  placeholder="salary" id="salary">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group"> 
                                        <div class="col-sm-offset-2 col-sm-10 ">
                                            <button type="submit" class="button w3-green" name="updateuser" id="updateuser" style="width:100%; height:40px"	>Update</button> 
                                        </div>
                                    </div>
                                    
                                </div> 
                            </form>
			            </div>
                    </div>
                    <!--*********************************************change password form************************************ -->
                    <div id="pc" class="w3-container city w3-animate-right" style="display:none">
                        <form class="form-horizontal w3-left   w3-padding-16" id="change-pwd-form" method="post" action="./config/customer.php" style="width:90%;"  >
                        <input type="hidden"  name="user_id" value="<?php echo $user_id ?>">
    
                            <div class="">
                                <div class="w3-row " style="margin-bottom:40px;">
                                    <div class="w3-quarter w3-left" style="">
                                        <button class=""  style="border: 0;cursor: pointer; padding: 0;">
                                            <img src="assets/img/main/usericon.ico" style="height: 23%;left:10%;position: absolute;top:5%;width: 15%;" class="w3-left" > 
                                        </button>
                                    </div>
                                    <div class="w3-rest w3-left w3-padding">
                                        <p></p>
                                        <h1><?php echo $row['username'] ?></h1>
                                    </div>    
                                </div>
                            </div>
                                                    <?php } ?>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="opwd">Old Password:</label>
                                <div class="col-sm-10">          
                                    <input type="password" class="form-control" name="opwd" placeholder="Old password" id="opwd"  >
                                </div>
                            </div>    
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="npwd">New Password:</label>
                                <div class="col-sm-10">          
                                    <input type="password" class="form-control" name="npwd" placeholder="New password" id="npwd"  >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="confirmpwd">Confirm Password:</label>
                                <div class="col-sm-10">          
                                    <input type="password" class="form-control" name="con_pwd"  placeholder="Confirm password" id="con_pwd" >
                                </div>
                            </div>
                            <div class="form-group"> 
                                        <div class="col-sm-offset-2 col-sm-10 ">
                                            <button type="submit" class="button w3-green" name="changepwduser" id="changepwd" style="width:100%; height:40px"	>Change Password</button> 
                                        </div>
                                    </div>
                            
                        </form>    
                    </div>
                </div>
                    
            </div>     
        </div>
    </div>
    
    
	

                                                 
        
        
</div>

<!--***********************************************************************************************-->
<footer>
    <?php if(isset($_SESSION['uid'])) {
            include_once './footers/footer3.php';
        }else{
            include_once './footers/footer1.php';
        }
    ?>	
</footer>
   
 <script>
            //animation for tabs
        function openLink(evt, animName) {
        var i, x, tablinks;
        x = document.getElementsByClassName("city");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < x.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" w3-leftbar", "");
        }
        document.getElementById(animName).style.display = "block";
        evt.currentTarget.className += " w3-leftbar  w3-border-black";
        }

        
</script>

</body>
</html>