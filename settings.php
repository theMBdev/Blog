<?php include('connection.php'); ?> 

<html>  
    <head>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>
    <body>

        <?php    
        if(isset($_POST['change-blog-name']))
        {   
            $blogname = $_POST['blog-name'];
            
            //needs change. sql injection
            $sql = "UPDATE blog ". "SET name='$blogname'". "WHERE id=1";
                        
            $result = mysqli_query($conn,$sql);    
            
            if($sql) {
                echo "Blog Name Updated";
            } else {
                echo "fail";
            }
            
            //header("Location:index.php");
        }    
        
        if(isset($_POST['change-blog-descripiton']))
        {   
            $blogdescription = $_POST['blog-descripiton'];
            
            //needs change. sql injection
            $sql = "UPDATE blog ". "SET description='$blogdescription'". "WHERE id=1";
                        
            $result = mysqli_query($conn,$sql);    
            
            if($sql) {
                echo "Blog Description Updated";
            } else {
                echo "fail";
            }
            
            //header("Location:index.php");
        }  
        
        if(isset($_POST['change-name']))
        {   
            $name = $_POST['name'];
            
            //needs change. sql injection
            $sql = "UPDATE user ". "SET name='$name'". "WHERE id=1";
                        
            $result = mysqli_query($conn,$sql);    
            
            if($sql) {
                echo "Name Updated";
            } else {
                echo "fail";
            }
            
            //header("Location:index.php");
        }  
        
        ?>   
<h2>Blog</h2>
        <div class="container">
            <form action="settings.php" method="POST">
                <label>Blog Name</label>
                <input type="text" name="blog-name">                  
                <button type="submit" name="change-blog-name">Save</button>
            </form>
            
            
            <form action="settings.php" method="POST">
                <label>Blog Description</label>
                <input type="text" name="blog-descripiton">                  
                <button type="submit" name="change-blog-descripiton">Save</button>
            </form>
            
            <h2>You</h2>
            
            <form action="settings.php" method="POST">
                <label>Name</label>
                <input type="text" name="name">                  
                <button type="submit" name="change-name">Save</button>
            </form>
            
            <a href="index.php"><button >Home</button></a>
            
        </div>
    </body>
</html>