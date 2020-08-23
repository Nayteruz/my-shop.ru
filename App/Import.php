<?php


class Import
{
    public static function productsFromFileTask(array $params)
    {
        $filename = $params['filename'] ?? null;

        if (is_null($filename)){
            return false;
        }

        $filepath = APP_UPLOAD_DIR . '/import/' . $filename;


        $file = fopen($filepath, 'r');

        $withHeader = true;
        $settings = [
            0 => 'name',
            1 => 'category_name',
            2 => 'article',
            3 => 'price',
            4 => 'amount',
            5 => 'description',
            6 => 'image_urls',
        ];

        $mainField = 'article';

        if ($withHeader) {
            $headers = fgetcsv($file);
        }

        while ($row = fgetcsv($file)) {
            $productData = [];

            foreach ($settings as $index => $key) {
                $productData[$key] = $row[$index] ?? null;
            }

            $product = [
                'name' => Db::escape($productData['name']),
                'article' => Db::escape($productData['article']),
                'price' => Db::escape($productData['price']),
                'amount' => Db::escape($productData['amount']),
                'description' => Db::escape($productData['description']),
            ];

            $categoryName = $productData['category_name'];
            $category = Category::getByName($categoryName);
            if (empty($category)) {
                continue;
                $categoryId = Category::add([
                    'name' => $categoryName
                ]);
            } else {
                $categoryId = $category['id'];
            }

            $product['category_id'] = $categoryId;

            $targetProduct =  Product::getByField($mainField, $product[$mainField]);
            if (empty($targetProduct)){
                $productId = Product::add($product);
            } else {
                $productId = $targetProduct['id'];
                $targetProduct = array_merge($targetProduct, $product);
                Product::updateById($productId, $targetProduct);
            }


            $productData['image_urls'] = explode("
", $productData['image_urls']);
            $productData['image_urls'] = array_map(function ($item) {
                return trim($item);
            }, $productData['image_urls']);
            $productData['image_urls'] = array_filter($productData['image_urls'], function ($item) {
                return !empty($item);
            });

            foreach ($productData['image_urls'] as $imageUrl) {
                ProductImage::uploadImagesByUrl($productId, $imageUrl);
            }

        }

        return true;

    }
}