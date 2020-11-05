<?php
include_once('../config.php');

if (isset($_POST['add_penjualan'])) {
    $faktur = $_POST['faktur'];
    $no_pelanggan = $_POST['noPelanggan'];
    $tanggal_penjualan = $_POST['tanggalPenjualan'];

    $sql = "INSERT INTO penjualan (faktur, no_pelanggan, tanggal_penjualan) VALUES ('$faktur', '$no_pelanggan', '$tanggal_penjualan')";


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
                <h1>Kelola Penjualan</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="" method="POST">
                    <div class="form-group row">
                        <label for="faktur" class="col-sm-2 col-form-label">Faktur</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="faktur" name="faktur">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="noPelanggan" class="col-sm-2 col-form-label">No Pelanggan</label>
                        <div class="col-sm-10">
                            <select class="custom-select" id="noPelanggan" name="noPelanggan">
                                <option selected disabled>No. Pelanggan</option>
                                <?php
                                $sql = "SELECT no_pelanggan FROM pelanggan";
                                $data = $conn->query($sql);
                                while ($user_data = mysqli_fetch_object($data)) {
                                ?>
                                    <option value="<?= $user_data->no_pelanggan ?>"><?= $user_data->no_pelanggan ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggalPenjualan" class="col-sm-2 col-form-label">Tanggal Penjualan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tanggalPenjualan" name="tanggalPenjualan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" name="add_penjualan">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>