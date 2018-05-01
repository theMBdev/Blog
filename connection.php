<?php
$conn=mysqli_connect("localhost", "root", "", "blog");

if(mysqli_connect_error()) {
    die ("Database connection error");
}

//echo "Connected successfully";
?>