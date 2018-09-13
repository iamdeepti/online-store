<!DOCTYPE html>
<html>
    <head>
        <title>Lebens</title>
    </head>
    <body>
        <?php 
        error_reporting(E_ALL);
        include 'search_form.php';
        $item_id = $_GET['id'];
        
        $query = "SELECT * FROM products WHERE id='$item_id';";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $row = mysqli_fetch_array($result);
        
        ?>
        <div class="container">
            <div class="col-sm-6">
                <div class="row">
                    <div class="thumbnail"><?php echo"<img src='admin/Image/".$row['image']."' class='img-thumbnail' >"; ?> </div>
                        <div class="col-sm-6"><?php echo "<a href='cart.php?id=".$row['id']."'><input type='submit' value='Add to cart' class='btn btn-primary btn-block'/></a>"; ?></div>
                    
                    <!-- copied-->
    <form action="PaytmKit/pgRedirect.php" method="post">
        
<!-- Please Enter ORDER_ID must required value -->
<input id="ORDER_ID" type="hidden" tabindex="1"  name="ORDER_ID"  value="<?php echo "ORDS" . rand(10000,99999999)?>">
<!-- CUST_ID Enter must-->
<input id="CUST_ID" type="hidden" tabindex="2" name="CUST_ID" value="CUST001">
<!-- simple INDUSTRY_TYPE_ID enter with autocomplete-->
<input id="INDUSTRY_TYPE_ID" type="hidden" tabindex="4" name="INDUSTRY_TYPE_ID" value="Retail">
<!-- Enter your channel Id here-->
<input id="CHANNEL_ID" type="hidden" tabindex="4" name="CHANNEL_ID" autocomplete="off" value="WEB">
<!-- simple TXN_AMOUNT value Enter -->
<input title="TXN_AMOUNT" type="hidden" tabindex="10" name="TXN_AMOUNT" value="<?php echo $row['price'];?>">
<!-- CheckOut button put-->
<div class="col-sm-5 col-sm-offset-1"><input value="BUY NOW" type="submit" class="btn btn-primary btn-block" onclick="<?php $_SESSION['item_id']=$_GET['id'];?>"></div>

</form>
      
    

                
               
            </div>
            </div>
            <div class="col-sm-offset-2 col-sm-4">
                <div class="row">
                    <?php  echo "<h3>".$row['brand']." ".$row['name']."</h3>";
                           echo "<h4>Price : ".$row['price']." </h4>";
                    ?>
                  
                </div>
            </div>
        </div>
    </body>
</html>