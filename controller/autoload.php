<?php function my_autoloader($class){
    include_once '../model/'.$class.'.php';
}
spl_autoload_register('my_autoloader');