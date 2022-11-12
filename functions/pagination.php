<style>
	.pagination a {
		color: black;
		float: left;
		padding: 8px 16px;
		text-decoration: none;
		transition: background-color .3s;
	}

	.pagination a:hover:not(.active) {
		background-color: #ddd;
	}
</style>
<?php
$per_page = 6;
$con = mysqli_connect("localhost", "root", "", "social_network") or die("Connection was not established");

$query = "select * from user_posts WHERE image_date >= NOW() - INTERVAL 1 DAY";

$result = mysqli_query($con, $query);

$total_posts = mysqli_num_rows($result);

$total_pages = ceil($total_posts / $per_page);

echo "
		<center>
		<div class='pagination'>
		<a href='feed_page.php?page=1'>First Page</a>
	";

for ($i = 1; $i <= $total_pages; $i++) {
	echo "<a href='feed_page.php?page=$i'>$i</a>";
}

echo "<a href='feed_page.php?page=$total_pages'>Last Page</a></div>";
?>