<?php
require 'koneksi.php';

$user_id = $_POST['user_id'];
$edit_username = $_POST['edit_username'];
$edit_email = $_POST['edit_email'];

$update_query = "UPDATE tbl_users SET username=?, email=? WHERE id=?";
$stmt = mysqli_prepare($conn, $update_query);

mysqli_stmt_bind_param($stmt, "ssi", $edit_username, $edit_email, $user_id);

if (mysqli_stmt_execute($stmt)) {
    header("Location: tabel_user.php");
    exit();
} else {
    echo "Error updating user: " . mysqli_error($conn);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>