<?php
class validate{
    public static function validateEmail($email){
        $error="";
        if(preg_match("/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/",$email)==false){
            $error="Sai email!";
            return $error;
        }
        return $error;
    }

    public static function validateLaptop($hinh,$trongluong,$manhinh,$ocung,$cpu,$ram,$tensp,$mota,$soluong,$gia,$mausac,$vga,$pin){
        $imageType=array("image/png", "image/jpeg", "image/bmp");
        $error="";
        if(empty($hinh))
        $error.="Chưa thêm hình! <br>";
        else if($hinh["error"]!=0)
        $error.="Lỗi file hình! <br>";
        else if(!in_array($hinh["type"],$imageType))
        $error.="Không phải file hình! <br>";
        if(empty($trongluong))
        $error.="Chưa điền trọng lượng! <br>";
        if(empty($manhinh))
        $error.="Chưa điền màn hình! <br>";
        if(empty($ocung))
        $error.="Chưa điền ổ cứng! <br>";
        if(empty($cpu))
        $error.="Chưa điền cpu! <br>";
        if(empty($ram))
        $error.="Chưa điền ram! <br>";
        if(empty($tensp))
        $error.="Chưa điền tên sản phẩm! <br>";
        if(empty($mota))
        $error.="Chưa điền mô tả! <br>";
        if(empty($soluong) && $soluong != 0 )
        $error.="Chưa điền số lượng! <br>";
        else if($soluong < 1)
        $error.="Số lượng < 1 <br>";
        if(empty($gia))
        $error.="Chưa điền giá! <br>";
        if(empty($mausac))
        $error.="Chưa điền màu! <br>";
        if(empty($vga))
        $error.="Chưa điền vga! <br>";
        if(empty($pin))
        $error.="Chưa điền pin! <br>";
        return $error;
    }

    public static function validateLaptopWithoutImage($trongluong,$manhinh,$ocung,$cpu,$ram,$tensp,$mota,$soluong,$gia,$mausac,$vga,$pin){
        $error="";
        if(empty($trongluong))
        $error.="Chưa điền trọng lượng! <br>";
        if(empty($manhinh))
        $error.="Chưa điền màn hình! <br>";
        if(empty($ocung))
        $error.="Chưa điền ổ cứng! <br>";
        if(empty($cpu))
        $error.="Chưa điền cpu! <br>";
        if(empty($ram))
        $error.="Chưa điền ram! <br>";
        if(empty($tensp))
        $error.="Chưa điền tên sản phẩm! <br>";
        if(empty($mota))
        $error.="Chưa điền mô tả! <br>";
        if(empty($soluong) && $soluong != 0 )
        $error.="Chưa điền số lượng! <br>";
        else if($soluong < 1)
        $error.="Số lượng < 1 <br>";
        if(empty($gia))
        $error.="Chưa điền giá! <br>";
        if(empty($mausac))
        $error.="Chưa điền màu! <br>";
        if(empty($vga))
        $error.="Chưa điền vga! <br>";
        if(empty($pin))
        $error.="Chưa điền pin! <br>";
        return $error;
    }
}