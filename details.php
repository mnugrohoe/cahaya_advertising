<?php
session_start();
$_SESSION['path'] = 'http://'.$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];

require('element.php');
include_once('connect.php');

if (isset($_SESSION['edited'])) {
    if ($_SESSION['edited']) {
        echo "<script> var editedConfirm = confirm('Berhasil edit data \\n\\n Kembali ke home?');
        if (editedConfirm) { window.location.href = \"index.php\";};
        </script>";
    }
}
$_SESSION['edited'] = false;

if (isset($_SESSION['errorLogin'])) {
    if ($_SESSION['errorLogin']) {
        echo '<script>
        alert("username/password salah!")
        </script>';
    }
}
$_SESSION['errorLogin'] = false;
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

  <!--JS Jquery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
  </script>

  <!-- CSS -->
  <link rel="stylesheet" href="css/details.css" type="text/css" />
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
    <div class="container pt-3">
      <form id='produkForm'
        action="<?php echo ($role == 'admin') ? "edit.php?id=".$_GET['id'] :"beli.php?id=".$_GET['id'];?>" method='post'
        enctype="multipart/form-data" class='row'>
        <div class="row">

          <div class="col-3">

            <img id="gambarprev" src="img/product/<?php echo $produk['gambar'];?>" alt="">
            <?php if ($role == 'admin') {
    echo "<input type=\"file\" onchange=\"preview()\" class=\" pt-3\" name=\"gambar\" accept=\"image/png, image/jpeg\" style=\"display: none;\">";
}
                        ?>
          </div>
          <div class="col detail">
            <div><input class="form-control" type="text" name="nama_produk" value="<?php echo $produk['nama_produk'];?>"
                readonly></div>
            <div class='labelHarga d-flex'>
              <span>Rp</span>
              <input class="form-control" type="number" step="any" name="harga" value='<?php echo $produk["harga"];?>'
                readonly>
            </div>
            <div class="labelDesk">
              <span>Details</span>
            </div>
            <div><textarea class="form-control" name="deskripsi" readonly><?php echo $produk['deskripsi'];?></textarea>
            </div>
            <div></div>
          </div>
          <div class="col-3 action">
            <?php actionCard();?>
          </div>
        </div>
      </form>
    </div>
  </main>
</body>

</html>
<script>
var role = '<?php echo $role?>';
var id = '<?php echo $_GET['id']?>';
</script>
<script src="js/cahaya.js" type="text/javascript"></script>
<script src="js/detail.js" type="text/javascript"></script>

<?php
if (isset($_SESSION['errorBeli'])) {
                            if ($_SESSION['errorBeli']) {
                                echo '<script> errorBeli();
        </script>';
                            }
                        }
$_SESSION['errorBeli'] = false;