<?php
$action = $_POST['action'];
switch ($action) {
    case "login":
        $username = $_POST['username'];
        $password = $_POST['password'];
        break;
}
