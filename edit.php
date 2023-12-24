<?php
require 'koneksi.php';

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $query_sql = "SELECT * FROM tbl_kursusweb WHERE id = $user_id";
    $result = mysqli_query($conn, $query_sql);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        $user_data = $row;
    } else {
        echo "Kursus not found";
        exit();
    }

    mysqli_close($conn);
} else {
    echo "Invalid request";
    exit();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Kursus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet" />
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Kursus</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="crud.php">CRUD Kursus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="tabel.php">Tabel Data Kursus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Sign In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Sign Up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container crud-container">
        <h4 class="text-center">Edit Kursus</h4>
        <p class="text-center">Edit Data yang Sesuai</p>
        <form action="edit_kursus.php" method="POST">
            <input type="hidden" name="user_id" value="<?php echo $user_data['id']; ?>" />
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
                <input type="text" name="edit_nama" class="form-control" id="exampleFormControlInput1"
                    placeholder="Masukkan Nama Lengkap" value="<?php echo $user_data['nama']; ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Kelas</label>
                <input type="text" name="edit_kelas" class="form-control" id="exampleFormControlInput1"
                    placeholder="Masukkan Kelas Anda" value="<?php echo $user_data['kelas']; ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">NPM</label>
                <input type="text" name="edit_npm" class="form-control" id="exampleFormControlInput1"
                    placeholder="Masukkan NPM Anda" value="<?php echo $user_data['npm']; ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" name="edit_email" class="form-control" id="exampleFormControlInput1"
                    placeholder="name@example.com" value="<?php echo $user_data['email']; ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Pilihan Kursus</label>
                <input type="text" name="edit_kursus" class="form-control" id="exampleFormControlInput1"
                    placeholder="Ex: Junior Web Programming" value="<?php echo $user_data['kursus']; ?>">
            </div>
            <button class="btn btn-primary" type="submit">Edit Kursus</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>