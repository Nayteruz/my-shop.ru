<?php

$current_page = Request::getIntFromGet('p', 1);
$limit = 10;
$offset = ($current_page - 1) * $limit;

$products_count = Product::getListCount();

$pages_count = ceil($products_count / $limit);
$products = Product::getList($limit, $offset);
$smarty->assign('pages_count', $pages_count);
$smarty ->assign('products', $products);
$smarty -> display('products/index.tpl');


