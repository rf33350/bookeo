<?php

class Voitures {
    private string $name;
    private string $description;
    private float $price;

    public function getPrice() {
        return $this->price;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setName(string $name):void {
        $this->name = $name;
    }

    public function setPrice(float $price):void {
        if($price>0) {
            $this->price = $price;
        }
        
    }

    public function setDescription(string $description):void {
        $this->description = $description;
    }

    
}

$car1 = new Voitures;
$car1->setName('Volvo');
$car1->setPrice(30000);
$car1->setDescription('Une voiture qu\'elle est bien');
echo $car1->getName().'<br>';
echo $car1->getPrice().'€<br>';
echo $car1->getDescription().'<br>';