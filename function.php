<?php 
// koneksi ke database
$conn = mysqli_connect("localhost","root","","fase e pplg");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);  
    $rows = [];
    while ($row = mysqli_fetch_array($result)) {
        $rows[] = $row;
}
return $rows;
}

function tambah($data){
    global $conn;

    $foto = upload();
    if( !$foto ) {
        return false;
    }


    $nama = htmlspecialchars($data["nama"]);
    $eskul = htmlspecialchars($data["eskul"]);
    $hobi = htmlspecialchars($data["hobi"]);

    //query insert data
    $query = "INSERT INTO murid
                VALUES
                ('', '$foto', '$nama', '$eskul', '$hobi')
    "; 
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function upload() {
    
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];


    // cek apakah tidak ada gambar yg di upload
    if( $error === 4) {
        echo "<script>
        alert('masukan gambar terlebih dahulu');
        </script>
        ";
        return false;
    }

    // cek apakah yang di upload adalah gambar
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo "<script>
        alert('yang anda upload bukan gambar');
        </script>
        ";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if( $ukuranFile > 1000000) {
        echo "<script>
        alert('ukuran gambar terlalu besar');
        </script>
        ";
        return false;
    }

    // lolos pengecekan, gambar siap di upload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;


    move_uploaded_file($tmpName, 'img/'. $namaFileBaru);
    return $namaFileBaru;


}



function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM murid WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data){

    global $conn;

    $id = $data["id"];
    $gambarLama= htmlspecialchars($data["gambarLama"]);
    
    // cek apakah user pilih gambar baru atau tidak
    if( $_FILES['foto']['error'] === 4){
        $foto = $gambarLama;
    } else {
        $foto = upload();
    }


    $nama = htmlspecialchars($data["nama"]);
    $eskul = htmlspecialchars($data["eskul"]);
    $hobi = htmlspecialchars($data["hobi"]);

    //query insert data
    $query = "UPDATE murid SET
                foto = '$foto',
                nama = '$nama',
                eskul = '$eskul',
                hobi = '$hobi'
                WHERE id = $id
    "; 
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}


function cari($search){
    $query = "SELECT * FROM murid
                WHERE
                nama LIKE '$search%' OR
                eskul LIKE '$search%' OR
                hobi LIKE '$search%' 
    
    ";
    return query($query);
}

































?>  
