<?php include "includes/connection.php";
 ?>

<!DOCTYPE html>

<?php
session_start();
include("C:/xampp/htdocs/socal_network/includes/header.php");
include("functions/functions_page.php");

if (!isset($_SESSION['user_email'])) {
    header("location: index.php");
}
?>

<html>

<head>

    <title>Feed page</title>
    <style>
        #photo_display {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row;
            min-height: 100vh;
            flex-wrap: wrap;
            

        }

        #image {
            /* border-radius: 20px;
            margin: 5px; */
        }

        #post_text{
            margin-left: 10px;  
            font-size: 30px; 
            font-family: cursive;
        }


        
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <?php
    $user = $_SESSION['user_email'];
    $get_user = "select * from users where user_email='$user'";
    $run_user = mysqli_query($con, $get_user);
    $row = mysqli_fetch_array($run_user);


    $user_name = $row['user_name'];
    ?>



</head>

<body>


    <?php
    if (isset($_GET['error'])):
    ?>
    <p>
        <?php echo $_GET['error']; ?>
    </p>

    <?php endif ?>

    <div id="photo_upload" hidden>

        <form action="feed_page.php?id=<?php $user_name ?>" method="post" enctype="multipart/form-data">
            <input type="file" name="my_image">
            <input type="submit" name="submit" value="Upload">

        </form>
        <?php insertPost(); ?>
    </div>


    

    <div id="photo_display" style="background-color: snow;">

    <?php get_posts(); ?>

    </div>

    <?= include("functions/pagination.php"); ?>

</body>

</html>