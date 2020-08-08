<?php

$id = Request::getIntFromGet('id');

$category=[];

if ($id) {
    $category = Category::getById($id);
}

if (!empty($_POST)) {
    $category = Category::getDataFromPost();
    $edited = Category::updateById($id, $category);
	
	if ($edited) {
        Responce::redirect('/categories/list');
	} else {
		die("Some insert error");
	}
}

$smarty ->assign('category', $category);
$smarty -> display('categories/edit.tpl');

