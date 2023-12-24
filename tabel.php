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
                </ul>
            </div>
        </div>
    </nav>
    <div class="container tabel-container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Lengkap</th>
                    <th>Kelas</th>
                    <th>NPM</th>
                    <th>Email</th>
                    <th>Pilihan Kursus</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="userTableBody">
                <?php
                require 'koneksi.php';

                $query_sql = "SELECT * FROM tbl_kursusweb";
                $result = mysqli_query($conn, $query_sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['nama']}</td>
                            <td>{$row['kelas']}</td>
                            <td>{$row['npm']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['kursus']}</td>
                            <td>
                                <a href='edit.php?id={$row['id']}' class='btn btn-sm btn-primary'>Edit</a>
                                <form action='delete.php' method='POST' style='display:inline;'>
                                    <input type='hidden' name='user_id' value='{$row['id']}' />
                                    <button type='submit' class='btn btn-sm btn-danger' onclick=\"return confirm('Ingin Menghapus Data Kursus?')\">Delete</button>
                                </form>
                            </td>
                        </tr>";
                }

                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>