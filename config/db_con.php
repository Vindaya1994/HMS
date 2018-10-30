<?php   
    class database {  
       
        public $con;
        
        //connect to the database
        public  function __construct(){
             $this ->con = mysqli_connect("localhost","root","","10thhotel2") or die("Error connecting to database");
        }
    }
    
    $obj = new database;
?>  

