<!doctype html>
<?php
include "koneksi.php";
include "uploadFoto.php";

$nama_member = $_POST['tnama_member'];
$email = $_POST['temail'];
$alamat = $_POST['talamat'];
$kota = $_POST['tkota'];
$provinsi = $_POST['tprovinsi'];
$username = $_POST['tusername'];
$password = $_POST['tpassword'];

if (upload_foto($_FILES["foto"], "member")) {
    $foto = $_FILES["foto"]["name"];
    $sql = "INSERT INTO member (nama_member, email, alamat, kota, provinsi, username, password, foto)
            VALUES ('$nama_member', '$email', '$alamat', '$kota', '$provinsi', '$username', '$password', '$foto')";
    
    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("location:login.php");
    } else {
        $conn->close();
        echo "New records failed";
    }
} else {
    echo "Sorry, there was an error uploading your file.";
}
?>
