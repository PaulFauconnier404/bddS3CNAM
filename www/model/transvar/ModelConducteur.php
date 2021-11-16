<?php

require_once (File::build_path(array('model','Model.php')));

class ModelConducteur extends Model {
    protected static $object = 'conducteur';

    private $id;
    private $salaire;
    private $dateeembauche;
    private $idbus;
    private $idpersonne;

    public function __construct($data = array())
    {
        if(!empty($data)) {
            $this->id = $data['id'];
            $this->salaire = $data['salaire'];
            $this->dateeembauche = $data['dateembauche'];
            $this->idbus = $data['idbus'];
            $this->idpersonne = $data['idpersonne'];
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