<?php
session_start();
require('element.php');
include_once('connect.php');

$id_produk = ed($_GET['id'],'d');
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
            <?php echo $produk['nama_produk'];?> | Cahaya Advertising</title>

        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

        <!-- Icon -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />

        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>

        <!-- JS Jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- CSS -->
        <!-- <link rel="stylesheet" href="css/index.css" type="text/css" /> -->
        <link rel="stylesheet" href="css/nav.css" type="text/css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway" />
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
                <div class="container-fluid">
                    <a class="navbar-brand order-md-1" href="index.php"><img src="img/cahaya/cahayaadv.png" alt="cahaya adv" /></a>
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

        </main>
    </body>

    </html>
    <script src="js/cahaya.js" type="text/javascript"></script>