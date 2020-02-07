<?php
ini_set("auto_detect_line_endings", true);

require_once __DIR__.'/vendor/autoload.php';
require_once 'db.php';

use TaskForce\logic\Task;
use TaskForce\utils\CsvLoader;
use TaskForce\utils\CustomException;

$task = new Task('contractorId', 'customerId', 123456, Task::STATUS_NEW);
$loader = new CsvLoader(__DIR__.'/data/users.csv', ['email','name','password','dt_add']);

$records = [];

try {
    $loader->import();
    $records = $loader->getData();
    foreach ($records as $record) {
      insert_user($connection, $record);
    }
}
catch (CustomException $e) {
    error_log("Не удалось обработать csv файл: " . $e->getMessage());
}
catch (CustomException $e) {
    error_log("Неверная форма файла импорта: " . $e->getMessage());
}



var_dump($records);

