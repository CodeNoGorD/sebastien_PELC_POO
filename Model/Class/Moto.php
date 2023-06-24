<?php
class Moto
{
    private $moto_id;
    private $moto_marque;
    private $moto_modele;
    private $moto_type;
    private $moto_image;


    public function __construct($moto_id, $moto_marque, $moto_modele, $moto_type, $moto_image)
    {
        $this->moto_id = $moto_id;
        $this->moto_marque = $moto_marque;
        $this->moto_modele = $moto_modele;
        $this->moto_type = $moto_type;
        $this->moto_image = $moto_image;
    }

    /**
     * @return int
     */
    public function getMotoId(): int
    {
        return $this->moto_id;
    }

    /**
     * @param int $moto_id
     */
    public function setMotoId(int $moto_id): void
    {
        $this->moto_id = $moto_id;
    }

    /**
     * @return string
     */
    public function getMotoMarque(): string
    {
        return $this->moto_marque;
    }

    /**
     * @param string $moto_marque
     */
    public function setMotoMarque(string $moto_marque): void
    {
        $this->moto_marque = $moto_marque;
    }

    /**
     * @return string
     */
    public function getMotoModele(): string
    {
        return $this->moto_modele;
    }

    /**
     * @param string $moto_modele
     */
    public function setMotoModele(string $moto_modele): void
    {
        $this->moto_modele = $moto_modele;
    }

    /**
     * @return int
     */
    public function getMotoType()
    {
        return $this->moto_type;
    }

    /**
     * @param int $moto_type
     */
    public function setMotoType(int $moto_type): void
    {
        $this->moto_type = $moto_type;
    }

    /**
     * @return string
     */
    public function getMotoImage(): string
    {
        return $this->moto_image;
    }

    /**
     * @param string $moto_image
     */
    public function setMotoImage(string $moto_image): void
    {
        $this->moto_image = $moto_image;
    }

}