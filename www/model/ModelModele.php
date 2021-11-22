<?php

require_once(File::build_path(array('model', 'Model.php')));

class ModelModele extends Model
{
    protected static $object = 'Modele';

    private $idModeleVoiture;
    private $nomModeleVoiture;
    private $anneeModeleVoiture;
    private $nbVoiture;
    private $idMarque;

    public function __construct($data = array())
    {
        if (!empty($data)) {
            $this->idModeleVoiture = $data['idmodelevoiture'];
            $this->nomModeleVoiture = $data['nommodelevoiture'];
            $this->anneeModeleVoiture = $data['anneemodelevoiture'];
            $this->nbVoiture = $data['nbvoiture'];
            $this->idMarque = $data['idmarquemodele'];
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
