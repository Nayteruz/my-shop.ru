<?php

require_once __DIR__ . '/../libs/smarty/Smarty.class.php';
require_once __DIR__ . '/../App/Db.php';
require_once __DIR__ . '/../App/Request.php';
require_once __DIR__ . '/../App/Responce.php';
require_once __DIR__ . '/../App/Product.php';
require_once __DIR__ . '/../App/Category.php';




$smarty = new Smarty();
$smarty->template_dir = __DIR__ . '/../templates';
$smarty->compile_dir = __DIR__ . '/../var/compile';
$smarty->cache_dir = __DIR__ . '/../var/cache';
$smarty->config_dir = __DIR__ . '/../var/config';
