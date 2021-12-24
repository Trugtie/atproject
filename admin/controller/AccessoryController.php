<?php
include "../../controller/autoload.php";
include "../../dao/AccessoryDAO.php";
include "../../util/validate.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $action = $_GET['action'];
    switch ($action) {
        case "delete":
            $masp = $_GET['masp'];
            //lay cai phu kien len de xoa cai hinh
            $oldPhukien =  AccessoryDAO::getPhuKien($masp, $conn);
            unlink(dirname(__DIR__) . '/view' . $oldPhukien['hinh']);
            AccessoryDAO::deletePhuKien($masp, $conn);
            header("Location: ../view/quanlysanpham.php");
            break;
    }
} else {
    $action = $_POST['action'];
    switch ($action) {
        case "addPhukien":
            $hinh = $_FILES["hinh"];
            $masp = $_POST['masp'];
            $tensp = $_POST['tensp'];
            $mota = $_POST['mota'];
            $soluong = $_POST['soluong'];
            $gia = $_POST['gia'];
            $loaisp = $_POST['loaisp'];
            $tinhtrang = "Còn hàng";
            $mahang = $_POST['mahang'];
            $maphukien = $_POST['maloaipk'];
            $error = validate::validatePhukien($hinh, $tensp, $mota, $soluong, $gia);
            if (!empty($error)) {
                session_start();
                $_SESSION["error"] = $error;
                header("Location: ../view/addaccessories.php");
            } else {
                $temp = $hinh["tmp_name"];
                $name = $hinh["name"];
                //kiem tra neu chua co thu muc image thi tao thu muc image
                if (!is_dir(dirname(__DIR__) . '/view/images/')) {
                    mkdir(dirname(__DIR__) . '/view/images/');
                }
                move_uploaded_file($temp, dirname(__DIR__) . '/view/images/' . $name);
                $imagePath = '/images/' . $name;
                $phukien = new PhuKien($masp, $tensp, $mota, $soluong, $imagePath, $gia, $loaisp, $tinhtrang, $mahang, $maphukien);
                //reset lai auto_increment trong bang phu kien truoc khi them
                AccessoryDAO::resetAI($conn);
                AccessoryDAO::insertPhuKien($phukien, $conn);
                header("Location: ../view/quanlysanpham.php");
            }
            break;
        case "updatePhukien":
            $hinh = $_FILES["hinh"];
            $masp = $_POST['masp'];
            $tensp = $_POST['tensp'];
            $mota = $_POST['mota'];
            $soluong = $_POST['soluong'];
            $gia = $_POST['gia'];
            $loaisp = $_POST['loaisp'];
            $tinhtrang = "Còn hàng";
            $mahang = $_POST['mahang'];
            $maphukien = $_POST['maloaipk'];

            //bat validate co hinh hoac khong co hinh
            if (!empty($hinh['name']))
                $error = validate::validatePhukien($hinh, $tensp, $mota, $soluong, $gia);
            else
                $error = validate::validatePhukienWithoutImage($tensp, $mota, $soluong, $gia);

            if (!empty($error)) {
                session_start();
                $_SESSION["error"] = $error;
                header("Location: ../view/editPhuKien.php?masp=$masp");
            } else {
                //update co hinh hoac khong hinh
                if (!empty($hinh['name'])) {
                    $temp = $hinh["tmp_name"];
                    $name = $hinh["name"];
                    $oldPhukien =  AccessoryDAO::getPhuKien($masp, $conn);
                    unlink(dirname(__DIR__) . '/view' . $oldPhukien['hinh']);
                    move_uploaded_file($temp, dirname(__DIR__) . '/view/images/' . $name);
                    $imagePath = '/images/' . $name;
                    $phukien = new PhuKien($masp, $tensp, $mota, $soluong, $imagePath, $gia, $loaisp, $tinhtrang, $mahang, $maphukien);
                    
                    AccessoryDAO::updatePhuKien($phukien, $masp, $conn);
                    header("Location: ../view/quanlysanpham.php");
                } else {
                    $phukien = new PhuKien($masp, $tensp, $mota, $soluong, $imagePath, $gia, $loaisp, $tinhtrang, $mahang, $maphukien);
                    
                    AccessoryDAO::updatePhuKienWithoutImage($phukien, $masp, $conn);
                    header("Location: ../view/quanlysanpham.php");
                }
            }
            break;
        }
}
