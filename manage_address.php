<!DOCTYPE html>
<html>
    <head>
        <title>Lebens</title>
    <?php 
    require 'search_form.php';
        $user_id = $_SESSION['user_id'];
        $query = mysqli_query($con,"SELECT * FROM USERS WHERE id = '$user_id';");
        $row = mysqli_fetch_array($query);
    ?>
                        <script>
                            $(document).ready(function(){
                                $("#add").click(function(){
                                    $(".address").show()
                                })
                                $(".cancel").click(function(){
                                    $(".address").hide()
                                })
                            });
                        </script>
        <link href="profile.css" rel="stylesheet">
        
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>   
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <?php include 'sidebar.php'; ?>
                <div class="col-sm-9">
                    <div class="content">
                        <div class="info">
                            <span class="header">Manage Address</span>
                        </div>
                        <div class="box">
                            <div class="edit" id="add">+   ADD A NEW ADDRESS</div>
                        </div>
                        <div class="address" style="display:none">
                            <span class="edit">ADD A NEW ADDRESS</span>          <span class="edit cancel" style="float:right">cancel</span>
                            <form class="forms" method="post" action="manage_script.php">
                                <div class="flex">
                                    <div class="inputs">
                                        <input type="text" required="" name="name" class="focus increaseWidth inputStyle " />
                                        <label class="labels increaseWidth" for="name">Name</label>
                                    </div>
                                    <div class="inputs">
                                        <input type="tel" required="" name="Mobile_No" class="focus increaseWidth inputStyle " />
                                        <label class="labels increaseWidth" for="Mobile_No">10 digit Mobile No</label>
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="inputs">
                                        <input type="text" required="" name="pincode" class="focus increaseWidth inputStyle " />
                                        <label class="labels increaseWidth" for="pincode">Pincode</label>
                                    </div>
                                    <div class="inputs">
                                        <input type="text" required="" name="locality" class="focus increaseWidth inputStyle " />
                                        <label class="labels increaseWidth" for="locality">locality</label>
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="inputs">
                                        <textarea name="area" class="inputStyle" required="" rows="4" cols="68"></textarea>
                                        <label class="labels" for="area">Address (Area and City)</label>
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="inputs">
                                        <input type="text" required="" name="city" class="focus increaseWidth inputStyle " />
                                        <label class="labels increaseWidth" for="city">city/District/Town</label>
                                    </div>
                                    <div class="inputs">
                                        <input type="text" required="" name="state" class="focus increaseWidth inputStyle " />
                                        <label class="labels increaseWidth" for="state">State</label>
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="inputs">
                                        <input type="text" required="" name="landmark" class="focus increaseWidth inputStyle " />
                                        <label class="labels increaseWidth" for="landmark">landmark</label>
                                    </div>
                                    <div class="inputs">
                                        <input type="text" name="alt_phone" class="focus increaseWidth inputStyle " />
                                        <label class="labels increaseWidth" for="alt_phone">Alternate Phone(Optional)</label>
                                    </div>
                                </div>
                                <input type="submit" value="Add address" class="btn btn-primary">
                            </form>
                        </div>
                        <?php 
                                $result = mysqli_query($con,"SELECT * FROM address, users WHERE users.id = address.user_id AND users.id = '$user_id';");
                                $row1 = mysqli_fetch_array($result);
                                if(mysqli_num_rows($result)){?>
                                <div class="box">
                                <?php echo "<h4>".$row1['name']."   ".$row1['mobile']."</h4></br><p>".$row1['address']." ".$row1['city']." ".$row1['state']." ".$row1['pincode']."</p>";
                                }?></div>
                    </div>
                </div>
            </div>
        </div>
    </body>
