<?php

if (Request::isPost()) {

    $product = Product::getDataFromPost();
    $productId = Product::add($product);

//    echo '<pre>'; var_dump($_FILES); echo '</pre>';

    $uploadImages = $_FILES['images'] ?? [];

    $imageNames = $uploadImages['name'];
    $imageTmpNames = $uploadImages['tmp_name'];

    $path = APP_UPLOAD_PRODUCT_DIR . '/' . $productId;

    if(!file_exists($path)){
        mkdir($path);
    }

    for($i = 0; $i < count($imageNames); $i++){
        $imageName = basename($imageNames[$i]);
        $imageTmpname = $imageTmpNames[$i];

        $imagePath = $path . '/' . $imageName;

        move_uploaded_file($imageTmpname, $imagePath);

        ProductImage::add([
           'product_id' => $productId,
           'name' => $imageName,
           'path' => str_replace(APP_PUBLIC_DIR, '', $imagePath),
        ]);
    }

//    exit;



	if ($productId) {
        Responce::redirect('/products/list');
	} else {
		die("Some insert error");
	}
}

$categories = Category::getList();
$smarty -> assign('categories', $categories);
$smarty -> display('products/add.tpl');

