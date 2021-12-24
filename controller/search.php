<?php
include '../dao/ProductDAO.php';

switch ($_POST['action']) {
    case "searchLaptop":
        if (empty($_POST['words'])) {
            session_start();
            $laptops = ProductDAO::getAllLaptopShowcase($conn);
            $_SESSION['search'] = $laptops;
            header("Location: ../view/laptop.php");
        } else {
            session_start();
            $laptops = ProductDAO::searchLaptop($_POST['words'], $conn);
            $_SESSION['search'] = $laptops;
            $_SESSION['searchWords'] = $_POST['words'];
            $_SESSION['searchFlag'] = 1;
            header("Location: ../view/laptop.php");
        }
        break;
}
