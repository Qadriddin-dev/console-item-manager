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
    }

    public function deleteItem($name)
    {
        foreach ($this->items as $key => $item) {
            if ($item->getName() === $name) {
                unset($this->items[$key]);
                break;
            }
        }
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