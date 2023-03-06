<?php
require_once _ROOTPATH_.'/templates/header.php';
/* @var $book \App\Entity\Book */

/* @var $author \App\Entity\Author */



?> 


<div class="container">
    <div class="row">

    <?php
    foreach ($books as $book) {
        ?> 


        <div class="col-md-4 col-sm-12">
            <div class="card my-5" style="width: 18rem;">
                <img src="uploads/books/<?= $book->getImage()?>" class="card-img-top" alt="<?= $book->getTitle(); ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $book->getTitle(); ?></h5>
                    <p class="card-text"><?= substr($book->getDescription(), 0, 150).'...' ?></p>
                    <div class="text-center">
                        <a href="index.php?controller=book&action=show&id=<?= $book->getId(); ?>" class="btn btn-primary center">Voir</a>
                    </div>
                </div>
            </div>
        </div>

    <?php
    }
    ?> 
    </div>
</div>
<?php
require_once _ROOTPATH_.'/templates/footer.php';
?> 