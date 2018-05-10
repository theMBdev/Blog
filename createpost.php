<?php include('connection.php'); ?> 
<?php 
session_start();

if (array_key_exists("id", $_COOKIE)) {

    $_SESSION['id'] = $_COOKIE['id']; 
}

if (array_key_exists("id", $_SESSION)) {

    echo $_SESSION['id'];
    echo "<p>Logged In! <a href='signin.php?logout=1'>Log out</a></p>";                      
//    $query = "SELECT title FROM `blog` WHERE id = ".mysqli_real_escape_string($mysqli, $_SESSION['id'])." LIMIT 1";
//
//    $row = mysqli_fetch_array(mysqli_query($mysqli, $query));
//
//    $title = $row['title'];

} else {

    header("Location: signin.php");

}
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
            $stmt = $mysqli->prepare("INSERT INTO posts (title, body, userid) VALUES (?, ?, ?)");
            $stmt->bind_param("ssi", $_POST['title'], $_POST['body'], $_SESSION['id']);
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