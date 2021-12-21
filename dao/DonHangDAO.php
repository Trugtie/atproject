<?php
include dirname(__DIR__)."/util/connectDB.php";

class DonHangDAO{

    public static function getAlldonhang($conn){
        $statement = $conn->prepare("select * from donhang");
        $statement->execute();
        $donhangs=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $donhangs;
    }

    public static function getdonhang($madh,$conn){
        $statement=$conn->prepare("select * from donhang where madh='$madh'");
        $statement->execute();
        $donhang=$statement->fetch(PDO::FETCH_ASSOC);
        return $donhang;
    }

    public static function deletedonhang($madh,$conn){
        $statement=$conn->prepare("delete from donhang where madh='$madh'");
        $statement->execute();
    }

    public static function getDonhangSanpham($madh, $masp, $conn){
        $statement=$conn->prepare("select * from donhang_sanpham where madh='$madh' and masp='$masp'");
        $statement->execute();
    }

    public static function getGiamGia($makm, $conn){
        $statement=$conn->prepare("select giatrigiam from dotkhuyenmai where makm='$makm'");
        $statement->execute();
        $donhang=$statement->fetch(PDO::FETCH_ASSOC);
        return $donhang;
    }
}
