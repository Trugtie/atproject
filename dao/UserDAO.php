<?php
include dirname(__DIR__)."/util/connectDB.php";
class UserDAO
{
    public static function getUser($username, $pass, $conn)
    {
        //lấy data một user để làm chức năng login, lấy dựa vào username hoặc email cộng với password
        $statement = $conn->prepare("select * from khachhang where (username='$username' or email='$username')  and password='$pass'");
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    

    public static function getUserWithID($id,$conn)
    {
        //lấy data một user dựa vào mã khách hàng để làm chức năng hiển thị thông tin chi tiết khách hàng
        $statement = $conn->prepare("select * from khachhang where makh='$id'");
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public static function getUserWithEmail($email,$conn)
    {
        //lấy data user qua email đã đăng ký
        $statement = $conn->prepare("select * from khachhang where email='$email'");
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public static function getAllUser($conn)
    {
        //lấy all data user để làm chức năng quản lý khách hàng
        $statement = $conn->prepare("select * from khachhang");
        $statement->execute();
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    public static function insertUser($email,$username,$password,$conn)
    {
        //thêm user vào csdl khi khách hàng đăng ký tài khoản, mật khẩu được mã hóa bnagwf sha1
        $statement = $conn->prepare("insert into khachhang(email,username,password)
    values(:email,:username,:password)");
        $statement->bindValue(':email', $email);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', sha1($password)); //mã hóa mật khẩu bằng sha1(40 ký tự)
        $statement->execute();
    }
    
    public static function resetPass($email,$pass,$conn){
        //cập nhật lại mật khẩu trong csdl khi khách hàng xài chức năng reset pass
        $statement = $conn->prepare("update khachhang set password=:pass where email=:email");
        $statement->bindValue(':email', $email);
        $statement->bindValue(':pass', $pass);
        $statement->execute();
    }

    public static function updateUser($ma,$ho,$ten,$diachi,$sdt,$conn){
        //cập nhật thông tin khách hàng dựa vào mã
        $statement = $conn->prepare("update khachhang set ho=:ho,ten=:ten,diachi=:diachi,sdt=:sdt where makh=:ma");
        $statement->bindValue(':ho',$ho);
        $statement->bindValue(':ten',$ten);
        $statement->bindValue(':diachi',$diachi);
        $statement->bindValue(':sdt',$sdt);
        $statement->bindValue(':ma',$ma);
        $statement->execute();
    }

    public static function deleteUser($ma,$conn){
        //xóa khách hàng dựa vào mã
        $statement = $conn->prepare("delete from khachhang where makh = $ma");
        $statement->execute();
    }

    public static function getHistoryOrder($ma,$conn){
        //lấy lịch sử mua hàng của khách dựa vào mã, ngày tháng format theo d/m/Y
        $statement = $conn->prepare("select madon,DATE_FORMAT(ngaytao, '%d/%m/%Y') as ngaytao,nguoinhan,tinhtrang,sdt,diachigiao,ptthanhtoan,tongtien,makh,makm from donhang where makh=$ma");
        $statement->execute();
        $histories = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $histories;
    }

    public static function checkKhachHangDonHang($id,$conn)
    {
        //kiểm tra khách hàng đang có đơn hàng nào không trước khi xóa
        $statement = $conn->prepare("select * from donhang where makh='$id'");
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        if(!empty($user))return true;
        return false;
    }

    public static function getSoLuongThanhVien($conn){
        //lấy tổng số lượng khách hàng của shop
        $statement = $conn->prepare("select count(makh) as soluong from khachhang");
        $statement->execute();
        $soluong = $statement->fetch(PDO::FETCH_ASSOC);
        return $soluong;
    }
}
