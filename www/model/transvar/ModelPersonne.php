<?php

require_once(File::build_path(array('model', 'Model.php')));

class ModelPersonne extends Model
{
    protected static $object = 'personne';

    private $id;
    private $nom;
    private $prenom;
    private $ville;
    private $codepostal;

    public function __construct($data = array())
    {
        if (!empty($data)) {
            $this->id = $data['id'];
            $this->nom = $data['nom'];
            $this->prenom = $data['prenom'];
            $this->ville = $data['ville'];
            $this->codepostal = $data['codepostal'];
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
