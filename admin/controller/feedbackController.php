<?php
include "../../controller/autoload.php";
include "../../dao/FeedBackDAO.php";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $action = $_GET['action'];
    switch ($action) {
        case "delete":
            $mafb = $_GET['mafb'];
            FeedBackDAO::deleteFeedBack($mafb, $conn); //xóa feedback
            header("Location: ../view/quanlyfeedback.php");
            break;
    }
}
?>