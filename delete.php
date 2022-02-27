<?php
session_start();
require("func.php");
include_once('connect.php');
if ($role != 'admin') {
    header('Location: index.php');
    exit;
}

$id_produk = ed($_GET['id'], 'd');

$query = "SELECT * FROM `produk` WHERE id_produk = '$id_produk'";
$produk = mysqli_fetch_assoc(mysqli_query($mysqli, $query));

$dir = "img/product/";
unlink($dir . $produk['gambar']);

$delete = mysqli_query($mysqli, "DELETE FROM `produk` WHERE id_produk='$id_produk'");
header("Location:index.php");
exit;
