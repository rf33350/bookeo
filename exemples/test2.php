<?php

interface IVehicule {
    public function accelerer();
    public function freiner();
}

trait Moteur {
    function demarrer() {
        echo 'demarrage du moteur';
    }

    function arreter() {
        echo 'arret du moteur';
    }
}

trait Klaxonne {
    function klaxonner() {
        echo 'MIIIIP';
    }

}

class Vehicule implements IVehicule {

    use Moteur, Klaxonne;
    protected string $marque;
    protected float $vitesse_max;

    public function __construct(string $marque, float $vitesse_max) {
        $this->setMarque($marque);
        $this->setVitesse_max($vitesse_max);
    }

    /**
     * Get the value of marque
     */ 
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * Set the value of marque
     *
     * @return  self
     */ 
    public function setMarque($marque)
    {
        $this->marque = $marque;

        return $this;
    }
    
    /**
     * Get the value of vitesse_max
     */ 
    public function getVitesse_max()
    {
        return $this->vitesse_max;
    }

    /**
     * Set the value of vitesse_max
     *
     * @return  self
     */ 
    public function setVitesse_max($vitesse_max)
    {
        $this->vitesse_max = $vitesse_max;

        return $this;
    }

    public function accelerer() {
        echo 'La voiture accelere';
    }
    public function freiner() {
        echo 'La voiture freine';
    }
}

class Voiture extends Vehicule {
    protected int $nombre_roues;
}

class Bateau extends Vehicule {
    protected int $nombre_cabines;
}

$voiture1 = new Voiture('Ferari', 123);
$voiture1->klaxonner();
echo '<br>'.$voiture1->getVitesse_max();

$voiture2 = new Voiture('Clio', 75);
echo '<br>'.$voiture2->getVitesse_max();