<?php
require 'View/parts/header.php';
?>

<div class="container">

    <h1 class="my-4">CONNEXION</h1>

    <a href="index.php?controller=security&action=register" class="btn btn-primary my-4"> CREER UN COMPTE</a>

    <form method="post">
        <div class="col-md-12 my-4">
            <label for="user_name">Username *</label>
            <input id="user_name" type="text" name="user_name"
                   class="form-control
                    <?php  if(array_key_exists('user_name', $errors)){echo('is-invalid');}?>"
                   value="<?php  if(array_key_exists("user_name",$_POST)){echo($_POST["user_name"]);}?>">

            <div class="invalid-feedback">
                <?php  if(array_key_exists("user_name", $errors)){echo($errors["user_name"]);}?>
            </div>
        </div>


        <div class="col-md-12 my-4">
            <label for="user_password">Mot de passe *</label>
            <input id="user_password" type="password"
                   name="user_password"
                   class="form-control  <?php  if(array_key_exists('user_password', $errors)){echo('is-invalid');}?>">
            <div class="invalid-feedback">
                <?php  if(array_key_exists("user_password", $errors)){echo($errors["user_password"]);}?>
            </div>
        </div>


        <input type="submit" class="btn btn-success my-5">

    </form>

    <?php require 'View/parts/footer.php'; ?>
</div>
