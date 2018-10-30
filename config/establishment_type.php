<?php

//var_dump($_POST);
include_once "db_con.php";


//establishment_type class
class establishment_type extends database{

    public $e_id;
    public $e_type;
    
    
    public function getEstablishment_type($table){
        $sql ="SELECT *  FROM ".$table;
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }

} 

//create an object
$obje =new establishment_type;  
?>