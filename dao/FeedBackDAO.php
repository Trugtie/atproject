<?php
include dirname(__DIR__)."/util/connectDB.php";
class FeedBackDAO{
    
    public static function getAllFeedBack($conn)
    {
        $statement = $conn->prepare("select * from feedback");
        $statement->execute();
        $feedbacks=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $feedbacks;
    }

    public static function getTenKhachHang($makh, $conn)
    {
        $statement=$conn->prepare("select ten from khachhang where makh='$makh'");
        $statement->execute();
        $user=$statement->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    public static function deleteFeedBack($mafb, $conn){
        $statement = $conn->prepare("delete from feedback where mafb=$mafb");
        $statement->execute();        
    }

    public static function getAllFeedBackSanPham($masp, $conn){
        $statement = $conn->prepare("select * from feedback where masp=$masp");
        $statement->execute();
        $feedbacks=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $feedbacks;
    }

    public static function insertFeedback($mota, $makh, $masp, $conn)
    {
        $statement = $conn->prepare("insert into feedback(mota,makh,masp) 
        values(:mota,:makh,:masp)");
        $statement->bindValue(':mota', $mota);
        $statement->bindValue(':makh', $makh);
        $statement->bindValue(':masp', $masp);
        $statement->execute();
    }
}

?>