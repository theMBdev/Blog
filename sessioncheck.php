<?php
session_start();


if (array_key_exists("id", $_COOKIE)) {

    $_SESSION['id'] = $_COOKIE['id']; 
}

if (array_key_exists("id", $_SESSION)) {

} else { ?>

<script>
    window.location.href = "signin.php";
</script>

<?php
}
?>