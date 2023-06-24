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
            if (empty($_POST["user_name"])) {
                $errors["name"] = 'Veuillez saisir un Nom d\'utilisateur';
            }

            if (empty($_POST["user_password"])) {
                $errors["password"] = 'Veuillez saisir un mot de passe';
            }

            if (count($errors) == 0) {
                $user = $this->userManager->getByUserName($_POST["user_name"]);

                if (is_null($user) || !password_verify($_POST["user_password"], $user->getUserPassword())) {
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
            if (empty($_POST["user_name"])) {
                $errors["user_name"] = "Veuillez saisir un nom d'utilisateur";
            }
            // Username n'existe pas déjà
            $user = $this->userManager->getByUserName($_POST["user_name"]);

            if ($user) {
                $errors['user_name'] = 'Impossible cet utilisateur existe déjà';
            }

            // Nom pas vide
            if (empty($_POST["user_lastname"])) {
                $errors["user_lastname"] = 'Veuillez saisir votre nom';
            }

            // Prénom pas vide
            if (empty($_POST["user_firstname"])) {
                $errors["user_firstname"] = 'Veuillez saisir votre prénom';
            }

            // Mot de passe pas vide
            if (empty($_POST["user_password"])) {
                $errors["user_password"] = 'Veuillez saisir votre mot de passe';
            }

            // Mot de passe correspond à la confirmation
            if ($_POST["user_password"] !== $_POST["confirm_password"]) {
                $errors["confirm_password"] = 'Les mots de passe ne correspondent pas';
            }

            // Si pas d'erreur on enregistre l'utilisateur
            if (count($errors) == 0) {
                $user = new User(
                    null,
                    $_POST["user_name"],
                    $_POST["user_lastname"],
                    $_POST["user_firstname"],
                    password_hash($_POST["user_password"], PASSWORD_BCRYPT)
                );

                $this->userManager->add($user);

                header('Location: index.php?controller=security&action=login');
            }
        }

        require 'View/security/register.php';
    }
}

