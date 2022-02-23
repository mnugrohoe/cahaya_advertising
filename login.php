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


if(isset($row)){
  if (password_verify($password, $row['password'])) {
    $_SESSION['username'] = $row['username'];
    $_SESSION['role'] = $row['role'];
  } else {
    $_SESSION['errorLogin'] = true;
  }
} else {
  $_SESSION['errorLogin'] = true;
}
header("Location: index.php");
exit;

?>