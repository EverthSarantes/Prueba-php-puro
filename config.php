<?php

$DB_HOST = 'localhost';
$DB_USER = 'everth';
$DB_PASS = 'everth';
$DB_Name = 'PruebaPhP';

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_Name);

if(mysqli_connect_errno())
{
    echo 'Error de conexion: '.mysqli_connect_error();
    exit();
}

?>