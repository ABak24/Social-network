<?php include "includes/connection.php";
include "C:/xampp\htdocs/socal_network/functions/uploader.php";
?>


<!DOCTYPE html>
<?php
session_start();


if (!isset($_SESSION['user_email'])) {
    header("location: index.php");
}
?>
<html>

<head>
    <title>Image upload</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f0f2f5;
        }
    </style>

</head>

<body>


    <div>
        <?php
$user = $_SESSION['user_email'];
$get_user = "select * from users where user_email='$user'";
$run_user = mysqli_query($con, $get_user);
$row = mysqli_fetch_array($run_user);




?>

        <form action="feed_page.php?username=<?php $user_name ?>" method="post" enctype="multipart/form-data">
            <div style="border: solid 1px blue; padding: 100px; border-radius: 10px; background-color: white;">


                <div>
                    <input type="file" class="form-control" name="my_image">

                </div>
                <div class="form-group">
                    <label>Image title</label>
                    <input type="text" class="form-control" id="image_title" name="image_title">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="submit">Upload</button>
                </div>

            </div>
        </form>

        <?php
    insertPost();

    ?>

    </div>





</body>

</html>