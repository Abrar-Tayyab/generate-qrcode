<?php

   $id=$_GET["id"];
   
   $query="UPDATE user set first_name='".."',middle_initial='".."',last_name='".."',prc_number='".."',dental_chapter='".."',phone_number='".."',email='".."' where user_id=$id";

    if(mysqli_query($conn, $query) === TRUE) {
          echo "edit";
    }

?>