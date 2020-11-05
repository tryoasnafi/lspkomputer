<?php
include_once('../config.php');

$no_pelanggan = $_GET['no_pelanggan'];

$delete = "DELETE FROM pelanggan WHERE no_pelanggan='$no_pelanggan'";

if ($conn->query($delete) === TRUE) {
    echo "<script>
    alert('Data berhasil dihapus!');
    window.location.href='index.php';
    </script>";
} else {
    echo "Error : " . $update . "<br>" . $conn->connect_error;
}
