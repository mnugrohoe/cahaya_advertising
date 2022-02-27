<?php
session_start();
require('func.php');
include_once('connect.php');

if (!isset($_POST['submit']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit;
}
$id_produk = ed($_GET['id'], 'd');

$query = "SELECT * FROM `produk` WHERE id_produk = '$id_produk'";
$produk = mysqli_fetch_assoc(mysqli_query($mysqli, $query));


$nama_produk = ucwords($_POST['nama_produk']);
$harga = $_POST['harga'];
$id_katalog = $_POST['katalog'];
$stock = $_POST['jumlah'] + $produk['stock'];
$deskripsi = $_POST['deskripsi'];

$dir = "img/product/";
if (!empty($_FILES['gambar']['name'])) {
    $fileType = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
} else {
    $fileType = pathinfo($produk['gambar'], PATHINFO_EXTENSION);
}
$nama_gambar = $id_katalog . "_" . str_replace(' ', '_', strtolower($nama_produk)) . "." . $fileType;
$path = $dir . $nama_gambar;

if (!empty($_FILES["gambar"]["name"])) {
    $type = array('jpg','png','jpeg');
    if (in_array($fileType, $type)) {
        unlink($dir . $produk['gambar']);
        move_uploaded_file($_FILES["gambar"]["tmp_name"], $path);
    } else {
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
} else {
    if ($nama_gambar != $produk['gambar']) {
        rename($dir . $produk['gambar'], $path);
    }
}
$query = "UPDATE `produk` SET `nama_produk` = '$nama_produk' ,`harga` = '$harga', `gambar` = '$nama_gambar', `id_katalog` = '$id_katalog', `stock` = '$stock', `deskripsi` = '$deskripsi' WHERE `id_produk` = '$id_produk';";
$edit = mysqli_query($mysqli, $query);

$_SESSION['edited'] = true;
header("Location: ".$_SESSION['path']);
exit;