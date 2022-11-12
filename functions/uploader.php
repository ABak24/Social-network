<?php

$con = mysqli_connect("localhost","root","","social_network") or die("Connection was not established");

//function for inserting post

function insertPost(){
	if(isset($_POST['submit'])){
		global $con;
		global $user_id;
		$image_title = $_POST['image_title'];

		$get_user = "select * from users where user_id='$user_id'"; 
			$run_user = mysqli_query($con,$get_user);
			$row=mysqli_fetch_array($run_user);
			$user_name = $row['user_name'];

		
		$upload_image = $_FILES['my_image']['name'];
		$image_tmp = $_FILES['my_image']['tmp_name'];

		
		

			if(strlen($upload_image) >= 1 && strlen($image_title) >= 1){
				move_uploaded_file($image_tmp, 'uploads/'.$upload_image);
				$insert = "insert into user_posts (owner_id, user_name, image_url, image_title, image_date) values('$user_id','$user_name' ,'$upload_image', '$image_title' , NOW())";

				$run = mysqli_query($con, $insert);

				if($run){
					echo "<script>alert('Your Post updated a moment ago!')</script>";
					echo "<script>window.open('feed_page.php', '_self')</script>";

					$update = "update users set posts='yes' where user_id='$user_id'";
					$run_update = mysqli_query($con, $update);
				}

				exit();
			
			}
			else{
				if(strlen($upload_image) < 1){
							echo "<script>alert('Error Occured while uploading image, please choose your image again!')</script>";
							echo "<script>window.open('img_upload.php', '_self')</script>";
				}
				if(strlen($image_title) < 1){
					echo "<script>alert('Please give title to your image! ')</script>";
					echo "<script>window.open('img_upload.php', '_self')</script>";
				}
			}
		}
	}



?>