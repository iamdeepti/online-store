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
                            <?php 
                            if(!isset($_SESSION['email']))
                            {
                                echo"<span class='glyphicon glyphicon-heart-empty'></span><span>Add to favorites</span>" ?>
                            <script>
                                $(".glyhpicon-heart-empty").click(function(){
                                    <?php header('location:login.php');?>
                                })
                            </script>
                           <?php }
                            else
                            { 
                                $res=mysqli_query($con,"SELECT * FROM `favorite` WHERE user_id='".$_SESSION['user_id']."' AND product_id='".$row['id']."' ;") or die(mysqli_error($con));
                                if(mysqli_num_rows($res)<1){ ?>
                                    
                            <div class="heart-empty">
                                <span class="glyphicon glyphicon-heart-empty"></span>
                                <span>Add to favorites</span>
                            </div>
                            <div class="heart" style="display:none">
                                <span class="glyphicon glyphicon-heart" ></span>
                                <span>Added to Favorites</span>
                            </div>
                        </div>
                    </div>
            <script>
                                    
          $(document).ready(function(){$(".glyphicon-heart-empty").click(function(){
    $(".heart-empty").hide();
     $(".heart").show();
    <?php 
    mysqli_query($con,"INSERT INTO `favorite` (`user_id`, `product_id`) VALUES ('".$_SESSION['user_id']."','".$row['id']."');") or die(mysqli_error($con));
    
    echo "console.log('inserted into table');";
    ?>
   
});


}) ;
 $(document).ready(function(){$(".glyphicon-heart").click(function(){
    $(".heart").hide();
     $(".heart-empty").show();
    
   <?php mysqli_query($con,"DELETE FROM `favorite` WHERE user_id ='".$_SESSION['user_id']."' AND product_id='".$row['id']."';") or die(mysqli_error($con));
    echo "console.log('deleted from table')";
   ?>
               });


}) ;
                            </script>  <?php } 
                            else{?>
                            <div class="heart-empty" style="display:none">
                                <span class="glyphicon glyphicon-heart-empty"></span>
                                <span>Add to favorites</span>
                            </div>
                            <div class="heart">
                                <span class="glyphicon glyphicon-heart" ></span>
                                <span>Added to Favorites</span>
                            </div>
                        
            <script>
          $(document).ready(function(){$(".heart").click(function(){
    $(".heart").hide();
     $(".heart-empty").show();
    
   <?php mysqli_query($con,"DELETE FROM `favorite` WHERE user_id ='".$_SESSION['user_id']."' AND product_id='".$row['id']."';") or die(mysqli_error($con));
   ?>
               });


}) ;
$(document).ready(function(){$(".heart-empty").click(function(){
    $(".heart-empty").hide();
     $(".heart").show();
    <?php 
    mysqli_query($con,"INSERT INTO `favorite` (`user_id`, `product_id`) VALUES ('".$_SESSION['user_id']."','".$row['id']."');") or die(mysqli_error($con));
    
    ?>
   
});


}) ;
               </script>
                         <?php   }
                            }?>
            </div>
        
        <?php }?>
        </div>
    </body>
</html>