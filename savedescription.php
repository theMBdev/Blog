<?php

include('connection.php');


if ($_POST) {
    
     $description=$_POST['description'];

            //needs change. sql injection
            $sql = "UPDATE blog ". "SET description='$description'". "WHERE id=1";

            $result = mysqli_query($conn,$sql);              
}
           
?>

