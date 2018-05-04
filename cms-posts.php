<?php include('connection.php'); ?> 

<html>  
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="stylesheet.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    </head>

    <body>
        <div class="wrapper-main">
            
            <?php
             $sql = "SELECT id, title, body FROM post ORDER BY id DESC";        

                    $result = mysqli_query($conn,$sql);  

                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            
                            echo '<div class="posts-row">';                            
                            echo '<div class="post-title"><a>' . $row["title"] .'</a></div>';                             
                            echo "</div>";
                        }            
                    } else {
                        echo '<div class="card-post">';
                        echo '<h2 class="center-text">
                              Click "New Post" to create your first post
                              </h2>';                         
                        echo "</div>";                       
                    }   
                    ?>          
            
            
            <div class="posts-row">
                <div class="post-title">fdfd</div>
                <div class="post-options"><a>Edit</a>&nbsp;|&nbsp;<a>Delete</a></div>
            </div>
            <div class="posts-row">
                <div class="post-title">fdfd</div>
            </div>




        </div>
    </body>
    
    <script>
        $(document).ready(function(){
    $(".posts-row").hover(function(){
        $(".post-options").show();
    },
        function() {
        $(".post-options").hide();
    });
        });
     
        
    </script>
    
    

</html>