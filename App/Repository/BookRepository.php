<?php

namespace App\Repository;

use App\Entity\Book;

class BookRepository {

    public function findOneById($id) {
        //Appel bdd
        $book = [
            'id' => 1,
            'title' => 'La promesse de l\'aube',
            'description' => 'Le meilleur livre de tous les temps'
        ];

        $bookEntity = new Book();
        $bookEntity->setId($book['id']);
        $bookEntity->setTitle($book['title']);
        $bookEntity->setDescription($book['description']);

        return $bookEntity;
    }

}