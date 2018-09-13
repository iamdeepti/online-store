<?php
  include 'include/common.php';
  $user_id = $_SESSION['user_id'];
  if(isset($_POST['name']))
  {
      $name = $_POST['name'];
      mysqli_query($con,"UPDATE TABLE users SET name='$name' WHERE id='$user_id'") or die(mysqli_error($con));
      header("location:profile.php");
  }
  else if(isset($_POST['email']))
  {
      $email = $_POST['email'];
      mysqli_query($con,"UPDATE TABLE users SET email='$email' WHERE id='$user_id'");
      header("location:profile.php");
  }
  else if(isset($_POST['contact']))
  {
      $contact = $_POST['contact'];
      mysqli_query($con,"UPDATE TABLE users SET contact='$contact' WHERE id='$user_id'");
      header("location:profile.php");
  }
  else if(isset($_FILES['upload']))
  {
      $file_name = $_FILES['upload']['name'];
      $file_type = $_FILES['upload']['type'];
      $file_tmp_name = $_FILES['upload']['tmp_name'];
      $file_size = $_FILES['upload']['size'];
      
      $target_dir = 'uploads/';
      
      if(move_uploaded_file($file_tmp_name, $target_dir.$file_name))
      {
          $row = mysqli_query($con,"UPDATE TABLE users SET images='$file_name' WHERE id ='$user_id'; ");
          if(!mysqli_affected_rows($con)){
              header('location:profile.php?error=an erorr occured while uploading your file please try again');
          }
       else {
              header('location:profile.php');
            }
      }
   }
   else if(isset($_POST['Old_password']))
   {
       
$password = md5($_POST['Old_password']);
$new_password = md5($_POST['New_Password']);
$Rnew_password = md5($_POST['Re_type_new_password']);
$user_id = $_SESSION['user_id'];
$query = mysqli_query($con,"SELECT * FROM users WHERE password = '$password' AND id = '$user_id'") or die(mysqli_error($con));
if(mysqli_num_rows($query) == 0)
{
    header('location:profile.php?error=Incorrect password');
}
 else 
{
    if($new_password == $Rnew_password){
        mysqli_query($con,"UPDATE users SET password = '$new_password' WHERE id = '$user_id';") or die(mysqli_error($con));
                header('location:profile.php');
    }
    else
        header('location:profile.php?error2=Passwords do not match');
}
   }
  else{
      header('location:profile.php?error=some error occured while processing your request!');
  } 
?>