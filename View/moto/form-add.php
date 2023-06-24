<?php require 'View/parts/header.php'; ?>
<h1 class="my-4">AJOUTER UNE MOTO</h1>

<a href="index.php?controller=moto&action=list" class="btn btn-primary my-4">Retour</a>

<div class="container">

    <form method="post" enctype="multipart/form-data" class="row">
        <div class="col-md-12 my-3">
            <label for="moto_marque" class="form-label">MARQUE DE LA MOTO</label>
            <input type="text"
                   value="<?php if (array_key_exists("moto_marque", $_POST)) {
                       echo($_POST["moto_marque"]);
                   }; ?>"
                   name="moto_marque" class="form-control
            <?php if (array_key_exists("moto_marque", $errors)) {
                echo('is-invalid');
            } ?>"
                   id="moto_marque">

            <div id="validateNom" class="invalid-feedback">
                <?php if (array_key_exists("moto_marque", $errors)) {
                    echo($errors["moto_marque"]);
                } ?>
            </div>
        </div>
        <div class="col-md-12 my-3">
            <label for="moto_modele" class="form-label">MODELE DE LA MOTO</label>
            <input type="text"
                   value="<?php if (array_key_exists("moto_modele", $_POST)) {
                       echo($_POST["moto_modele"]);
                   }; ?>"
                   name="moto_modele" class="form-control
            <?php if (array_key_exists("moto_modele", $errors)) {
                echo('is-invalid');
            } ?>"
                   id="moto_modele">

            <div id="validateNom" class="invalid-feedback">
                <?php if (array_key_exists("moto_modele", $errors)) {
                    echo($errors["moto_modele"]);
                } ?>
            </div>
        </div>
        <div class="col-md-12 my-3">
            <label for="moto_type" class="form-label">TYPE DE MOTO</label>
            <select class="form-select
                 <?php if (array_key_exists("moto_type", $errors)) {
                echo('is-invalid');
            } ?>" name="moto_type" id="moto_type">
                <option value="">** Veuillez sélectionner le type de moto **</option>
                <?php foreach ($types as $type): ?>
                    <option value="<?=$type['type_id'] ?>"><?=$type['type_name'] ?></option>
                <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">
                <?php if (array_key_exists("moto_type", $errors)) {
                    echo($errors["moto_type"]);
                } ?>
            </div>
        </div>
        <div class="col-md-12 my-3">
            <label for="moto_image" class="form-label">IMAGE</label>
            <input type="file" name="moto_image" class="form-control
            <?php if (array_key_exists("moto_image", $errors)) {
                echo('is-invalid');
            } ?>" id="moto_image">
            <div class="invalid-feedback">
                <?php if (array_key_exists("moto_image", $errors)) {
                    echo($errors["moto_image"]);
                } ?>
            </div>
        </div>

        <input type="submit" class="btn btn-success w-25 d-block mx-auto my-5">

    </form>
</div>
<?php require 'View/parts/footer.php'; ?>
