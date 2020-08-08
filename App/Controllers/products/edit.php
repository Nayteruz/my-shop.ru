<?php

$id = Request::getIntFromGet('id');
$product=[];


if ($id) {
	$product = Product::getById($id);
}

if (Request::isPost()) {
    $product = Product::getDataFromPost();
    $edited = Product::updateById($id, $product);
	
	if ($edited) {
        Responce::redirect('/products/list');
	} else {
		die("Some insert error");
	}
}
$categories = Category::getList();
$smarty -> assign('categories', $categories);
$smarty ->assign('product', $product);
$smarty -> display('products/edit.tpl');

