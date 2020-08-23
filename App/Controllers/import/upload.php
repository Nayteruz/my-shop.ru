<?php

$file = $_FILES['import_file'] ?? null;

if (is_null($file) || empty($file['name'])){
    die('not import file uploaded');
}

$uploadDir = APP_UPLOAD_DIR . '/import';
if(!file_exists($uploadDir)){
    mkdir($uploadDir);
}

$importFilename = 'i_' . time() . '.' . $file['name'];
move_uploaded_file($file['tmp_name'], $uploadDir . '/' . $importFilename);

//$filename = 'i_1597853977.import.csv';
$filepath = APP_UPLOAD_DIR . '/import/' . $importFilename;

$taskName = 'Импорт товаров ' . $importFilename;
$task = 'Import::productsFromFileTask';
$taskParams = [
    'filename' => $importFilename,
];

$taskId = TasksQueue::addTask($taskName, $task, $taskParams);

Responce::redirect('/queue/list');
exit;

/**
 * 1. Загрузка файла с настройками.
 * 2. Анализ файла с указанными настройками.
 * 3. Указание настроек разбора.
 * 4. Разбор файла на основе настроек.
 */




