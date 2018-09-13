<?php
 session_start();
if(!isset($_SESSION['id']))
                header ('location:admin.php');
$link = mysqli_connect("localhost","root","","lebens");
$result = mysqli_query($link,"SELECT image FROM products WHERE id='".$_GET['id']."';");
while($row = mysqli_fetch_array($result)){
    unlink($row['image']);
};
$query = "DELETE FROM products WHERE id='".$_GET['id']."'";
$result = mysqli_query($link,$query) or die(mysqli_error($link));
//header("location:database.php?comment=".mysqli_affected_rows($link));
?>