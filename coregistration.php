<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodMaster - Registration</title>
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
    <?php include './cosHead.php'; ?>

    <?php
$user = 0;
$success = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connection.php';
    
    $username = $_POST['uname'];
    $password = $_POST['pass'];
    $email = $_POST['email'];
    
    if (empty($username) || empty($password) || empty($email)) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Sorry</strong> All fields are required.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    } else {
        $username = mysqli_real_escape_string($con, $username);
        $password = mysqli_real_escape_string($con, $password);
        $email = mysqli_real_escape_string($con, $email);

        $sql = "SELECT * FROM astro_tb WHERE username = '$username';";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            $user = 1;
        } else {
            $sql = "INSERT INTO astro_tb (username, password, email) VALUES ('$username', '$password', '$email');";
            if ($con->query($sql) === TRUE) {
                $success = 1;
            } else {
                die($con->error);
            }
        }
    }
    $con->close();
}
?>


    <div class="container mt-5 w-50 mb-5">
        <h1 class="text-center">Registration Page</h1>
        <?php
        if ($user) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Sorry</strong> User already exists.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        }
        if ($success) {
            echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Congrats</strong> User Registered Successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        }
        ?>
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="uname" placeholder="Enter Username" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="pass" placeholder="Enter Password" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Sign Up</button>
            <p class="mt-3">Already have an account? <a href="./cologin.php">Login</a></p>
        </form>
    </div>
    
    <?php include './cosfooter.php'; ?>
</body>
</html>
