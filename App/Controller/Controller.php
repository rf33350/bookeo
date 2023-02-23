<?php

namespace App\Controller;

Class Controller{
    public function route():void
    {
        if( isset($_GET['controller'])) {
            switch ($_GET['controller']) {
                case 'page':
                    //charger le controller de page
                    $pageController = new PageController();
                    $pageController->route();
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

    protected function render(string $path, array $params = []):void
    {
        $filePath = _ROOTPATH_.'/templates/'.$path.'.php';

        try {
            if(file_exists($filePath)) 
            {
                //on affiche la bonne page
                extract($params);
                require_once $filePath;
            }
            else 
            {
            //générer une exception
            throw new \Exception("Fichier non trouvé: ".$filePath, 1);
            }
        } catch (\Exception $e) 
        {
            echo $e->getMessage();
        }   
    }
}