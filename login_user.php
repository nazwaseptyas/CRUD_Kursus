<?php
require 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query_sql = "SELECT password FROM tbl_users WHERE username = ?";
$stmt = mysqli_prepare($conn, $query_sql);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    $hashedPassword = $row['password'];

    if (password_verify($password, $hashedPassword)) {
        header("Location: crud.php");
        exit();
    }
}

?>