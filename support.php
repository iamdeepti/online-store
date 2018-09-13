<!DOCTYPE html>
<html>
    <head>
        <?php 
        include 'search_form.php';
        if(!isset($_SESSION['email']))
        header("location:index.php");?>
        <title>Lebens</title>
       <link href="profile.css" rel="stylesheet">
        
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <?php include 'sidebar.php';?>
    
                <div class="col-sm-9 ">
                    <div class="container-fluid">
                        <form action="support_script.php" method="POST">
                            <h1>Customer Support</h1>
                            <p style="float:right"><a href="support_current.php">View current query</a></p>
                            <p style="float:right"><a href="support_old">  View Old query/</a></p>
                            <h5 class="text-warning">post your queries here we will address them as soon as possible</h5>
                            
                            
                            <div class="form-group">
                                Subject:<div  class="text-danger"><?php if(isset($_GET['error'])) echo htmlspecialchars($_GET['error']) ;?></div>
                                <input type="text" class="form-control" name="sub">
                            </div>
                            <div class="form-group">
                                Message:<div class="text-danger"><?php if(isset($_GET['error2'])) echo htmlspecialchars($_GET['error2']) ;?></div>
                                <textarea name="message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>    
                </div>
            </div>
        </div>
    </body>
</html>
