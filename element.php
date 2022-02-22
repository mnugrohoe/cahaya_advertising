<?php 
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
  echo "
  <div id='add-item' class='col catalog-item'>
    <div class='card' onclick='location.href`add.php?katalog=$katalog`;'>
      <div class='card-img-top add'>
        <i class='bi bi-plus-square'></i>
      </div>
      <div class='card-footer'>
        <p>Add</p>
      </div>
    </div>
  </div>
  ";
}
?>