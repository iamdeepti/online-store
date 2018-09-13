<!DOCTYPE html>
<html>
    <head>
        <title>Lebens</title>
    <?php 
        include 'search_form.php';
        $user_id = $_SESSION['user_id'];
        $query = mysqli_query($con,"SELECT * FROM users_items, products WHERE user_id = '$user_id' AND status = 'confirmed' AND users_items.product_id = products.id;");
    ?>
        <link href="profile.css" rel="stylesheet">
        
        
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <?php include 'sidebar.php'; ?>
                <div class="col-sm-9">
                    <?php while ($row = mysqli_fetch_array($query)) { ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail">
                            <?php print"<img src='admin/Image/".$row['image']."' />"; ?>
                            
                        </div>
                        </div>
                        <div class="col-md-7 col-sm-9 " style="background: white">   
                                <?php echo "<a href='product_detail.php?id=".$row['id']."'><h1>".$row['brand']." ".$row['name']."</h1></a>"; ?>
                                <p>Price: <?php echo $row['price'] ;?> </p>
                                <p>Date and Time of purchase: <?php echo $row['time'];?></p>
                            </div>
                     <?php } ?>    
                </div>
            </div>
        </div>
    </body>
</html>
       