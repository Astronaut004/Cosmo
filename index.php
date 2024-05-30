<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style1.css">
    <style>
        .card {
            background-color: #343a40; /* Dark background */
        }
        .card-title,
        .card-text {
            color: #fff; /* White text */
        }
        .btn-info {
            color: #fff; /* White text on the info button */
        }
    </style>
</head>

<body>
    <?php include("./cosHead.php"); ?>
    <!-- <img src="./image/sun.jpg" alt=""> -->
    
    <div class="container-fluid myslide" style="padding-left: 0; padding-right: 0;">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" style="height: 550px;">
                <div class="carousel-item active" data-bs-interval="1000">
                    <img src="./image/cos1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="1000">
                    <img src="./image/cos2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="1000">
                    <img src="./image/cos3.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-caption-overlay"></div>
                <div class="carousel-caption-custom">
                    <h1>Depth of this universe</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h1 class="text-center pb-2 text-light" id="type">Missions</h1>
        <div class="row">
            <?php
            include("./connection.php");

            $sql = "SELECT * FROM mission_tb";
            $result = $con->query($sql);
            while ($row = $result->fetch_assoc()) {
                $id = $row['mission_id'];
                $name = $row['mission_name'];
                $image = $row['mission_img'];
                $descrition = $row['mission_description'];
                $time = $row['mission_timeStamp'];

                echo '
                <div class="col-md-4 mb-5">
                    <div class="card" style="width: 18rem;">
                        <img src="' . $image . '" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">' . $name . '</h5>
                            <p class="card-text">' . substr($descrition, 0, 45) . ' .....</p>
                            <a href="#" class="btn btn-info">Read more</a>
                        </div>
                    </div> 
                </div>';
            }
            ?>
        </div>
        <hr class="border border-dark border-2 opacity-50">
    </div>

    <?php include "./cosfooter.php"; ?>
</body>

</html>
