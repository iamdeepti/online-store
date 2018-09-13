<!DOCTYPE html>
<html>
    <head>
        <title>Lebens</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
         <!--jQuery library--> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!--Latest compiled and minified JavaScript--> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    </head>
    <body>
        <br><br>
        <div style="width: 400px; margin: auto;">
            
                    <div class="panel panel-info">
                        <div class="panel-heading"><h1>Login</h1></div>
                        <div class="panel-body">
                            <p class="text-warning">Login to make a purchase</p>
                            <form action="login_script.php" method="post">
                                <div class="form-group">Email
                                    <input type="text" name="email" class="form-control">
                                </div>
                                <div class="form-group">Password
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="text-danger"><?php if(isset($_GET['error'])){echo htmlspecialchars($_GET['error']);} ?></div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                           
                        </div>
                        <div class="panel-footer">
                            <p class='text-info'>Don't have an account? <a href="signup.php">Register</a></p>
                        </div>
                    </div>
                
        </div>
    </body>
</html>
