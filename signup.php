<!DOCTYPE html>
<html>
<head>
   <title>Sign Up</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<style>
    body{
        overflow: hidden;

    }

    .main-content{
        width: 50%;
        height: 40%;
        margin: 10px auto;
        background-color: #fff;
        border: 2px solid #e6e6e6;
        padding: 40px 50px;
    }

    .header{
        border: 0px solid #000;
        margin: 5px;
    }
    .well{
    background-color: #187FAB;
}
#signup{
    width: 60%;
    border-radius: 30px;
}



</style>

<body>
    <div class="row">
        <div class="col-sm-12">
        <div class="well">
                <center><h1 style="color: white;">Share your moments!</h1></center>

            </div>

        </div>

    </div>
    
    <div class="row">
        <div class="col-sm-12">
            <div class="main-content">
                <div class="header">
                    <h3 style="text-align:center;"><strong>Join Us</strong></h3><hr>

                </div>
                <div class="l-part">
                    <form action="" method="post">
                        <div class="input-group">
                            <span class="input-group-addon"> <i class="glyphicon glyphicon-pencil"></i></span>
                            <input type="text" class="form-control" 
                            placeholder="First Name" name="first_name" required="required">
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-addon"> <i class="glyphicon glyphicon-pencil"></i></span>
                            <input type="text" class="form-control" 
                            placeholder="Last Name" name="last_name" required="required">
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-addon"> <i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" 
                            placeholder="Username" name="u_name" required="required">
                        </div><br>
                       
                        <div class="input-group">
                            <span class="input-group-addon"> <i class="glyphicon glyphicon-envelope"></i></span>
                            <input type="text" class="form-control" id="email"
                            placeholder="Email" name="u_email" required="required">
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-addon"> <i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" class="form-control" id="password"
                            placeholder="Password" name="u_pass" required="required">
                            <input type="password" class="form-control" id="password_repeat"
                            placeholder="Repeat password" name="u_pass_repeat" required="required">
                        </div><br>
                        <a style="text-decoration: none; float: right; color:#187FAB;" data-toogle="tooltip" title="Signin" href="signin.php">Already have an account?</a><br><br>
                        <center><button id="signup" class="btn btn-info btn-lg" name="sign_up">Signup</button></center>
                        <?php include("insert_user.php"); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>