<?php

use App\Repository\BookRepository;
use App\Tools\StringTools;


require_once _ROOTPATH_.'/templates/header.php';

/* @var $book \App\Entity\Book */

    $stringtool = new StringTools();
    $bookRepository = new BookRepository();


    $errors = [];
    $messages = [];

    if (isset($_POST['saveBook'])) {
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
            $res = $bookRepository->saveBook(null, $_POST['title'], $_POST['description'], $_POST['type_id'], $_POST['author_id'], $fileName );
            
            if ($res) {
                $messages[] = 'Le livre a bien été créé';
            } else {
                $errors[] = 'Le livre n\'a pas été créé';
            }
        }

    
    }

?>

<div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <h1>Ajouter un livre</h1>
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
        <input type="text" class="form-control" name="title" id="title" >
    </div>
    <br>
    <div class="form-group">
        <label class="text-center" for="author_id">Auteur</label>
        <input type="text" class="form-control" name="author_id" id="author_id">
    </div>
    <br>
    <div class="form-group">
        <label class="text-center" for="type_id">Type</label>
        <input type="text" class="form-control" name="type_id" id="type_id">
    </div>
    <br>
    <div class="form-group">
        <label class="text-center" for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3" ></textarea>
    </div>
    <br>
    <div class="form-group mb-3">
        <label class="form-label" for="file">Image</label>
        <input type="file" name="file" id="file">
    </div>
    <br>
    <div>
        <button type="submit" name="saveBook" class="btn btn-primary">Ajouter livre</button>
    </div>
</form>


  
<?php

require_once _ROOTPATH_.'/templates/footer.php';