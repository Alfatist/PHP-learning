<?php
$host = 'localhost';
$database = 'sistema_eventos';
$user = 'root';
$password = ''; 

$mysqli = mysqli_init();
mysqli_options($mysqli, MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
if (!mysqli_real_connect($mysqli, $host, $user, $password, $database)) {
    die("DB connect error: " . mysqli_connect_error());
}
mysqli_set_charset($mysqli, 'utf8mb4');

function h($s){ return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }