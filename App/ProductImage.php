<?php

class ProductImage
{

    private const IMAGE_MIME_DICT = [
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

    public static function getById(int $id)
    {
        $query = "SELECT * FROM product_images WHERE id = $id";
        return Db::fetchRow($query);
    }

    public static function findByFilenameInProduct(int $productId, string $filename)
    {
        $query = "SELECT * FROM product_images WHERE product_id = $productId AND name = '$filename'";
        return Db::fetchRow($query);
    }

    public static function updateById(int $id, array $productImage): int
    {
        if (isset($productImage['id'])) {
            unset($productImage['id']);
        }

        return Db::update('product_images', $productImage, "id = $id");
    }

    public static function add(array $productImage): int
    {
        if (isset($productImage['id'])) {
            unset($productImage['id']);
        }
        return Db::insert('product_images', $productImage);
    }

    public static function deleteById(int $id)
    {
        $productImage = static::getById($id);
        $filepath = APP_PUBLIC_DIR . $productImage['path'];

        if (file_exists($filepath)) {
            unlink($filepath);
        }

        return Db::delete('product_images', "id = $id");
    }

//    public static function getDataFromPost()
//    {
//        return [
//            'id'          => Request::getIntFromPost('id', false),
//            'name'        => Request::getStrFromPost('name'),
//            'article'     => Request::getStrFromPost('article'),
//            'description'      => Request::getStrFromPost('description'),
//            'price'       => Request::getIntFromPost('price'),
//            'amount'      => Request::getIntFromPost('amount'),
//            'category_id' => Request::getIntFromPost('category_id')
//        ];
//    }

    public static function deleteByProductId(int $productId)
    {
        return Db::delete('product_images', "product_id = $productId");
    }

    public static function uploadImages(int $productId, array $files)
    {
        $imageNames = $files['name'] ?? [];
        $imageTmpNames = $files['tmp_name'] ?? [];

        $imagesCount = 0;

        for ($i = 0; $i < count($imageNames); $i++) {
            $result = static::uploadImage($productId, [
                'name' => $imageNames[$i],
                'tmp_name' => $imageTmpNames[$i],
            ]);

            if ($result) {
                $imagesCount++;
            }
        }

        return $imagesCount;
    }

    public static function uploadImage(int $productId, array $file)
    {
        $imageName = basename(trim($file['name']));

        if (empty($imageName)) {
            return false;
        }

        $imageTmpname = $file['tmp_name'];

        $filename = static::getUniqueUploadImageName($productId, $imageName);

        $path = static::getUploadDirForProduct($productId);
        $imagePath = $path . '/' . $filename;

        move_uploaded_file($imageTmpname, $imagePath);
        ProductImage::add([
            'product_id' => $productId,
            'name' => $filename,
            'path' => str_replace(APP_PUBLIC_DIR, '', $imagePath),
        ]);
        return true;
    }

    protected static function getUniqueUploadImageName(int $productId, string $imageName)
    {
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

        return $filename;
    }

    public static function uploadImagesByUrl(int $productId, string $imageUrl)
    {
        if (empty($imageUrl)) {
            return false;
        }
        $imageMetaData = static::getMetaDataByUrl($imageUrl);
        $mimeType = $imageMetaData['mimeType'];

        if (is_null($mimeType)) {
            return false;
        }

        $imageExp = static::getExtensionByMimeType($mimeType);
        if (is_null($imageExp)) {
            return false;
        }

        $size = $imageMetaData['size'];
        if (is_null($size)) {
            return false;
        }

        $dublicateProductImage = ProductImage::getByProductIdAndSize($productId, $size);
        if (!empty($dublicateProductImage)){
            return false;
        }

        $productImageId = ProductImage::add([
            'product_id' => $productId,
            'name' => '',
            'path' => '',
            'size' => $size,
        ]);
        $filename = $productId . '_' . $productImageId . '_upload' . time() . $imageExp;
        $path = static::getUploadDirForProduct($productId);
        $imagePath = $path . '/' . $filename;

        file_put_contents($imagePath, fopen($imageUrl, 'r'));
        ProductImage::updateById($productImageId, [
            'name' => $filename,
            'path' => str_replace(APP_PUBLIC_DIR, '', $imagePath),
        ]);


        return true;
    }

//    protected static function getExtensionByUrl(string $url)
//    {
//        $metaData = static::getMetaDataByUrl($url);
//        $mimeType = $metaData['mimeType'];
//
//        return static::IMAGE_MIME_DICT[$mimeType] ?? null;
//    }

    protected static function getExtensionByMimeType(string $mimeType){
        return static::IMAGE_MIME_DICT[$mimeType] ?? null;

    }

    protected static function getMetaDataByUrl(string $url)
    {
        $headers = @get_headers($url);
        if ($headers === false) {
            return null;
        }

        $metaDataHeaders = [
            'Content-type',
            'Content-length'
        ];

        $metaData = [
            'mimeType' => null,
            'size' => null,
        ];

        $mimeType = null;

        foreach ($headers as $headerStr) {
            $header = null;

            foreach ($metaDataHeaders as $metaDataHeader){
                if (strpos(strtolower($headerStr), strtolower($metaDataHeader)) === false){
                    continue;
                }
                $header = $metaDataHeader;
                break;
            }
            if (is_null($header)){
                continue;
            }
            $headerData = explode(':', $headerStr);
            $headerValue = trim(strtolower($headerData[1]));

            switch ($header){
                case 'Content-length' :
                    $metaData['size'] = $headerValue;
                    break;
                case 'Content-type' :
                    $metaData['mimeType'] = $headerValue;
                    break;
            }
        }

        return $metaData;
    }

    public static function getListByProductId(int $productId)
    {
        $query = "SELECT * FROM product_images WHERE product_id = $productId";
        return Db::fetchAll($query);
    }

    protected static function getUploadDirForProduct(int $productId)
    {
        $path = APP_UPLOAD_PRODUCT_DIR . '/' . $productId;

        if (!file_exists($path)) {
            mkdir($path);
        }

        return $path;
    }

    private static function getByProductIdAndSize(int $productId, int $size)
    {
        $query = "SELECT * FROM product_images WHERE product_id = $productId AND size = $size";
        return Db::fetchRow($query);

    }
}
