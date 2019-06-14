<?php require_once 'include/common.php'; 
    if(isset($_SESSION['user_id']))
    {
        global $con;
        $user_id = $_SESSION['user_id'];
        $result = mysqli_query($con,"SELECT * FROM users WHERE id = '$user_id' ;") or die(mysqli_error($con));
        $row = mysqli_fetch_array($result);
    }
?>
<nav class="navbar navbar-inverse navbar-fixed-top"> 
    <div class="container-fluid">       
        <div class="navbar-header">       
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">    
            <span class="icon-bar"></span>          
            <span class="icon-bar"></span>            
            <span class="icon-bar"></span>                                   
        </button>          
            <a class="navbar-brand" href="index.php">Lebens</a>        
        </div>       
        <form class="navbar-form navbar-left" action="search.php">
            <div class="input-group">
            <?php
            if(!isset($_GET['search']))
                $_GET['search'] = '';
        
        echo "<input type='text' placeholder='Search' class='form-control' autocomplete='on' name='search' id='search' value = '".htmlspecialchars($_GET['search'])."'>" ; ?>	
            
            <div class="input-group-btn">
                <button type="submit"  value="search" class="btn btn-default">
                    <i class="glyphicon glyphicon-search"></i>
                </button>
            </div>
            </div> 
                   
        </form>
        <div class="collapse navbar-collapse" id="myNavbar">           
            <ul class="nav navbar-nav navbar-right">            
                
            <?php  if (isset($_SESSION['email'])) { ?>                     
                <li><a href = "cart.php"><span class = "glyphicon glyphicon-shopping-cart"></span> Cart </a></li>                
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo "Hello ".$row['name']; ?><span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="profile.php"><span class='glyphicon glyphicon-user' ></span> profile</a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> logout</a></li>
            <li><a href="my_order.php"><span class="glyphicon glyphicon-th-list"></span> Orders</a></li>
            <li><a href="favorite.php"><span class="glyphicon glyphicon-heart"></span> Favorites</a></li>
            <li><a href="manage_address.php"><span class="glyphicon glyphicon-home"></span> Manage Address</a></li>
          
        </ul>
      </li>                 
                             
                                  
            <?php } 
            else { ?>                     
                <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>               
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>              
           <?php                   
           }              
           ?>           
            </ul>   
        </div>   
    </div>
</nav> 
<br/>
<br/>
<br/>
