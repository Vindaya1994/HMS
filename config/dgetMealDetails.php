<?php
$q=$_GET["q"];

include 'db_con.php';


$sql="SELECT * FROM meal WHERE meal_id = '".$q."'";
$array =array();
$query =mysqli_query($obj ->con,$sql);
  while($row =mysqli_fetch_assoc($query)){
    $array[] = $row;
    echo' <div class="w3-row-padding">';
    echo'   <div class="w3-col w3-border-right"style="margin-left:3%;width:45%;height:200px;background: url(assets/img/dinning/meal/mealicon2.png) center">
    ';
    echo"	  <img style='width:100%;height:100%' src='". $row['meal_image']."' >	";							 
    echo'	  </div>';
		echo"	  <div class='w3-col' style='width:50%;height:200px;'>
              <p>" . $row['meal_name'] . "</p>
              <p>" . $row['meal_desc'] . "</p>
              <p><b> Price: " . $row['price_per_meal'] . "</p>							 
            </div>
          </div>";


        }

?> 