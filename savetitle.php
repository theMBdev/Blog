<?php

include('connection.php');


if ($_POST) {

    $stmt = $mysqli->prepare("UPDATE blog SET title = ? WHERE id = 1");
    $stmt->bind_param("s", $_POST['title']);
    $stmt->execute();
    $stmt->close();

}

?>
