<?Php
session_start();
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
    <link rel="stylesheet" href="../css/shared.css">
    <link rel="stylesheet" href="../css/cart.css">
</head>
<body>
    <header>
        <div id="page-logo"><a href="../index.html">Toko ABC</a></div>
        <nav>
            <ul>
                <li><a href="../product.php">Product</a></li>
                <li><a href="dispCart.php">Cart</a></li>
                <li><a href="../about.html">About</a></li>
            </ul>
        </nav>
    </header>
        <div class="cartArea">
            <?php
                if (!empty($_SESSION['cart'])){
                    echo "Jml data :".sizeof($_SESSION['cart']['arrCart']). "&nbsp&nbsp<a class='btnCart' href=cart-remove.php>Kosongkan Cart</a>";
                        $max=sizeof($_SESSION['cart']['arrCart']);
                        $teks="<table class='cartTable'>
                            <thead>
                                <tr>
                                <th scope='col'>No</th>
                                <th scope='col'>KodeBrg</th>
                                <th scope='col'>Nama</th>
                                <th scope='col'>Jml</th>
                                <th scope='col'>Harga</th>
                                <th scope='col'>Byr</th>
                                <th scope='col'></th>
                                </tr>
                            </thead>
                            <tbody>";
                            $sum=0;
                            for ($i=0;$i<$max;$i++){
                                $teks .= "<tr><td>" . $i+1 . "</td>";
                                $jml=0;$hrg=0;
                                $brg="";
                                foreach ($_SESSION['cart']['arrCart'][$i] as $key => $val){
                                    if ($key=="hrg")
                                    $hrg=$val;
                                    if ($key=="jml")
                                    $jml=$val;
                                    if ($key=="nmBrg")
                                    $brg=$key;
                                    $tothrg=$hrg*$jml;
                                    if ($key=="jml" || $key=="hrg")
                                    $teks .= "<td>" . number_format($val,0) . "</td>";
                                    else
                                    $teks .= "<td>" . $val . "</td>";
                                    }
                                $sum+=$tothrg;
                                    $teks.= "<td class='kolom-kanan'>" . number_format($tothrg,0) . "</td>";
                                    $teks.= "<td> <a href=cart-item-remove.php?idx=" .$i . "class='btnCart'>remove</a></td>";
                                    $teks.= "</tr>";
                                                    }
                                    $teks.= "<tr><td colspan=6 style='text-align:right;'>Total harga: " . number_format($sum,0) . "</td><tr>";
                                    $teks.="</tbody></table>";
                                    echo $teks;
                                    }else
                                    echo "cart kosong";
?>
            <a href="../login.php" class="btnCart">Checkout</a>
        </div>
    <footer>
        <ul>
            <li>
                <a href="https://www.instagram.com">
                <img src="../images/icons/instagram.png" alt="instagram"></a>
            </li>
            <li>
                <a href="https://www.facebook.com">
                <img src="../images/icons/fb.png" alt="fb"></a>
            </li>
        </ul>
    </footer>
</body>
</html>
