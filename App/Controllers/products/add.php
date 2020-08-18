<?php

if (Request::isPost()) {

    $product = Product::getDataFromPost();
    $productId = Product::add($product);

    $imageUrl = trim($_POST['image_url']);
    ProductImage::uploadImagesByUrl($productId, $imageUrl);

    $uploadImages = $_FILES['images'] ?? [];
    ProductImage::uploadImages($productId, $uploadImages);

	if ($productId) {
        Responce::redirect('/products/list');
	} else {
		die("Some insert error");
	}
}

$categories = Category::getList();
$smarty -> assign('categories', $categories);
$smarty -> display('products/add.tpl');

