<?php

//var_dump($_POST);
include "db_con.php";

//customer class
class tour_guide extends database{

    public $tg_id;
    public $tg_name;
    public $NIC;
    public $contact_no ;
    public $experience;
    public $language;
    public $price_per_hour;
    public $tg_image;

}   
?>