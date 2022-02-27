<?php
session_start();
$path = $_SESSION['path'];
$_SESSION = [];
session_unset();
session_destroy();
header('Location: '.$path);
exit;
