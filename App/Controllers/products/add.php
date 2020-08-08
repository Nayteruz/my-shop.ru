<?php

if (Request::isPost()) {
	$product = Product::getDataFromPost();
	$inserted = Product::add($product);

	if ($inserted) {
        Responce::redirect('/products/list');
	} else {
		die("Some insert error");
	}
}

$categories = Category::getList();
$smarty -> assign('categories', $categories);
$smarty -> display('products/add.tpl');

