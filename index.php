<!DOCTYPE html>
<html>
    <head>
         <?php
include 'include\common.php';

?>
        <title>Lebens</title>
    </head>
    <body>
        <?php include 'search_form.php';?>
       <div class="container">
            <div class="jumbotron" style="text-align: center;">
                <h1>Welcome to our Store !</h1>
                <p> We have the best cameras, watches and shirts for you. No need to hunt around, we have all in one place.</p>
            </div>
        </div>
        <div class='container'>
            <?php                    
            require_once 'include/Check-if-added.php';  
        $query=mysqli_query($con, "SELECT * FROM products ; ") ;
        while ($row = mysqli_fetch_array($query)) { ?>
            <div class="col-md-3 col-sm-6">
                    <div class="thumbnail">
        <?php echo"<img src='admin/Image/".$row['image']."' class='img-thumbnail' >"; ?>
                        <div class="caption">
                            
                            <?php echo "<a href='product_detail.php?id=".$row['id']."'><h1>".$row['brand']." ".$row['name']."</h1></a>"; ?>
                            <p>Price: <?php echo $row['price'] ;  ?> </p>
                        </div>
                    </div>
            </div>
                <?php } ?>
                            
        
    </body>
</html>