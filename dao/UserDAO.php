<?php
include dirname(__DIR__)."/util/connectDB.php";
class UserDAO
{
    public static function getUser($username, $pass, $conn)
    {
        $statement = $conn->prepare("select * from khachhang where (username='$username' or email='$username')  and password='$pass'");
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    

    public static function getUserWithID($id,$conn)
    {
        $statement = $conn->prepare("select * from khachhang where makh='$id'");
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public static function getUserWithEmail($email,$conn)
    {
        $statement = $conn->prepare("select * from khachhang where email='$email'");
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public static function getAllUser($conn)
    {
        $statement = $conn->prepare("select * from khachhang");
        $statement->execute();
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    public static function insertUser($email,$username,$password,$conn)
    {
        $statement = $conn->prepare("insert into khachhang(email,username,password)
    values(:email,:username,:password)");
        $statement->bindValue(':email', $email);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', sha1($password));
        $statement->execute();
    }
    
    public static function resetPass($email,$pass,$conn){
        $statement = $conn->prepare("update khachhang set password=:pass where email=:email");
        $statement->bindValue(':email', $email);
        $statement->bindValue(':pass', $pass);
        $statement->execute();
    }

    public static function updateUser($ma,$ho,$ten,$diachi,$sdt,$conn){
        $statement = $conn->prepare("update khachhang set ho=:ho,ten=:ten,diachi=:diachi,sdt=:sdt where makh=:ma");
        $statement->bindValue(':ho',$ho);
        $statement->bindValue(':ten',$ten);
        $statement->bindValue(':diachi',$diachi);
        $statement->bindValue(':sdt',$sdt);
        $statement->bindValue(':ma',$ma);
        $statement->execute();
    }

    public static function deleteUser($ma,$conn){
        $statement = $conn->prepare("delete from khachhang where makh = $ma");
        $statement->execute();
    }
}
