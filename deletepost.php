<?php include('connection.php'); ?> 

        <?php
        
if ($_POST) {

        $id=$_POST['id'];
        
        $sql = "DELETE FROM post WHERE id='".$id."'";

        $result = mysqli_query($conn,$sql);  
       
}
        ?>
 
