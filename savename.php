<?php

include('connection.php');


if ($_POST) {

    $stmt = $mysqli->prepare("UPDATE user SET name = ? WHERE id = 1");
    $stmt->bind_param("s", $_POST['name']);
    $stmt->execute();
    $stmt->close();

}

?>


