<?php
include 'connectDB.php';
$statement = $pdo->prepare("select * from admin where username='$username'");
$statement->execute();
$user = $statement->fetch();