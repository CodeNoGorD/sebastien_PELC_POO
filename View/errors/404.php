
<div class="container">
    <?php require 'View/parts/header.php'; ?>
    <h1 class="text-center my-3">Oops ! Cette page n'existe pas ...</h1>

    <img class="d-block rounded-2 mx-auto my-4" src="public/img/404.jpg" alt="erreur 404">
    <?php
//        if($_GET["scope"] == 'planet'){
//            echo('<h2>Cette planète a probablement été supprimée</h2>');
//        }
    ?>
   <button class="btn btn-primary d-block mx-auto my-4" onclick="window.history.back()">Revenir en arrière</button>

    <?php require 'View/parts/footer.php'; ?>
</div>