<?php

require_once(File::build_path(array('model', 'Model.php')));

class ModelCategorie extends Model
{
    protected static $object = 'Categorie';

    private $idCategorie;
    private $nomCategorie;
    private $nbPiece;


    public function __construct($data = array())
    {
        if (!empty($data)) {
            $this->idCategorie = $data['idCategorie'];
            $this->nomCategorie = $data['nomCategorie'];
            $this->nbPiece = $data['nbPiece'];
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
