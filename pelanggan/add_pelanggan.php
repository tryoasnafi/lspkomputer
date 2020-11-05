<?php
include_once('../config.php');

if (isset($_POST['add_pelanggan'])) {
    $no_pelanggan = $_POST['noPelanggan'];
    $nama_pelanggan = $_POST['namaPelanggan'];
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO pelanggan (no_pelanggan, nama_pelanggan, alamat) VALUES ('$no_pelanggan', '$nama_pelanggan', '$alamat')";


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
                <h1>Kelola Pelanggan</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="" method="POST">
                    <div class="form-group row">
                        <label for="noPelanggan" class="col-sm-2 col-form-label">No Pelanggan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="noPelanggan" name="noPelanggan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="namaPelanggan" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="namaPelanggan" name="namaPelanggan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" name="add_pelanggan">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>