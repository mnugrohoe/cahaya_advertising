<?php
include_once('connect.php');
require('func.php');

function formLogin()
{
    echo "
  <div class='login' id='login'>
    <i class='bi bi-x-octagon'></i>
    <form id='loginForm' method='post' action='login.php'>
      <div class='mb-3'>
        <label for='username' class='form-label'>Username</label>
        <input type='text' class='form-control' id='username' name='username' required>
      </div>
      <div class='mb-3'>
        <label for='password' class='form-label'>Password</label>
        <input type='password' class='form-control' name='password' id='password' required>
      </div>
      <!-- TODO: remember me -->
      <!-- <div class='mb-3 form-check'>
        <input type='checkbox' class='form-check-input' id='exampleCheck1'>
        <label class='form-check-label' for='exampleCheck1'>Check me out</label>
      </div> -->
      <div>Belum punya akun? <a href='register.php'>Daftar</a></div>
      <button type='submit' name='login' class='btn btn-primary'>Submit</button>
    </form>
  </div>
  ";
}

function addItem($katalog)
{
    global $role;
    if ($role == "admin") {
        echo "
    <div id='add-item' class='col catalog-item'>
      <div class='card card-add' onclick=\"location.href='add.php?katalog=".ed($katalog)."'\">
        <div class='card-img-top my-auto add'>
          <i class='bi bi-plus-square'></i>
        </div>
        <div class='card-footer'>
          <p>Add</p>
        </div>
      </div>
    </div>
    ";
        ;
    }
}

function readKatalog($katalog)
{
    global $mysqli;
    $query =  "SELECT * FROM `produk` WHERE id_katalog = $katalog ORDER BY id_produk DESC";
    $data_produk = mysqli_query($mysqli, $query);

    while ($produk = mysqli_fetch_array($data_produk)) {
        echo "
         <div class='col catalog-item' onclick=\"location.href='details.php?id=".ed($produk['id_produk'])."' \">
           <div class='card'>
             <img class='card-img-top my-auto' src='img/product/".$produk['gambar']."' alt='".str_replace(' ', '-', strtolower($produk['nama_produk']))."' />
             <div class='card-footer'>
               <p>".$produk['nama_produk']."</p>
             </div>
           </div>
         </div>
     ";
    }
}

function userArea()
{
    global $role;
    if ($role == 'guest') {
        loginMenu();
        formLogin();
    } else {
        echo "
    <ul>
      <li><a><i>Hi ".getNama()."</a></i></li>
      <li>
        <a class='nav-link' aria-current='page' href='logout.php'><i class='bi bi-box-arrow-left'> Log Out</i></a>
      </li>
    </ul>
    ";
    }
}

function loginMenu()
{
    echo "
  <ul>
    <li>
      <a id='loginButton' class='nav-link' aria-current='page' href='#'><i class='bi bi-box-arrow-in-right'> Sign In</i></a>
    </li>
    <li>
      <a id='loginButton' class='nav-link' aria-current='page' href='register.php'><i class='bi bi-pencil-square'> Register</i></a>
    </li>
  </ul>
  ";
}


function actionCard()
{
    global $role, $produk, $mysqli;
    $array_katalog = mysqli_query($mysqli, "SELECT * FROM `katalog`");

    if ($role == 'admin') {
        echo "
       <div class='UD-action d-flex'>
                            <div><button type=\"button\" id='edit' name='edit'><i class=\"bi bi-pencil-square\">
                                        Edit</i></button>
                            </div>
                            <div class=\"mx-auto\"><button type=\"button\" id='cancel' name='cancel'
                                    style=\"visibility: hidden;}\"><i class=\"bi bi-x-square\">
                                        Cancel</i></button>
                            </div>
                            <div class=\"ms-auto\"><button type=\"button\" id='delete' name='delete'><i class=\"bi bi-trash\">
                                        Delete</i></button>
                            </div>
                        </div>
                        <div class=\"action-card\">
                            <div class=\"labelAturJumlah\">Atur jumlah</div>
                            <div class=\"jumlah-order d-flex align-items-center\">
                                <div class=\"jumlah-editor d-flex align-items-center\">
                                    <div>
                                        <button type=\"button\" onclick=\"jumlahOrder('minus')\" disabled><svg
                                                class=\"minus-editor\" viewBox=\"0 0 24 24\" width=\"18px\" height=\"18px\"
                                                style=\"display: inline-block; vertical-align: middle;\">
                                                <path d=\"M19 13H5c-.6 0-1-.4-1-1s.4-1 1-1h14c.6 0 1 .4 1 1s-.4 1-1 1z\">
                                                </path>
                                            </svg></button>
                                    </div>
                                    <div>
                                        <input class=\"jumlah form-control\" name=\"jumlah\" type=\"number\" value=\"0\"
                                            readonly>
                                    </div>
                                    <div>
                                        <button type=\"button\" onclick=\"jumlahOrder('plus')\" disabled><svg
                                                class=\"plus-editor\" viewBox=\"0 0 24 24\" width=\"18px\" height=\"18px\"
                                                style=\"display: inline-block; vertical-align: middle;\">
                                                <path
                                                    d=\"M19 11h-6V5a1 1 0 00-2 0v6H5a1 1 0 000 2h6v6a1 1 0 002 0v-6h6a1 1 0 000-2z\">
                                                </path>
                                            </svg></button>
                                    </div>
                                </div>
                                <div class=\"ms-auto\">Sisa stock: <b id=\"stock\">".$produk["stock"]."</b>
                                </div>
                            </div>
                            <div class=\"prev-stock d-flex\" style='visibility: hidden'>
                                <div>Stock Akhir</div>
                                <div class=\"d-flex ms-auto\">
                                    <div>
                                        <b id='stock-akhir'>".$produk["stock"]."</b>
                                    </div>
                                </div>
                            </div>
                             <div><select id=\"katalog\" type=\"text\" class=\"form-select\" name=\"katalog\" disabled>";
        while ($katalog = mysqli_fetch_array($array_katalog)) {
            echo "<option ".(($katalog['id_katalog'] == $produk['id_katalog']) ? 'selected' : '')." value=".$katalog['id_katalog'].">".$katalog['nama_katalog']."</option>";
        };
        echo "</select></div>
                            <div class=\"submit\"><button name='submit'>Edit</button></div>
                        </div>
       ";
    } else {
        echo "
              <div class=\"action-card\">
                            <div class=\"labelAturJumlah\">Atur jumlah</div>
                            <div class=\"jumlah-order d-flex align-items-center\">
                                <div class=\"jumlah-editor d-flex align-items-center\">
                                    <div>
                                        <button type=\"button\" onclick=\"jumlahOrder('minus')\"><svg class=\"minus-editor\"
                                                viewBox=\"0 0 24 24\" width=\"18px\" height=\"18px\"
                                                style=\"display: inline-block; vertical-align: middle;\">
                                                <path d=\"M19 13H5c-.6 0-1-.4-1-1s.4-1 1-1h14c.6 0 1 .4 1 1s-.4 1-1 1z\">
                                                </path>
                                            </svg></button>
                                    </div>
                                    <div>
                                        <input class=\"jumlah form-control\" name=\"jumlah\" type=\"number\" min=\"0\"
                                            value=\"1\">
                                    </div>
                                    <div>
                                        <button type=\"button\" onclick=\"jumlahOrder('plus')\"><svg class=\"plus-editor\"
                                                viewBox=\"0 0 24 24\" width=\"18px\" height=\"18px\"
                                                style=\"display: inline-block; vertical-align: middle;\">
                                                <path
                                                    d=\"M19 11h-6V5a1 1 0 00-2 0v6H5a1 1 0 000 2h6v6a1 1 0 002 0v-6h6a1 1 0 000-2z\">
                                                </path>
                                            </svg></button>
                                    </div>
                                </div>
                                <div class=\"ms-auto\">Sisa stock: <b id=\"stock\">".$produk["stock"]."</b>
                                </div>
                            </div>
                           <div class=\"sub-total d-flex\">
                                <div>Subtotal</div>
                                <div class=\"d-flex ms-auto\">
                                    <div><b>Rp&nbsp</b></div>
                                    <div>
                                        <b id='subTotal'>".$produk['harga']."</b>
                                    </div>
                                </div>
                            </div>
                            <div class=\"submit\"><button name='submit'>Beli Sekarang</button></div>
                        </div>
";
    }
}