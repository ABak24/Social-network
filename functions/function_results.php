<?php

$con = mysqli_connect("localhost", "root", "", "social_network") or die("Connection was not established");

//function for search results

function results_feed()
{

    global $con;

    if (isset($_GET['search'])) {
        $search_query = htmlentities($_GET['user_query']);
        $get_posts = "SELECT * 
    FROM user_posts 
    WHERE image_title 
    LIKE '%$search_query%'
    AND 
    image_date >= NOW() - INTERVAL 1 DAY 
    ORDER BY image_date DESC";
    }
    if (isset($_GET['search_profile'])) {
        $user_name = $_GET['user_name'];
        

        $search_query = htmlentities($_GET['user_profile_query']);
        $get_posts = "SELECT * 
        FROM user_posts 
        WHERE image_title 
        LIKE '%$search_query%'
        AND 
        image_date >= NOW() - INTERVAL 1 DAY 
        ORDER BY image_date DESC";
    }


    $run_posts = mysqli_query($con, $get_posts);

    if (mysqli_num_rows($run_posts) > 0) {


        while ($image = mysqli_fetch_assoc($run_posts)) {

            $image_id = $image['image_id'];
            $owner_id = $image['owner_id'];
            $user_name = $image['user_name'];
            $image_url = $image['image_url'];
            $image_title = $image['image_title'];
            $image_date = $image['image_date'];

            

?>
<div style="display: flex; flex-direction: column;">


    <div class="alb" style="
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row;
            min-height: 100vh;
            flex-wrap: wrap;
            ">

        <div style="
            border: 2px solid silver; 
            border-radius: 3%; 
            margin: 5px;
            background-color: gainsboro; 
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
            flex-wrap: wrap;">

            <h3>

                <a style="margin-left: 10px;  font-size: 30px; font-family: cursive;"
                    href="user_profile.php?user_name=<?= $user_name ?>">
                    <?= $image['user_name'] ?>
                </a>

            </h3>


            <img id="image" height="600px" width="600px" src="uploads/<?= $image['image_url'] ?>">
            <h3 style="margin-left: 10px;  font-size: 30px; font-family: cursive;">
                <?= $image['image_title'] ?>
            </h3>
            <h3 style="margin-left: 10px;">
                <?= $image['image_date'] ?>
            </h3>

        </div>


    </div>
</div>

<?php
        }
    }

}

function results_profile()
{

    global $con;

    if (isset($_GET['search_profile'])) {
        $search_query = htmlentities($_GET['user_query_profile']);
        $user_name = htmlentities($_GET['user_name']);
    }
    $get_posts = "SELECT * 
    FROM user_posts 
    WHERE 
    user_name = '$user_name'
    AND
    image_title LIKE '%$search_query%'
    AND 
    image_date >= NOW() - INTERVAL 1 DAY 
    ORDER BY image_date DESC";

    $run_posts = mysqli_query($con, $get_posts);

    if (mysqli_num_rows($run_posts) > 0) {


        while ($image = mysqli_fetch_assoc($run_posts)) {

            $image_id = $image['image_id'];
            $owner_id = $image['owner_id'];
            $user_name = $image['user_name'];
            $image_url = $image['image_url'];
            $image_title = $image['image_title'];
            $image_date = $image['image_date'];

           

?>
<div style="display: flex; flex-direction: column;">


    <div class="alb" style="
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row;
            min-height: 100vh;
            flex-wrap: wrap;
            ">

        <div style="
            border: 2px solid silver; 
            border-radius: 3%; 
            margin: 5px;
            background-color: gainsboro; 
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
            flex-wrap: wrap;">

            <h3>

                <a style="margin-left: 10px;  font-size: 30px; font-family: cursive;"
                    href="user_profile.php?user_name=<?= $user_name ?>">
                    <?= $image['user_name'] ?>
                </a>

            </h3>


            <img id="image" height="600px" width="600px" src="uploads/<?= $image['image_url'] ?>">
            <h3 style="margin-left: 10px;  font-size: 30px; font-family: cursive;">
                <?= $image['image_title'] ?>
            </h3>
            <h3 style="margin-left: 10px;">
                <?= $image['image_date'] ?>
            </h3>

        </div>


    </div>
</div>

<?php
        }
    }

}
?>