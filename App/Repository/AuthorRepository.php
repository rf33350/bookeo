<?php

namespace App\Repository;

use App\Entity\Author;
use App\Db\Mysql;


class AuthorRepository {

    public function findOneById(int $id) {
        //Appel bdd

        $mysql = Mysql::getInstance();
        
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('SELECT * FROM auteur where id = :id');
        $query->bindValue(':id', $id, $pdo::PARAM_INT);
        $query->execute();
        $author = $query->fetch();

        $authorEntity = new Author();

        $authorEntity->setId($author['id']);
        $authorEntity->setName($author['nom']);

        return $authorEntity;
    }

    public function findAllAuthors() {
        //Appel bdd
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('SELECT * FROM auteur');
        $query->execute();
        $authors = $query->fetchAll();

        $authorsEntities = [];
        foreach ($authors as $author) {

            $authorEntity = new Author();

            $authorEntity->setId($author['id']);
            $authorEntity->setName($author['nom']);
            
            $authorsEntities[] = $authorEntity;
        }
        return $authorsEntities;
    }
}
