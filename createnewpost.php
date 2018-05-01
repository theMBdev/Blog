<?php
$conn=mysqli_connect("localhost", "root", "", "blog");

if(mysqli_connect_error()) {
    die ("Database connection error");
}

//echo "Connected successfully";
?>

<html>  
    <head>
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

        <div class="container">
            <form action="createnewpost.php" method="POST">
                <label>Title</label>
                <input type="text" name="title"><br> 
                <label>Body</label>
                <input type="text" name="body"><br> 
                <button type="submit" name="save">save</button>
            </form>
        </div>
    </body>
</html>