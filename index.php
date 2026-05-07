<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = getenv('MYSQLHOST');
$user = getenv('MYSQLUSER');
$pass = getenv('MYSQLPASSWORD');
$db   = getenv('MYSQLDATABASE');
$port = getenv('MYSQLPORT');

$koneksi = mysqli_connect(
    $host,
    $user,
    $pass,
    $db,
    $port
);

if(!$koneksi){
    die("Koneksi gagal : " . mysqli_connect_error());
}
?>
