<?php
include dirname(__DIR__) . "/util/connectDB.php";
class ProductDAO
{
    public static function getAllHang($conn)
    {
        //lấy all data hãng để show combobox
        $statement = $conn->prepare("select * from hang");
        $statement->execute();
        $hang = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $hang;
    }

    public static function insertLaptop($laptop, $conn)
    {
        //thêm 1 laptop có hình
        $statement = $conn->prepare("insert into laptop(tensp,mota,soluong,hinh,gia,loaisp,tinhtrang,trongluong,manhinh,ocung,vga,ram,cpu,pin,mausac,mahang,maloaimay)
        values(:tensp,:mota,:soluong,:hinh,:gia,:loaisp,:tinhtrang,:trongluong,:manhinh,:ocung,:vga,:ram,:cpu,:pin,:mausac,:mahang,:maloaimay)");
        $statement->bindValue(':tensp', $laptop->getTenSp()); //bindValue == bindParam gán dữ liệu vào các biến
        $statement->bindValue(':mota', $laptop->getMota());
        $statement->bindValue(':soluong', $laptop->getSoluong());
        $statement->bindValue(':hinh', $laptop->getHinh());
        $statement->bindValue(':gia', $laptop->getGia());
        $statement->bindValue(':loaisp', $laptop->getLoaisp());
        $statement->bindValue(':tinhtrang', $laptop->getTinhtrang());
        $statement->bindValue(':trongluong', $laptop->getTrongLuong());
        $statement->bindValue(':manhinh', $laptop->getManHinh());
        $statement->bindValue(':ocung', $laptop->getOCung());
        $statement->bindValue(':vga', $laptop->getVga());
        $statement->bindValue(':ram', $laptop->getRam());
        $statement->bindValue(':cpu', $laptop->getCpu());
        $statement->bindValue(':pin', $laptop->getPin());
        $statement->bindValue(':mausac', $laptop->getMauSac());
        $statement->bindValue(':mahang', $laptop->getMahang());
        $statement->bindValue(':maloaimay', $laptop->getMaLoaiMay());
        $statement->execute();
    }

    public static function updateLaptop($laptop, $masp, $conn)
    {
        //cập nhật laptop có hình
        $statement = $conn->prepare("update laptop
        set tensp=:tensp,mota=:mota,soluong=:soluong,hinh=:hinh,gia=:gia,loaisp=:loaisp,tinhtrang=:tinhtrang,trongluong=:trongluong,manhinh=:manhinh,ocung=:ocung,vga=:vga,ram=:ram,cpu=:cpu,pin=:pin,mausac=:mausac,mahang=:mahang,maloaimay=:maloaimay where masp=:masp");
        $statement->bindValue(':tensp', $laptop->getTenSp());
        $statement->bindValue(':mota', $laptop->getMota());
        $statement->bindValue(':soluong', $laptop->getSoluong());
        $statement->bindValue(':hinh', $laptop->getHinh());
        $statement->bindValue(':gia', $laptop->getGia());
        $statement->bindValue(':loaisp', $laptop->getLoaisp());
        $statement->bindValue(':tinhtrang', $laptop->getTinhtrang());
        $statement->bindValue(':trongluong', $laptop->getTrongLuong());
        $statement->bindValue(':manhinh', $laptop->getManHinh());
        $statement->bindValue(':ocung', $laptop->getOCung());
        $statement->bindValue(':vga', $laptop->getVga());
        $statement->bindValue(':ram', $laptop->getRam());
        $statement->bindValue(':cpu', $laptop->getCpu());
        $statement->bindValue(':pin', $laptop->getPin());
        $statement->bindValue(':mausac', $laptop->getMauSac());
        $statement->bindValue(':mahang', $laptop->getMahang());
        $statement->bindValue(':maloaimay', $laptop->getMaLoaiMay());
        $statement->bindValue(':masp', $masp);
        $statement->execute();
    }

    public static function updateLaptopWithoutImage($laptop, $masp, $conn)
    {
        //cập nhật laptop không hình
        $statement = $conn->prepare("update laptop
        set tensp=:tensp,mota=:mota,soluong=:soluong,gia=:gia,loaisp=:loaisp,tinhtrang=:tinhtrang,trongluong=:trongluong,manhinh=:manhinh,ocung=:ocung,vga=:vga,ram=:ram,cpu=:cpu,pin=:pin,mausac=:mausac,mahang=:mahang,maloaimay=:maloaimay where masp=:masp");
        $statement->bindValue(':tensp', $laptop->getTenSp());
        $statement->bindValue(':mota', $laptop->getMota());
        $statement->bindValue(':soluong', $laptop->getSoluong());
        $statement->bindValue(':gia', $laptop->getGia());
        $statement->bindValue(':loaisp', $laptop->getLoaisp());
        $statement->bindValue(':tinhtrang', $laptop->getTinhtrang());
        $statement->bindValue(':trongluong', $laptop->getTrongLuong());
        $statement->bindValue(':manhinh', $laptop->getManHinh());
        $statement->bindValue(':ocung', $laptop->getOCung());
        $statement->bindValue(':vga', $laptop->getVga());
        $statement->bindValue(':ram', $laptop->getRam());
        $statement->bindValue(':cpu', $laptop->getCpu());
        $statement->bindValue(':pin', $laptop->getPin());
        $statement->bindValue(':mausac', $laptop->getMauSac());
        $statement->bindValue(':mahang', $laptop->getMahang());
        $statement->bindValue(':maloaimay', $laptop->getMaLoaiMay());
        $statement->bindValue(':masp', $masp);
        $statement->execute();
    }

    public static function getAllLaptop($conn)
    {
        //lấy all data laptop để show chức năng quản lý sản phẩm
        $statement = $conn->prepare("select * from laptop");
        $statement->execute();
        $laptops = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $laptops;
    }

    public static function getAllLaptopWithType($conn, $type)
    {
        //lấy all data laptop dựa vào mã loại máy
        $statement = $conn->prepare("select * from laptop where maloaimay=$type");
        $statement->execute();
        $laptops = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $laptops;
    }

    public static function getAllLaptopShowcase($conn)
    {
        //lấy all data laptop còn hàng để làm showcase bán hàng, các laptop hết hình không show
        $statement = $conn->prepare("select * from laptop where tinhtrang='Còn hàng'");
        $statement->execute();
        $laptops = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $laptops;
    }

    public static function getAllLaptopWithTypeShowcase($conn, $type)
    {
        //lấy all data laptop còn hàng theo từng loại máy để làm showcase ở trang chủ
        $statement = $conn->prepare("select * from laptop where maloaimay=$type and tinhtrang='Còn hàng'");
        $statement->execute();
        $laptops = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $laptops;
    }

    public static function getLaptop($masp, $conn)
    {
        //lấy data một laptop thông qua mã
        $statement = $conn->prepare("select * from laptop where masp=$masp");
        $statement->execute();
        $laptop = $statement->fetch(PDO::FETCH_ASSOC);
        return $laptop;
    }

    public static function deleteLaptop($masp, $conn)
    {
        //delete laptop qua mã
        $statement = $conn->prepare("delete from laptop where masp=$masp");
        $statement->execute();
    }

    public static function deletePhukien($masp, $conn)
    {
        //delete phụ kiện qua mã
        $statement = $conn->prepare("delete from phukien where masp=$masp");
        $statement->execute();
    }

    public static function resetAI($conn)
    {
        //reset auto increment bảng laptop trước khi thêm một laptop mới
        $statement = $conn->prepare("select max(masp) as max from sanpham"); //lấy mã sp lớn nhất trong bảng sản phẩm để làm mốc reset
        $statement->execute();
        $maxID = $statement->fetch(PDO::FETCH_ASSOC);
        $max = $maxID['max'] + 1; //điểm reset
        $statement2 = $conn->prepare("alter table laptop AUTO_INCREMENT=$max"); //reset auto increment trong bảng laptop
        $statement2->execute();
    }

    public static function getProduct($masp, $conn)
    {
        //lấy data 1 sản phẩm qua mã
        $statement = $conn->prepare("select masp,hinh,tensp,gia,soluong,loaisp from sanpham where masp=$masp");
        $statement->execute();
        $product = $statement->fetch(PDO::FETCH_ASSOC);
        return $product;
    }

    public static function updateSoLuongSP($masp, $soluong, $tinhtrang, $conn)
    {
        //cập nhật lại  số lượng sản phẩm sau khi duyệt đơn
        $statement = $conn->prepare("update sanpham
        set soluong=:soluong,tinhtrang=:tinhtrang where masp=:masp");
        $statement->bindValue(':soluong', $soluong);
        $statement->bindValue(':tinhtrang', $tinhtrang);
        $statement->bindValue(':masp', $masp);
        $statement->execute();
    }

    public static function updateSoLuongLaptop($masp, $soluong, $tinhtrang, $conn)
    {
        // cập nhật số lượng của laptop vừa duyệt đơn
        $statement = $conn->prepare("update laptop
        set soluong=:soluong,tinhtrang=:tinhtrang where masp=:masp");
        $statement->bindValue(':soluong', $soluong);
        $statement->bindValue(':tinhtrang', $tinhtrang);
        $statement->bindValue(':masp', $masp);
        $statement->execute();
    }

    public static function updateSoLuongPhukien($masp, $soluong, $tinhtrang, $conn)
    {
        //cập nhật lại số lượng phụ kiện vừa duyệt đơn
        $statement = $conn->prepare("update phukien
        set soluong=:soluong,tinhtrang=:tinhtrang where masp=:masp");
        $statement->bindValue(':soluong', $soluong);
        $statement->bindValue(':tinhtrang', $tinhtrang);
        $statement->bindValue(':masp', $masp);
        $statement->execute();
    }

    public static function searchLaptop($words, $conn)
    {
        //câu truy vấn để làm chức năng duyệt laptop thông qua nhiều điều kiện dựa vào cụm từ search như: mã, giá, tên loại máy, tên hãng, cpu, ram, .... Chức năng này chưa hoàn thiện
        $statement = $conn->prepare("select l.masp, l.tensp, l.mota, l.soluong, l.hinh, l.tinhtrang, l.gia, lm.tenloai, l.trongluong, l.manhinh, l.ocung, l.vga, l.ram, l.cpu, l.pin, l.mausac, h.tenhang from laptop as l join hang as h on l.mahang = h.mahang join loaimay lm on l.maloaimay = lm.maloaimay where masp like '%$words%'  or  tensp like '%$words%' or mota  like '%$words%' or soluong  like '%$words%' or tinhtrang  like '%$words%' or gia  like '%$words%' or tenloai  like '%$words%' or trongluong  like '%$words%' or manhinh  like '%$words%' or ocung  like '%$words%' or vga  like '%$words%' or ram  like '%$words%' or cpu  like '%$words%' or pin  like '%$words%' or mausac  like '%$words%' or tenhang  like '%$words%' and tinhtrang = 'Còn hàng'");
        $statement->execute();
        $laptops = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $laptops;
    }

    public static function getSoLuongSanPhamConLai($conn){
        //lấy số lượng sản phẩm còn lại trong shop
        $statement = $conn->prepare("select sum(soluong) as soluong from sanpham");
        $statement->execute();
        $soluong = $statement->fetch(PDO::FETCH_ASSOC);
        return $soluong;
    }
}
