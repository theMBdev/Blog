<?php
$conn=mysqli_connect("localhost", "root", "", "blog");

if(mysqli_connect_error()) {
    die ("Database connection error");
}

//echo "Connected successfully";
?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>
    <body>
        <div class="nav-bar"> 
            <a href="createnewpost.php" class="nav-link">New Post</a>
        </div>
        <div class="wrapper">


            <div class="header">
                <h2>Blog Name</h2>
            </div>

            <div class="row">
                <div class="leftcolumn">

                    <?php  
                    $sql = "SELECT id, title, body FROM post";        

                    $result = mysqli_query($conn,$sql);  

                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="card-post">';
                            echo "<h2>" . $row["title"] ."</h2>";                           
                            echo "<p>". $row["body"] ."</p>";                            
                            echo "</div>";
                        }            
                    } else {
                        echo '<div class="card">';
                            echo '<h2 class="center-text">' . 'Click "New Post" to create your first post' ."</h2>";                         
                            echo "</div>";                       
                    }                  

                    ?>  

                </div>
                <div class="rightcolumn">
                    <div class="card">
                        <h2>About Me</h2>                    
                        <p>Name: ladad</p>
                    </div>
                    <div class="card">
                        <h3>Follow Me</h3>
                        <p>Some text..</p>
                    </div>
                </div>
            </div>

            <div class="footer">
                <h2>Footer</h2>
            </div>


        </div>

    </body>
</html>
