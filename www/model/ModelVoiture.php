<?php

require_once(File::build_path(array('model', 'Model.php')));

class ModelVoiture extends Model
{
    protected static $object = 'Voiture';

    private $idVoiture;
    private $dateEntreeVoiture;
    private $descriptifVoiture;
    private $couleurVoiture;
    private $etatVendableVoiture;
    private $idModeleVoiture;

    public function __construct($data = array())
    {
        if (!empty($data)) {
            $this->idVoiture = $data['idVoiture'];
            $this->dateEntreeVoiture = $data['dateEntreeVoiture'];
            $this->descriptifVoiture = $data['descriptifVoiture'];
            $this->couleurVoiture = $data['couleurVoiture'];
            $this->etatVendableVoiture = $data['etatVendableVoiture'];
            $this->idModeleVoiture = $data['idModele'];
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
