<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user_id = $_POST['user_id'];
    $edit_nama = $_POST['edit_nama'];
    $edit_kelas = $_POST['edit_kelas'];
    $edit_npm = $_POST['edit_npm'];
    $edit_email = $_POST['edit_email'];
    $edit_kursus = $_POST['edit_kursus'];

    $update_query = "UPDATE tbl_kursusweb SET nama=?, kelas=?, npm=?, email=?, kursus=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $update_query);

    mysqli_stmt_bind_param($stmt, "sssssi", $edit_nama, $edit_kelas, $edit_npm, $edit_email, $edit_kursus, $user_id);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: tabel.php");
        exit();
    } else {
        echo "Error updating kursus: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}


?>