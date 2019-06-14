<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
        <!-- INCLUDE STYLE SHEETS AND JAVASCRIPT -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- PASSWORD AND USERNAME FOR ADMIN PANEL-->
        <?php $pwd = 'deepti';
              $username = 'deepti';   
              session_start();
        ?> 
    </head>
    <body>
        <br/>
        <br/>
        <!-- HTML FORM USING BOOTSTRAP-->
        <div class='container-fluid'>
            <div class='col-sm-offset-4 col-sm-4'>
                    <div class="panel panel-success">
                        <div class="panel-heading"><h1>Admin Login</h1></div>
                        <div class="panel-body">
                           
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for='username'>Username</label>
                                    <input type="text" name="username" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for='password'>Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="text-danger"><?php if(isset($_GET['error'])){echo htmlspecialchars($_GET['error']);} ?></div>
                                <input type ='submit' class='btn btn-primary' value='submit' name='submit'>
                            </form>
                           
                        </div>
                        
                    </div>
            </div>
        </div>        
         <!--CHECKING IF PASSWORD AND USERNAME ENTERED BY USER MATCHES-->           
        <?php 
            if(isset($_POST['submit']))
            {
                if($_POST['username']===$username && $_POST['password']===$pwd)
                {
                    header('location:Image/database.php');
                    $_SESSION['id']=$username;
                }
                else 
                {
                    header('location:http://localhost/search/admin/admin.php?error=Incorrect login credentials');
                    
                }
            }
            
        ?>
    </body>
   
</html>
