<?php

require_once 'include/common.php';
 if(!isset($_SESSION['email']))
        header("location:index.php");
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM `support` WHERE user_id ='$user_id' ORDER BY time DESC" or die(mysqli_error($con));
$result1 = mysqli_query($con, $query);


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Lebens</title>
    <?php 
        include 'search_form.php';
        
    ?>
        <link href="profile.css" rel="stylesheet">
        
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <?php include 'sidebar.php';?>
    
                <div class="col-sm-9 ">
                    <div class="container-fluid">
                        <?php while($row1 = mysqli_fetch_array($result1)){?>
                        <div class="col-sm-offset-1 col-sm-10">
                            <div class="well">
                                <?php
                            
                            echo '<p>subject: '.$row1['subject'].'</p>';
                            echo '<p>message: '.$row1['message'].'</p>';
                            echo '<p>date and time: '.$row1['time'].'</p>';
                            
                        ?>
                            </div>
                        </div> <?php }?>
                    </div>    
                </div>
            </div>
        </div>
    </body>
</html>



