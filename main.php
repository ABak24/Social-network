<!DOCTYPE html>
<html>
<head>
    
    <title>Login and Sign Up</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
</head>

<style>
    #signup{
        width: 60%;
        border-radius: 30px;
    }
    #login{
        width: 60%;
        background-color: #fff;
        border: 1px solid #1da1f2;
        color: #1da1f2;
        border-radius: 30px;
    }

#login:hover{
    width: 60%;
        background-color: #fff;
        border: 1px solid #1da1f2;
        color: #1da1f2;
        border-radius: 30px;
}

.well{
    background-color: #187FAB;
}
</style>
<body>
    <div class = "row">
        <div class="col-sm-12">
            <div class="well">
                <center><h1 style="color: white;">Share your moments!</h1></center>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6" style="left: 0.5%;">
        <img src="images/main_image.jpg" class="img-rounded" height="600px" width="800px">
        </div>
        <div class="col-sm-6" style="left:8%; margin-top: 150px;">
            <h2>See what is happening!</h2>

            <form method="post" action="">
                <button id="signup" class="btn btn-info btn-lg" name="signup">Sign Up</button><br><br>
                <?php
                    if(isset($_POST['signup'])){
                        echo "<script>window.open('signup.php','_self')</script>";
                    }
                ?>
                <button id="login" class="btn btn-info btn-lg" name="login">Sign In</button><br><br>
                <?php
                if(isset($_POST['login'])){
                        echo "<script>window.open('signin.php','_self')</script>";
                    }
                    ?>
            </form>
        </div>
    </div>
    
</body>
</html>