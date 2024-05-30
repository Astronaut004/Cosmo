<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location:../Login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #212121; /* Dark background */
            color: #fff; /* White text color */
            padding-top: 20px; /* Add some padding at the top */
        }
        .container-fluid {
            padding-top: 20px; /* Add some padding at the top */
        }
        h1, h3 {
            color: #007bff; /* Primary color for headings */
        }
        h6 {
            font-size: 16px; /* Adjust font size */
        }
    </style>
</head>
<body>
    <?php include "Astroheader.php" ?>

    <div class="container-fluid">
        <h1 class="text-center">Master Dashboard</h1>
    </div>

    <div class="container-fluid p-3 mb-5">
        <h3>
            <?php 
                echo "Welcome, <b>Master " . $_SESSION['username'] . "</b>. Enjoy this beautiful session";
            ?>
        </h3>
        <h6>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto expedita natus tenetur. Nihil nobis magni, reprehenderit laborum ducimus alias mollitia cupiditate molestiae. Non ipsam ex aperiam dolores commodi explicabo eaque doloremque porro tenetur distinctio soluta expedita cum, magni nisi tempora repellat vero ipsum tempore corrupti est ut eum! Doloribus, explicabo!</h6>
    </div>
    
    <?php include'./masterfooter.php';?>
</body>
</html>
