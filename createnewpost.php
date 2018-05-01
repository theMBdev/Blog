<?php include('connection.php'); ?> 
<html>  
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>
    <body>

        <?php    
        if(isset($_POST['save']))
        {
            $sql = "INSERT INTO `post` (`title`, `body`) 
        VALUES ('".$_POST["title"]."','".$_POST["body"]."')";

            $result = mysqli_query($conn,$sql);        
            header("Location:index.php");
        }
        ?>   


        
        <div class="center-form">
            <div class="form-background">
                <form action="createnewpost.php" method="POST">
                    <div class="">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" placeholder="Post title">
                    </div>

                    <div class="">
                        <label for="body">Post</label>
                        <textarea rows="10" cols="70" id="body" name="body"></textarea> 
                    </div>

                    <button class="submitbutton" type="submit" name="save">Post</button>
                    
                </form>
            </div>
        </div>
        
        
        
        
        
        
    </body>
</html>