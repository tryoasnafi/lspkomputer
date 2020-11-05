<?php
include_once('../config.php');

if (isset($_POST['add_barang'])) {
    $kode_barang = $_POST['kodeBarang'];
    $nama_barang = $_POST['namaBarang'];
    $harga_barang = $_POST['hargaBarang'];

    $sql = "INSERT INTO barang (kode_barang, nama_barang, harga_barang) VALUES ('$kode_barang', '$nama_barang', '$harga_barang')";


    if ($conn->query($sql) === TRUE) {
        echo "<script>
        alert('Data berhasil ditambah!');
        window.location.href='index.php';
        </script>";
    } else {
        echo "Error : " . $sql . "<br>" . $conn->connect_error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LSP - Junior Web Programmer</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row text-center my-5">
            <div class="col">
                <h1>Kelola Barang</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="" method="POST">
                    <div class="form-group row">
                        <label for="kodeBarang" class="col-sm-2 col-form-label">Kode Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kodeBarang" name="kodeBarang">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="namaBarang" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="namaBarang" name="namaBarang">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hargaBarang" class="col-sm-2 col-form-label">Harga Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="hargaBarang" name="hargaBarang">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" name="add_barang">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>