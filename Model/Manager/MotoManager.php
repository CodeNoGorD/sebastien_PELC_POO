<?php

class MotoManager extends DbManager
{
    public function getAllMotos()
    {
        $query = $this->pdo->prepare('SELECT * FROM moto');
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        $motos = [];
        foreach ($results as $res) {
            $motos[] = new Moto($res['moto_id'], $res['moto_marque'], $res['moto_modele'], $res['moto_type'], $res['moto_image']);
        }

        return $motos;
    }

    public function getOneTypeMoto($type)
    {
        $query = $this->pdo->prepare('SELECT * FROM moto WHERE moto_type = :type');
        $query->execute([
            'type' => $type
        ]);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        $motos = [];
        if ($results) {
            foreach ($results as $res) {
                $motos[] = new Moto($res['moto_id'], $res['moto_marque'], $res['moto_modele'], $res['moto_type'], $res['moto_image']);
            }
        }
        return $motos;
    }

    public function getOneMoto($id)
    {
        $query = $this->pdo->prepare('SELECT * FROM moto WHERE moto_id = :id');
        $query->execute([
            'id' => $id
        ]);
        $res = $query->fetch(PDO::FETCH_ASSOC);
        $moto = null;
        if ($res) {
            $moto = new Moto($res['moto_id'], $res['moto_marque'], $res['moto_modele'], $res['moto_type'], $res['moto_image']);
        }
        return $moto;
    }

    public function add(Moto $moto)
    {
        $marque = $moto->getMotoMarque();
        $modele = $moto->getMotoModele();
        $type = $moto->getMotoType();
        $image = $moto->getMotoImage();

        $query = $this->pdo->prepare(
            "INSERT INTO moto (moto_marque, moto_modele, moto_type, moto_image) VALUES
                    (:marque, :modele, :type, :image)");

        $query->execute(
            [
                "marque" => $marque,
                "modele" => $modele,
                "type" => $type,
                "image" => $image
            ]
        );

        $moto->setMotoId($this->pdo->lastInsertId());

        return $moto;
    }

    public function getAllTypes()
    {
        {
            $query = $this->pdo->prepare('SELECT * FROM type');
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }
    }

    public function delete($id)
    {
        $query = $this->pdo->prepare('DELETE FROM moto WHERE moto_id = :id');
        $query->execute([
            'id' => $id
        ]);
    }
}