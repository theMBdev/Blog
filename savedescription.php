<?php

include('connection.php');


if ($_POST) {

    $stmt = $mysqli->prepare("UPDATE blog SET description = ? WHERE id = 1");
    $stmt->bind_param("s", $_POST['description']);
    $stmt->execute();
    $stmt->close();

}

?>

