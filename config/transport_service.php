<?php

//var_dump($_POST);
include "db_con.php";

//customer class
class transport_service extends database{

    public $vehical_id;
    public $no_of_passangers;
    public $price_per_km;
    public $vehical_image ;
    public $vehical_type;
}   
?>