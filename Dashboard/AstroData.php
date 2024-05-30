<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #212121; 
            color: #fff; 
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #fff; 
        }

        .card-text,
        .text-muted {
            color: #fff; 
        }

        .btn-primary,
        .btn-danger {
            background-color: #007bff; 
                        border-color: #007bff; 
        }

        .btn-primary:hover,
        .btn-danger:hover {
            background-color: #0056b3; 
            border-color: #0056b3; 
        }
    </style>
</head>

<body>
    <?php include './Astroheader.php'; ?>
    <div class="container">
        <h1 class="text-center">DASHBOARD</h1>
        <h2 class="text-center">Documents</h2>
    </div>
    <div class="container mt-5">
        <div class="row mb-2">
            <?php
            include '../connection.php';
            $sql = 'SELECT * FROM document_tb';
            $result = $con->query($sql);

            while ($row = $result->fetch_assoc()) {
                $document_id = $row['document_id'];
                $document_name = $row['document_name'];
                $author_name = $row['author_name'];
                $image_name = $row['image_name'];
                $document_desc = $row['document_desc'];
                $document_type = $row['document_type'];

                echo '
                <div class="col-md-6">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-primary">' . $author_name . '</strong>
                            <h3 class="mb-0">' . $document_name . '</h3>
                            <div class="mb-1 text-muted">Difficulty: ' . $document_type . '</div>
                            <p class="card-text mb-auto">' . substr($document_desc, 0, 150) . '...</p>
                            <div class="d-flex mt-3">
                            <a href="./update.php?document_id=' . $document_id . '" class="btn btn-info text-light me-2">Update</a>
                                <a href="./delete.php?document_id=' . $document_id . '" class="btn btn-danger text-light">Delete</a>
                            </div>
                        </div>
                        <div class="col-auto d-flex align-items-center">
                            <img src="' . $image_name . '" class="bd-placeholder-img" width="200" height="250" alt="' . $document_name . '">
                        </div>
                    </div>
                </div>
            ';
            }
            
            ?>
            <!-- <img src="../image/string.jpeg" alt=""> -->
        </div>
    </div>
    
    <?php include'./masterfooter.php';?>
</body>

</html>