<?php
include("C:/xampp/htdocs/socal_network/includes/connection.php");

if (isset($_POST['sign_up'])) {
    $first_name = htmlentities(mysqli_real_escape_string($con, $_POST['first_name']));
    $last_name = htmlentities(mysqli_real_escape_string($con, $_POST['last_name']));
    $pass = htmlentities(mysqli_real_escape_string($con, $_POST['u_pass']));
    $pass_repeat = htmlentities(mysqli_real_escape_string($con, $_POST['u_pass_repeat']));
    $email = htmlentities(mysqli_real_escape_string($con, $_POST['u_email']));
    $u_name = htmlentities(mysqli_real_escape_string($con, $_POST['u_name']));
    $posts = "no";

    $containsDigit = preg_match('/\d/', $pass);




    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('$email is not a valid email address')</script>";
        exit();
    }


    if (strlen($pass) < 6) {
        echo "<script>alert('Password should be minimum 6 characters')</script>";
        exit();
    }

    if (!$containsDigit) {
        echo "<script>alert('Your password should have at least 1 number!')</script>";
        exit();
    }


    if ($pass != $pass_repeat) {
        echo "<script>alert('Please repeat password correctly')</script>";
        exit();
    }

    if (strlen($first_name) < 2) {
        echo "<script>alert('First name should be minimum 2 characters')</script>";
        exit();
    }
    if (strlen($last_name) < 2) {

        echo "<script>alert('Last name should be minimum 2 characters')</script>";
        exit();
    }

    $check_email = "select * from users where user_email = '$email'";
    $run_email = mysqli_query($con, $check_email);

    $check = mysqli_num_rows($run_email);

    if ($check == 1) {
        echo "<script>alert('User with this email is already registered.')</script>";
        echo "<script>window.open('signup.php', '_self')</script>";
        exit();
    }

    $insert = "insert into users(f_name, l_name, user_name, user_pass, user_email, posts )
        values('$first_name','$last_name','$u_name','$pass','$email', '$posts' )";

    $query = mysqli_query($con, $insert);
    if ($query) {
        echo "<script>alert('Registered sucessfully, you are good to go $first_name .')</script>";
        echo "<script>window.open('signin.php', '_self')</script>";
    } else {
        echo "<script>alert('Registration failed, please try again.')</script>";
        echo "<script>window.open('signup.php', '_self')</script>";
    }

}

?>