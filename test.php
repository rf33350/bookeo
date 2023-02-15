<?php

class Voitures {
    public string $name;
    public string $description;
    private float $price;

    public function getPrice() {
        return $this->price;
    }
}

$car1 = new Voitures;
$car1->name = 'Volvo';