<?php
require "connectDB.php";
$statement = $pdo->prepare("select * from khachhang where username='$username'");
$statement->execute();
$user = $statement->fetch();
