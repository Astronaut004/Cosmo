<?php
include("../connection.php");

if (isset($_GET["document_id"])) {
    $id = $_GET["document_id"];
    if (!empty($id) && is_numeric($id)) {
        $id = (int)$id;

        $sql = "DELETE FROM document_tb WHERE document_id = $id";
        $result = $con->query($sql);
        if ($result) {
            header("Location: AstroData.php");
            exit();
        } else {
            die("Error: " . $con->error);
        }
    } else {
        die("INVALID ID");
    }
} else {
    die("No ID provided");
}
?>
