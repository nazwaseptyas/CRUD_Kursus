<?php
require 'koneksi.php';

$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$npm = $_POST['npm'];
$email = $_POST['email'];
$kursus = $_POST['kursus'];

$query_sql = "INSERT INTO tbl_kursusweb (nama, kelas, npm, email, kursus) VALUES ('$nama', '$kelas', '$npm', '$email', '$kursus')";

if (mysqli_query($conn, $query_sql)) {
    header("Location: tabel.php");
    exit(); 
} else {
    echo "Pendaftaran Gagal: " . mysqli_error($conn);
}
?>