<?php

include_once('../config.php');
$no = 1;
$query = "SELECT * FROM pelanggan";
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
                <h1>Kelola Pelanggan</h1>
            </div>
        </div>
        <div class="row ml-1 mb-2">
            <a href="add_pelanggan.php" class="btn btn-dark">Tambah Pelanggan</a>
        </div>
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">No Pelanggan</th>
                            <th scope="col">Nama Pelanggan</th>
                            <th scope="col">Alamat</th>
                            <th scope="col" class="text-center">OPSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($user_data = mysqli_fetch_object($data)) {  ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $user_data->no_pelanggan ?></td>
                                <td><?= $user_data->nama_pelanggan ?></td>
                                <td><?= $user_data->alamat ?></td>
                                <td class="text-center">
                                    <a class="btn btn-outline-primary" href="edit_pelanggan.php?no_pelanggan=<?= $user_data->no_pelanggan ?>">Edit</a>
                                    <a class="btn btn-danger" href="delete_pelanggan.php?no_pelanggan=<?= $user_data->no_pelanggan ?>" onclick="return confirm_delete()">Hapus</a>
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