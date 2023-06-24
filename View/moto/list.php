<?php
require 'View/parts/header.php';
?>
<H1 class="my-5">LISTE DES MOTOS : </H1>
<?php if (SecurityController::isloggedin()): ?>
    <a class="m-4 btn btn-primary" href="index.php?controller=moto&action=add">Ajouter une moto</a>
<?php endif; ?>

<div class="card-deck d-flex m-3 ">
    <?php foreach ($motos as $moto): ?>
        <div class="card mx-2" style="width: 18rem;">
            <img class="card-img-top pt-5" src="public/img/<?= $moto->getMotoImage(); ?>" max-height="400" alt="Card image deck">
            <div class="card-body d-flex flex-column justify-content-end">
                <h5 class="card-title text-center"><?php echo $moto->getMotoMarque(); ?> <?= $moto->getMotoModele(); ?></h5>
                <p class="card-text">
                    <a class="d-block mx-auto btn btn-primary my-4"
                       href="index.php?controller=moto&action=one&id=<?= $moto->getMotoId() ?>">Détails</a>
                </p>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<a class="btn btn-primary" href="index.php?controller=default&action=home">retour</a>
<?php require 'View/parts/footer.php'; ?>


