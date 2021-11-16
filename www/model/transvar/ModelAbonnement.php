<?php

require_once (File::build_path(array('model','Model.php')));

class ModelAbonnement extends Model {
    protected static $object = 'abonnement';

    private $id;
    private $intitule;
    private $tarif;
    private $agemin;
    private $agemax;
    private $dureevalidite;

    public function __construct($data = array())
    {
        if(!empty($data)) {
            $this->id = $data['id'];
            $this->intitule = $data['intitule'];
            $this->tarif = $data['tarif'];
            $this->agemin = $data['agemin'];
            $this->agemax = $data['agemax'];
            $this->dureevalidite = $data['dureevalidite'];
        }
    }

    public function get($nom_attribut) {
        if (property_exists($this, $nom_attribut))
            return $this->$nom_attribut;
        return false;
    }

    public function set($nom_attribut, $valeur) {
        if (property_exists($this, $nom_attribut))
            $this->$nom_attribut = $valeur;
        return false;
    }
}