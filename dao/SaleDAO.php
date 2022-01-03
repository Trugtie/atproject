<?php
include dirname(__DIR__) . "/util/connectDB.php";
class SaleDAO
{
    public static function findSale( $makm, $conn)
    {
        $statement = $conn->prepare("select makm,tenkm,mota,giatrigiam,DATE_FORMAT(ngaybd, '%d-%m-%Y') as ngaybd, DATE_FORMAT(ngaykt, '%d-%m-%Y') as ngaykt, hinh from dotkhuyenmai where makm = $makm");
        $statement->execute();
        $dotkhuyenmai = $statement->fetch(PDO::FETCH_ASSOC);
        return $dotkhuyenmai;
    }
}
