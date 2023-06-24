<?php
class UserManager extends DbManager
{
    public function getByUsername($username){
        $query = $this->pdo->prepare(
            "SELECT * FROM user WHERE user_name = :username");
        $query->execute([
            'username' => $username
        ]);
        $res = $query->fetch();

        $user = null;
        if($res != false){
            $user = new User($res["user_id"], $res["user_name"],
                $res["user_lastname"], $res["user_firstname"],
                $res["user_password"]);
        }
        return $user;
    }

    public function add(User $user){
        $username = $user->getUserName();
        $nom = $user->getUserLastname();
        $prenom = $user->getUserFirstname();
        $password = $user->getUserPassword();

        $query = $this->pdo->prepare(
            "INSERT INTO user (user_name, user_lastname, user_firstname, user_password) VALUES 
                    (:username, :nom, :prenom, :password)");
        $query->execute([
            'username' => $username,
            'nom' => $nom,
            'prenom' => $prenom,
            'password' => $password
        ]);
        $user->setUserId($this->pdo->lastInsertId());

        return $user;
    }
}