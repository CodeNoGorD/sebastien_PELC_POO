<?php
class DefaultController extends SecurityController {

    public function __construct()
    {
        parent::__construct();
        parent::isLoggedIn();
    }

    public function home(){
        require 'View/home.php';
    }

    public function notFound(){
        http_response_code(404);
        require 'View/errors/404.php';
    }
}