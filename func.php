<?php
if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
} else {
    $role = 'guest';
};

function ed($string, $action = 'e')
{
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'y<fnXkGU6E"JcLU;PNKp(qJ#Pz!4(%';
    $secret_iv='QD^sp]<K2eSU_!T)686>;rP' ;
    $key=hash(
        'sha256',
        $secret_key
    );
    $iv=substr(hash('sha256', $secret_iv), 0, 16);
    if ($action=='e') {
        $output=openssl_encrypt(
            $string,
            $encrypt_method,
            $key,
            0,
            $iv
        );
        $output=base64_encode($output);
    } elseif ($action=='d') {
        $output=openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}

function getNama()
{
    global $mysqli;
    $username = $_SESSION['username'];
    $query = "SELECT * FROM `pelanggan` WHERE username = '$username'";
    $pelanggan = mysqli_fetch_assoc(mysqli_query($mysqli, $query));
    return $pelanggan['nama'];
}
