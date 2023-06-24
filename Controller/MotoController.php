<?php

class MotoController extends SecurityController
{
    private $mm;

    public static $allowedPicture = [
        "image/jpeg",
        "image/png"
    ];

    public function __construct()
    {
        parent::__construct();
        $this->mm = new MotoManager();
    }

    public function displayAllMotos()
    {
        SecurityController::isloggedin();
        $motos = $this->mm->getAllMotos();
        if (!empty($_POST)) {
            $mototype = $this->mm->getOneTypeMoto($_POST['filter']);
        }
        require 'View/moto/list.php';
    }

    public function displayOneMoto($id)
    {
        $types = $this->mm->getAllTypes();
        $moto = $this->mm->getOneMoto($id);
        if (is_null($moto)) {
            header("Location: index.php?controller=default&action=not-found");
        }
        require 'View/moto/moto.php';
    }

    public function addOneMoto()
    {
        $types = $this->mm->getAlltypes();
        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            $errors = $this->checkForm();
            if (count($errors) == 0) {
                $uniqFileName = null;
                if (!in_array($_FILES["moto_image"]["type"], self::$allowedPicture)) {
                    $errors["moto_image"] = "Je n'accepte ce fichier veuillez ajouter une image";
                }
                if ($_FILES["moto_image"]["error"] != 0) {
                    $errors["moto_image"] = 'Erreur de l\'upload, veuillez sélectionner un fichier';
                }
                if ($_FILES["moto_image"]["size"] > 1000000) {
                    $errors["moto_image"] = "Le fichier est trop gros";
                }
                if (count($errors) == 0) {
                    $extension = explode('/', $_FILES["moto_image"]["type"])[1];
                    $uniqFileName = uniqid() . '.' . $extension;
                    move_uploaded_file($_FILES["moto_image"]["tmp_name"], "Public/img/" . $uniqFileName);
                    $moto = new Moto(null, $_POST["moto_marque"],
                        $_POST["moto_modele"], $_POST["moto_type"], $uniqFileName);
                    $this->mm->add($moto);
                    header("Location: index.php?controller=moto&action=list");
                }
            }
        }
        require "View/moto/form-add.php";
    }

    private function checkForm()
    {
        $errors = [];
        if (empty($_POST["moto_marque"])) {
            $errors["moto_marque"] = 'Veuillez saisir le nom de la marque';
        }
        if (empty($_POST["moto_modele"])) {
            $errors["moto_modele"] = 'Veuillez saisir le nom du modèle';
        }

        if (strlen($_POST["moto_marque"]) > 250) {
            $errors["moto_marque"] = "Le texte est trop long (250 caractères maximum)";
        }
        if (strlen($_POST["moto_modele"]) > 250) {
            $errors["moto_modele"] = "Le text est trop long (250 caractères maximum)";
        }
        return $errors;
    }

    public function deleteMoto($id)
    {
        $auto = $this->mm->delete($id);
        header("Location: index.php?controller=moto&action=list");
    }
}