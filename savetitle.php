<?php

include('connection.php');

session_start();

if (array_key_exists("id", $_COOKIE)) {

    $_SESSION['id'] = $_COOKIE['id']; 
}

if (array_key_exists("id", $_SESSION)) {

    echo $_SESSION['id'];
    echo "<p>Logged In! <a href='signin.php?logout=1'>Log out</a></p>";                      
//    $query = "SELECT title FROM `blog` WHERE id = ".mysqli_real_escape_string($mysqli, $_SESSION['id'])." LIMIT 1";
//
//    $row = mysqli_fetch_array(mysqli_query($mysqli, $query));
//
//    $title = $row['title'];

} else {

    header("Location: signin.php");

}
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
