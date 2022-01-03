<?php
include dirname(__DIR__)."/util/connectDB.php";

class KhuyenMaiDAO{
    
    public static function insertKhuyenmai($khuyenmai,$conn){
        //thêm 1 khuyến mãi có hình
        $statement = $conn->prepare("insert into dotkhuyenmai(tenkm,mota,giatrigiam,hinh,ngaybd,ngaykt)
        values(:tenkm,:mota,:giatrigiam,:hinh,:ngaybd,:ngaykt)");
        $statement->bindValue(':tenkm',$khuyenmai->getTenKm());
        $statement->bindValue(':mota',$khuyenmai->getMota());
        $statement->bindValue(':giatrigiam',$khuyenmai->getGiatrigiam());
        $statement->bindValue(':hinh',$khuyenmai->getHinh());
        $statement->bindValue(':ngaybd',$khuyenmai->getNgaybd());
        $statement->bindValue(':ngaykt',$khuyenmai->getNgaykt());
        $statement->execute();
    }

    public static function updateKhuyenmai($khuyenmai,$makm,$conn){
        //cập nhật khuyến mãi có hình
        $statement = $conn->prepare("update dotkhuyenmai
        set tenkm=:tenkm,mota=:mota,giatrigiam=:giatrigiam,hinh=:hinh,ngaybd=:ngaybd,ngaykt=:ngaykt where makm=:makm");
        $statement->bindValue(':tenkm',$khuyenmai->getTenKm());
        $statement->bindValue(':mota',$khuyenmai->getMota());
        $statement->bindValue(':giatrigiam',$khuyenmai->getGiatrigiam());
        $statement->bindValue(':hinh',$khuyenmai->getHinh());
        $statement->bindValue(':ngaybd',$khuyenmai->getNgaybd());
        $statement->bindValue(':ngaykt',$khuyenmai->getNgaykt());
        $statement->bindValue(':makm',$makm);
        $statement->execute();
    }

    public static function updatKhuyenmaiWithoutImage($khuyenmai,$makm,$conn){
        //cập nhật khuyến mãi không hình
        $statement = $conn->prepare("update dotkhuyenmai
        set tenkm=:tenkm,mota=:mota,giatrigiam=:giatrigiam,ngaybd=:ngaybd,ngaykt=:ngaykt where makm=:makm");
        $statement->bindValue(':tenkm',$khuyenmai->getTenKm());
        $statement->bindValue(':mota',$khuyenmai->getMota());
        $statement->bindValue(':giatrigiam',$khuyenmai->getGiatrigiam());
        $statement->bindValue(':ngaybd',$khuyenmai->getNgaybd());
        $statement->bindValue(':ngaykt',$khuyenmai->getNgaykt());
        $statement->bindValue(':makm',$makm);
        $statement->execute();
    }

    public static function getAllKhuyenMai($conn){
        //lấy all data khuyễn mãi để làm chức năng quản lý khuyễn mãi, dữ liệu ngày tháng định dạng theo d/m/Y
        $statement = $conn->prepare("select makm,tenkm,mota,giatrigiam, DATE_FORMAT(ngaybd, '%d/%m/%Y') as ngaybd, DATE_FORMAT(ngaykt, '%d/%m/%Y') as ngaykt, hinh from dotkhuyenmai");
        $statement->execute();
        $khuyenmais=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $khuyenmais;
    }

    public static function getKhuyenMai($makm,$conn){
        //lấy một khuyến mãi qua mã, dữ liệu ngày tháng định dạng theo d/m/Y
        $statement=$conn->prepare("select makm,tenkm,mota,giatrigiam, DATE_FORMAT(ngaybd, '%d/%m/%Y') as ngaybd, DATE_FORMAT(ngaykt, '%d/%m/%Y') as ngaykt, hinh from dotkhuyenmai where makm='$makm'");
        $statement->execute();
        $khuyenmai=$statement->fetch(PDO::FETCH_ASSOC);
        return $khuyenmai;
    }

    public static function deleteKhuyenmai($makm,$conn){
        //xóa khuyến mãi dựa vào mã
        $statement=$conn->prepare("delete from dotkhuyenmai where makm='$makm'");
        $statement->execute();
    }

    public static function adminCreateEvent($makm,$maad,$conn){
        //thêm data vào bảng ad_dotkm để đảm bảo ràng buộc trong database
        $statement = $conn->prepare("insert into ad_dotkm(maad,makm) values(:maad,:makm)");
        $statement->bindValue(":maad",$maad);
        $statement->bindValue(":makm",$makm);
        $statement->execute();
    }

    public static function getNewEvent($conn)
    {
        //lấy data khuyến mãi mới nhất vừa thêm
        $statement = $conn->prepare("select makm from dotkhuyenmai order by makm desc limit 1");
        $statement->execute();
        $makm = $statement->fetch(PDO::FETCH_ASSOC);
        return $makm;
    }

    public static function checkKhuyenMaiDonHang($id,$conn)
    {
        //kiểm tra khuyến mãi có nằm trong đơn hàng nào không để đảm bảo ràng buộc trước khi xóa
        $statement = $conn->prepare("select * from donhang where makm='$id'");
        $statement->execute();
        $km = $statement->fetch(PDO::FETCH_ASSOC);
        if(!empty($km))return true;
        return false;
    }

}