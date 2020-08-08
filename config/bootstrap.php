<?php

require_once 'config.php';

$path_info = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '/';

if ($path_info == '/'){
    $path_info .= '/products/';
}

$is_index = substr($path_info, '-1') == '/';

if ($is_index){
    $path_info .='list';
}

$categories = Category::getList();
$smarty->assign('categories_shared',$categories);

$controller_path = $_SERVER['DOCUMENT_ROOT'] . '/../App/Controllers' . $path_info . '.php';

if(file_exists($controller_path)){
    require_once $controller_path;
} else {
    $smarty->display('404.tpl');
}
