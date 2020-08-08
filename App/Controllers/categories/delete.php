<?php

$id = Request::getIntFromPost('id');
$id = (int) $id;

if (!$id) {
	die('Error with ID');
}

$deleted = Category::deleteById($id);

if ($deleted) {
    Responce::redirect('/categories/list');
} else {
	die("Some delete error");
}