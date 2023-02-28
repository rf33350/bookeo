<?php

namespace App\Controller;

class PageController extends Controller 
{

    public function route():void
    {
        try {
            if( isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'about':
                        //appeler la methode about
                        $this->about();
                        break;
                    case 'home':
                        //appeler la methode home
                        $this->home();
                        break;
                    case '':  
                        throw new \Exception("Aucune action détectée");
                        break;
                    default:
                        throw new \Exception("L'action ".$_GET['action']." n'existe pas");
                        break;
                }
            } else {
                throw new \Exception("Aucune action détectée");
            }
        } catch(\Exception $e) {
            $this->render('/errors/error_default',[
                'error' => $e->getMessage()
            ]);
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
    
        ];
        //On apelle la vue
        $path = 'page/home';
        $this->render($path, $params);
    }

}