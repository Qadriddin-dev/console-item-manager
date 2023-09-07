<?php

namespace ConsoleItemManager\App\Controllers;
use ConsoleItemManager\App\Models\Item;
use ConsoleItemManager\App\Models\ItemList;

class ItemController
{
    private $itemList;

    public function __construct(ItemList $itemList)
    {
        $this->itemList = $itemList;
    }

    public function add($name, $price)
    {
        $item = new Item($name, $price);
        $this->itemList->addItem($item);
    }

    public function edit($name, $newPrice)
    {
        $this->itemList->editItem($name, $newPrice);
    }

    public function delete($name)
    {
        $this->itemList->deleteItem($name);
    }

    public function getTotal()
    {
        return $this->itemList->getTotalPrice();
    }

    public function displayItems()
    {
        $this->itemList->displayItems();
    }
}
