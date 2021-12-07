<?php
include dirname(__DIR__)."/util/connectDB.php";

class ProductDAO{
    public static function getAllHang($conn){
        $statement = $conn->prepare("select * from hang");
        $statement->execute();
        $hang = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $hang;
    }

    public static function insertLaptop($laptop,$conn){
        $statement = $conn->prepare("insert into laptop(tensp,mota,soluong,hinh,gia,loaisp,tinhtrang,trongluong,manhinh,ocung,vga,ram,cpu,pin,mausac,mahang,maloaimay)
        values(:tensp,:mota,:soluong,:hinh,:gia,:loaisp,:tinhtrang,:trongluong,:manhinh,:ocung,:vga,:ram,:cpu,:pin,:mausac,:mahang,:maloaimay)");
        $statement->bindValue(':tensp',$laptop->getTenSp());
        $statement->bindValue(':mota',$laptop->getMota());
        $statement->bindValue(':soluong',$laptop->getSoluong());
        $statement->bindValue(':hinh',$laptop->getHinh());
        $statement->bindValue(':gia',$laptop->getGia());
        $statement->bindValue(':loaisp',$laptop->getLoaisp());
        $statement->bindValue(':tinhtrang',$laptop->getTinhtrang());
        $statement->bindValue(':trongluong',$laptop->getTrongLuong());
        $statement->bindValue(':manhinh',$laptop->getManHinh());
        $statement->bindValue(':ocung',$laptop->getOCung());
        $statement->bindValue(':vga',$laptop->getVga());
        $statement->bindValue(':ram',$laptop->getRam());
        $statement->bindValue(':cpu',$laptop->getCpu());
        $statement->bindValue(':pin',$laptop->getPin());
        $statement->bindValue(':mausac',$laptop->getMauSac());
        $statement->bindValue(':mahang',$laptop->getMahang());
        $statement->bindValue(':maloaimay',$laptop->getMaLoaiMay());
        $statement->execute();
    }

    public static function updateLaptop($laptop,$masp,$conn){
        $statement = $conn->prepare("update laptop
        set tensp=:tensp,mota=:mota,soluong=:soluong,hinh=:hinh,gia=:gia,loaisp=:loaisp,tinhtrang=:tinhtrang,trongluong=:trongluong,manhinh=:manhinh,ocung=:ocung,vga=:vga,ram=:ram,cpu=:cpu,pin=:pin,mausac=:mausac,mahang=:mahang,maloaimay=:maloaimay where masp=:masp");
        $statement->bindValue(':tensp',$laptop->getTenSp());
        $statement->bindValue(':mota',$laptop->getMota());
        $statement->bindValue(':soluong',$laptop->getSoluong());
        $statement->bindValue(':hinh',$laptop->getHinh());
        $statement->bindValue(':gia',$laptop->getGia());
        $statement->bindValue(':loaisp',$laptop->getLoaisp());
        $statement->bindValue(':tinhtrang',$laptop->getTinhtrang());
        $statement->bindValue(':trongluong',$laptop->getTrongLuong());
        $statement->bindValue(':manhinh',$laptop->getManHinh());
        $statement->bindValue(':ocung',$laptop->getOCung());
        $statement->bindValue(':vga',$laptop->getVga());
        $statement->bindValue(':ram',$laptop->getRam());
        $statement->bindValue(':cpu',$laptop->getCpu());
        $statement->bindValue(':pin',$laptop->getPin());
        $statement->bindValue(':mausac',$laptop->getMauSac());
        $statement->bindValue(':mahang',$laptop->getMahang());
        $statement->bindValue(':maloaimay',$laptop->getMaLoaiMay());
        $statement->bindValue(':masp',$masp);
        $statement->execute();
    }

    public static function updateLaptopWithoutImage($laptop,$masp,$conn){
        $statement = $conn->prepare("update laptop
        set tensp=:tensp,mota=:mota,soluong=:soluong,gia=:gia,loaisp=:loaisp,tinhtrang=:tinhtrang,trongluong=:trongluong,manhinh=:manhinh,ocung=:ocung,vga=:vga,ram=:ram,cpu=:cpu,pin=:pin,mausac=:mausac,mahang=:mahang,maloaimay=:maloaimay where masp=:masp");
        $statement->bindValue(':tensp',$laptop->getTenSp());
        $statement->bindValue(':mota',$laptop->getMota());
        $statement->bindValue(':soluong',$laptop->getSoluong());
        $statement->bindValue(':gia',$laptop->getGia());
        $statement->bindValue(':loaisp',$laptop->getLoaisp());
        $statement->bindValue(':tinhtrang',$laptop->getTinhtrang());
        $statement->bindValue(':trongluong',$laptop->getTrongLuong());
        $statement->bindValue(':manhinh',$laptop->getManHinh());
        $statement->bindValue(':ocung',$laptop->getOCung());
        $statement->bindValue(':vga',$laptop->getVga());
        $statement->bindValue(':ram',$laptop->getRam());
        $statement->bindValue(':cpu',$laptop->getCpu());
        $statement->bindValue(':pin',$laptop->getPin());
        $statement->bindValue(':mausac',$laptop->getMauSac());
        $statement->bindValue(':mahang',$laptop->getMahang());
        $statement->bindValue(':maloaimay',$laptop->getMaLoaiMay());
        $statement->bindValue(':masp',$masp);
        $statement->execute();
    }

    public static function getAllLaptop($conn){
        $statement = $conn->prepare("select * from laptop");
        $statement->execute();
        $laptops=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $laptops;
    }

    public static function getLaptop($masp,$conn){
        $statement=$conn->prepare("select * from laptop where masp=$masp");
        $statement->execute();
        $laptop=$statement->fetch(PDO::FETCH_ASSOC);
        return $laptop;
    }

    public static function deleteLaptop($masp,$conn){
        $statement=$conn->prepare("delete from laptop where masp=$masp");
        $statement->execute();
    }
}