<?php

//var_dump($_POST);
include "db_con.php";

//customer class
class room_category extends database{

    public $cat_id;
    public $cat_name;
    public $approximate_size;
    public $maximum_adults;
    public $bed_type;
    public $connecting_rooms;
    public $room_type;
    public $cat_desc;
    public $room_image;

}   
?>