<?php
include dirname(__DIR__)."/util/connectDB.php";
class AdminDAO
{
    public static function getAdmin($username, $pass, $conn)
    {
        $statement = $conn->prepare("select * from admin where (username='$username')  and password='$pass'");
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public static function getAdminWithEmail($email,$conn)
    {
        $statement = $conn->prepare("select * from admin where email='$email'");
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public static function getAllAdmin($conn)
    {
        $statement = $conn->prepare("select * from admin");
        $statement->execute();
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    public static function insertAdmin($email,$username,$password,$conn)
    {
        $statement = $conn->prepare("insert into admin(email,username,password)
    values(:email,:username,:password)");
        $statement->bindValue(':email', $email);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $password);
        $statement->execute();
    }

    public static function updateAdmin($ma,$ho,$ten,$diachi,$sdt,$conn){
        $statement = $conn->prepare("update admin set ho=:ho,ten=:ten,diachi=:diachi,sdt=:sdt where maad=:ma");
        $statement->bindValue(':ho',$ho);
        $statement->bindValue(':ten',$ten);
        $statement->bindValue(':diachi',$diachi);
        $statement->bindValue(':sdt',$sdt);
        $statement->bindValue(':ma',$ma);
        $statement->execute();
    }
}

?>