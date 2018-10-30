<?php
//upload.php
if($_FILES["file"]["name"] != '')
{
//$test = explode('.', $_FILES["file"]["name"]);
 //$ext = end($test);
 //$name = rand(100, 999) . '.' . $ext;
 //$location =  . $name;  
 /*$target_dir = "uploads/upload_room/";*/

 $location = './uploads/upload_room/' .$_FILES["file"]["name"];
 move_uploaded_file($_FILES["file"]["tmp_name"], $location);
 echo '<img src="'.$location.'" height="150" width="225" class="img-thumbnail" />';
}
?>
