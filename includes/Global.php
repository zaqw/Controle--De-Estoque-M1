<?php
session_start () ;

function conexao() {
    $user ="root";
    $passwd="usbw";
    $dbname ="mydb";
    $host= "127.0.0.1:3307";
    $pdo = new PDO("mysql:host={$host};dbname={$dbname}", $user, $passwd);
    return $pdo;
       
}
