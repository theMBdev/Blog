<?php

include('connection.php');


if ($_POST) {
    
    $blogdescription = $_POST['description'];

            //needs change. sql injection
            $sql = "UPDATE blog ". "SET description='$blogdescription'". "WHERE id=1";

            $result = mysqli_query($conn,$sql);    


}
           
?>
