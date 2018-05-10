<?php
include('connection.php');
include('sessioncheck.php');
?>

if ($_POST) {

    $id=$_POST['id'];

    $sql = "DELETE FROM posts WHERE id='".$id."'";

    $result = mysqli_query($mysqli,$sql);  

}
?>

