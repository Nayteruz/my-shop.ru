<?php

if (Request::isPost()) {
	$category = Category::getDataFromPost();
	$inserted = Category::add($category);

	if ($inserted) {
		Responce::redirect('/categories/list');
	} else {
		die("Some insert error");
	}
}
echo 'hello world';

$smarty -> display('categories/add.tpl');

