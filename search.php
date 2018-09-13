<!DOCTYPE html>
<html>
<?php

include 'search_form.php';
require_once 'include/common.php';
$search = $_GET['search'];
$query = "SELECT * FROM products WHERE name = '$search' OR brand = '$search' OR category ='$search'";
$result = mysqli_query($con,$query) or die(mysqli_error($con));
                                                                                
?>                                                                                
<head>
    <title>Lebens</title>
</head>
<body style="background: url('https://ae01.alicdn.com/kf/HTB1unAiKpXXXXXZXFXXq6xXFXXX3/Sepatu-toko-furniture-display-Toko-MDF-Showcase-display-toko-kain-tas-kabinet-Display-toko-rak-toko.jpg_640x640.jpg');">
    
    <?php
    if(mysqli_num_rows($result)<1)
    { ?>
    <div class="panel panel-success col-md-6 col-md-offset-3" style="padding: 15% 0; text-align: center;"><h1 class="panel-heading">Sorry! didn't find anything.<br/> Try different keyword!</h1></div>
    <?php }
    while($row=mysqli_fetch_array($result)){?>
    <div class="container">
        <div class="col-md-3 col-sm-6">
            <div class="thumbnail">
                <?php echo "<img src='http://localhost/search/admin/Image/".$row['image']."'/>"; ?>
                <div class="caption">
                    <?php echo "<a href='product_detail.php?id=".$row['id']."'><h1>".$row['brand']." ".$row['name']."</h1></a>"; ?>
                    <p>Price: <?php echo $row['price'] ; ?></p>            
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</body>
</html>