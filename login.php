<?php 
session_start();

if(!isset($_POST['login'])){
  header('Location: index.php');
  exit;
} else {
  $username = $_POST['username'];
  $password = $_POST['password'];
}
include_once('connect.php');

$result = mysqli_query($mysqli, "SELECT * FROM login WHERE username = '$username'");

$row = mysqli_fetch_assoc($result);

$hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';

if (password_verify('rasmuslerdorf', $hash)) {
echo 'Password is valid!';
} else {
echo 'Invalid password.';
}

if(isset($row)){
  if (password_verify($password, $row['password'])) {
  echo 'Password is valid!';
  } else {
  echo 'Invalid password.';
  }
    // $_SESSION['username'] = $row['username'];
    // $_SESSION['role'] = $row['role'];
    // print_r('login sukkses');
    // print_r($_SESSION);
} else {
  $_SESSION['errorLogin'] = true;
}
// header("Location: index.php");
// exit;

?>