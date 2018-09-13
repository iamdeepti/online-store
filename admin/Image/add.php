<html>
    <head>
        <title>Admin</title>
         <?php
          session_start();
         if(!isset($_SESSION['id']))
                header ('location:../admin.php');
         $link = mysqli_connect("localhost","root","","lebens");?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       
    </head>
    <body>
        <div class="container-fluid"><div class="col-md-offset-2 col-md-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <?php if(!isset($_POST['name'])){ ?>
                            <input type='text' name='name' > <?php } 
                            else { 
                            echo "<input type='text' name='name' value='".$_POST['name']."'>";} ?>
                        </div>
                        <div class="form-group">
                            <label for="brand">Brand</label>
                              <input type='text' name='brand' >
                            
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                             <input type='text' name='category' > 
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type='text' name='price' >
                        </div>
                         <div class="form-group">
                            <label for="image">Product Image</label>
                            <input type="file" name="upload">
                        </div>
                        
                        <input type="submit" name = 'submit' class="btn btn-success">
                        
                    </form>
                    
                    
                </div>
            </div>
            </div>
        </div>
        <?php
            if(isset($_POST['submit']))
            {
                $query = "INSERT INTO `products`(`name`, `brand`, `price`, `category`) VALUES ('".$_POST['name']."','".$_POST['brand']."','".$_POST['price']."','".$_POST['category']."')";
                mysqli_query($link,$query) or die(mysqli_error($link));
                
           
                 $file_name = $_FILES['upload']['name'];
      $file_type = $_FILES['upload']['type'];
      $file_tmp_name = $_FILES['upload']['tmp_name'];
      $file_size = $_FILES['upload']['size'];
      
      $target_dir = 'Images';
      
      if(move_uploaded_file($file_tmp_name, $file_name))
      {
          $result = mysqli_query($link,"UPDATE products SET image='$file_name' WHERE id='". mysqli_insert_id($link)."'" );
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