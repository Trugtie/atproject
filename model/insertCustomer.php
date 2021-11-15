
<?php
/** @var $pdo \PDO */
require "connectDB.php";

$statement = $pdo->prepare("insert into khachhang(email,username,password)
    values(:email,:username,:password)");
$statement->bindValue(':email', $email);
$statement->bindValue(':username', $username);
$statement->bindValue(':password', sha1($password));
$statement->execute();
header('Location: ../index.php');
