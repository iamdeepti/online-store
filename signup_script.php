<?php
    require 'include/common.php';
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $query_result=mysqli_query($con, "SELECT * FROM users WHERE email='$email' ;");
    if(mysqli_num_rows($query_result)>0)
    {
        header('location:signup.php?error=Email id already exists');
    }
    else 
    { 
          $name=$_POST['name'];
          if(mb_strlen($name)==0)
          {
              header("location:signup.php?nameerror=name can't be empty");
          }
          $password=md5($_POST['password']);
          if(mb_strlen($_POST['password']) < 6){
              header('location:signup.php?passworderror=password be atleast 6 character long');
          }
          $contact=$_POST['contact'];
          if(mb_strlen($contact)!=10){
              header('location:signup.php?contacterror=mobile number must be ten digit long');
          }
          $regex_email = '/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix';
          if(!preg_match($regex_email,$email)){
              header('location:signup.php?emailerror=invalid email');
          }
          $qresult=mysqli_query($con, "INSERT INTO users (name, email, password, contact) VALUES ('$name', '$email', '$password','$contact') ;") or die(mysqli_error($con));
          
          header('location:login.php');
    }
?>