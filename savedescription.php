<?php
include('connection.php');
include('sessioncheck.php');
?>

<?php


if ($_POST) {

    $stmt = $mysqli->prepare("UPDATE blog SET description = ? WHERE userid = ?");
    $stmt->bind_param("si", $_POST['description'], $_SESSION['id']);
    $stmt->execute();
    $stmt->close();
    

}

?>

