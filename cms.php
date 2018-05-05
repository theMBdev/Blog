<?php include('connection.php'); ?> 

<html>  
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="stylesheet.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        
    </head>
    <body>     
        <div class="side-nav">
            <div class="side-nav-link ajaxTrigger" load="cms-posts.php">
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
            $(".ajaxTrigger").click(function(){
                var pageName = $(this).attr("load");
                $("#ajaxContent").load("http://localhost/blog/"+pageName);
            });
        });
    </script>


</html>