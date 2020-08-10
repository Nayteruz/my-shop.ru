<?php

$productId = Request::getIntFromGet('id');
$product = [];


if ($productId) {
    $product = Product::getById($productId);
}

if (Request::isPost()) {
    $productDate = Product::getDataFromPost();
    $edited = Product::updateById($productId, $productDate);

    $uploadImages = $_FILES['images'] ?? [];

    $imageNames = $uploadImages['name'];
    $imageTmpNames = $uploadImages['tmp_name'];

    $currentImageNames = [];
    foreach ($product['images'] as $image) {
        $currentImageNames[] = $image['name'];
    }

    $diffImageNames = array_diff($imageNames, $currentImageNames);

    $path = APP_UPLOAD_PRODUCT_DIR . '/' . $productId;

    if (!file_exists($path)) {
        mkdir($path);
    }

    for ($i = 0; $i < count($imageNames); $i++) {
        $imageName = basename($imageNames[$i]);
        $imageTmpname = $imageTmpNames[$i];

        $imagePath = $path . '/' . $imageName;

        move_uploaded_file($imageTmpname, $imagePath);

        if (in_array($imageName, $diffImageNames)) {
            ProductImage::add([
                'product_id' => $productId,
                'name' => $imageName,
                'path' => str_replace(APP_PUBLIC_DIR, '', $imagePath),
            ]);
        }
    }


    Responce::redirect('/products/list');

}
$categories = Category::getList();
$smarty->assign('categories', $categories);
$smarty->assign('product', $product);
$smarty->display('products/edit.tpl');

