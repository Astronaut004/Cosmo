<?php
    $servername = 'localhost';
    $username = 'root';
    $pwd = '';
    $db = 'cosmo_db';
    
    // Create connection
    $con = new mysqli($servername, $username, $pwd, $db);

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
?>
