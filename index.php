<?php
require 'autoload.php';

if (!array_key_exists("controller", $_GET) &&
    !array_key_exists("action", $_GET)) {
    header('Location: index.php?controller=default&action=home');
}

if ($_GET["controller"] == 'default') {
        $controller = new DefaultController();
        // Si le paramètre get est égal à home
        if ($_GET["action"] == "home") {
            $controller->home();
        }
        if ($_GET["action"] == 'not-found') {
            $controller->notFound();
        }
}
    if ($_GET["controller"] == 'moto') {
        $controller = new MotoController();
        if ($_GET["action"] == "list") {
            $controller->displayAllMotos();
        }
        if ($_GET["action"] == "one") {
            $controller->displayOneMoto($_GET['id']);
        }
        if ($_GET["action"] == "add" && SecurityController::isloggedin()) {
            $controller->addOneMoto();
        }else if ($_GET["action"] == "add" && !SecurityController::isloggedin()){
            header("Location: index.php?controller=security&action=login");
        }
        if ($_GET["action"] == "delete" && SecurityController::isloggedin()) {
            $controller->deleteMoto($_GET['id']);
        }else if ($_GET["action"] == "delete" && !SecurityController::isloggedin()){
            header("Location: index.php?controller=security&action=login");
        }
    }
if ($_GET["controller"] == 'security') {
    $controller = new SecurityController();
    if ($_GET["action"] == 'register') {
        $controller->register();
    }

    if ($_GET["action"] == 'login') {
        $controller->login();
    }

    if ($_GET["action"] == 'logout') {
        $controller->logout();
    }
}
