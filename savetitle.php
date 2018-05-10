<?php
include('connection.php');
include('sessioncheck.php');
?>

<?php


if ($_POST) {

    echo $_POST['title'];
    echo $_POST['userid'];
    
    $stmt = $mysqli->prepare("UPDATE blog SET title = ? WHERE userid = ?");
    $stmt->bind_param("si", $_POST['title'], $_SESSION['id']);
    $stmt->execute();
    $stmt->close();

}

?>
