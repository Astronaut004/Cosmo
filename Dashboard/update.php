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

        footer {
            color: #fff;
            background-color: #212121;
            padding: 1rem 0;
        }

        .footer-links a {
            color: #fff;
            margin-right: 1rem;
        }
    </style>
</head>

<body>
    <?php include './Astroheader.php'; ?>

    <div class="container-fluid">
        <h1 class="text-center">DASHBOARD</h1>
        <h2 class="text-center">Update Record</h2>

        <div class="container main">
            <!-- PHP code for updating record -->
            <?php
            $con = new mysqli('localhost', 'root', '', 'cosmo_db');

            if (isset($_GET['document_id'])) {
                $id = $_GET['document_id'];
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $document_name = $_POST['document_name'];
                $author_name = $_POST['author_name'];
                $image_name = $_POST['image_name'];
                $document_desc = $_POST['document_desc'];
                $document_type = $_POST['document_type'];

                $sql = "UPDATE document_tb SET document_name='$document_name', author_name='$author_name', image_name='$image_name', document_desc='$document_desc', document_type='$document_type' WHERE document_id=$id";

                $result = $con->query($sql);

                if ($result) {
                    header("location:AstroData.php");
                    exit; // Exit to prevent further execution
                } else {
                    echo 'Failed to update record.';
                }
            }
            ?>
            <!-- Form for updating record -->
            <form method="post">
                <div class="mb-3">
                    <label for="document_name" class="form-label">Document Name</label>
                    <input type="text" class="form-control" id="document_name" name="document_name" value="">
                </div>
                <div class="mb-3">
                    <label for="author_name" class="form-label">Author</label>
                    <input type="text" class="form-control" id="author_name" name="author_name" value="">
                </div>
                <div class="mb-3">
                    <label for="image_name" class="form-label">Image Name</label>
                    <input type="text" class="form-control" id="image_name" name="image_name" value="">
                </div>
                <div class="mb-3">
                    <label for="document_desc" class="form-label">Description</label>
                    <textarea class="form-control" id="document_desc" name="document_desc" rows="3"></textarea>
                </div>

                <div class="row">
                    <div class="col-auto">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" value="Mission" name="document_type">
                            <label class="form-check-label" for="easy">Mission</label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" value="Biography" name="document_type">
                            <label class="form-check-label" for="medium">Biography</label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" value="Theory" name="document_type">
                            <label class="form-check-label" for="hard">Theory</label>
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
