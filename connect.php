<?php
$servername = "localhost";
$database = "cahaya_adv";
$username = "root";
$password = "";

$mysqli = mysqli_connect($servername, $username, $password, $database);


function add($katalog_id){
  echo "
  <div id='add-item' class='col catalog-item'>
    <div class='card' onclick='location.href=`add.php?katalog=$katalog_id`;'>
      <div class='card-img-top add'>
        <i class='bi bi-plus-square'></i>
      </div>
      <div class='card-footer'>
        <p>Add</p>
      </div>
    </div>
  </div>
  "
  ;}
?>