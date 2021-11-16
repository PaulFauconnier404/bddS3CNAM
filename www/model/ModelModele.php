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
            $this->idModeleVoiture = $data['idModeleVoiture'];
            $this->nomModeleVoiture = $data['nomModeleVoiture'];
            $this->anneeModeleVoiture = $data['anneeModeleVoiture'];
            $this->nbVoiture = $data['nbVoiture'];
            $this->idMarque = $data['idMarqueModele'];
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
