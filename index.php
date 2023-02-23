<?php
  //on définit une constante pour avoir le chemin racine du projet
  define('_ROOTPATH_', __DIR__);

  spl_autoload_register();
  

  use App\Controller\Controller;

  $controller = new Controller();
  $controller->route();
?>

