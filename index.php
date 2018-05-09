<?php include('connection.php'); ?> 

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="nav-bar">             
            <a href="createnewpost.php" class="nav-link">New Post</a> 
            <a href="cms.php" class="nav-link-grey">Settings</a>
        </div>

        <div id="main" class="main-wrapper">

            <div class="wrapper">

                <div class="header">

                    <?php  
                    $sql = "SELECT title FROM blog WHERE id=1";
                    $result = mysqli_query($conn,$sql);

                    $row = mysqli_fetch_assoc($result) ;                   
                    echo "<h2>" . $row["title"] ."</h2>";

                    ?>            


                </div>

                <div class="row">
                    <div class="leftcolumn">
                        <?php  
                        $sql = "SELECT id, title, body FROM post ORDER BY id DESC";        

                        $result = mysqli_query($conn,$sql);  

                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo '<div class="card-post">';
                                echo "<h2>" . $row["title"] ."</h2>";                           
                                echo "<p>". $row["body"] ."</p>";                            
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
                    </div>

                    <div class="rightcolumn">
                        <div class="card">
                            <h2>About Me</h2> 
                            <?php 

                            $sql = "SELECT name FROM user WHERE id=1";                       

                            $result = mysqli_query($conn,$sql);

                            $row = mysqli_fetch_assoc($result);
                            echo "<p>Name: " . $row["name"] ."</p>";

                            ?>                          
                        </div>


                        <div class="card">
                            <h3>Blog Description</h3>
                            <?php 

                            $sql = "SELECT description FROM blog WHERE id=1";  

                            $result = mysqli_query($conn,$sql);

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
