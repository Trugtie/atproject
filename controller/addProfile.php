<?php

/** @var $pdo \PDO */
    require "connectDB.php";

// function updateKhachHang($user)
// {
//     require "connectDB.php";
//     $ten = $user->get_ten();
//     $ho = $user->get_ho();
//     $sdt = $user->get_sdt();
//     $diachi = $user->get_diachi();
    $statement = $pdo->prepare("update khachhang set ho=:ho, ten=:ten, sdt=:sdt, diachi=:diachi 
where makh=(select makh from khachhang where username ='$username')");
    $statement->bindValue(':ho', $ho);
    $statement->bindValue(':ten', $ten);
    $statement->bindValue(':sdt', ($sdt));
    $statement->bindValue(':diachi', ($diachi));
    $statement->execute();
    // $user = $statement->fetch();

    // session_start();
    // $_SESSION["ten"] = $user['ten'];
    // $_SESSION["ho"] = $user['ho'];
    // $_SESSION["sdt"] = $user['sdt'];
    // $_SESSION["diachi"] = $user['diachi'];

    header('Location: ../view/accountinformation.php');

