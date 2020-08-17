<?php

$productId = Request::getIntFromGet('id');
$product = [];


if ($productId) {
    $product = Product::getById($productId);
}

if (Request::isPost()) {
    $productDate = Product::getDataFromPost();
    $edited = Product::updateById($productId, $productDate);

    $path = APP_UPLOAD_PRODUCT_DIR . '/' . $productId;

    if (!file_exists($path)) {
        mkdir($path);
    }


    $imageUrl = $_POST['image_url'] ?? null;
    if (!empty($imageUrl)) {

        $imageContentTypes = [
            'image/apng' => '.apng',
            'image/bmp' => '.bmp',
            'image/gif' => '.gif',
            'image/x-icon' => '.ico',
            'image/jpeg' => '.jpg',
            'image/png' => '.png',
            'image/svg+xml' => '.svg',
            'image/tiff' => '.tiff',
            'image/webp' => '.webp',
        ];

        $imagePath = $path . '/';

        $headers = @get_headers($imageUrl);

        if ($headers !== false) {
            $contentType = null;

            foreach ($headers as $headerStr) {
                if (strpos(strtolower($headerStr), "content-type") !== false) {
                    $header = explode(':', $headerStr);
                    $headerLabel = trim(strtolower($header[0]));
                    if (strlen($headerLabel) == strlen('content-type')) {
                        $contentType = trim($header[1]) ?? '';
                    } else {
                        continue;
                    }
                } else {
                    continue;
                }
            }

            $imageExp = $imageContentTypes[$contentType] ?? null;

            if (!is_null($imageExp)) {
                $productImageId = ProductImage::add([
                    'product_id' => $productId,
                    'name' => '',
                    'path' => '',
                ]);
                $filename = $productId . '_' . $productImageId . '_upload' . time() . $imageExp;
                $imagePath = $path . '/' . $filename;

                file_put_contents($imagePath, fopen($imageUrl, 'r'));
                ProductImage::updateById($productImageId, [
                    'name' => $filename,
                    'path' => str_replace(APP_PUBLIC_DIR, '', $imagePath),
                ]);


            }
        }


//        exit;

    }

    $uploadImages = $_FILES['images'] ?? [];

    $imageNames = $uploadImages['name'] ?? [];
    $imageTmpNames = $uploadImages['tmp_name'] ?? [];

    for ($i = 0; $i < count($imageNames); $i++) {
        $imageName = basename(trim($imageNames[$i]));

        if (empty($imageName)) {
            continue;
        }

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

        ProductImage::add([
            'product_id' => $productId,
            'name' => $filename,
            'path' => str_replace(APP_PUBLIC_DIR, '', $imagePath),
        ]);

    }

    Responce::redirect('/products/list');

}
$categories = Category::getList();
$smarty->assign('categories', $categories);
$smarty->assign('product', $product);
$smarty->display('products/edit.tpl');

