<?php
include("C:/xampp/htdocs/socal_network/includes/header.php");
session_start();
$con = mysqli_connect("localhost","root","","social_network") or die("Connection was not established");


if(isset($_POST['submit']) && isset($_FILES['my_image'])){
    include "includes/connection.php";
    echo "<pre>";
    print_r($_FILES['my_image']);
    echo "<pre>";

    $image_title = $_POST['image_title'];
    $user_name = $_REQUEST['user_name'];
 
  
    
    

    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];

    if($error === 0){
        if($img_size > 125000){
            $em = "File too big!";
            header("Location: feed_page.php?error=$em");
        }else{
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowwrd_exs = array("jpg", "jpeg", "png");
            if(in_array( $img_ex_lc,$allowwrd_exs)){
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = 'uploads/'.$new_img_name;
                move_uploaded_file($tmp_name,$img_upload_path);

                


                $sql = "INSERT INTO user_posts(owner_id, image_url, image_title, image_date) 
                VALUES('$user_name','$new_img_name', '$image_title', NOW())"; 
                mysqli_query($con, $sql);
				header("Location: feed_page.php");
                
 
            }else{
                $em = "You can't upload files of this type";
                header("Location: feed_page.php?error=$em");
            }
        }
        
    }else{
            $em = "unknown error occured!";
            header("Location: feed_page.php?error=$em");
        }
        
    }else{
    header("Location: feed_page.php");
}

?>