<?php

session_start();

if (array_key_exists("id", $_COOKIE)) {

    $_SESSION['id'] = $_COOKIE['id']; 
}

if (array_key_exists("id", $_SESSION)) {

//    echo $_SESSION['id'];
//    echo "<p>Logged In! <a href='signin.php?logout=1'>Log out</a></p>";                     

} else {

    header("Location: signin.php");

}
?>