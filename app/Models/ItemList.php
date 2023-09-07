<?php

class ItemList
{
    private $items = [];

    public function loadItemsFromFile($filename)
    {
        if (file_exists($filename)) {
            $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                list($name, $price) = explode(' — ', $line);
                $item = new Item($name, (int)$price);
                $this->items[] = $item;
            }
        }
    }

    public function saveItemsToFile($filename)
    {
        $lines = [];
        foreach ($this->items as $item) {
            $lines[] = $item->getName() . ' — ' . $item->getPrice();
        }
        file_put_contents($filename, implode(PHP_EOL, $lines));
    }

    public function addItem(Item $item)
    {
        $itemName = $item->getName();

        foreach ($this->items as $existingItem) {
            if ($existingItem->getName() === $itemName) {
                echo "Товар: $itemName уже существует. Не удалось добавить его." . PHP_EOL;
                return;
            }
        }

        echo "Товар: {$item->getName()} было добавлено с ценой {$item->getPrice()}" . PHP_EOL;

        $this->items[] = $item;
    }


    public function editItem($name, $newPrice)
    {
        foreach ($this->items as $item) {
            if ($item->getName() === $name) {
                $item->setPrice($newPrice);
                break;
            }
        }
        echo "Цена Товара: $name  было обновлено на: $newPrice" . PHP_EOL;
    }

    public function deleteItem($name)
    {
        foreach ($this->items as $key => $item) {
            if ($item->getName() === $name) {
                unset($this->items[$key]);
                break;
            }
        }
        echo "Товар: $name  был удален" . PHP_EOL;
    }

    public function getTotalPrice()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getPrice();
        }
        return $total;
    }

    public function displayItems()
    {
        foreach ($this->items as $item) {
            echo $item->getName() . ' — ' . $item->getPrice() . PHP_EOL;
        }
    }
}