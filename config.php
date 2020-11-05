<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'penjualanbarang';

$conn = new mysqli($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed : " . $conn->connect_error);
}
