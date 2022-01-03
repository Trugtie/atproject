<?php
include dirname(__DIR__) . "/util/connectDB.php";
class OrderDAO
{
    public static function insertOrder($nguoinhan, $sdt, $diachigiao, $ptthanhtoan, $makh, $makm, $tongtien, $conn)
    {
        //thêm một đơn hàng không có khuyến mãi khi khách đặt hàng
        $statement = $conn->prepare("insert into donhang(nguoinhan,sdt,diachigiao,ptthanhtoan,tongtien,makh,makm)
        values(:nguoinhan,:sdt,:diachigiao,:ptthanhtoan,:tongtien,:makh,:makm)");
        $statement->bindValue(':nguoinhan', $nguoinhan);
        $statement->bindValue(':sdt', $sdt);
        $statement->bindValue(':diachigiao', $diachigiao);
        $statement->bindValue(':ptthanhtoan', $ptthanhtoan);
        $statement->bindValue(':tongtien', $tongtien);
        $statement->bindValue(':makh', $makh);
        $statement->bindValue(':makm', $makm);
        $statement->execute();
    }

    public static function insertOrderWithoutSale($nguoinhan, $sdt, $diachigiao, $ptthanhtoan, $makh, $tongtien, $conn)
    {
        //thêm một đơn hàng có khuyến mãi khi khách đặt hàng
        $statement = $conn->prepare("insert into donhang(nguoinhan,sdt,diachigiao,ptthanhtoan,tongtien,makh)
        values(:nguoinhan,:sdt,:diachigiao,:ptthanhtoan,:tongtien,:makh)");
        $statement->bindValue(':nguoinhan', $nguoinhan);
        $statement->bindValue(':sdt', $sdt);
        $statement->bindValue(':diachigiao', $diachigiao);
        $statement->bindValue(':ptthanhtoan', $ptthanhtoan);
        $statement->bindValue(':tongtien', $tongtien);
        $statement->bindValue(':makh', $makh);
        $statement->execute();
    }

    public static function insertDetailOrder($masp, $madon, $soluong, $thanhtien, $conn)
    {
        //thêm các dòng chi tiết của một đơn hàng khi khách đặt hàng dựa vào data trong giỏ hàng
        $statement = $conn->prepare("insert into donhang_sanpham(masp, madon, soluong, thanhtien)
        values(:masp, :madon, :soluong, :thanhtien)");
        $statement->bindValue(':masp', $masp);
        $statement->bindValue(':madon', $madon);
        $statement->bindValue(':soluong', $soluong);
        $statement->bindValue(':thanhtien', $thanhtien);
        $statement->execute();
    }

    public static function getNewOrder($conn)
    {
        //lấy cái đơn hàng mới nhất
        $statement = $conn->prepare("select madon from donhang order by madon desc limit 1");
        $statement->execute();
        $madon = $statement->fetch(PDO::FETCH_ASSOC);
        return $madon;
    }

    public static function getOrder($madon,$conn){
        //lấy data một đơn hàng, dữ liệu ngày tháng định dạng theo d/m/Y
        $statement = $conn->prepare("select madon,DATE_FORMAT(ngaytao, '%d/%m/%Y') as ngaytao,nguoinhan,tinhtrang,sdt,diachigiao,ptthanhtoan,tongtien,makh,makm from donhang where madon=$madon");
        $statement->execute();
        $order = $statement->fetch(PDO::FETCH_ASSOC);
        return $order;
    }

    public static function checkExistDonHangSanPham($masp,$conn){
        //kiểm tra ràng buộc sản phẩm có nằm trong đơn hàng nào chưa trước khi xóa sản phẩm, qua bảng donhang_sanpham
        $statement = $conn->prepare("select masp from donhang_sanpham where masp=$masp");
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if(!empty($row)) return true;
        return false;
    }

    public static function getDetailsOrder($madon,$conn){
        //lấy các dòng chi tiết của một đơn hàng để show
        $statement = $conn->prepare("select d.masp, sp.hinh, sp.tensp, sp.gia, d.soluong, d.thanhtien,sp.loaisp from donhang_sanpham as d join sanpham as sp on d.masp=sp.masp where d.madon=$madon");
        $statement->execute();
        $detail = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $detail;
    }

    public static function getOrders($conn){
        //lấy all data đơn hàng để show chức năng quản lý đơn hàng, dữ liệu ngày tháng định dạng theo d/m/Y
        $statement = $conn->prepare("select madon,DATE_FORMAT(ngaytao, '%d/%m/%Y') as ngaytao,nguoinhan,tinhtrang,sdt,diachigiao,ptthanhtoan,tongtien,makh,makm from donhang");
        $statement->execute();
        $orders = $statement->fetchALL(PDO::FETCH_ASSOC);
        return $orders;
    }

    public static function deleteOrder($madon,$conn){
        //xóa một đơn hàng thông qua mã
        $statement = $conn->prepare("delete from donhang where madon=$madon");
        $statement->execute();
    }

    public static function browseOrder($madon,$conn){
        //cập nhật lại tình trạng đơn hàng thành đã giao khi admin ấn nút duyệt đơn
        $statement = $conn->prepare("update donhang set tinhtrang='Đã giao' where madon=$madon");
        $statement->execute();
    }

    public static function adminBrowseOrder($madon,$maad,$conn){
        //khi admin ấn nút duyệt đơn thì thêm dữ liệu vào bảng ad_donhang để đảm bảo ràng buộc trong database
        $statement = $conn->prepare("insert into ad_donhang(maad,madon) values(:maad,:madon)");
        $statement->bindValue(":maad",$maad);
        $statement->bindValue(":madon",$madon);
        $statement->execute();
    }

    public static function getSoLuongSanPhamDaBan($conn){
        //lấy số lượng sản phẩm đã bán ra dựa vào thông tin số lượng trong bảng donhang_sanpham
        $statement = $conn->prepare("select sum(soluong) as soluong from donhang_sanpham");
        $statement->execute();
        $soluong = $statement->fetch(PDO::FETCH_ASSOC);
        return $soluong;
    }

    public static function getSoLuongDonHangChuaGiao($conn){
        //lấy số lượng đơn hàng chưa giao dựa vào bảng đơn hàng
        $statement = $conn->prepare("select tinhtrang,count(tinhtrang) as soluong from donhang GROUP BY tinhtrang HAVING tinhtrang LIKE 'Chưa giao'");
        $statement->execute();
        $soluong = $statement->fetch(PDO::FETCH_ASSOC);
        return $soluong;
    }

    public static function getDoanhThu($conn){
        //lấy tổng doanh thu của shop
        $statement = $conn->prepare("select sum(tongtien) as doanhthu from donhang");
        $statement->execute();
        $doanhThu = $statement->fetch(PDO::FETCH_ASSOC);
        return $doanhThu;
    }
}
