<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-in Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #343a40; /* Dark background */
            color: #fff; /* White text */
        }
        .container {
            background-color: #212529; /* Slightly lighter dark background */
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        }
        .btn-primary {
            background-color: #17a2b8; /* Info button color */
            border-color: #17a2b8;
            color: #fff; /* White text on button */
        }
        .btn-primary:hover {
            background-color: #138496; /* Darker info button color on hover */
            border-color: #138496;
        }
        a {
            color: #17a2b8; /* Info color for links */
        }
        a:hover {
            color: #138496; /* Darker info color on hover */
        }
    </style>
</head>
<body>
    <?php include "./cosHead.php" ?>

    <?php
    $invalid = 0;
    $success = 0;
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        include 'connection.php';
        $username = $_POST['uname'];
        $password = $_POST['pass'];

        $sql = "select * from astro_tb where username = '$username' and password = '$password';";
        $result = $con->query($sql);
        if(mysqli_num_rows($result) > 0) {
            $success=1;
            session_start();
            $_SESSION["username"] = $username;
            header("location:Dashboard/cosmoDash.php");
        } else {
            $invalid = 1;
        }
        $con->close();
    }
    ?>

    <div class="container mt-5 w-50 mb-5">
        <h1 class="text-center">Login Page</h1>
        <?php
        if($invalid) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Sorry</strong> Login failed due to invalid credentials.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        }
        if($success) {
            echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Success</strong> Login successful.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        }
        ?>
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">User Name</label>
                <input type="text" class="form-control" name="uname" placeholder="Enter Username Here" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="pass" placeholder="Enter Password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <p class="mt-3">Don't have an account? <a href="./coregistration.php" style="text-decoration: none;">Register here</a></p>
    </div>

    <?php include "./cosfooter.php"; ?>
</body>
</html>
