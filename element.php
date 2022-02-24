<?php
include_once('connect.php');
require('func.php');

if(isset($_SESSION['role'])){
  $role = $_SESSION['role'];
} else {
  $role = 'guest';
};

function formLogin(){
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
      <button type='submit' name='login' class='btn btn-primary'>Submit</button>
    </form>
  </div>
  ";
}

function addItem($katalog){
  global $role;
  if($role == "admin"){
  echo "
    <div id='add-item' class='col catalog-item'>
      <div class='card card-add' onclick=\"location.href='add.php?katalog=".ed($katalog)."'\">
        <div class='card-img-top add'>
          <i class='bi bi-plus-square'></i>
        </div>
        <div class='card-footer'>
          <p>Add</p>
        </div>
      </div>
    </div>
    ";
  ;}
}

function readKatalog($katalog){
  global $mysqli;
  $query =  "SELECT * FROM `produk` WHERE id_katalog = $katalog ORDER BY id_produk DESC";
  $data_produk = mysqli_query($mysqli, $query);

   while($produk = mysqli_fetch_array($data_produk)){
     echo "
         <div class='col catalog-item' onclick=\"location.href='details.php?id=".ed($produk['id_produk'])."' \">
           <div class='card'>
             <img class='card-img-top' src='img/product/".$produk['gambar']."' alt='".str_replace(' ', '-',strtolower($produk['nama_produk']))."' />
             <div class='card-footer'>
               <p>".$produk['nama_produk']."</p>
             </div>
           </div>
         </div>
     ";
   }
}

function userArea(){
  global $role;
  if($role == 'guest'){
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

function loginMenu(){
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

?>