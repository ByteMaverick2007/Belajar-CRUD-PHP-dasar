<?php 
// Koneksi ke data base
require ("function.php");
// Ambil data dari setiap form
if( isset($_POST["submit"]) ){




    // cek kesalahan/keberhasilan
    if(tambah($_POST) > 0){
        echo "
        <script>
        alert('data berhasil ditambahkan');
        document.location.href = 'home.php'
        </script>
        ";
    } else{
        echo "
        <script>
        alert('data gagal ditambahkan');
        document.location.href = 'home.php'
        </script>
        ";
    }
}




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>TAMBAHKAN</title>
</head>

<body>
    <div class="container mt-5">

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <div class="row mb-3">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" id="nama"required autocomplete="off">
                </div>
            </div>
            <div class="row mb-3">
                <label for="eskul" class="col-sm-2 col-form-label">Eskul</label>
                <div class="col-sm-10">
                    <input type="text" name="eskul" class="form-control" id="eskul"required autocomplete="off">
                </div>
            </div>
            <div class="row mb-3">
                <label for="hobi" class="col-sm-2 col-form-label">Hobi</label>
                <div class="col-sm-10">
                    <input type="text" name="hobi" class="form-control" id="hobi"required autocomplete="off">
                </div>
            </div>
            <div class="row mb-3">
                <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-10">
                    <input type="file" name="foto" class="form-control" id="foto">
                </div>
            </div>
        </ul>
        <div class="d-flex justify-content-end">
            <button class="btn btn-warning " type="submit" name="submit" >KIRIM</button>
        </div>
    </form>
    <br><br><br><br><br>
    <div class="mt-5">
        <a class="btn btn-outline-success" href="home.php">kembali</a>
    </div>
</div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>