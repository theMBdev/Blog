<?php
include('connection.php');
include('sessioncheck.php');
?>

<?php


if ($_POST) {

    $stmt = $mysqli->prepare("UPDATE users SET name = ? WHERE id = ?");
    $stmt->bind_param("si", $_POST['name'], $_SESSION['id']);
    $stmt->execute();
    $stmt->close();
}

?>


