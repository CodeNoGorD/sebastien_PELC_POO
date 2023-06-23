<?php
session_start();

class SecurityController
{
    private $userManager;
    protected $currentUser;

    //
    public function __construct()
    {
        $this->userManager = new UserManager();
        $this->currentUser = null;
        if (array_key_exists("user", $_SESSION)) {
            $this->currentUser = unserialize($_SESSION["user"]);
        }
    }

    public static function isLoggedIn()
    {
        if (!empty($_SESSION) &&  $_SESSION["user"]) {
            return true;
        } else
            return false;
    }

    public function logout()
    {
        session_destroy();
        $this->currentUser = null;

        header('Location: index.php?controller=security&action=login');
    }

    public function login()
    {
        $errors = [];
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            if (empty($_POST["username"])) {
                $errors["username"] = 'Veuillez saisir un username';
            }

            if (empty($_POST["password"])) {
                $errors["password"] = 'Veuillez saisir un mot de passe';
            }

            if (count($errors) == 0) {
                $user = $this->userManager->getByUsername($_POST["username"]);

                if (is_null($user) || !password_verify($_POST["password"], $user->getPassword())) {
                    $errors["password"] = 'Identifiant ou mot de passe invalid';
                } else {
                    $this->currentUser = $user;
                    $_SESSION["user"] = serialize($user);
                    header('Location: index.php?controller=default&action=home');
                }
            }
        }
        require 'View/security/login.php';
    }

    public function register()
    {

        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            // Username pas vide
            if (empty($_POST["username"])) {
                $errors["username"] = "Veuillez saisir un username";
            }
            // Username n'existe pas déjà
            $user = $this->userManager->getByUsername($_POST["username"]);

            if ($user) {
                $errors['username'] = 'Impossible cet utilisateur existe déjà';
            }

            // Nom pas vide
            if (empty($_POST["nom"])) {
                $errors["nom"] = 'Veuillez saisir votre nom';
            }

            // Prénom pas vide
            if (empty($_POST["prenom"])) {
                $errors["prenom"] = 'Veuillez saisir votre prénom';
            }

            // Mot de passe pas vide
            if (empty($_POST["password"])) {
                $errors["password"] = 'Veuillez saisir votre mot de passe';
            }

            // Mot de passe correspond à la confirmation
            if ($_POST["password"] !== $_POST["confirm_password"]) {
                $errors["confirm_password"] = 'Les mots de passe ne correspondent pas';
            }

            // Si pas d'erreur on enregistre l'utilisateur
            if (count($errors) == 0) {
                $user = new User(
                    null,
                    $_POST["username"],
                    $_POST["nom"],
                    $_POST["prenom"],
                    password_hash($_POST["password"], PASSWORD_DEFAULT)
                );

                $this->userManager->add($user);

                header('Location: index.php?controller=security&action=login');
            }
        }

        require 'View/security/register.php';
    }
}

