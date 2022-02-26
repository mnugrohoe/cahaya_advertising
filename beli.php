<html lang="en">
<?php
print_r($_POST);
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Status Pembelian | under_construct</title>
  <style>
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
      <div><span><b>Note:</b> Pembelian <b><?php echo $_POST['nama_produk'] ?></b> sebanyak
          <?php echo $_POST['jumlah']?> pcs dengan total harga <?php echo $_POST['harga'] * $_POST['jumlah']?>
          <b>berhasil</b></span>
      </div>
      <div>
        <button onclick="location.href='index.php'">Kembali ke Home</button></div>
    </div>
  </div>
</body>

</html>