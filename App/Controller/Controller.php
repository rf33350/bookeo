<?php

namespace App\Controller;

Class Controller{
    public function route():void
    {
        if( isset($_GET['controller'])) {
            switch ($_GET['controller']) {
                case 'page':
                    //charger le controller de page
                    var_dump('On charge PageController');
                    break;
                case 'book':
                    //charger le controller de page
                    var_dump('On charge BookController');
                    break;
                default:
                    //on gère l'erreur
                    break;
            }
        } else {
            //charger la page d'accueil
        }
    }
}