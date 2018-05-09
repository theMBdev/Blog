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


        <div id="snackbarsuccess"></div>

        <div class="settings-section">
            <div class="settings-heading"><h2>Blog</h2></div>

            <form action="settings.php" method="POST">
                <div class="section-body">
                    <div class="section-content">
                        <div class="section-left">
                            <label for="blog-title">Title:</label>
                        </div>

                        <?php
                        $sql = "SELECT title FROM blog WHERE id=1";  

                        $result = mysqli_query($conn,$sql);
                        $row = mysqli_fetch_assoc($result);
                        $blogtitle = $row["title"];  




                        echo '<span id="blog-title">' .$blogtitle. '</span>'; 
                        // If user input " will break



                        echo '<input class="hide-on-load show-blog-title" value=' .'"'.$blogtitle.'"'. ' id="title" name="blog-title"/>';
                        ?>             


                        <a class="edit" id="edit-blog-title">Edit</a> <!-- style blue on click jquery --> 

                        <button id="submit-title" class="hide-on-load show-blog-title  button-primary" type="submit" name="change-blog-title">Save</button>


                        <button id="cancel-blog-title" class="hide-on-load show-blog-title button-secondary" type="reset" name="cancel">Cancel</button>
                    </div>  
                </div>
            </form>




            <div class="settings-body">
                <form action="settings.php" method="POST">
                    <div class="section-body">
                        <div class="section-content">
                            <div class="section-left">
                                <label for="blog-description">Description:</label>
                            </div>
                            <?php
                            $sql = "SELECT description FROM blog WHERE id=1";  

                            $result = mysqli_query($conn,$sql);
                            $row = mysqli_fetch_assoc($result);
                            $blogdescription = $row["description"];  

                            echo '<span id="blog-description">' .$blogdescription. '</span>'; 
                            // If user input " will break

                            echo '<textarea class="hide-on-load show-blog-description descriptiontext" id="description" name="blog-description" rows="10" cols="30" >' .$blogdescription. '</textarea>';

                            ?>       

                            <a class="edit" id="edit-blog-description">Edit</a> <!-- style blue on click jquery --> 



                            <button id="submit-description" class="hide-on-load show-blog-description button-primary" type="submit" name="change-blog-description" name="submit-description">Save</button>


                            <button id="cancel-blog-description" class="hide-on-load show-blog-description button-secondary" type="reset" name="cancel">Cancel</button>
                        </div>  
                    </div>
                </form>
            </div>
        </div>           

        <div class="settings-section">
            <div class="settings-heading"><h2>You</h2></div>

            <form name="form" method="POST">
                <div class="section-body">
                    <div class="section-content">
                        <div class="section-left">
                            <label for="name">Name:</label>
                        </div>
                        <?php
                        $sql = "SELECT name FROM user WHERE id=1";  

                        $result = mysqli_query($conn,$sql);
                        $row = mysqli_fetch_assoc($result);
                        $name = $row["name"];  

                        echo '<span id="blog-name">' .$name. '</span>'; 
                        // If user input " will break
                        echo '<input class="hide-on-load show-name" id="name" value=' .'"'.$name.'"'. 'name="name"/> ';
                        ?>             

                        <a class="edit" id="edit-name">Edit</a> <!-- style blue on click jquery --> 

                        <button id="submit-name" class="hide-on-load show-name button-primary" type="submit" name="submit-name">Save</button>                       


                        <button id="cancel-name" class="hide-on-load show-name button-secondary" type="reset" name="cancel">Cancel</button>
                    </div>  


                    <span class="error" style="display:none"> Please Enter Valid Data</span>
                    <span class="success" style="display:none"> Form Submitted Success</span>

                </div>
            </form>                
        </div>

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
            $("#submit-title").click(function(){
                $("#edit-blog-title").toggle();  
                $("#blog-title").toggle();
                $(".show-blog-title").toggle();  
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
            $("#submit-description").click(function(){
                $("#edit-blog-description").toggle();  
                $("#blog-description").toggle();
                $(".show-blog-description").toggle(); 
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
            $("#submit-name").click(function(){
                $("#edit-name").toggle();  
                $("#blog-name").toggle();
                $(".show-name").toggle(); 
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

    <!-- Set the input to be the same as the name -->
    <script>    
        $("#edit-name").click(function(){
            var put = $('#blog-name').text()
            $('#name').val(put);
        });   
    </script>

    <script>        
        $(function() {
            $("#submit-title").click(function() {
                var title = $("#title").val();            
                var dataString = 'title='+ title;

                if(title=='')
                {   
                    $('.error').fadeOut(200).show();
                }
                else
                {
                    $.ajax({
                        type: "POST",
                        url: "savetitle.php",
                        data: dataString,
                        success: function(){
                            success();
                            $("#snackbarsuccess").html("Title changed");
                            $('#blog-title').html(title);
                            $('.error').fadeOut(200).hide();
                        }
                    });
                }
                return false;
            });
        });
    </script>

    <script>        
        $(function() {
            $("#submit-description").click(function() {
                var description = $("#description").val();            
                var dataString = 'description='+ description;

                if(description=='')
                {   
                    $('.error').fadeOut(200).show();
                }
                else
                {
                    $.ajax({
                        type: "POST",
                        url: "savedescription.php",
                        data: dataString,
                        success: function(){
                            success();
                            $("#snackbarsuccess").html("Description changed");
                            $('#blog-description').html(description);
                            $('.error').fadeOut(200).hide();
                        }
                    });
                }
                return false;
            });
        });
    </script>

    <script>        
        $(function() {
            $("#submit-name").click(function() {
                var name = $("#name").val();            
                var dataString = 'name='+ name;

                if(name=='')
                {   
                    $('.error').fadeOut(200).show();
                }
                else
                {
                    $.ajax({
                        type: "POST",
                        url: "savename.php",
                        data: dataString,
                        success: function(){
                            success();
                            $("#snackbarsuccess").html("Name changed");
                            $('#blog-name').html(name);
                            $('.error').fadeOut(200).hide();
                        }
                    });
                }
                return false;
            });
        });
    </script>




</html>