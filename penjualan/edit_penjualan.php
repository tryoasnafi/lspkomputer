<?php
include_once('../config.php');

if (isset($_POST['edit_penjualan'])) {
    $faktur = $_POST['faktur'];
    $no_pelanggan = $_POST['noPelanggan'];
    $tanggal_penjualan = $_POST['tanggalPenjualan'];

    $sql = "UPDATE penjualan SET
            no_pelanggan = '$no_pelanggan',
            tanggal_penjualan = '$tanggal_penjualan'
            WHERE faktur = $faktur";


    if ($conn->query($sql) === TRUE) {
        echo "<script>
        alert('Data berhasil diubah!');
        window.location.href='index.php';
        </script>";
    } else {
        echo "Error : " . $sql . "<br>" . $conn->connect_error;
    }
}


$faktur = $_GET['faktur'];
$sql = "SELECT * FROM penjualan WHERE faktur={$faktur}";
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
                <h1>Kelola Penjualan</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="" method="POST">
                    <div class="form-group row">
                        <label for="faktur" class="col-sm-2 col-form-label">Faktur</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="faktur" name="faktur" value="<?= $user_data->faktur; ?>">
                            <input type="text" class="form-control" id="faktur" disabled value="<?= $user_data->faktur; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="noPelanggan" class="col-sm-2 col-form-label">No Pelanggan</label>
                        <div class="col-sm-10">
                            <select class="custom-select" id="noPelanggan" name="noPelanggan">
                                <option selected disabled>No. Pelanggan</option>
                                <?php
                                $data = $conn->query("SELECT no_pelanggan FROM pelanggan");
                                while ($user = mysqli_fetch_object($data)) {
                                ?>
                                    <option <?= ($user->no_pelanggan == $user_data->no_pelanggan) ? 'selected' : '' ?> value="<?= $user->no_pelanggan ?>"><?= $user->no_pelanggan ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggalPenjualan" class="col-sm-2 col-form-label">Tanggal Penjualan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tanggalPenjualan" name="tanggalPenjualan" value="<?= $user_data->tanggal_penjualan; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" name="edit_penjualan">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>