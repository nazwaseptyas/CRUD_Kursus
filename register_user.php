<?php
require 'koneksi.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$query_sql = "INSERT INTO tbl_users (username, email, password) VALUES ('$username', '$email', '$password')";

if (mysqli_query($conn, $query_sql)) {
    header("Location: login.php");
    exit(); 
} else {
    echo "Pendaftaran Gagal: " . mysqli_error($conn);
}
?>