<?php
require_once 'app/Controllers/ItemController.php';
require_once 'app/Controllers/ConsoleController.php';
require_once 'app/Models/Item.php';
require_once 'app/Models/ItemList.php';

if ($argc < 3) {
    echo "Использование: php index.php <файл> <действие> [аргументы]\n";
    exit(1);
}

$filename = 'data/' . $argv[1];
$action = $argv[2];
$args = array_slice($argv, 3);

$itemList = new ItemList();
$itemController = new ItemController($itemList);
$consoleController = new ConsoleController($itemController, $itemList);
$consoleController->execute($filename, $action, $args);

echo "Текущий список товаров:" . PHP_EOL;
$itemController->displayItems();

