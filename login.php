<?php
session_start();
include("C:/xampp/htdocs/socal_network/includes/connection.php");

if (isset($_POST['login'])) {
    $email = htmlentities(mysqli_real_escape_string($con, $_POST['email']));
    $pass = htmlentities(mysqli_real_escape_string($con, $_POST['pass']));
    

    $select_user = "select * from users where user_email = '$email' 
        AND user_pass = '$pass'";

    $user = $_SESSION['user_email'];
    $get_user = "select * from users where user_email='$user'";
    $run_user = mysqli_query($con, $get_user);
    $row = mysqli_fetch_array($run_user);


    $user_name = $row['user_name'];

    

    $query = mysqli_query($con, $select_user);
    $check_user = mysqli_num_rows($query);



    if ($check_user == 1) {
        $_SESSION['user_email'] = $email;

        // echo"<script>widnow.open('home.php', '_self')</script>";
        //echo "<script>window.open('photo_upload.php','_self')</script>";
        header("Location: feed_page.php?username=$user_name");
    } else {
        echo "<script>alert('Your Email or Password is incorrect. Please try again.')</script>";
    }
}
?>