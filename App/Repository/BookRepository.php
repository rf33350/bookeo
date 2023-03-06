<?php

namespace App\Repository;

use App\Entity\Book;
use App\Db\Mysql;
use App\Tools\StringTools;

class BookRepository {

    public function findOneById(int $id) {
        //Appel bdd

        $mysql = Mysql::getInstance();
        
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('SELECT * FROM livre where id = :id');
        $query->bindValue(':id', $id, $pdo::PARAM_INT);
        $query->execute();
        $book = $query->fetch();

        $bookEntity = new Book();

        /*foreach ($book as $key => $value) {
            $bookEntity->{'set'.StringTools::toPascalCase($key)}($value);
        }*/

        $bookEntity->setId($book['id']);
        $bookEntity->setTitle($book['titre']);
        $bookEntity->setDescription($book['description']);
        $bookEntity->setImage($book['image']);
        $bookEntity->setType_id($book['type_id']);
        $bookEntity->setAuthor_id($book['auteur_id']);

        return $bookEntity;
    }

    public function findAllBooks() {
        //Appel bdd

        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('SELECT * FROM livre');
        $query->execute();
        $books = $query->fetchAll();

        $bookEntities = [];
        foreach ($books as $book) {

            $bookEntity = new Book();

            $bookEntity->setId($book['id']);
            $bookEntity->setTitle($book['titre']);
            $bookEntity->setDescription($book['description']);
            $bookEntity->setImage($book['image']);
            $bookEntity->setType_id($book['type_id']);
            $bookEntity->setAuthor_id($book['auteur_id']);

            $bookEntities[] = $bookEntity;
        }
        return $bookEntities;
    }

    function saveBook (int|null $id, string $title, string $description, string $type_id, string $author_id, string|null $image) {
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();
        
        $sql = "INSERT INTO `livre` (`id`, `titre`, `description`, `image`, `type_id`, `auteur_id`) VALUES (:id, :title, :description, :image, :type_id, :author_id);"; 
        $query = $pdo->prepare($sql);
        $query->bindParam(':id', $id, $pdo::PARAM_INT);
        $query->bindParam(':title', $title, $pdo::PARAM_STR);
        $query->bindParam(':description', $description, $pdo::PARAM_STR);
        $query->bindParam(':image', $image, $pdo::PARAM_STR);
        $query->bindParam(':type_id', $type_id, $pdo::PARAM_INT);
        $query->bindParam(':author_id', $author_id, $pdo::PARAM_INT);
        return $query->execute();
      }

    function modifyBook (int|null $id, string $title, string $description, string $type_id, string $author_id, string|null $image) {
      $mysql = Mysql::getInstance();
      $pdo = $mysql->getPDO();
      
      $sql = "UPDATE `livre` SET `titre` = :title, `description` = :description, `image`= :image, `type_id` = :type_id, `auteur_id` = :author_id WHERE `id` = :id";
      $query = $pdo->prepare($sql);
      $query->bindParam(':id', $id, $pdo::PARAM_INT);
      $query->bindParam(':title', $title, $pdo::PARAM_STR);
      $query->bindParam(':description', $description, $pdo::PARAM_STR);
      $query->bindParam(':image', $image, $pdo::PARAM_STR);
      $query->bindParam(':type_id', $type_id, $pdo::PARAM_INT);
      $query->bindParam(':author_id', $author_id, $pdo::PARAM_INT);
      return $query->execute();
    }

}