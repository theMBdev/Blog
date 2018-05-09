<?php include('connection.php'); ?> 

<html>  
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="stylesheet.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    </head>

    <body> 
        <?php
        $sql = "SELECT id, title, body FROM post ORDER BY id DESC";        

        $result = mysqli_query($mysqli,$sql);  

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) { ?>

                <div class="post-row" id="row<?php echo $row['id'] ?>">                            
                <div class="post-title"> <?php echo $row["title"] ?> </div> 
                
                <div class="post-options arow<?php echo $row['id'] ?>">
                <a href="editpost.php?id=<?php echo $row['id'] ?>">Edit</a>
                &nbsp;|&nbsp;
                <a class="delete" id="<?php echo $row['id'] ?>">Delete</a></div> 
                
                </div>
          <?php  }            
        } 
        ?>  

    </body>


    <script>   

        $(document).ready(function(){

            // Delete 
            $('.delete').click(function(){
                var th = this;
                var id = this.id;  
                                                           
                var dataString = 'id='+ id;

                // AJAX Request
                $.ajax({
                    url: 'deletepost.php',
                    type: 'POST',
                    data: dataString,
                    success: function(response){

                        // Removing row from HTML Table
                        $(th).parents('.post-row').css('background-color','tomato');
                        $(th).parents('.post-title').css('background-color','tomato');
                        
                        $(th).closest('.post-row').fadeOut(800, function(){ 
                            $(this).remove();
                        });
                    }
                });
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