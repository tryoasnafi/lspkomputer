<?php

include_once('../config.php');

$kode_barang = $_GET['kode_barang'];

$delete = "DELETE FROM barang WHERE kode_barang='$kode_barang'";

if ($conn->query($delete) === TRUE) {
    echo "<script>
    alert('Data berhasil dihapus!');
    window.location.href='index.php';
    </script>";
} else {
    echo "Error : " . $update . "<br>" . $conn->connect_error;
}
