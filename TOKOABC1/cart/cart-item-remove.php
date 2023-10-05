<?php
session_start();
    if ($_SERVER["REQUEST_METHOD"] == "GET")
        $idx=$_GET['idx'];
    if (!empty($_SESSION["cart"]['arrCart'])) {
        unset($_SESSION["cart"]['arrCart'][$idx]);
    $_SESSION["cart"]['arrCart']=array_values($_SESSION["cart"]['arrCart']);
    } 
        header("location:dispCart.php");
?>