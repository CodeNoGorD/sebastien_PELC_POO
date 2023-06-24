<?php
require 'View/parts/header.php';
?>
<H1 class="my-5">LISTE DES MOTOS : </H1>
<a class="btn btn-primary mb-3" href="index.php?controller=default&action=home">retour</a>
<?php if (SecurityController::isloggedin()): ?>
    <a class="d-block w-25 mx-auto m-4 btn btn-primary" href="index.php?controller=moto&action=add">Ajouter une moto</a>

<form method="post" >
<div class="input-group d-flex justify-content-center">
    <select class="custom-select w-50" id="filter" name="filter">
        <option selected>Filtrez votre choix ...</option>
        <option value="0">Tout afficher</option>
        <option value="1">Motos Enduro</option>
        <option value="2">Motos Custom</option>
        <option value="3">Motos Sportives</option>
        <option value="4">Motos Roadster</option>
    </select>
    <div class="input-group-append mx-3">
        <button class="btn btn-outline-primary">Valider votre choix</button>
    </div>
</div>
</form>
<?php endif; ?>
<?php if(!isset($mototype) || $_POST['filter'] == 0): ?>
<div class="justify-content-center card-deck d-flex flex-wrap m-3 ">
    <?php foreach ($motos as $moto): ?>
        <div class="card mx-3 my-3" style="width: 18rem">
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
<?php endif; ?>
<?php if(isset($mototype) && !empty($mototype)): ?>
    <div class="justify-content-center card-deck d-flex flex-wrap m-3 ">
        <?php foreach ($mototype as $moto): ?>
            <div class="card mx-3 my-3" style="width: 18rem">
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

<?php endif; ?>

<?php require 'View/parts/footer.php'; ?>


