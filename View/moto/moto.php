<?php
require 'View/parts/header.php';
$index = $moto->getMotoType() - 1;
?>
<H1 class="my-5">DETAIL MOTO : </H1>
<div class="container text-center">
    <p>Marque de la moto : <?php echo $moto->getMotoMarque(); ?></p>
    <p>Modèle de la moto : <?= $moto->getMotoModele(); ?></p>
    <p>Type de moto : <?= $types[$index]['type_name']  ?></p>
    <?php if(SecurityController::isloggedin()): ?>
        <a class="btn btn-primary my-4" href="index.php?controller=moto&action=update&id=<?=$moto->getMotoId() ?>">UDPATE</a>
        <a class="btn btn-danger my-4" href="index.php?controller=moto&action=delete&id=<?=$moto->getMotoId() ?>">DELETE</a>
    <?php endif; ?>
    <img class="d-block mx-auto w-75 rounded-2" src="public/img/<?= $moto->getMotoImage(); ?>" alt="">
</div>

<?php require 'View/parts/footer.php'; ?>

<a class="btn btn-primary" href="index.php?controller=moto&action=list">retour</a>
