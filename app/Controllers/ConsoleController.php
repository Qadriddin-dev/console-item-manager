<?php
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
                echo "Товар: $args[0]  было добавлено с ценной: $args[1]" . PHP_EOL;
                break;
            case 'edit':
                $this->itemController->edit($args[0], $args[1]);
                echo "Цена Товара: $args[0]  было обновлено на: $args[1]" . PHP_EOL;
                break;
            case 'delete':
                $this->itemController->delete($args[0]);
                echo "Товар: $args[0]  был удален" . PHP_EOL;
                break;
            case 'subtract':
                $total = $this->itemController->getTotal();
                echo "Общая сумма товаров: $total" . PHP_EOL;
                break;
            default:
                echo "Неправильное действие." . PHP_EOL;
                break;
        }

        $this->itemList->saveItemsToFile($filename);
    }
}