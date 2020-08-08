<?php

$id = Request::getIntFromPost('id', false);

if (!$id) {
	die('Error with ID');
}

$deleted = Product::deleteById($id);

if ($deleted) {
    Responce::redirect('/products/list');
} else {
	die("Some delete error");
}