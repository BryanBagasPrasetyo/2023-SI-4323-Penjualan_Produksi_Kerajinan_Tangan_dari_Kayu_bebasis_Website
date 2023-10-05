<?php
session_start();

include "../koneksi.php";
$idmember = $_POST["hidmember"];
$pembelian = $_POST["tpembelian"];
$ekspedisi = $_POST["tekspedisi"];
$biayaKirim = $_POST["tbiayaKirim"];
$totalByr = $_POST["ttotalByr"];
$jenisByr = $_POST["tjenisByr"];

$sql = "select if(max(id) is null,0,max(id)) as maks from tborder";
$hasil = $conn->query($sql);
while ($row = $hasil->fetch_assoc()) {
    $orderid = $row['maks'] + 1;
}

$sql = "insert into tborder (idmember,tgl,jenisByr,biayaKirim,pembelian,totalByr,ekspedisi,status)
        values ('$idmember',now(),'$jenisByr','$biayaKirim','$pembelian','$totalByr','$ekspedisi','0')";
$conn->query($sql);
echo $sql;
echo "<br>";

$productid = 0;
if (!empty($_SESSION['cart'])) {
    $max = sizeof($_SESSION['cart']['arrCart']);
    for ($i = 0; $i < $max; $i++) {
        $productid = $_SESSION['cart']['arrCart'][$i]['productid'];
        $jml = $_SESSION['cart']['arrCart'][$i]['jml'];
        $hrg = $_SESSION['cart']['arrCart'][$i]['hrg'];
        $sql = "insert into tborder_detail (idorder,idbarang,jml,hrg) values ('$orderid','$productid','$jml','$hrg')";
        $conn->query($sql);
        // echo $sql;
        // echo "<br>";
    }
}

unset($_SESSION['cart']);
$conn->close();
header("location:../index.html");
?>
