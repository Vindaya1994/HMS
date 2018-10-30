<?php

//var_dump($_POST);
include "db_con.php";

//customer class
class candidate extends database{

    public $name;
    public $email;
    public $cv;

    public function view_vacancies($table){
        $sql ="SELECT *  FROM ".$table;
        $array =array();
        $query =mysqli_query($this->con,$sql);
        while($row =mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }

    public function apply_job_vacancies($name, $email,$vacancy_id){
        //regarding to uploading
        //$target_dir = "../upload_cv/";
        //$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $target_file = '../upload_cv/' .$_FILES["fileToUpload"]["name"];
        $uploadOk = 1;
        $documentFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
    
        $check = filesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {

            // Allow certain file formats
            if($documentFileType != "txt" && $documentFileType != "pdf" && $documentFileType != "doc" && $documentFileType != "docx" ) {
                echo "<script type='text/javascript'>alert('Sorry,Your are allowed to upload only PDF, TXT,DOCX & DOC  files.');
                window.location='../view_vacancies.php';
                </script>";
                $uploadOk = 0;
            }else{

                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 10000000) {
                    echo "<script type='text/javascript'>alert('Sorry,Your file is too large.');
                    window.location='../view_vacancies.php';
                    </script>";
                 $uploadOk = 0;
                }else{

                    // Check if file already exists
                    if (file_exists($target_file)) {
                        echo "<script type='text/javascript'>alert('Sorry, file already exists.Please try again with valid document.');
                        window.location='../view_vacancies.php';
                        </script>";
                        $uploadOk = 0;
                    }

                    else{
                        $uploadOk = 1;    
                    }
                }
            }
        } else {
            echo "<script type='text/javascript'>alert('File is not an document.Please upload a document.');
            window.location='../view_vacancies.php';
            </script>";
           
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "<script type='text/javascript'>alert('Sorry, your file was not uploaded.');
            window.location='../view_vacancies.php';
            </script>";
            
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                //echo " ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

                //adding data to the database

                try{

                $target_file2='upload_cv/'.basename($_FILES["fileToUpload"]["name"]);    
                $sql_3="INSERT INTO candidate (vac_id,cand_name,cand_email,cand_cv) 
                        VALUES('".$vacancy_id."','".$name."','".$email."','".$target_file2."')";
                $result = mysqli_query($this->con, $sql_3);  

                if ($result > 0) {
                    echo "<script type='text/javascript'>alert('Your CV uploaded successfully thank you for contacting us..');
                    window.location='../view_vacancies.php';
                    </script>";
                    echo "Error: " . $sql_3 . "<br>" . $con->error;
                   
                }else{
                    echo "<script type='text/javascript'>alert('Sorry there is a error uploading your cv..');
                    window.location='../view_vacancies.php';
                    </script>";
                    echo "Error: " . $sql_3 . "<br>" . $con->error;
                   
                }


                }catch(Exception $ex){
                    echo $ex->getMessage();
                }

            } else {
               
            }
        }
    }
} 

//create an object
$obj =new candidate;

/******************************************job vacancies*********************************************************/

if(ISSET($_POST['apply'])){
    
    // Get values from form 
    $name=$_POST['fullname'];
    $email=$_POST['email'];
    $vacancy_id=$_POST['type'];

    $obj->apply_job_vacancies($name, $email,$vacancy_id);  
}

?>