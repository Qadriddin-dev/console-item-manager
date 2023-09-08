<?php

namespace ConsoleItemManager\Controllers;

use ConsoleItemManager\Models\Item;
use ConsoleItemManager\Models\ItemList;

class ProductManager
{
    public function __construct(
        private ItemList $itemList
    ){}

    public function add(string $name, int $price): void
    {
        $item = new Item($name, $price);
        $this->itemList->addItem($item);
    }

    public function edit(string $name, int $newPrice): void
    {
        $this->itemList->editItem($name, $newPrice);
    }

    public function delete(string $name): void
    {
        $this->itemList->deleteItem($name);
    }

    public function getTotal(): int
    {
        return $this->itemList->getTotalPrice();
    }

    public function displayItems(): void
    {
        $this->itemList->displayItems();
    }
}