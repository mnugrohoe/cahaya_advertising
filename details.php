<?php
session_start();
require('element.php');
include_once('connect.php');

$id_produk = ed($_GET['id'], 'd');
$query = "SELECT * FROM `produk` WHERE id_produk = '$id_produk'";
$produk = mysqli_fetch_assoc(mysqli_query($mysqli, $query));
?>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="img/cahaya/favicon.ico" type="image/x-icon" />
    <title>
        <?php echo $produk['nama_produk'];?> |
        Cahaya Advertising
    </title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <!-- Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- JS Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="css/details.css" type="text/css" />
    <link rel="stylesheet" href="css/nav.css" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway" />
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand order-md-1" href="index.php"><img src="img/cahaya/cahayaadv.png"
                        alt="cahaya adv" /></a>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 order-md-3">
                    <li class="nav-item">
                        <i id="userIcon" class="bi bi-person-fill"></i>
                        <div class="user-area" id="userArea">
                            <?php userArea();?>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <form
                action="beli.php?id=<?php echo $_GET['id'];?>"
                method='post' class='row'>
                <div class="row">
                    <div class="col-3"><img
                            src="img/product/<?php echo $produk['gambar'];?>"
                            alt="">
                        <?php
                        #print input untuk up file
                        ?>
                    </div>
                    <div class="col detail">
                        <div><input class="form-control" type="text" name="nama_produk"
                                value="<?php echo $produk['nama_produk'];?>"
                                readonly></div>
                        <div class='labelHarga d-flex'>
                            <span>Rp</span>
                            <input class="form-control" type="number" step="any" name="harga"
                                value='<?php echo $produk["harga"];?>'
                                readonly>
                        </div>
                        <div class="labelDesk">
                            <span>Details</span>
                        </div>
                        <div><textarea class="form-control" name="deskripsi"
                                readonly><?php echo $produk['deskripsi'];?></textarea>
                        </div>
                        <div></div>
                    </div>
                    <div class="col-3 action">
                        <div class="action-card">
                            <div class="labelAturJumlah">Atur jumlah</div>
                            <div class="jumlah-order d-flex align-items-center">
                                <div class="jumlah-editor d-flex align-items-center">
                                    <div>
                                        <a href="#" onclick="jumlahOrder('minus')" disabled><svg class="minus-editor"
                                                viewBox="0 0 24 24" width="18px" height="18px"
                                                style="display: inline-block; vertical-align: middle;">
                                                <path d="M19 13H5c-.6 0-1-.4-1-1s.4-1 1-1h14c.6 0 1 .4 1 1s-.4 1-1 1z">
                                                </path>
                                            </svg></a>
                                    </div>
                                    <div>
                                        <input class="jumlah form-control" name="jumlah" type="number" min="0"
                                            value="1">
                                    </div>
                                    <div>
                                        <a href="#" onclick="jumlahOrder('plus')"><svg class="plus-editor"
                                                viewBox="0 0 24 24" width="18px" height="18px"
                                                style="display: inline-block; vertical-align: middle;">
                                                <path
                                                    d="M19 11h-6V5a1 1 0 00-2 0v6H5a1 1 0 000 2h6v6a1 1 0 002 0v-6h6a1 1 0 000-2z">
                                                </path>
                                            </svg></a>
                                    </div>
                                </div>
                                <div class="ms-auto">Sisa stock:
                                    <?php echo '<b id="stock">0</b>' #'<b id="stock">'.$produk["stock"].'</b>';?>
                                </div>
                            </div>
                            <div class="sub-total d-flex">
                                <div>Subtotal</div>
                                <div class="d-flex ms-auto">
                                    <div><b>Rp&nbsp</b></div>
                                    <div>
                                        <b id='subTotal'><?php echo $produk['harga']?></b>
                                    </div>
                                </div>
                            </div>
                            <div class="beli"><button name='submit'>Beli Sekarang</button></div>
                        </div>
                        <?php
                        #print untuk action user/admin
                        ?>
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
<script>
    var role = <?php echo $role?>
</script>
<script src="js/cahaya.js" type="text/javascript"></script>
<script src="js/detail.js" type="text/javascript"></script>