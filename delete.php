<?php
 //echo $id=$_GET["id"];

   $query="delete from user where user_id=$id";
   if(mysqli_query($conn, $query) === TRUE) {
          echo "deleted";
    }

?>