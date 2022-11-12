<?php
include("C:/xampp/htdocs/socal_network/includes/connection.php");
?>
<nav class="navbar navbarlight" style="background-color: #e3f2fd;">
	<div class="container-fluid ">
		

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1 ">
	      <ul class="nav navbar-nav ">
	      	
	
		  <?php
		 $user_name = $_GET['user_name']; 
		 $get_posts = "SELECT * FROM users WHERE user_name = '$user_name'";
		 $run_posts = mysqli_query($con, $get_posts);
		 $row = mysqli_fetch_array($run_posts);

		 $first_name = $row['f_name'];
		 $last_name = $row['l_name'];
	
		 ?>

            <h1 class="container-fluid" ><?= $first_name ?> <?= $last_name ?></h1>
	
					
			</ul>
			<ul class="nav navbar-nav navbar-right mt-3">
				
						
					<a class="btn btn-primary mt-3" style="margin-top: 20px;" href="feed_page.php" id="back_to_feed" role="button">Back to feed</a>
					
			
			</ul>

           
		</div>
	</div>

	<div class="container-fluid">
	<div class="navbar-form navbar-left">
	<?php
        $sql = "SELECT * FROM user_posts WHERE user_name='$user_name'";
        $res = mysqli_query($con, $sql);

		$number_of_posts = mysqli_num_rows($res);
		?>
<h1>Total posts: <?= $number_of_posts ?></h1>

	</div>
</div>
	<div class="container-fluid" style="background-color:  white;">
            
    
                <form class="navbar-form navbar-left" method="get" action="results_profile_search.php?user_name=<?= $user_name ?>">
                    <div class="form-group">
                        <input type="text" class="form-control" name="user_query_profile" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-info" name="search_profile">Search</button>
					<input type="text" hidden name="user_name" value="<?= $user_name ?>"  >
                </form>
            
        
        </div>
</nav>

