<?php

namespace App\Controller;

class PageController extends Controller 
{

    public function route():void
    {
        if( isset($_GET['action'])) {
            switch ($_GET['action']) {
                case 'about':
                    $this->about();
                    break;
                case 'home':
                    //appeler la methode home
                    $this->home();
                    break;
                default:
                    //on gère l'erreur
                    break;
            }
        } else {
            //charger la page d'accueil
        }
    }

    protected function about() {
        //On pourrait récupérer les données en faisant appel au model
        $params= [
            'test' => 'abc',
            'titre' => 'Nouvelle page',
        ];
        //On apelle la vue
        $path = 'page/about';
        $this->render($path, $params);
    }

    protected function home() {
        //On pourrait récupérer les données en faisant appel au model
        $params= [
            'test' => 'home1',
            'titre' => 'Home2',
        ];
        //On apelle la vue
        $path = 'page/home';
        $this->render($path, $params);
    }

}