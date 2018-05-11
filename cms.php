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
                <div><i id="home-icon"></i></div>
            </div>

            <div class="side-nav-link ajaxTrigger active" load="cms-posts.php">
                <a class="nav-text">Posts</a> 
                <div><i id="edit-icon"></i></div>
            </div>
            
            <div class="side-nav-link ajaxTrigger" load="settings.php">
                <a class="nav-text">Settings</a>
                <div><i id="cog-icon"></i></div>
            </div>
            
            <div class="side-nav-link" onclick="window.location = 'signin.php?logout=1'">
                <a class="nav-text">Logout</a> 
                <div><i id="sign-out-icon"></i></div>
            </div>

        </div> 

        <div class="wrapper-main">

            <div id="ajaxContent">

            </div>
        </div>
    </body>

    <script>
        $(function () {
            $(window).bind("resize", function () {                
                if ($(this).width() < 801) {
                    $("#home-icon").addClass('fas fa-home');  
                    $("#edit-icon").addClass('fas fa-edit');  
                    $("#cog-icon").addClass('fas fa-cog');  
                    $("#sign-out-icon").addClass('fas fa-sign-out-alt');                 
                } else {
                    $("#home-icon").removeClass('fas fa-home');
                    $("#edit-icon").removeClass('fas fa-edit');
                    $("#cog-icon").removeClass('fas fa-cog');
                    $("#sign-out-icon").removeClass('fas fa-sign-out-alt'); 
                }
            }).trigger('resize');
        });
    </script>        
    
    
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