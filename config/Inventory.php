<?php

//var_dump($_POST);
include "db_con.php";

//customer class
class Inventory extends database{

    public $itemID;
    public $item;
    public $minStock;
    public $totalStock;
	public $unitPrice;
    public $CurrentStock;

}   
?>