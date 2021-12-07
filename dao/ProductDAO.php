<?php
include dirname(__DIR__)."/util/connectDB.php";

class ProductDAO{
    public static function getAllHang($conn){
        $statement = $conn->prepare("select * from hang");
        $statement->execute();
        $hang = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $hang;
    }
}