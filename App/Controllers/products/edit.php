<?php

$productId = Request::getIntFromGet('id');
$product = [];

if ($productId) {
    $product = Product::getById($productId);
}

if (Request::isPost()) {
    $productDate = Product::getDataFromPost();
    $edited = Product::updateById($productId, $productDate);

    $imageUrl = trim($_POST['image_url']);
    ProductImage::uploadImagesByUrl($productId, $imageUrl);

    $uploadImages = $_FILES['images'] ?? [];
    ProductImage::uploadImages($productId, $uploadImages);

    Responce::redirect('/products/list');

}
$categories = Category::getList();
$smarty->assign('categories', $categories);
$smarty->assign('product', $product);
$smarty->display('products/edit.tpl');

