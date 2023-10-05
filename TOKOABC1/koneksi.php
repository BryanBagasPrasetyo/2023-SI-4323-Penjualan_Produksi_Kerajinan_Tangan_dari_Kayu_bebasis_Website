<?php
$servername = "localhost";
$username = "root";
$password = "";
$myDB = "toko_abc";
$conn = new mysqli($servername, $username, $password, $myDB);
if ($conn->connect_error)
	die("Koneksi ke server-database gagal" . $conn->connect_error);
?>