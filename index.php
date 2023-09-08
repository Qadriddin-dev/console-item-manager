<?php

require_once __DIR__ . '/vendor/autoload.php';

use ConsoleItemManager\Controllers\ConsoleController;
use ConsoleItemManager\Controllers\ProductManager;
use ConsoleItemManager\Models\ItemList;

if ($argc < 3) {
    echo "Использование: php index.php <файл> <действие> [аргументы]\n";
    exit(1);
}

$filename = 'src/data/' . $argv[1];
$action = $argv[2];
$args = array_slice($argv, 3);

$itemList = new ItemList();
$productManager = new ProductManager($itemList);
$consoleController = new ConsoleController($productManager, $itemList);
$consoleController->execute($filename, $action, $args);

