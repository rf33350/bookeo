<?php

namespace App\Controller;

use App\Repository\AuthorRepository;
use App\Repository\BookRepository;

class BookController extends Controller 
{

    public function route():void
    {
        try {
            if( isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'show':
                        //afficher un livre
                        $this->show();
                        break;
                    case 'list':
                        //afficher la liste des livres
                        $this->list();
                        break;
                    case 'edit':
                        //modifier un livre
                        $this->edit();
                        break;
                    case 'add':
                        //ajouter un livre
                        $this->add();
                        break;
                    case 'delete':
                        //ajouter un livre
                        $this->delete();
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

    protected function show() {
       
        try {
            if(isset($_GET['id']) && $_GET['id'] !=='') {
                $id = (int)$_GET['id'];
                
                //charger le livre par un appel au repository
                $bookRepository = new BookRepository();
                $book = $bookRepository->findOneById($id);
                
                $authorRepository = new AuthorRepository();
                $author = $authorRepository->findOneById($id);

                $params= [
                    'book' => $book,
                    'author' => $author,
                ];
                $path = 'book/show';
                //On apelle la vue book/show
                $this->render($path, $params);
            } else {
                throw new \Exception("L'ID du livre n'existe pas");
            }
        } catch (\Exception $e) {
            $this->render('/errors/error_default',[
                'error' => $e->getMessage()
            ]);
        }
        
        
    }

    protected function list() {
        try {
                $bookRepository = new BookRepository();
                $books = $bookRepository->findAllBooks();

                $authorRepository = new AuthorRepository();
                $authors = $authorRepository->findAllAuthors();


                $params= [
                    'books' => $books,
                    'authors' => $authors,
                ];
                $path = 'book/list';
                //On apelle la vue book/show
                $this->render($path, $params);
        } catch (\Exception $e) {
            $this->render('/errors/error_default',[
                'error' => $e->getMessage()
            ]);
    
        }    
    }

    protected function edit() {
        try {
            if(isset($_GET['id']) && $_GET['id'] !=='') {
                $id = (int)$_GET['id'];
                
                //charger le livre par un appel au repository
                $bookRepository = new BookRepository();
                $book = $bookRepository->findOneById($id);

                $params= [
                    'book' => $book,
                ];
                $path = 'book/edit';
                //On apelle la vue book/show
                $this->render($path, $params);
            } else {
                throw new \Exception("L'ID du livre n'existe pas");
            }
        } catch (\Exception $e) {
            $this->render('/errors/error_default',[
                'error' => $e->getMessage()
            ]);
        }
    }

    protected function add() {
        //On pourrait récupérer les données en faisant appel au model
        $params= [
    
        ];
        //On apelle la vue
        $path = 'book/add';
        $this->render($path, $params);
    }

    protected function delete() {
        //On pourrait récupérer les données en faisant appel au model
        $params= [
    
        ];
        //On apelle la vue
        $path = 'book/delete';
        $this->render($path, $params);
    }

}