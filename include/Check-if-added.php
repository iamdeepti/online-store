<?php

require_once 'common.php';

    function check_if_added_to_cart($item_id){
        global $con;
        $user_id=$_SESSION['user_id'];
        $query_result=mysqli_query($con,"SELECT * FROM users_items WHERE user_id='$user_id' AND item_id='$item_id' AND status='Added to cart' ;");
        if(mysqli_num_rows($query_result)==0){ 
            return 0;
        }  
        else {
            return 1;
        }
    }
?>

