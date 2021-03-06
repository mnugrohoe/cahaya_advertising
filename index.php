<?php
session_start();
$_SESSION['path'] = 'http://'.$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
require("element.php");

if (isset($_SESSION['errorLogin'])) {
    if ($_SESSION['errorLogin']) {
        echo '<script>
        alert("username/password salah!")
        </script>';
    }
}
$_SESSION['errorLogin'] = false;
?>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="img/cahaya/favicon.ico" type="image/x-icon" />
  <title>Cahaya Advertising</title>

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
  <link rel="stylesheet" href="css/index.css" type="text/css" />
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
              <!-- login/logout button -->
              <?php userArea();?>
            </div>
          </li>
        </ul>

        <button class="navbar-toggler ms-2" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse order-md-2" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#katalog_buku">Buku</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#katalog_dekorasi">Dekorasi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#katalog_event">Event</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#katalog_kemasan">Kemasan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#katalog_stationary">Stationary</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#katalog_promosi">Promosi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#katalog_display">Signage & Display</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#katalog_souvenir">Souvenir</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#katalog_textile">Textile</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <main>
    <div class="container jumbotron">
      <div class="row">
        <div class="col order-md-2 carousel-container">
          <div id="carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="img/slider/catalog.jpg" class="d-block" alt="catalog" />
              </div>
              <div class="carousel-item">
                <img src="img/slider/kalender-dinding.jpg" class="d-block" alt="kalender dinding" />
              </div>
              <div class="carousel-item">
                <img src="img/slider/menu.jpg" class="d-block" alt="menu" />
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
        <div class="col order-md-1 about p-3 p-md-0">
          <div class="row">
            <div class="col-sm-3 col-6 card-gb">
              <div><img src="img/cahaya/produsen.png" alt="produsen" /></div>
            </div>
            <div class="col-sm-9 col-6">
              <div class="card-title">
                <h5>Cahaya Advertising adalah produsen</h5>
              </div>
              <div class="card-text">
                <p>
                  Kami memiliki mesin produksi yang lengkap untuk semua jenis media cetak
                </p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3 col-6 card-gb">
              <div>
                <img src="img/cahaya/hemat-waktu.png" alt="hemat waktu" />
              </div>
            </div>
            <div class="col-sm-9 col-6">
              <div class="card-title">
                <h5>Hemat Waktu</h5>
              </div>
              <div class="card-text">
                <p>
                  Anda tidak perlu datang langsung ke workshop kami
                  <br /><small>Anda Order Kami Antar</small>
                </p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3 col-6 card-gb">
              <div>
                <img src="img/cahaya/design-custom.png" alt="design costum" />
              </div>
            </div>
            <div class="col-sm-9 col-6">
              <div class="card-title">
                <h5>Design Custom</h5>
              </div>
              <div class="card-text">
                <p>Akan kami designkan sesuai dengan keinginan anda</p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3 col-6 card-gb">
              <div>
                <img src="img/cahaya/design-template.png" alt="produsen" />
              </div>
            </div>
            <div class="col-sm-9 col-6">
              <div class="card-title">
                <h5>Design Template</h5>
              </div>
              <div class="card-text">
                <p>
                  Banyak pilihan desain yang dapat langsung dicetak tanpa harus pusing Praktis!
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="katalog_buku" class="catalog-container">
      <h4 class="catalog-title">Katalog Buku</h4>
      <div class="row catalog row-cols-2 row-cols-md-5">
        <?php
                readKatalog(1);
                addItem(1);
                ?>
      </div>
    </div>
    <div id="katalog_dekorasi" class="catalog-container">
      <h4 class="catalog-title">Katalog Dekorasi</h4>
      <div class="row catalog row-cols-2 row-cols-md-5">
        <?php
                readKatalog(2);
                addItem(2);
                ?>
      </div>
    </div>
    <div id="katalog_event" class="catalog-container">
      <h4 class="catalog-title">Katalog Event</h4>
      <div class="row catalog row-cols-2 row-cols-md-5">
        <?php
                readKatalog(3);
                addItem(3);
                ?>
      </div>
    </div>
    <div id="katalog_kemasan" class="catalog-container">
      <h4 class="catalog-title">Katalog Kemasan</h4>
      <div class="row catalog row-cols-2 row-cols-md-5">
        <?php
                readKatalog(4);
                addItem(4);
                ?>
      </div>
    </div>
    <div id="katalog_stationary" class="catalog-container">
      <h4 class="catalog-title">Katalog Stationary</h4>
      <div class="row catalog row-cols-2 row-cols-md-5">
        <?php
                readKatalog(5);
                addItem(5);
                ?>
      </div>
    </div>
    <div id="katalog_promosi" class="catalog-container">
      <h4 class="catalog-title">Katalog Promosi</h4>
      <div class="row catalog row-cols-2 row-cols-md-5">
        <?php
                readKatalog(6);
                addItem(6);
                ?>
      </div>
    </div>
    <div id="katalog_display" class="catalog-container">
      <h4 class="catalog-title">Katalog Signage and Display</h4>
      <div class="row catalog row-cols-2 row-cols-md-5">
        <?php
                readKatalog(7);
                addItem(7);
                ?>
      </div>
    </div>
    <div id="katalog_souvenir" class="catalog-container">
      <h4 class="catalog-title">Katalog Souvenir</h4>
      <div class="row catalog row-cols-2 row-cols-md-5">
        <?php
                readKatalog(8);
                addItem(8);
                ?>
      </div>
    </div>
    <div id="katalog_textile" class="catalog-container">
      <h4 class="catalog-title">Katalog Textile</h4>
      <div class="row catalog row-cols-2 row-cols-md-5">
        <?php
                readKatalog(9);
                addItem(9);
                ?>
      </div>
    </div>
  </main>
  <footer>
    <!--  -->
  </footer>
</body>

</html>
<script src="js/cahaya.js" type="text/javascript"></script>