<?php require 'View/parts/header.php'; ?>
<h1 class="my-4">AJOUTER UNE MOTO</h1>

<a href="index.php?controller=moto&action=list" class="my-4">Retour</a>

<div class="container">
    <form method="post" enctype="multipart/form-data" class="row">
        <div class="col-md-12">
            <label for="nom" class="form-label">Nom</label>
            <input type="text"
                   value="<?php if (array_key_exists("nom", $_POST)) {
                       echo($_POST["nom"]);
                   }; ?>"
                   name="nom" class="form-control
            <?php if (array_key_exists("nom", $errors)) {
                echo('is-invalid');
            } ?>"
                   id="nom">

            <div id="validateNom" class="invalid-feedback">
                <?php if (array_key_exists("nom", $errors)) {
                    echo($errors["nom"]);
                } ?>
            </div>
        </div>

        <div class="col-md-12">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description"></textarea>
        </div>

        <div class="col-md-12">
            <label for="validationCustom04" class="form-label">Terrain</label>
            <select class="form-select
                 <?php if (array_key_exists("terrain", $errors)) {
                echo('is-invalid');
            } ?>" name="terrain" id="validationCustom04">
                <option value="">Pas d'infos</option>
                <?php
                foreach (PlanetController::$allowedTerrain as $terrain) {
                    $selected = '';
                    if (array_key_exists("terrain", $_POST) && $_POST["terrain"] == $terrain) {
                        $selected = 'selected';
                    }
                    echo('<option ' . $selected . ' value="' . $terrain . '">' . $terrain . '</option>');
                }
                ?>
            </select>
            <div class="invalid-feedback">
                <?php if (array_key_exists("terrain", $errors)) {
                    echo($errors["terrain"]);
                } ?>
            </div>
        </div>

        <div class="col-md-12">
            <label for="picture" class="form-label">Photo</label>
            <input type="file" name="picture" class="form-control
            <?php if (array_key_exists("picture", $errors)) {
                echo('is-invalid');
            } ?>" id="picture">
            <div class="invalid-feedback">
                <?php if (array_key_exists("picture", $errors)) {
                    echo($errors["picture"]);
                } ?>
            </div>
        </div>


        <input type="submit" class="btn btn-success m-2">

    </form>
</div>
<?php require 'View/parts/footer.php'; ?>
