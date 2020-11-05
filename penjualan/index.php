<?php

include_once('../config.php');
$no = 1;
$query = "SELECT * FROM penjualan";
$data = $conn->query($query);

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
        <div class="row ml-1 mb-2">
            <a href="add_penjualan.php" class="btn btn-dark">Tambah Penjualan</a>
        </div>
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Faktur</th>
                            <th scope="col">No Pelanggan</th>
                            <th scope="col">Tanggal penjualan</th>
                            <th scope="col" class="text-center">OPSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($user_data = mysqli_fetch_object($data)) {  ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $user_data->faktur ?></td>
                                <td><?= $user_data->no_pelanggan ?></td>
                                <td><?= $user_data->tanggal_penjualan ?></td>
                                <td class="text-center">
                                    <a class="btn btn-outline-primary" href="edit_penjualan.php?faktur=<?= $user_data->faktur ?>">Edit</a>
                                    <a class="btn btn-danger" href="delete_penjualan.php?faktur=<?= $user_data->faktur ?>" onclick="return confirm_delete()">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        confirm_delete = () => {
            return confirm("Apakah Anda yakin menghapus data ini?") ? true : false;
        }
    </script>
</body>

</html>