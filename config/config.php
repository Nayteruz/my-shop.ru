<?php

require_once __DIR__ . '/../libs/smarty/Smarty.class.php';
require_once __DIR__ . '/../App/Db.php';
require_once __DIR__ . '/../App/DbExp.php';
require_once __DIR__ . '/../App/Request.php';
require_once __DIR__ . '/../App/Responce.php';
require_once __DIR__ . '/../App/Product.php';
require_once __DIR__ . '/../App/Category.php';
require_once __DIR__ . '/../App/ProductImage.php';
require_once __DIR__ . '/../App/Queue.php';
require_once __DIR__ . '/../App/Import.php';


define('APP_DIR', realpath(__DIR__ . '/../'));
define('APP_PUBLIC_DIR', APP_DIR . '/public');
define('APP_UPLOAD_DIR', APP_PUBLIC_DIR . '/upload');
define('APP_UPLOAD_PRODUCT_DIR', APP_UPLOAD_DIR . '/products');

if(!file_exists(APP_UPLOAD_DIR)){
    mkdir(APP_UPLOAD_DIR);
}
if(!file_exists(APP_UPLOAD_PRODUCT_DIR)){
    mkdir(APP_UPLOAD_PRODUCT_DIR);
}

$smarty = new Smarty();
$smarty->template_dir = __DIR__ . '/../templates';
$smarty->compile_dir = __DIR__ . '/../var/compile';
$smarty->cache_dir = __DIR__ . '/../var/cache';
$smarty->config_dir = __DIR__ . '/../var/config';

function deleteDir($dir){

    $systemLinks = ['.', '..'];
    $files = array_diff(scandir($dir), $systemLinks);
    foreach($files as $file){
        $filePath = "$dir/$file";
        if ($filePath){
            deleteDir($filePath);
        } else {
            unlink($filePath);
        }
    }
    return rmdir($dir);
}