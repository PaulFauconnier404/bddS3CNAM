<?php

require_once (File::build_path(array('model','Model.php')));
require_once (File::build_path(array('controller', 'Controller.php')));

class ModelClient extends Model {
    protected static $object = 'client';

    private $id;
    private $datenaissance;
    private $idabonnement;
    private $idpersonne;

    public function __construct($data = array())
    {
        if(!empty($data)) {
            $this->id = $data['id'];
            $this->datenaissance = $data['datenaissance'];
            $this->idabonnement = $data['idabonnement'];
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