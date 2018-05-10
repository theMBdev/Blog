<?php
include('connection.php');
include('sessioncheck.php');
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
            
            <div class="side-nav-link" onclick="window.location = 'signin.php?logout=1'">
                <a class="nav-text">Logout</a> 
                <div><i class="fas fa-sign-out-alt nav-icon"></i></div>
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

</html>