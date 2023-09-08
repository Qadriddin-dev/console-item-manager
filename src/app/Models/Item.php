<?php

namespace ConsoleItemManager\Models;

class Item
{
    public function __construct(
        private string $name,
        private int $price
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }
}