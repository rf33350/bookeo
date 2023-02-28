<?php

namespace App\Controller;

Class Controller{
    public function route():void
    {
        try {
           if( isset($_GET['controller'])) {
            switch ($_GET['controller']) {
                case 'page':
                    //charger le controller de page
                    $pageController = new PageController();
                    $pageController->route();
                    break;
                case 'book':
                    //charger le controller de book
                    $bookController = new BookController();
                    $bookController->route();
                    break;
                default:
                    throw new \Exception("Le controleur n'existe pas");
                    break;
                }
            } else {
                $pageController = new PageController();
                $pageController->home();
            } 
        } catch(\Exception $e) {
            $this->render('/errors/error_default',[
                'error' => $e->getMessage()
            ]);
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
            $this->render('/errors/error_default',[
                'error' => $e->getMessage()
            ]);
        }   
    }
}