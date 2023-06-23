<?php
abstract class DbManager
{
    protected $pdo;
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $dbName = 'motos';

    public function __construct()
    {
        try {
            $this->pdo = new PDO(
                "mysql:dbname=" . $this->dbName . ";host=" . $this->host,
                $this->user,
                $this->password
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw $e;
            die();
        }
    }
}
