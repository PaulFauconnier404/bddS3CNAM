<?php

require_once(File::build_path(array('model', 'Model.php')));

class ModelVoiture extends Model
{
    protected static $object = 'voiture';

    private $idVoiture;
    private $dateEntreeVoiture;
    private $descriptifVoiture;
    private $couleurVoiture;
    private $etatVendableVoiture;
    private $idModeleVoiture;

    public function __construct($data = array())
    {
        if (!empty($data)) {
            $this->idVoiture = $data['idvoiture'];
            $this->dateEntreeVoiture = $data['dateentreevoiture'];
            $this->descriptifVoiture = $data['descriptifvoiture'];
            $this->couleurVoiture = $data['couleurvoiture'];
            $this->etatVendableVoiture = $data['etatvendablevoiture'];
            $this->idModeleVoiture = $data['idmodele'];
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
