<?php
session_start();
print_r($_SESSION);
if(!isset($_SESSION["username"])){
    header('Location: ./view/loginadmin.php');
}
else if(!isset($_SESSION["username"])=="master"){
    header('Location: ./view/admin.php');
}
else{
    header('Location: ./view/admin.php');
}
?>