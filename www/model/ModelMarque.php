<?php

require_once(File::build_path(array('model', 'Model.php')));

class ModelMarque extends Model
{
    protected static $object = 'Marque';

    private $idMarque;
    private $nomMarque;
    private $nbModele;

    public function __construct($data = array())
    {
        if (!empty($data)) {
            $this->idMarque = $data['idMarque'];
            $this->nomMarque = $data['nomMarque'];
            $this->nbModele = $data['nbModele'];
        }
    }

    public function get($nom_attribut)
    {
        if (property_exists($this, $nom_attribut))
            return $this->$nom_attribut;
        return false;
    }

    public function set($nom_attribut, $valeur)
    {
        if (property_exists($this, $nom_attribut))
            $this->$nom_attribut = $valeur;
        return false;
    }
}
