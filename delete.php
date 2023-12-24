<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];

    // Hapus data
    $delete_query = "DELETE FROM tbl_kursusweb WHERE id = $user_id";

    if (mysqli_query($conn, $delete_query)) {
        header("Location: tabel.php");
        exit();
    } else {
        echo "Error deleting kursus: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>