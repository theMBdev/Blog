<?php

include('connection.php');


if ($_POST) {
    
    $blogtitle = $_POST['title'];

            //needs change. sql injection
             $sql = "UPDATE blog ". "SET title='$blogtitle'". "WHERE id=1";

            $result = mysqli_query($conn,$sql);    


}
