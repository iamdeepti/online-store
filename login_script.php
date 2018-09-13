<?php 
require 'include/common.php';
 $email= mysqli_real_escape_string($con, $_POST['email']);
 $password= md5($_POST['password']);
 $query="SELECT * FROM users WHERE email='$email' AND password='$password';" ;
 $query_result= mysqli_query($con, $query) or die(mysqli_error($con));
 if(mysqli_num_rows($query_result)==0)
 {
    header('location:login.php?error=Incorrect email or password');
 }
 else {
    $row=mysqli_fetch_array($query_result);
    $_SESSION['email']= $row['email'];
    $_SESSION['user_id']=$row['id'];
    $_SESSION['name'] = $row['name'];
    header('location:profile.php');
}
?>