<?php include('connection.php'); ?> 

<html>  
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="stylesheet.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    </head>
    <body>     
        <div id="side-nav">
            <div class="side-nav-link ajaxTrigger active" load="cms-posts.php">
                <a>Posts</a>            
            </div>
            <div class="side-nav-link ajaxTrigger" load="settings.php">
                <a>Settings</a>            
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