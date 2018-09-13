<?php
require 'include/common.php' ;

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $item_id = $_GET['id']; 
    $user_id = $_SESSION['user_id'];
    $item = mysqli_query($con,"SELECT * FROM users_items WHERE product_id='$item_id' AND user_id='$user_id'");
     $row = mysqli_fetch_array($item);
    // Delete the rows from user_items table where item_id and user_id equal to the item_id and user_id we got from the cart page and session
    if( $row['quantity']>1){
       
        $row['quantity']=$row['quantity']-1;
        mysqli_query($con,"UPDATE users_items SET quantity ='".$row['quantity']."' WHERE user_id='$user_id' AND product_id='$item_id'") or die(mysqli_error($con));
        }
    else{
    $query = "DELETE FROM users_items WHERE product_id='$item_id' AND user_id='$user_id' ";
    $res = mysqli_query($con, $query) or die(mysqli_error($con));}
    header("location:cart.php");
}
 else {
     if(!is_numeric($_GET['id'])){
         header("location:cart.php?error=not numeric");
     }
     else
        header("location:cart.php?error=not set");  
}
?>