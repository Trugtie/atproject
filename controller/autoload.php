<?php function my_autoloader($class){
    //đăng ký toàn bộ thư mục model
    include_once dirname(__DIR__).'/model/'.strtolower($class).'.php';
}
spl_autoload_register('my_autoloader');