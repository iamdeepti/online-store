<html>
    <head>
    <?php require 'include/common.php';
    if(!isset($_SESSION['email']))
        header('location:index.php');
    $user_id = $_SESSION['user_id'];
    $item_id = $_SESSION['item_id'];
    $res = mysqli_query($con,"SELECT * FROM users_items WHERE user_id='$user_id' AND product_id= '$item_id'");
    if(mysqli_num_rows($res)>0)
    mysqli_query($con, "UPDATE users_items SET status='confirmed' WHERE user_id='$user_id' AND product_id= '$item_id'") or die(mysqli_error($con));
    else
        mysqli_query($con,"INSERT INTO `users_items`(`user_id`, `product_id`,`status`) VALUES('$user_id', '$item_id','confirmed');");
    unset($_SESSION['item_id']);
?>

    
    
        <title>Lebens</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <link rel="stylesheet" href="index.css" type="text/css">
    <!--jQuery library--> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!--Latest compiled and minified JavaScript--> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        
    </head>
    <body>
        <br/><br/><br/><br/>
        <div class="container">
             <div class="row">
                <center>
                    <div class="col-sm-6 col-sm-offset-3">
                    <div class="alert alert-success">
                        Your order is confirmed. Thank you for shopping with us. <a href="index.php">Click here</a> to purchase any other item. 
                    </div>

    
                </div>
                </center>
                
            </div>
        </div>
    </body>
</html>