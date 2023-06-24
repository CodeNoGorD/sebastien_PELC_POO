<?php
class MotoController extends SecurityController
{
    private $mm;

    public function __construct()
    {
        parent::__construct();
        $this->mm = new MotoManager();
    }

    public function displayAllMotos()
    {
        SecurityController::isloggedin();
        $motos = $this->mm->getAllMotos();
        require 'View/moto/list.php';
    }

    public function displayOneMoto($id)
    {
        $types = $this->mm->getAllTypes();
        $moto = $this->mm->getOneMoto($id);
        if(is_null($moto)){
            header("Location: index.php?controller=default&action=not-found");
        }
        require 'View/moto/moto.php';
    }

    public function addOneMoto()
    {
        $types = $this->mm->getAlltypes();
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            $moto = new Moto(null, $_POST["marque"],
                $_POST["modele"], $_POST["type"], $_FILES["image"]['name']);
            $this->mm->add($moto);
            header("Location: index.php?controller=moto&action=list");
        }
        require "View/moto/form-add.php";
    }

    public function deleteMoto($id)
    {
        $auto = $this->mm->delete($id);
        header("Location: index.php?controller=moto&action=list");
    }
}