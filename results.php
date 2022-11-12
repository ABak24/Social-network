<?php include "includes/connection.php"; 
include("C:/xampp/htdocs/socal_network/functions/function_results.php");
?>


<!DOCTYPE html>

<?php
session_start();
include("C:/xampp/htdocs/socal_network/includes/header.php");

if (!isset($_SESSION['user_email'])) {
    header("location: index.php");
}
?>

<html>

<head>

    <title>Search results</title>
    <style>
        #photo_display {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row;
            min-height: 100vh;
            flex-wrap: wrap;
            

        }

        #image {
            /* border-radius: 20px;
            margin: 5px; */
        }

        #post_text{
            margin-left: 10px;  
            font-size: 30px; 
            font-family: cursive;
        }


        
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>

<body>
<div class="row">

<center>
    <h2 style="font-weight: bold;">See your results here:</h2>
    <br>
</center>
<?php results_feed(); ?>
</div>

   

   
</body>

</html>