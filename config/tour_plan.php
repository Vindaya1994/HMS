<?php

//var_dump($_POST);
include "db_con.php";

//customer class
class preplanned_tour extends database{

    public $tour_id;
    public $tour_name;
    public $places_to_visit;
    public $price ;
    public $no_of_participants;
    public $no_of_days;
    public $description;
    public $tp_image;

}   
?>