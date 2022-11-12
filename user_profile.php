<?php
$con = mysqli_connect("localhost","root","","social_network") or die("Connection was not established");
include("C:/xampp/htdocs/socal_network/functions/uploader.php");
include("C:/xampp/htdocs/socal_network/includes/header_profile.php");
session_start();
?>
<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<style>
        #photo_display {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row;
            min-height: 100vh;
            flex-wrap: wrap;
            background-color: snow;

        }

        #image {
            /* border-radius: 20px;
            margin: 5px; */
        }
    </style>
    
    <title>Profile</title>
</head>
<body>


    <div id="photo_display">
        <?php
        $user_profile = $_GET['user_name'];
        $sql = "select * 
        from user_posts 
        where user_name='$user_profile'
            and image_date >= NOW() - INTERVAL 1 DAY
        ORDER BY image_date desc";
        $res = mysqli_query($con, $sql);

       
    



        if (mysqli_num_rows($res) > 0) {
            while ($images = mysqli_fetch_assoc($res)) { ?>


        <div class="alb" style="border: 2px solid silver; border-radius: 3%; margin: 5px;background-color: gainsboro;">

            
            <h1>
                <?= $images['user_name'] ?>
            </h1>
            <h3>
                <?= $images['image_date'] ?>
            </h3>
            <img id="image" height="600px" width="600px" src="uploads/<?= $images['image_url'] ?>">
            <h3>
                <?= $images['image_title'] ?>
            </h3>
        </div>



        <?php
            }
        }
        ?>
    </div>
</body>
</html>