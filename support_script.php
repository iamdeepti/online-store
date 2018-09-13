<?php 
    require_once 'include/common.php';
     if(!isset($_SESSION['email']))
        header("location:index.php");
    $user_id = $_SESSION['user_id'];
    $name = $_SESSION['name'];
    $subject = trim($_POST['sub']);
    $message = trim($_POST['message']);
    if(empty($subject))
    {
        header('location:support.php?error=subject cannot be empty');
    }
    elseif(empty($message))
    {
        header('location:support.php?error2=message cannot be empty');
    }
 else {
        mysqli_query($con,"INSERT INTO `support`(`user_id`, `message`, `subject`) VALUES ('$user_id','$message', '$subject')");
        header('location:support.php');
}
  
    $email = "iamdeepti956@gmail.com";
    
    echo 'subject is'.$subject.'end';
    //header('location:support.php');
    //mail($email,$name." : ".$subject,$message);
    
?>