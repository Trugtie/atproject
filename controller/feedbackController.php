<?php
include "./autoload.php";
include "../dao/FeedBackDAO.php";
include "../util/validate.php";

$action = $_POST['action'];
switch ($action) {
    case "addFeedback":
        $mota = $_POST['mota'];
        $ma = $_POST['mafb'];
        session_start();
        $makh = $_SESSION['user']->get_makh();
        $masp =  $_SESSION['sp'];
        FeedBackDAO::insertFeedback($mota, $makh, $masp, $conn);
        header("Location: ../view/lichsumuahang.php");
        break;
}
