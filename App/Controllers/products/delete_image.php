<?php

$productImageId = Request::getIntFromPost('product_image_id', false);

if (!$productImageId) {
    die('error with ID');
}

$deleted = ProductImage::deleteById($productImageId);

//if ($deleted) {
//    Responce::redirect('/products/list');
//} else {
//    die("Some delete error");
//}