<?php include('connection.php'); ?> 

<html>  
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="stylesheet.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    </head>

    <body> 
        <?php
        $sql = "SELECT id, title, body FROM post ORDER BY id DESC";        

        $result = mysqli_query($conn,$sql);  

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {

                echo '<div class="post-row" id="row'.$row['id'].'">';                            
                echo '<div class="post-title"><a>' . $row["title"] . '</a></div>';           
                echo '<div class="post-options arow'.$row['id'].' "><a href="editpost.php?id='.$row['id'].'">Edit</a>&nbsp;|&nbsp;<a>Delete</a></div>';     
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

        <div class="post-row">
            <div class="post-title">fdfd</div>
            <div class="post-options"><a>Edit</a>&nbsp;|&nbsp;<a>Delete</a></div>
        </div>

    </body>

    <script>

        //        $( document ).ready(function() {
        //            $('.post-options').hide();
        //        });
        //
        //        var rowid; 
        //
        //        $('.post-row').hover(function(){             
        //            rowid = this.id;  
        //            //alert(rowid);
        //        
        //            if($('.post-options').css('display') == 'none')
        //            {
        //                $(".a" + rowid).show();
        //                //alert("1");
        //            }
        //            
        //            if($('.post-options').css('display') == 'block')
        //            {
        //                $(".a" + rowid).hide(); 
        //                alert("2");
        //            }
        //        });

    </script>



</html>