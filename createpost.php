<?php
include('connection.php');
include('sessioncheck.php');
?>
<html>  
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>
    <body>

        <?php    
        if(isset($_POST['save']))
        {
            $stmt = $mysqli->prepare("INSERT INTO posts (title, body, posted, userid) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("sssi", $_POST['title'], $_POST['body'], date("Y/m/d"), $_SESSION['id']);
            $stmt->execute();
            $stmt->close();

            header("Location:index.php");
        }
        ?>   

        <div class="center-form">
            <h1>New Post</h1>
            <div class="form-background">
                <form action="createpost.php" method="POST">
                    <div class="f">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" placeholder="Post title">
                    </div>

                    <div class="">
                        <label for="body">Post</label>
                        <textarea class="textarea-post" id="post-input" rows="10" cols="70" id="body" name="body" placeholder="Post Content"></textarea>
                    </div>

                    <button class="submitbutton" type="submit" name="save">Post</button>

                </form>
            </div>
        </div>        
    </body>
</html>