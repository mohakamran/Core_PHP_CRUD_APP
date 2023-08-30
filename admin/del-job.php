<?php

require "../db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM jobs WHERE ID = $id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>window.open('view-jobs.php?del=success', '_self')</script>";
    }
}

?>