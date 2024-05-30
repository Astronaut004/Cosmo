<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #212121;
            color: #fff;
        }

        .main {
            margin-top: 50px;
        }

        .form-label {
            color: #fff;
        }

        .form-control {
            background-color: #343a40;
            color: #fff;
        }

        .form-check-label {
            color: #fff;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body>
    <?php include './Astroheader.php'; ?>

    <div class="container-fluid">
        <h1 class="text-center"></h1>
        <h2 class="text-center">Add new Document</h2>

        <div class="container main">
        <?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../connection.php';

    $name = $_POST['name'];
    $mname = $_POST['mname'];
    $description = $_POST['desc'];
    $difficulty = $_POST['diff'];

    // Handle file upload
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["img"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "<script>alert('File is not an image.')</script>";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "<script>alert('Sorry, file already exists.')</script>";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["img"]["size"] > 500000) { // 500KB limit
        echo "<script>alert('Sorry, your file is too large.')</script>";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>alert('Sorry, your file was not uploaded.')</script>";
    } else {
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $targetFile)) {
            $img = htmlspecialchars(basename($_FILES["img"]["name"]));
            if (empty($name) || empty($mname) || empty($img) || empty($description) || empty($difficulty)) {
                echo "<script>alert('Fill all Blocks')</script>";
            } else {
                // Prepare and bind parameters
                $sql = "INSERT INTO `document_tb` (document_name, author_name, image_name, document_desc, document_type) VALUES (?, ?, ?, ?, ?)";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("sssss", $name, $mname, $img, $description, $difficulty);

                // Execute the statement
                if ($stmt->execute()) {
                    header("Location: AstroData.php");
                    exit();
                } else {
                    echo 'Failed: ' . $con->error;
                }

                // Close statement and connection
                $stmt->close();
                $con->close();
            }
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
        }
    }
}
?>

            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Document Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                    <div class="form-text">Your taste begins here</div>
                </div>
                <div class="mb-3">
                    <label for="mname" class="form-label">Author</label>
                    <input type="text" class="form-control" id="mname" name="mname">
                </div>
                <div class="mb-3">
                    <label for="img" class="form-label">Image</label>
                    <input type="file" class="form-control" id="img" name="img">
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Description</label>
                    <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="mission" value="Mission" name="diff">
                            <label class="form-check-label" for="mission">Mission</label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="biography" value="Biography" name="diff">
                            <label class="form-check-label" for="biography">Biography</label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="theory" value="Theory" name="diff">
                            <label class="form-check-label" for="theory">Theory</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <?php include './masterfooter.php'; ?>
</body>
</html>
