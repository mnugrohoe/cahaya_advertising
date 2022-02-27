<?php
session_start();
include_once('connect.php');
require('func.php');

if (!isset($_SESSION['username'])) {
    $_SESSION['errorBeli'] = true;
    header("Location: ".$_SESSION['path']);
}
$tanggal = date('Y-m-d');
$username = $_SESSION['username'];
$id_produk = ed($_GET['id'], 'd');
$kuantitas = $_POST['jumlah'];
$total_harga = $_POST['jumlah'] * $_POST['harga'];

$query = "SELECT * FROM `produk` WHERE id_produk = '$id_produk'";
$produk = mysqli_fetch_assoc(mysqli_query($mysqli, $query));
$stock = $produk['stock'] - $kuantitas;

$query = "INSERT INTO `penjualan` (`id_jual`, `tanggal`, `username`, `id_produk`, `kuantitas`, `total_harga`) VALUES ( NULL, '$tanggal', '$username', '$id_produk', '$kuantitas', '$total_harga'); ";

$insert = mysqli_query($mysqli, $query);

$query = "UPDATE `produk` SET `stock` = '$stock' WHERE `id_produk` = '$id_produk';";
$update = mysqli_query($mysqli, $query);

?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Status Pembelian | under_construct</title>
  <style>
  body {
    background-color: #F6F6F6;
  }

  .container {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
  }

  .container div {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
  }

  image {
    width: 50%;
  }

  span {
    font-size: 1.5rem;
    margin: 2rem;
  }

  button {
    font-size: 2rem;
  }

  button:hover {
    cursor: pointer;
  }
  </style>
</head>

<body>
  <div class="container">
    <div>
      <div><img src="img/cahaya/under_construct.png" alt="under_construct"></div>
      <div><span><b>Note:</b> Pembelian <b><?php echo $_POST['nama_produk'] ?></b>
          sebanyak
          <?php echo $_POST['jumlah']?> pcs
          dengan total harga <?php echo $_POST['harga'] * $_POST['jumlah']?>
          <b>berhasil</b></span>
      </div>
      <div>
        <button onclick="location.href='index.php'">Kembali ke Home</button>
      </div>
    </div>
  </div>
</body>

</html>