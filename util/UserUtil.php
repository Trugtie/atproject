<?php
include './connectDB.php';
class UserUtil{
    
}
$statement = $pdo->prepare("select * from khachhang where username='$username'");
$statement->execute();
$user = $statement->fetch();