<?php
include_once('../config.php');

if (isset($_POST['edit_pelanggan'])) {
    $no_pelanggan = $_POST['noPelanggan'];
    $nama_pelanggan = $_POST['namaPelanggan'];
    $alamat = $_POST['alamat'];

    $sql = "UPDATE pelanggan SET
            nama_pelanggan = '$nama_pelanggan',
            alamat = '$alamat'
            WHERE no_pelanggan = '$no_pelanggan'";


    if ($conn->query($sql) === TRUE) {
        echo "<script>
        alert('Data berhasil diubah!');
        window.location.href='index.php';
        </script>";
    } else {
        echo "Error : " . $sql . "<br>" . $conn->connect_error;
    }
}

$no_pelanggan = $_GET['no_pelanggan'];
$sql = "SELECT * FROM pelanggan WHERE no_pelanggan={$no_pelanggan}";
$data = $conn->query($sql);
$user_data = mysqli_fetch_object($data);

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
                            <input type="hidden" class="form-control" id="noPelanggan" name="noPelanggan" value="<?= $user_data->no_pelanggan; ?>">
                            <input type=" text" class="form-control" id="noPelanggan" disabled value="<?= $user_data->no_pelanggan; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="namaPelanggan" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="namaPelanggan" name="namaPelanggan" value="<?= $user_data->nama_pelanggan; ?>">
                        </div>
                    </div>
                    <div class=" form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $user_data->alamat; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" name="edit_pelanggan">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>