<?php
include dirname(__DIR__)."/util/connectDB.php";
class AdminDAO
{
    public static function getAdmin($username, $pass, $conn)
    {
        //lấy thông tin 1 admin để kiểm tra chức năng login dựa vào username và pass
        $statement = $conn->prepare("select * from admin where (username='$username')  and password='$pass'");
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public static function getAdminEdit($maad,$conn){
        //lấy data admin qua mã admin
        $statement=$conn->prepare("select * from admin where maad=$maad");
        $statement->execute();
        $phukien=$statement->fetch(PDO::FETCH_ASSOC);
        return $phukien;
    }

    public static function getAdminWithEmail($email,$conn)
    {
        //lấy data admin qua email
        $statement = $conn->prepare("select * from admin where email='$email'");
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public static function getAllAdmin($conn)
    {
        //lấy all data admin để load quản lý nhân viên
        $statement = $conn->prepare("select * from admin");
        $statement->execute();
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    public static function insertAdmin($admin,$conn)
    {
        //thêm 1 nhân viên(admin)
        $statement = $conn->prepare("insert into admin(ho, ten, diachi, sdt, email,username,password)
    values(:ho,:ten,:diachi,:sdt,:email,:username,:password)");
        $statement->bindValue(':ho', $admin->get_ho());
        $statement->bindValue(':ten', $admin->get_ten());
        $statement->bindValue(':diachi', $admin->get_diachi());
        $statement->bindValue(':sdt', $admin->get_sdt());
        $statement->bindValue(':email', $admin->get_email());
        $statement->bindValue(':username', $admin->get_username());
        $statement->bindValue(':password', $admin->get_password());
        $statement->execute();
    }

    public static function updateAdmin($admin, $maad, $conn){
        //update admin
        $statement = $conn->prepare("update admin set ho=:ho,ten=:ten,diachi=:diachi,sdt=:sdt,email=:email,username=:username,password=:password where maad=:maad");
        $statement->bindValue(':ho', $admin->get_ho());
        $statement->bindValue(':ten', $admin->get_ten());
        $statement->bindValue(':diachi', $admin->get_diachi());
        $statement->bindValue(':sdt', $admin->get_sdt());
        $statement->bindValue(':email', $admin->get_email());
        $statement->bindValue(':username', $admin->get_username());
        $statement->bindValue(':password', $admin->get_password());
        $statement->bindValue(':maad', $maad);
        $statement->execute();
    }

    public static function deleteAdmin($ma,$conn){
        //delete admin
        $statement = $conn->prepare("delete from admin where maad = $ma");
        $statement->execute();
    }
}
