<?php 
require("function.php");
// Ambil data dari data base
$murid = query("SELECT * FROM murid");

// ketika tombol cari ditekan
if (isset($_POST["cari"])) {
    $murid = cari($_POST["search"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <title>Document</title>

    <style>
        .card {
            margin-bottom: 10px;
            width: 200px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
            background-color: cadetblue;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: cover;
            padding: 20px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .card-body {
            padding: 15px;
        }

        .card-title {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 1rem;
            margin-bottom: 5px;
        }

        .btn {
            font-size: 0.9rem;
            padding: 5px 10px;
            margin-top: 10px;
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
        <div class="row">
            <!-- Looping data dari database -->
            <?php foreach($murid as $row) : ?>
            <div class="col-md-3">
                <div class="card mx-0">
                    <img class="card-img-top" src="img/<?= $row["Foto"]; ?>" alt="<?= $row["Nama"]; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row["Nama"]; ?></h5>
                        <p class="card-text">Eskul: <?= $row["Eskul"]; ?></p>
                        <p class="card-text">Hobi: <?= $row["Hobi"]; ?></p>
                        <a href="ubah.php?id=<?= $row["id"]; ?>" class="btn btn-primary">Ubah</a>
                        <a href="hapus.php?id=<?= $row["id"]; ?>" class="btn btn-danger" onclick="return confirm('Yakin?');">Hapus</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
