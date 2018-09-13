<!DOCTYPE html>
<html>
    <head>
        <title>Lebens</title>
        <?php 
            session_start();
            if(!isset($_SESSION['id']))
            {   header ('location:../admin.php');
                
            }
            $link = mysqli_connect("localhost","root","","lebens");
            $query = mysqli_query($link, "SELECT * FROM products ;");
        ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <a class="database" >View and Modify Product details</a><br/>
        <a class="support">View complains registered by user</a>
        <div class="container" id="product" style="display:none">
            <div class="col-offset-md-2">
                <p class="text-info"><?php if(isset($_GET['comment'])) echo "no of rows affected = ".$_GET['comment'] ;?></p>
                <table class="table-bordered table-responsive table-striped">
                    <thead>
                        <tr>
                            <td>S.No</td>
                            <td>Item Name</td>
                            <td>Brand</td>
                            <td>Price</td>
                            <td>Category</td>
                            <td>Image</td>
                            <td>Edit</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1;  $id ="";
                        while($row=mysqli_fetch_array($query)){ ?>
                        <tr>
                            <td><?php echo $i ?></td> <?php $i = $i+1; ?>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['brand']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td><?php echo $row['category']; ?></td>
                            <td><?php echo"<img src='".$row['image']."' class = 'img-responsive img-thumbnail'>" ;?></td>
                            <td><?php echo "<a href='edit.php?id=".$row['id']."'>Edit</a>"; ?></td>
                            <td><input type='checkbox' value='1' name='check' id="<?php echo $row['id'];?>"></td>
                           
                             <script type="text/javascript">
	$(document).ready(function(){
        $('#<?php echo $row['id'];?>').click(function(){
            if($(this).prop("checked") == true){
              <?php 
              $id = $id + $row['id'] + "," ;
             ?>
            }
                    else{
                        <?php $id = str_replace($row['id'],"",$id) ;
                               $id = str_replace(",,", ",", $id);
                              
                        ?>
                    }
                    });
});</script>
                        </tr>
                        <?php 
                            
                                }
                                if(isset($id))
                            {
                            $id = rtrim($id,",");
                            
                            echo "<a href='delete.php?id=".$id."'>Delete Selected Items</a>"  ;
                            }
                        ?>
                    </tbody>
                </table>
                <a href='add.php'>+ Add more rows</a>
            </div>
        </div>
        <div class="container" style="display:none;" id="support">
            <div class="col-offset-md-2 col-md-8">
                <table class="table-responsive table-striped table-bordered">
                    <tr><td>User name</td>
                    <td>User Email</td>
                    <td>message</td>
                    <td>subject</td>
                    <td>date and time</td></tr>
                    <?php $res = mysqli_query($link, "SELECT * FROM support, users WHERE support.user_id=users.id");
                    while($row = mysqli_fetch_array($res)){
                        echo "<tr><td>".$row['name']."</td>";
                         echo "<td>".$row['email']."</td>";
                          echo "<td>".$row['message']."</td>";
                           echo "<td>".$row['subject']."</td>";
                            echo "<td>".$row['time']."</td></tr>";
                    }
?>
                </table>
            </div>        
        </div>
        <script>
        $(".database").click(function(){
            $("#product").show();
            $("#support").hide();
        });
        $(".support").click(function(){
            $("#support").show();
            $("#product").hide();
        });
        </script>
    </body>
</html>