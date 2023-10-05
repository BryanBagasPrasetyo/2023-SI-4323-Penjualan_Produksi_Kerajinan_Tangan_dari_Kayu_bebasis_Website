<?php
session_start();
if (empty($_SESSION['cart']["arrCart"]))
    $_SESSION['cart']["arrCart"]=array();
include "koneksi.php";
$sql="select * from barang";
$hasil=$conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=hea, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@700&family=0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide|Sofia|Trirong">
    <link rel="stylesheet" href="css/shared.css">
    <link rel="stylesheet" href="css/product.css">
</head>
<body>
    <header>
        <div id="page-logo"><a href="index.html">Toko ABC</a></div>
        <nav>
            <ul>
                <li><a href="product.php">product</a></li>
                <li><a href="cart/dispCart.php">Cart</a></li>
                <li><a href="about.html">About</a></li>
            </ul>
        </nav>
    </header>
    <main class="contain">
        <ul>
        <?php

        $text="";
        if ($hasil->num_rows>0){
            while($r=$hasil->fetch_assoc()){
                $text.="<li>";
                $text.="<img src='images/product/" . $r['foto'] . "' alt='" . $r['nama'] . "'>";
                $text.="<div class='item-content'>";
                $text.=" <div>";
                $text.=" <h2>" . $r['nama'] . "</h2>";
                $text.=" <h3>" . number_format($r['hrg'],0) . "</h3>";
                $text.=" <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis minus
                labore rem recusandae ? </p>";
                $text.=" </div>";
                $text.=" <div class='actions'>";
                $text.=" <a href='cart/addCart.php?productid=".$r['id']."&nama=" . $r['nama'] .
                "&harga=" . $r['hrg'] . "&jml=1'>Order &#x2192</a>";
                $text.="</div>";
                $text.="</div>";
                $text.="</li>";
            }

            echo $text;
        }

        ?>
    </ul>
    </main>
    <footer>
        <ul>
            <li>
                <a href="https://www.instagram.com">
                <img src="images/icons/instagram.png" alt="instagram"></a>
            </li>
            <li>
                <a href="https://www.facebook.com">
                <img src="images/icons/fb.png" alt="fb"></a>
            </li>
        </ul>
    </footer>
</body>
</html>