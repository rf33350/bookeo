<?php

use App\Repository\BookRepository;
use App\Tools\StringTools;


require_once _ROOTPATH_.'/templates/header.php';

/* @var $book \App\Entity\Book */
    $stringtool = new StringTools();
    $bookRepository = new BookRepository();


    $errors = [];
    $messages = [];

    if (isset($_POST['ModifyBook'])) {
        $fileName = null;
        
        if (isset($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name'] != '') {
            $checkImage = getimagesize($_FILES['file']['tmp_name']);

            if ($checkImage !== false) {

                $fileName = uniqid().'-'.$stringtool->slugify($_FILES['file']['name']);
                move_uploaded_file($_FILES['file']['tmp_name'], "uploads/books/$fileName");
                
            } else {
                $errors[] = 'L\'image n\'a pas été uploadé';
            }
        }
        if (!$errors) {
            if ($fileName) {
                $res = $bookRepository->modifyBook($book->getId(), $_POST['title'], $_POST['description'], $_POST['type_id'], $_POST['author_id'], $fileName );
            } else {
                $res = $bookRepository->modifyBook($book->getId(), $_POST['title'], $_POST['description'], $_POST['type_id'], $_POST['author_id'], $book->getImage());
            }
            
            if ($res) {
                $messages[] = 'Le livre a bien été modifié';
            } else {
                $errors[] = 'Le livre n\'a pas été modifié';
            }

            header('index.php?controller=book&action=list');
        }
    
    }

?>

<div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <h1>Modifier un livre</h1>
    <?php foreach ($messages as $message) {?>
    <div class="alert alert-succes">
        <?= $message; ?>
    </div>
    <?php } ?>
    <?php foreach ($errors as $error) {?>
    <div class="alert alert-danger">
        <?= $error; ?>
    </div>
    <?php } ?>
</div>

<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label class="text-center" for="title">Titre du livre</label>
        <input type="text" class="form-control" name="title" id="title" value="<?= $book->getTitle()?>">
    </div>
    <br>
    <div class="form-group">
        <label class="text-center" for="author_id">Auteur</label>
        <input type="text" class="form-control" name="author_id" id="author_id" value="<?= $book->getAuthor_id() ?>">
    </div>
    <br>
    <div class="form-group">
        <label class="text-center" for="type_id">Type</label>
        <input type="text" class="form-control" name="type_id" id="type_id" value="<?= $book->getType_id() ?>">
    </div>
    <br>
    <div class="form-group">
        <label class="text-center" for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3" ><?= $book->getDescription() ?></textarea>
    </div>
    <br>
    <?php if ($book->getImage()) {?>
    <img src="uploads/books/<?= $book->getImage()?>" alt="<?= $book->getTitle()?>">
    <p>Pour changer l'image veuillez sélectionner un fichier</p> 
    <?php }?>
    <div class="form-group mb-3">
        <label class="form-label" for="file">Image</label>
        <input type="file" name="file" id="file">
    </div>
    <br>
    <div>
        <button type="submit" name="ModifyBook" class="btn btn-primary">Modifier</button>
    </div>
</form>
 
<?php

require_once _ROOTPATH_.'/templates/footer.php';