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

        $result = mysqli_query($conn,$sql);  

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {

                echo '<div class="post-row" id="row'.$row['id'].'">';                            
                echo '<div class="post-title">' . $row["title"] . '</div>'; 
                
                echo '<div class="post-options arow'.$row['id'].'">
                <a href="editpost.php?id='.$row['id'].'">Edit</a>
                &nbsp;|&nbsp;
                <a class="delete" id='.$row['id'].'">Delete</a></div>'; 
                
                echo "</div>";
            }            
        } else {                               
        }   
        ?>  

    </body>


    <script>   

        $(document).ready(function(){

            // Delete 
            $('.delete').click(function(){
                var el = this;
                var id = this.id;  
                                                           
                var dataString = 'id='+ id;

                // AJAX Request
                $.ajax({
                    url: 'deletepost.php',
                    type: 'POST',
                    data: dataString,
                    success: function(response){

                        // Removing row from HTML Table
                        $(el).parents('.post-row').css('background','tomato');
                        $(el).parents('.post-title').css('background','tomato');
                        
                        $(el).closest('.post-row').fadeOut(800, function(){ 
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

    <script>

        //        $( document ).ready(function() {
        //            $('.post-options').hide();
        //        });
        //
        //        var rowid; 
        //
        //        $('.post-row').hover(function(){             
        //            rowid = this.id;  
        //            //alert(rowid);
        //        
        //            if($('.post-options').css('display') == 'none')
        //            {
        //                $(".a" + rowid).show();
        //                //alert("1");
        //            }
        //            
        //            if($('.post-options').css('display') == 'block')
        //            {
        //                $(".a" + rowid).hide(); 
        //                alert("2");
        //            }
        //        });

    </script>





</html>