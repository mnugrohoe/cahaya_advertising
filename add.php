<?php 
session_start();

if(!isset($_SESSION['role'])){
    header('Location: index.php');
    exit;
} else {
    if($_SESSION['role'] != 'admin'){
        header('Location: index.php');
        exit;
    };
}

include_once("connect.php");
$array_katalog = mysqli_query($mysqli, "SELECT * FROM katalog");
?>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Produk</title>

    <link rel="shortcut icon" href="img/cahaya/favicon.ico" type="image/x-icon" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <!-- Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- JS -->
    <script type="text/javascript" src="js/cahaya.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="css/add.css" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway" />
</head>

<body>
    <main>
        <form action="add.php" class="container" method="post">
            <div class="card">
                <div class="title">
                    <h3>Upload Product</h3>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card-title">
                            <h4>Foto Product <span class="wajib">Wajib</span></h4>
                        </div>
                        <div class="card-subtitle">Format gambar .jpg .jpeg .png</div>
                    </div>
                    <div class="col">
                        <img class="card-img" id="gambar" src="img//cahaya/upload.jpg" alt="gambar" />
                        <input type="file" onchange="preview()" class="form-control mt-2" name="gambar"
                            accept="image/png, image/jpeg" required />
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="title">
                    <h3>Informasi Product</h3>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card-title">
                            <h4>Nama Product <span class="wajib">Wajib</span></h4>
                        </div>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="nama" placeholder="Nama Product" required />
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card-title">
                            <h4>Katalog Product <span class="wajib">Wajib</span></h4>
                        </div>
                    </div>
                    <div class="col">
                        <select type="text" class="form-select" name="katalog">
                            <?php while($katalog = mysqli_fetch_array($array_katalog)){
                                echo "<option value=".$katalog['id_katalog'].">".$katalog['nama_katalog']."</option>";}?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="title">
                    <h3>Harga</h3>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card-title">
                            <h4>Harga Satuan <span class="wajib">Wajib</span></h4>
                        </div>
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" min="0" name="harga" placeholder="Harga" required />
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="title">
                    <h3>Pengelolaan Product</h3>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card-title">
                            <h4>Stock <span class="wajib">Wajib</span></h4>
                        </div>
                    </div>
                    <div class="col">
                        <input type="number" min="0" class="form-control" name="stock" placeholder="Stock" required />
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="title">
                    <h3>Detail Product</h3>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card-title">
                            <h4>Deskripsi Product</h4>
                        </div>
                        <div class="card-subtitle">Pastikan deskripsi produk memuat spesifikasi, ukuran, bahan. Semakin
                            detail, semakin berguna bagi pembeli, cantumkan max. 250 karakter agar pembeli semakin mudah
                            mengerti dan menemukan produk anda</div>
                    </div>
                    <div class="form-floating col">
                        <textarea class="form-control" name="deskripsi" placeholder="Leave a comment here"
                            id="floatingTextarea"></textarea>
                        <label for="floatingTextarea">Comments</label>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <input type="submit" class="submit" name="login" value="Submit" />
            </div>
        </form>
    </main>
</body>

</html>