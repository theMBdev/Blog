<?php

$mysqli = new mysqli("localhost", "root", "", "blog");
if($mysqli->connect_error) {
    exit('Error connecting to database'); //Should be a message a typical user could understand in production
}

?>

