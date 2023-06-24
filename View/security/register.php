<?php
require 'View/parts/header.php';
?>
<div class="container">

    <h1 class="my-4">Créer mon compte !!</h1>

    <a href="index.php?controller=security&action=login" class="btn btn-primary my-4"> Retour</a>

    <form method="post">
        <div class="col-md-12 my-4">
            <label for="user_name">PSEUDO UTILISATEUR</label>
            <input id="user_name" type="text" name="user_name"
                   class="form-control
                    <?php if(array_key_exists('user_name', $errors)){echo('is-invalid');}?>"
                   value="<?php if(array_key_exists("user_name",$_POST)){echo($_POST["user_name"]);}?>">

            <div class="invalid-feedback">
                <?php if(array_key_exists("user_name", $errors)){echo($errors["user_name"]);}?>
            </div>
        </div>

        <div class="col-md-12 my-4">
            <label for="user_lastname">NOM</label>
            <input id="user_lastname"
                   value="<?php if(array_key_exists("user_lastname",$_POST)){echo($_POST["user_lastname"]);}?>"
                   type="text" name="user_lastname" class="form-control
            <?php if(array_key_exists('user_lastname', $errors)){echo('is-invalid');}?>">
            <div class="invalid-feedback">
                <?php if(array_key_exists("user_lastname", $errors)){echo($errors["user_lastname"]);}?>
            </div>
        </div>

        <div class="col-md-12 my-4">
            <label for="user_firstname">PRENOM</label>
            <input id="user_firstname" type="text" name="user_firstname"
                   value="<?php if(array_key_exists("user_firstname",$_POST)){echo($_POST["user_firstname"]);}?>"
                   class="form-control    <?php if(array_key_exists('user_firstname', $errors)){echo('is-invalid');}?>">

            <div class="invalid-feedback">
                <?php if(array_key_exists("user_firstname", $errors)){echo($errors["user_firstname"]);}?>
            </div>

        </div>

        <div class="col-md-12 my-4">
            <label for="user_password">MOT DE PASSE</label>
            <input id="user_password" type="password"
                   name="user_password"
                   class="form-control  <?php if(array_key_exists('user_password', $errors)){echo('is-invalid');}?>">
            <div class="invalid-feedback">
                <?php if(array_key_exists("user_password", $errors)){echo($errors["user_password"]);}?>
            </div>
        </div>

        <div class="col-md-12 my-4">
            <label for="confirm_password">CONFIRMATION</label>
            <input id="confirm_password" type="password"
                   name="confirm_password"
                   class="form-control  <?php if(array_key_exists('confirm_password', $errors)){echo('is-invalid');}?>">

            <div class="invalid-feedback">
                <?php if(array_key_exists("confirm_password", $errors)){echo($errors["confirm_password"]);}?>
            </div>
        </div>

        <input type="submit" class="btn btn-success my-4">

    </form>
<?php require 'View/parts/footer.php'; ?>