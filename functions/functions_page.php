<?php

function get_posts()
{
	global $con;
	$per_page = 6;

	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = 1;
	}

	$start_from = ($page - 1) * $per_page;

	$get_posts = "SELECT * FROM user_posts WHERE image_date >= NOW() - INTERVAL 1 DAY ORDER BY image_date DESC LIMIT $start_from, $per_page";

	$run_posts = mysqli_query($con, $get_posts);

	if (mysqli_num_rows($run_posts) > 0) {
		while ($row_posts = mysqli_fetch_array($run_posts)) {

			$post_id = $row_posts['image_id'];
			$user_id = $row_posts['owner_id'];
			$image_url = $row_posts['image_url'];
			$image_title = $row_posts['image_title'];
			$image_date = $row_posts['image_date'];
			$user_name = $row_posts['user_name'];



?>



<div class="alb" style="border: 2px solid silver; border-radius: 3%; margin: 5px;background-color: gainsboro;">

	<h3>

		<a style="margin-left: 10px;  font-size: 30px; font-family: cursive;"
			href="user_profile.php?user_name=<?= $user_name ?>">
			<?= $user_name ?>
		</a>

	</h3>


	<img id="image" height="600px" width="600px" src="uploads/<?= $image_url ?>">
	<h3 style="margin-left: 10px;  font-size: 30px; font-family: cursive;">
		<?= $image_title ?>
	</h3>
	<h3 style="margin-left: 10px;">
		<?= $image_date ?>
	</h3>

</div>



<?php




		}


	}

}


        ?>