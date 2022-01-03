<?php
include dirname(__DIR__)."/util/connectDB.php";

class AccessoryDAO{
    public static function getAllHang($conn){
        //Lấy all dữ liệu hãng để load combobox
        $statement = $conn->prepare("select * from hang");
        $statement->execute();
        $hang = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $hang;
    }

    public static function getAllLoaiPhuKien($conn){
        //Lấy all dữ liệu loại phụ kiện để load combobox
        $statement = $conn->prepare("select * from loaiphukien");
        $statement->execute();
        $loaipk = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $loaipk;
    }

    public static function insertPhuKien($phukien,$conn){
        //Thêm 1 phụ kiện vào csdl, hình lưu dạng đường dẫn
        $statement = $conn->prepare("insert into phukien(tensp,mota,soluong,hinh,gia,loaisp,tinhtrang,mahang,maloaipk)
        values(:tensp,:mota,:soluong,:hinh,:gia,:loaisp,:tinhtrang,:mahang,:maloaipk)");
        $statement->bindValue(':tensp',$phukien->getTenSp());
        $statement->bindValue(':mota',$phukien->getMota());
        $statement->bindValue(':soluong',$phukien->getSoluong());
        $statement->bindValue(':hinh',$phukien->getHinh());
        $statement->bindValue(':gia',$phukien->getGia());
        $statement->bindValue(':loaisp',$phukien->getLoaisp());
        $statement->bindValue(':tinhtrang',$phukien->getTinhtrang());
        $statement->bindValue(':mahang',$phukien->getMahang());
        $statement->bindValue(':maloaipk',$phukien->getMaLoaiPk());
        $statement->execute();
    }

    public static function updatePhuKien($phukien,$masp,$conn){
        //cập nhật phụ kiện có hình
        $statement = $conn->prepare("update phukien
        set tensp=:tensp,mota=:mota,soluong=:soluong,hinh=:hinh,gia=:gia,loaisp=:loaisp,tinhtrang=:tinhtrang,mahang=:mahang,maloaipk=:maloaipk where masp=:masp");
        $statement->bindValue(':tensp',$phukien->getTenSp());
        $statement->bindValue(':mota',$phukien->getMota());
        $statement->bindValue(':soluong',$phukien->getSoluong());
        $statement->bindValue(':hinh',$phukien->getHinh());
        $statement->bindValue(':gia',$phukien->getGia());
        $statement->bindValue(':loaisp',$phukien->getLoaisp());
        $statement->bindValue(':tinhtrang',$phukien->getTinhtrang());
        $statement->bindValue(':mahang',$phukien->getMahang());
        $statement->bindValue(':maloaipk',$phukien->getMaLoaiPk());
        $statement->bindValue(':masp',$masp);
        $statement->execute();
    }

    public static function updatePhuKienWithoutImage($phukien,$masp,$conn){
        //cập nhật phụ kiện không có hình
        $statement = $conn->prepare("update phukien
        set tensp=:tensp,mota=:mota,soluong=:soluong,gia=:gia,loaisp=:loaisp,tinhtrang=:tinhtrang,mahang=:mahang,maloaipk=:maloaipk where masp=:masp");
        $statement->bindValue(':tensp',$phukien->getTenSp());
        $statement->bindValue(':mota',$phukien->getMota());
        $statement->bindValue(':soluong',$phukien->getSoluong());
        $statement->bindValue(':gia',$phukien->getGia());
        $statement->bindValue(':loaisp',$phukien->getLoaisp());
        $statement->bindValue(':tinhtrang',$phukien->getTinhtrang());
        $statement->bindValue(':mahang',$phukien->getMahang());
        $statement->bindValue(':maloaipk',$phukien->getMaLoaiPk());
        $statement->bindValue(':masp',$masp);
        $statement->execute();
    }

    public static function getAllPhuKien($conn){
        //lấy all dữ liệu phụ kiện để load quản lý sản phẩm
        $statement = $conn->prepare("select * from phukien");
        $statement->execute();
        $phukiens=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $phukiens;
    }

    public static function getAllPhuKienShowcase($conn){
        //lấy all phụ kiện để load showcase bán hàng với tình trạng còn hàng thì mới lấy
        $statement = $conn->prepare("select pk.gia, pk.hinh, pk.loaisp, pk.masp, h.tenhang, pk.maloaipk, pk.masp, pk.mota, pk.soluong, pk.tensp, pk.tinhtrang from phukien as pk join hang as h on pk.mahang=h.mahang where tinhtrang='Còn hàng';");
        $statement->execute();
        $phukiens=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $phukiens;
    }

    public static function getPhuKien($masp,$conn){
        //lấy một cái phụ kiện qua mã pk
        $statement=$conn->prepare("select * from phukien where masp=$masp");
        $statement->execute();
        $phukien=$statement->fetch(PDO::FETCH_ASSOC);
        return $phukien;
    }

    public static function getPhuKienDetail($masp,$conn){
        //lấy dữ liệu chi tiết của một phụ kiện có tên hàng, tên loại pk
        $statement=$conn->prepare("select pk.gia, pk.hinh, pk.loaisp, pk.masp, h.tenhang, pk.maloaipk, pk.masp, pk.mota, pk.soluong, pk.tensp, pk.tinhtrang from phukien as pk join hang as h on pk.mahang=h.mahang where masp=$masp");
        $statement->execute();
        $phukien=$statement->fetch(PDO::FETCH_ASSOC);
        return $phukien;
    }

    public static function deletePhuKien($masp,$conn){
        //xóa phụ kiện qua mã
        $statement=$conn->prepare("delete from phukien where masp=$masp");
        $statement->execute();
    }

    public static function resetAI($conn){
        //reset auto increment bảng phụ kiện trước khi thêm một phụ kiện
        $statement=$conn->prepare("select max(masp) as max from sanpham"); //lấy cái mã sp lớn nhất trong bảng sản phẩm để làm mốc reset
        $statement->execute();
        $maxID = $statement->fetch(PDO::FETCH_ASSOC);
        $max = $maxID['max']+1;
        $statement2=$conn->prepare("alter table phukien AUTO_INCREMENT=$max"); //reset auto increment bảng phụ kiện
        $statement2->execute();
    }
}