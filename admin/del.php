<?php

require "../db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Get image filename from the database
    $sql = "SELECT image_path FROM emp WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $imageFilename = $row['image_path'];

        $imagePath = $imageFilename;
        if (unlink($imagePath)) {
            $sql = "DELETE FROM emp WHERE id = $id";
           if ($conn->query($sql) === TRUE) {
               echo "<script>window.open('emps.php?del=success', '_self')</script>";
            }
        } else {
            echo "Error deleting image.";
        }
    } else {
        echo "No record found with the provided ID.";
    }
}

?>