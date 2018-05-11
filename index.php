<?php
include('connection.php');
include('sessioncheck.php');
?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="nav-bar">             
            <a href="createpost.php" class="nav-link">New Post</a> 
            <a href="cms.php" class="nav-link-grey">Settings</a>
        </div>

        <div id="main" class="main-wrapper">

            <div class="wrapper">

                <div class="header">

                    <?php  
                    $sql = "SELECT title FROM blog WHERE userid=".$_SESSION['id']."";
                    $result = mysqli_query($mysqli,$sql);

                    $row = mysqli_fetch_assoc($result) ;                   
                    echo "<h2>" . $row["title"] ."</h2>";

                    ?>

                </div>

                <div class="row">
                    <div class="leftcolumn">
                        <?php  
                        $sql = "SELECT id, title, body FROM posts WHERE userid=".$_SESSION['id']." ORDER BY id DESC";        
                        $result = mysqli_query($mysqli,$sql);  

                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) { ?>

                        <div class="card-post">
                            <h2> <?php echo $row["title"]; ?> </h2>
                           <p> <?php echo str_replace('  ', ' &nbsp;', nl2br(htmlentities($row["body"]))); ?> </p>
                                                       
                        </div>

                        <?php }            
                        } else { ?>
                        <div class="card-post">
                            <h2 class="center-text">
                                Click "New Post" to create your first post
                            </h2>                         
                        </div>                     
                        <?php } ?>    
                    </div>

                    <div class="rightcolumn">
                        <div class="card">
                            <h2>About Me</h2>
                            <?php 
                            $sql = "SELECT name FROM users WHERE id=".$_SESSION['id']."";

                            $result = mysqli_query($mysqli,$sql);

                            $row = mysqli_fetch_assoc($result);
                            echo "<p>Name: " . $row["name"] ."</p>";
                            ?>                          
                        </div>

                        <div class="card">
                            <h3>Blog Description</h3>
                            <?php 
                            $sql = "SELECT description FROM blog WHERE userid=".$_SESSION['id']."";  

                            $result = mysqli_query($mysqli,$sql);

                            $row = mysqli_fetch_assoc($result);
                            echo "<p>" . $row["description"] ."</p>";
                            ?>                      
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


        </div>        

    </body>

    <script>
        $(function () {
            $(window).bind("resize", function () {                
                if ($(this).width() < 1200) {
                    $('div').removeClass('main-wrapper');
                } else {
                    $('#main').addClass('main-wrapper')
                }
            }).trigger('resize');
        });
    </script>

    <script>
        $(function () {
            $(window).bind("resize", function () {                
                if ($(this).width() < 784) {
                    $('.nav-link').addClass('nav-link-50');
                    $('.nav-link-grey').addClass('nav-link-50');
                } else {
                    $('.nav-link').removeClass('nav-link-50');
                    $('.nav-link-grey').removeClass('nav-link-50');
                }
            }).trigger('resize');
        });
    </script>        



</html>
