<?php
   include 'include/common.php';
   
   $user_id = $_SESSION['user_id'];
   $area = $_POST['area'];
   $name = $_POST['name'];
   $mobile = $_POST['Mobile_No'];
   $pincode = $_POST['pincode'];
   $locality = $_POST['locality'];
   $area = $_POST['area'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $landmark = $_POST['landmark'];
 
   $alt_phone = $_POST['alt_phone'];
   mysqli_query($con,"INSERT INTO address (name, mobile, pincode, locality, address, city, state, landmark, alt_mobile,user_id) VALUES('$name','$mobile','$pincode','$locality','$area','$city','$state','$landmark','$alt_phone','$user_id') ") or die(mysqli_error($con));
   
   header("location:manage_address.php");

?>