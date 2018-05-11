<?php
session_start();

$error = "";

if (array_key_exists("logout", $_GET)) {
    //echo "LOGGED OUT";
    unset($_SESSION);
    setcookie("id", "", time() - 60*60);
    $_COOKIE["id"] = "";  

    session_destroy();
?>

<script>
    window.location.href = "signin.php";
</script>

<?php

    header("Location: signin.php");

} else if ((array_key_exists("id", $_SESSION) AND $_SESSION['id']) OR (array_key_exists("id", $_COOKIE) AND $_COOKIE['id'])) {

?>

<script>
    window.location.href = "index.php";
</script>

<?php

    header("Location: index.php");
}

//User sign up
if(array_key_exists('submit', $_POST)) {

    include("connection.php");

    if(!$_POST['email']) {

        $error .= "An email address is required<br>";
    }

    if(!$_POST['password']) {

        $error .= "A password is required<br>";
    }  

    if($error != "") {

        $error ="<p>There were error(s) in your form:</p>".$error;

    } else {   

        if($_POST['signUp'] == '1') {


            $query = "SELECT id from `users` WHERE email = '".mysqli_real_escape_string($mysqli, $_POST['email'])."' LIMIT 1";

            $result = mysqli_query($mysqli, $query);

            if (mysqli_num_rows($result) > 0) {
                echo "email address taken";
            }
            else {

                $query = "INSERT INTO `users` (`email`, `password`) VALUES ('".mysqli_real_escape_string($mysqli, $_POST['email'])."', '".mysqli_real_escape_string($mysqli, $_POST['password'])."')";

                if(!mysqli_query($mysqli, $query)) {
                    echo "there was a problem- try again later";
                } else {

                    //hash
                    $query = "UPDATE `users` SET password = '".md5(md5(mysqli_insert_id($mysqli)).$_POST['password'])."' WHERE id =".mysqli_insert_id($mysqli)." LIMIT 1";

                    $id = mysqli_insert_id($mysqli);

                    mysqli_query($mysqli, $query);                    


                    $_SESSION['id'] = $id;

                    if ($_POST['stayLoggedIn'] == '1') {

                        setcookie("id", $id, time() + 60*60*24*365);
                    }

                    $query2 = "INSERT INTO `blog` (`title`, `description`, `userid`) VALUES ('".mysqli_real_escape_string($mysqli, "default")."',
                '".mysqli_real_escape_string($mysqli, "default")."',
                '".mysqli_real_escape_string($mysqli, $_SESSION['id'])."')";

                    mysqli_query($mysqli, $query2); 

                    //echo  "Sign up success";


?>

<script>
    window.location.href = "index.php";
</script>

<?php

                    header("location: index.php");

                }            
            } 

        }else {

            $query = "SELECT * FROM `users` WHERE email = '".mysqli_real_escape_string($mysqli, $_POST['email'])."'";

            $result = mysqli_query($mysqli, $query);

            $row = mysqli_fetch_array($result);

            if (isset($row)) {
                $hashedPassword = md5(md5($row['id']).$_POST['password']);

                if ($hashedPassword == $row['password']) {

                    $_SESSION['id'] = $row['id'];

                    if ($_POST['stayLoggedIn'] == '1') {

                        setcookie("id", $row['id'], time() + 60*60*24*365);
                    }


?>

<script>
    window.location.href = "index.php";
</script>

<?php

                    header("location: index.php");
                } else {
                    $error = "That email/password combo could not be found";
                }

            } else {
                $error = "That email/password combo could not be found";
            }
        }
    }    
}
?>


<html>
    <head>    
        <!-- Required meta tags always come first -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

        <style>
            .container {
                text-align: center;
                width: 400px;    
            }

            #homePageContainer {    
                margin-top: 150px;
            }

            #containerLoggedInPage {
                margin-top: 60px;
            }

            html {
                background: url(splashimage.jpg) no-repeat center center fixed;
                background-size: cover;
            }

            body {
                background: none;
                color: white;
            }

            #logInForm {
                display: none;
            }

            .toggleForms {
                font-weight: bold;
            }

        </style>

    </head>

    <body>

        <div id="homePageContainer" class="container">

            <h1>Blog</h1>

            <p><strong>A simple and beutiful blogging platform.</strong></p>

            <div id="error"><?php if ($error!="") {
    echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';} ?></div>


            <form method=post id="signUpForm">

                <p>interested Sign up now</p>

                <div class="form-group">

                    <input type="text" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">

                </div>
                <div class="form-group">

                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="stayLoggedIn" >
                    <label class="form-check-label" for="exampleCheck1">Stay logged in</label>

                    <!--added -->
                    <input type="hidden" name="signUp" value="1">
                </div>        

                <button type="submit" name="submit" class="btn btn-success">Sign Up</button>

                <p><a class="toggleForms">Log in</a></p>

            </form>



            <form method=post id="logInForm">

                <p>Log in using your username and password</p>

                <div class="form-group">

                    <input type="text" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email log in">

                </div>
                <div class="form-group">

                    <input type="password" class="form-control" name="password" placeholder="Password log in">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="stayLoggedIn" >
                    <label class="form-check-label" for="exampleCheck1">Stay logged in</label>
                    <!--added -->
                    <input type="hidden" name="signUp" value="0">
                </div>        

                <button type="submit" name="submit" class="btn btn-success">Log In</button>

                <p><a class="toggleForms">Sign Up</a></p>

            </form>   

        </div>



        <script>
            $(".toggleForms").click(function() {

                $("#signUpForm").toggle();
                $("#logInForm").toggle();

            });
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>

    </body>


</html>


