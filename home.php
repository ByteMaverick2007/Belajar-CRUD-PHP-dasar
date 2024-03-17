<?php 
require("function.php");
// Ambil data dari data base
$murid = query("SELECT * FROM murid");


// ketika tombol cari ditekan

if( isset($_POST["cari"])){
    $murid = cari($_POST["search"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewp   ort" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <title>Document</title>

    <style>
        img{
            width: 50px;
        }
    </style>
</head>

<body>
    <nav class="navbar bg-light nav-pills nav-fill">
        <div class="container-fluid">
            <a class="navbar-brand">Data Teman</a>
            <a class="btn btn-dark ms-auto" href="tambah data.php">Tambah Data</a>

            <form action="" method="post" class="d-flex ms-2" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" autofocus autocomplete="off">
                <button class="btn btn-outline-success" type="submit" name="cari">Cari</button>
            </form>
        </div>
    </nav>

    <div class="container mt-2">


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Aksi</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Eskul</th>
                    <th scope="col">Hobi</th>
                </tr>
            </thead>

            <!-- Looping data dari database -->
            <?php foreach($murid as $row) : ?>
            <thead>

                <td>
                    <a class="btn btn-primary" href="ubah.php?id=<?= $row["id"]; ?>">ubah</a>
                    <a class="btn btn-danger" href="hapus.php?id=<?= $row["id"]; ?>"
                        onclick="return confirm('yakin?');">hapus</a>
                </td>
                <td><img src="img/<?= $row["Foto"];?>"></td>
                <td><?= $row["Nama"]; ?></td>
                <td><?= $row["Eskul"]; ?></td>
                <td><?= $row["Hobi"]; ?></td>

                <?php endforeach; ?>
            </thead>
        </table>






    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>