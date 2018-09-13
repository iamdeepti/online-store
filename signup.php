<!DOCTYPE html>
<html>
    <?php require 'include/common.php' ;
        if(isset($_SESSION['email']))
          // to do  header('location:products.php');
    ?>
    <head>
        <title>Lebens</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <link rel="stylesheet" href="index.css" type="text/css">
    <!--jQuery library--> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!--Latest compiled and minified JavaScript--> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        
        <div style="width:400px; margin: auto;">
            
                
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h2>Create Account</h2>
                        </div>
                        <div class="panel-body">
                            
                            <form method="post" action="signup_script.php">
                                <div class="form-group">Your name<div class="text-danger" style='float:right;'><?php if(isset($_GET['nameerror'])) echo htmlspecialchars($_GET['nameerror']) ;?></div>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                
                                <div class="form-group">Email Address<div class="text-danger" style='float:right;'><?php if(isset($_GET['emailerror'])) echo htmlspecialchars($_GET['emailerror']) ; if(isset($_GET['error'])) echo htmlspecialchars($_GET['error']);?></div>
                                    <input type="text" class="form-control" name="email">
                                </div>
                                
                                
                                <div class="form-group">Password<div class="text-danger" style='float:right;'><?php if(isset($_GET['passworderror'])) echo htmlspecialchars($_GET['passworderror']) ;?></div>
                                    <input type="password" class="form-control" name="password" placeholder="Atleast 6 characters">
                                </div>
                                
                                <div class="form-group">Mobile Number<div class="text-danger" style='float:right;'><?php if(isset($_GET['contacterror'])) echo htmlspecialchars($_GET['contacterror']) ;?></div>
                                    <input type="tel" class="form-control" name="contact" >
                                </div>
                                
                                <button type="submit" class="btn btn-primary btn-block">continue</button>
                            </form>
                           
                        </div>
                        <div class="panel-footer">
                            <p class="text-warning">Already registered?<a href="login.php">login</a></p>
                        </div>
                    
                
            </div>
        </div>
    </body>
</html>

