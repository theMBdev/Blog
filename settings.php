<?php include('connection.php'); ?> 

<html>  
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="stylesheet.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script>
            function success() {
                var x = document.getElementById("snackbarsuccess");
                x.className = "show";
                setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
            }
        </script>

    </head>
    <body>

        <?php    
        if(isset($_POST['change-blog-title']))
        {   
            $blogtitle = $_POST['blog-title'];

            //needs change. sql injection
            $sql = "UPDATE blog ". "SET title='$blogtitle'". "WHERE id=1";

            $result = mysqli_query($conn,$sql);    

            if($sql) {
                
                echo '<div id="snackbarsuccess">Blog title changed</div>';

                echo '<script type="text/javascript">',
                'success();',
                '</script>'
                    ;

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
                
                echo '<div id="snackbarsuccess">Blog description changed</div>';

                echo '<script type="text/javascript">',
                'success();',
                '</script>';                
                
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

        <form action="settings.php" method="POST">
            <div class="form-grop">
                <label for="blog-title">Title:</label>
                <?php
                $sql = "SELECT name FROM blog WHERE id=1";  

                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                $blogtitle = $row["name"];  

                echo '<span id="blog-title">' .$blogtitle. '</span>'; 
                // If user input " will break
                echo '<input class="hide-on-load show-blog-title" value=' .'"'.$blogtitle.'"'. 'name="blog-title"/> ';
                ?>               
                <a class="edit" id="edit-blog-title">Edit</a> <!-- style blue on click jquery --> 
                <button class="hide-on-load show-blog-title" type="submit" name="change-blog-title">Save</button>
                <button id="cancel-blog-title" class="hide-on-load show-blog-title" type="reset" name="cancel">Cancel</button>
            </div>
        </form>
        
        <form action="settings.php" method="POST">
            <div class="form-grop">
                <label for="blog-description">Descripiton:</label>
                <?php
                $sql = "SELECT description FROM blog WHERE id=1";  

                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                $blogdescripiton = $row["description"];  

                echo '<span id="blog-description">' .$blogdescripiton. '</span>'; 
                // If user input " will break
                echo '<input class="hide-on-load show-blog-description" value=' .'"'.$blogdescripiton.'"'. 'name="blog-descripiton"/> ';
                ?>               
                <a class="edit" id="edit-blog-description">Edit</a> <!-- style blue on click jquery --> 
                <button class="hide-on-load show-blog-description" type="submit" name="change-blog-descripiton">Save</button>
                <button id="cancel-blog-description" class="hide-on-load show-blog-description" type="reset" name="cancel">Cancel</button>
            </div>
        </form>

            <h2>You</h2>
        
        <form action="settings.php" method="POST">
            <div class="form-grop">
                <label for="blog-description">Name:</label>
                <?php
                $sql = "SELECT name FROM user WHERE id=1";  

                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                $name = $row["name"];  

                echo '<span id="blog-name">' .$name. '</span>'; 
                // If user input " will break
                echo '<input class="hide-on-load show-name" value=' .'"'.$name.'"'. 'name="name"/> ';
                ?>               
                <a class="edit" id="edit-name">Edit</a> <!-- style blue on click jquery --> 
                <button class="hide-on-load show-name" type="submit" name="change-name">Save</button>
                <button id="cancel-name" class="hide-on-load show-name" type="reset" name="cancel">Cancel</button>
            </div>
        </form>


            <a href="index.php"><button >Home</button></a>

       
    </body>
    <script>

        $(document).ready(function(){   
            $(".hide-on-load").hide();     
        });
        
        // blog title
        $(document).ready(function(){
            $("#edit-blog-title").click(function(){
                $(".show-blog-title").toggle(); 
                $("#blog-title").toggle(); 
                $(this).toggle();
            });
        });

        $(document).ready(function(){
            $("#cancel-blog-title").click(function(){
                $("#edit-blog-title").toggle();  
                $("#blog-title").toggle();
                $(".show-blog-title").toggle(); 
            });
        });
        
        // blog description
        $(document).ready(function(){
            $("#edit-blog-description").click(function(){
                $(".show-blog-description").toggle(); 
                $("#blog-description").toggle(); 
                $(this).toggle();
            });
        });

        
        $(document).ready(function(){
            $("#cancel-blog-description").click(function(){
                $("#edit-blog-description").toggle();  
                $("#blog-description").toggle();
                $(".show-blog-description").toggle(); 
            });
        });
        
        // name of user
        $(document).ready(function(){
            $("#edit-name").click(function(){
                $(".show-name").toggle(); 
                $("#blog-name").toggle(); 
                $(this).toggle();
            });
        });

        
        $(document).ready(function(){
            $("#cancel-name").click(function(){
                $("#edit-name").toggle();  
                $("#blog-name").toggle();
                $(".show-name").toggle(); 
            });
        });
    </script>




</html>