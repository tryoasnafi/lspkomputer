<?php

include_once('../config.php');

$faktur = $_GET['faktur'];

$delete = "DELETE FROM penjualan WHERE faktur='$faktur'";

if ($conn->query($delete) === TRUE) {
    echo "<script>
    alert('Data berhasil dihapus!');
    window.location.href='index.php';
    </script>";
} else {
    echo "Error : " . $update . "<br>" . $conn->connect_error;
}
