<?php
include '../../util/connectDB.php';
$statement = $conn->prepare("select * from admin where username='$username'"); // lấy thông tin admin trong database
$statement->execute();
$user = $statement->fetch();

