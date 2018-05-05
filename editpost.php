<?php include('connection.php'); ?> 
<html>  
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>
    <body>

        <?php

        $myID = $_GET['id'];
        
        $sql = "SELECT * FROM post WHERE id='".$myID."'";;        

        $result = mysqli_query($conn,$sql);  

        $row = mysqli_fetch_assoc($result);

        $Gtitle = $row['title'];
        $Gbody = $row['body'];  
        
        ?>

        <?php    
        if(isset($_POST['save']))        {   
        
            $theid = $_REQUEST["id"];
            
            
            
            $Ptitle=$_POST['title'];
            $Pbody=$_POST['body'];
            
            echo $Ptitle;
            echo $Pbody;
                                                                            
            $sql = "UPDATE post ". "SET title='$Ptitle', body='$Pbody'". "WHERE id='$theid'";            
            
            
            $result = mysqli_query($conn,$sql);        
            header("Location:index.php");
        }
        else {
            
        }
        ?>    
        
        <div class="center-form">
            <h1>Edit Post</h1>
            <div class="form-background">
                <form action='editpost.php?id=<?php echo $myID ?>' method="POST">
                    <div class="">
                        <label for="title">Title</label>                        
                        <input type="text" id="title" name="title" value="<?php echo $Gtitle ?>" placeholder="Post title">
                    </div>

                    <div class="">
                        <label for="body">Post</label>
                        <textarea class="textarea-post" id="post-input" rows="10" cols="70" id="body" name="body"><?php echo $Gbody ?></textarea> 
                    </div>

                    <button class="submitbutton" type="submit" name="save">update</button>

                </form>
            </div>
        </div>                

    </body>
</html>