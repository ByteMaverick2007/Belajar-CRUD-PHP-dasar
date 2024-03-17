<?php 
// Koneksi ke data base
require ("function.php");

// ambil data dari url
$id = $_GET['id'];

// query data murid berdasarkan id
$mrd = query("SELECT * FROM murid WHERE id = $id")[0];
// var_dump($mrd);
// die;

// Ambil data dari setiap form
if( isset($_POST["submit"]) ){

    // cek 
    if( ubah($_POST) > 0){
        echo "
        <script>
        alert('data berhasil diubah');
        document.location.href = 'home.php'
        </script>
        ";
    } else{
        echo "
        <script>
        alert('data gagal diubah');
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
    <title>ubah data</title>

    <style>
    img {
        width: 100px;
    }
    </style>
</head>

<body>

    <div class="container mt-5 position-relative">

        <form action="" method="post" class="d-flex justify-content-center" enctype="multipart/form-data">
            <ul>
                <label for="id"></label>
                <input type="hidden" name="id" id="id" value="<?= $mrd["id"]; ?>">
                
        
                <input type="hidden" name="gambarLama"  value="<?= $mrd["Foto"]; ?>">

                <div class="d-flex flex-row mb-2"> <label class="form-label m-2" for="nama">Nama</label>
                    <input class="form-control" type="text" name="nama" id="nama" required value="<?= $mrd["Nama"]; ?>"
                        autocomplete="off">
                </div>

                <div class="d-flex flex-row mb-2"><label class="form-label m-2" for="eskul">Eskul</label>
                    <input class="form-control" type="text" name="eskul" id="eskul" required
                        value="<?= $mrd["Eskul"]; ?>" autocomplete="off">
                </div>

                <div class="d-flex flex-row mb-2"> <label class="form-label m-2" for="hobi">Hobi</label>
                    <input class="form-control" type="text" name="hobi" id="hobi" required required
                        value="<?= $mrd["Hobi"]; ?>" autocomplete="off">
                </div>
                <div class="mb-2"> 
                    <label class="form-label m-2" for="foto">Foto :</label> 
                    <img src="img/<?= $mrd['Foto']; ?>">
                    <input class="form-control" type="file"name="foto" id="foto">
                </div>


                <div class="d-flex justify-content-end">
                    <button class="btn btn-warning" type="submit" name="submit">edit</button>
                </div>

            </ul>
        </form>
        <br><br>
        <a class="btn btn-secondary" href="home.php">kembali</a>

    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>