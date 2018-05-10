<?php include('connection.php'); ?>
<?php 
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

<html>  
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="stylesheet.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">

    </head>
    <body>     
        <div id="side-nav">

            <div class="side-nav-link" onclick="window.location = 'index.php'">
                <a class="nav-text">Home</a> 
                <div><i class="fas fa-home nav-icon"></i></div>
            </div>

            <div class="side-nav-link ajaxTrigger active" load="cms-posts.php">
                <a class="nav-text">Posts</a> 
                <i class="fas fa-edit nav-icon"></i>
            </div>
            <div class="side-nav-link ajaxTrigger" load="settings.php">
                <a class="nav-text">Settings</a>
                <i class="fas fa-cog nav-icon"></i>
            </div>

        </div> 

        <div class="wrapper-main">

            <div id="ajaxContent">

            </div>
        </div>
    </body>
    <script>
        $(document).ready(function(){     
            $("#ajaxContent").load("http://localhost/blog/cms-posts.php");
            $(".ajaxTrigger").click(function(){
                var pageName = $(this).attr("load");
                $("#ajaxContent").load("http://localhost/blog/"+pageName);
            });
        });
    </script>


    <script>
        // Add active class to the current button (highlight it)
        var header = document.getElementById("side-nav");        
        var btns = header.getElementsByClassName("side-nav-link");

        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }
    </script>

    <script>



    </script>

</html>