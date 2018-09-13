<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <?php 
         session_start();
            if(!isset($_SESSION['id']))
                header ('location:admin.php');
            $link = mysqli_connect("localhost","root","","lebens");
           
            $query = "SELECT * FROM products WHERE id=".$_GET['id'] ;
            $result = mysqli_query($link,$query);
            $row = mysqli_fetch_array($result);
        ?>
    </head>
    <body>
        <div class="container-fluid"><div class="col-md-offset-2 col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <?php echo "<input type='text' name='name' value=".$row['name'].">"; ?>
                        </div>
                        <div class="form-group">
                            <label for="brand">Brand</label>
                             <?php echo "<input type='text' name='brand' value=".$row['brand'].">"; ?>
                            
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                             <?php echo "<input type='text' name='category' value=".$row['category'].">"; ?>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <?php echo "<input type='text' name='price' value=".$row['price'].">"; ?>
                        </div>
                         
                        
                        <input type="submit" name = 'submit' class="btn btn-success">
                        
                    </form>
                    <form method='POST' enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="image">Product Image</label>
                            <input type="file" name="image">
                        </div>
                        <input type='submit' class='btn btn-info' name='upload' value='upload file'>
                    </form>
                    
                </div>
            </div>
            </div>
        </div>
        <?php
            if(isset($_POST['submit']))
            {
                $query = "UPDATE `products` SET `name`='".$_POST['name']."', `brand`='".$_POST['brand']."', `price`='".$_POST['price']."', `category`='".$_POST['category']."';";
                echo $query;
                mysqli_query($link,$query) or die(mysqli_error($link));
                header('location:database.php');
            }
            if(isset($_POST['upload']))
            {    echo "file upload set";
                 $file_name = $_FILES['image']['name'];
      $file_type = $_FILES['image']['type'];
      $file_tmp_name = $_FILES['image']['tmp_name'];
      $file_size = $_FILES['image']['size'];
      
      
      
      if(move_uploaded_file($file_tmp_name,$file_name))
      {
          $result = mysqli_query($link,"UPDATE products SET image='$file_name' WHERE id ='".$_GET['id']."'") or die(mysqli_error($link));
          if(!mysqli_affected_rows($link)){
              header('location:database.php?error=an erorr occured while uploading your file please try again');
          }
          else {
              header('location:database.php');
            }
      }
            }
 
        ?>
    </body>
</html>


