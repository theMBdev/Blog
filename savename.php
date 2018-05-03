<?php

include('connection.php');


if ($_POST) {
    
     $name=$_POST['name'];

            //needs change. sql injection
            $sql = "UPDATE user ". "SET name='$name'". "WHERE id=1";

            $result = mysqli_query($conn,$sql);              
}
           
?>


