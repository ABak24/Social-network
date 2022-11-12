<?php
include("C:/xampp/htdocs/socal_network/includes/connection.php");
include("C:/xampp/htdocs/socal_network/functions/uploader.php");
?>
<nav class="navbar navbarlight" style="background-color: gainsboro;">
	<div class="container-fluid ">


		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1 ">
			<ul class="nav navbar-nav ">

				<?php
              $user = $_SESSION['user_email'];
              $get_user = "select * from users where user_email='$user'";
              $run_user = mysqli_query($con, $get_user);
              $row = mysqli_fetch_array($run_user);

              $user_id = $row['user_id'];
              $user_name = $row['user_name'];
              $first_name = $row['f_name'];
              $last_name = $row['l_name'];
              $user_pass = $row['user_pass'];
              $user_email = $row['user_email'];


              $user_posts = "select * from posts where user_id='$user_id'";
              $run_posts = mysqli_query($con, $user_posts);
              $posts = mysqli_num_rows($run_posts);
              ?>


				<a href="feed_page.php" style=" font-size: 40px; margin-top: 10px; ">Feed</a>


			</ul>


			<ul class="nav navbar-nav navbar-right">
				<?php

            echo "

						<li class='dropdown'>
							<a href='#'  class='dropdown-toggle' data-toggle='dropdown' style='margin-top: 20px;' role='button' aria-haspopup='true' aria-expanded='false'><span><i class='glyphicon glyphicon-chevron-down'></i></span></a>
							<ul class='dropdown-menu'>
								<li>
									<a href='img_upload.php?user_name=$user_name'>Add new post</a>
								</li>
								
								<li role='separator' class='divider'></li>
								<li>
									<a href='logout.php'>Logout</a>
								</li>
							</ul>
						</li>
						
						";
            ?>
			</ul>

		</div>
	</div>
	<div class="container-fluid">


		<form class="navbar-form navbar-left" method="get" action="results.php">
			<div class="form-group">
				<input type="text" class="form-control" name="user_query" placeholder="Search">
			</div>
			<button type="submit" class="btn btn-info" name="search">Search</button>
		</form>


	</div>
</nav>