<?php

require_once _ROOTPATH_.'/templates/header.php';

/* @var $book \App\Entity\Book */

/* @var $author \App\Entity\Author */

?>

<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="uploads/books/<?= $book->getImage()?>" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" loading="lazy" width="700" height="500">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold lh-1 mb-3"><?= $book->getTitle(); ?></h1>
        <h2><?= $author->getName($book->getAuthor_id()); ?></h2>
        <p class="lead"><p><?= $book->getDescription() ?></p></p>
      </div>
    </div>
</div>
<div class="d-grid gap-2 d-md-flex justify-content-md-start">
    <a href="index.php?controller=book&action=edit&id=<?=$book->getId();?>">
        <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Modifier</button>
    </a>
</div>
<?php
require_once _ROOTPATH_.'/templates/footer.php';