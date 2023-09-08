<?php

namespace ConsoleItemManager\Controllers;

use ConsoleItemManager\Models\ItemList;

class ConsoleController
{
    public function __construct(
        private ProductManager $productManager,
        private ItemList $itemList
    ) {}

    public function execute(string $filename, string $action, array $args = []): void
    {
        $productName = $args[0] ?? '';
        $productPrice = $args[1] ?? '';

        $this->itemList->loadItemsFromFile($filename);

        $result = match ($action) {
            'add' => $this->productManager->add($productName, (int)$productPrice),
            'edit' => $this->productManager->edit($productName, (int)$productPrice),
            'delete' => $this->productManager->delete($productName),
            'subtract' => "Общая сумма товаров: {$this->productManager->getTotal()}",
            'showList' => $this->productManager->displayItems(),
            default => "Неправильное действие.",
        };

        echo $result . PHP_EOL;

        $this->itemList->saveItemsToFile($filename);
    }
}