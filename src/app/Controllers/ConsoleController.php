<?php

namespace ConsoleItemManager\App\Controllers;

use ConsoleItemManager\App\Models\ItemList;

class ConsoleController
{
    private $itemController;
    private $itemList;

    public function __construct(ItemController $itemController, ItemList $itemList)
    {
        $this->itemController = $itemController;
        $this->itemList = $itemList;
    }

    public function execute($filename, $action, $args)
    {
        $this->itemList->loadItemsFromFile($filename);

        switch ($action) {
            case 'add':
                $this->itemController->add($args[0], $args[1]);
                break;
            case 'edit':
                $this->itemController->edit($args[0], $args[1]);
                break;
            case 'delete':
                $this->itemController->delete($args[0]);
                break;
            case 'subtract':
                $total = $this->itemController->getTotal();
                echo "Общая сумма товаров: $total" . PHP_EOL;
                break;
            case 'showList':
                echo "Текущий список товаров:" . PHP_EOL;
                $this->itemController->displayItems();
                break;
            default:
                echo "Неправильное действие." . PHP_EOL;
                break;
        }

        $this->itemList->saveItemsToFile($filename);
    }
}