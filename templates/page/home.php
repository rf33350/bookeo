<?php

require_once _ROOTPATH_.'/templates/header.php';
?>

<div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
        <img src="assets/images/logo-bookeo.jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="400" loading="lazy">
        </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold lh-1 mb-3">Bookeo</h1>
                <p class="lead">Le meilleur site de référencement de livres au monde</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a href="index.php?controller=book&action=list">
                        <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Liste des livres</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once _ROOTPATH_.'/templates/footer.php';