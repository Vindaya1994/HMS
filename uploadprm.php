<?php
//uploadprm.php
if($_FILES["file"]["name"] != '')
{
 $location = './uploads/promotions/' .$_FILES["file"]["name"];
 move_uploaded_file($_FILES["file"]["tmp_name"], $location);
 echo '<img src="'.$location.'" height="150" width="225" class="img-thumbnail" />';
}
?>