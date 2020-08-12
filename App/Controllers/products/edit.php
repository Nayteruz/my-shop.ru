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

    $path = APP_UPLOAD_PRODUCT_DIR . '/' . $productId;

    if (!file_exists($path)) {
        mkdir($path);
    }
//    echo '<pre>';
//    var_dump($imageNames, $imageTmpNames);
//    echo '</pre>';
//    exit;

    for ($i = 0; $i < count($imageNames); $i++) {
        $imageName = basename($imageNames[$i]);
        $imageTmpname = $imageTmpNames[$i];

        $filename = $imageName;
        $counter = 0;
        while (true) {
            $dublicateImage = ProductImage::findByFilenameInProduct($productId, $filename);
            if (empty($dublicateImage)) {
                break;
            }
            $info = pathinfo($imageName);
            $filename = $info['filename'];
            $filename .= '_' . $counter . '.' . $info['extension'];
            $counter++;
        }

        $imagePath = $path . '/' . $filename;

        move_uploaded_file($imageTmpname, $imagePath);

        if (!empty($filename)) {
            ProductImage::add([
                'product_id' => $productId,
                'name' => $filename,
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

