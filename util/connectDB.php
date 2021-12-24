<?php
$servername="localhost";
$database="atproject";
$username="root";
$password="";
try{
    $conn = new PDO("mysql:host=$servername;dbname=$database",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Conenntion failed!" . $e->getMessage();
    exit();
}