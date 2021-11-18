<?php

require_once(File::build_path(array('model', 'Model.php')));

class ModelCommande extends Model
{
    protected static $object = 'commande';

    private $idCommande;
    private $accompteVerse;
    private $dateReservation;
    private $heureClickCollect;
    private $dateClickCollect;
    private $mailClientCommande;
    private $refPieceCommande;

    public function __construct($data = array())
    {
        if (!empty($data)) {
            $this->idCommande = $data['idcommande'];
            $this->accompteVerse = $data['accompteverse'];
            $this->dateReservation = $data['datereservation'];
            $this->heureClickCollect = $data['heureclickcollect'];
            $this->dateClickCollect = $data['dateclickcollect'];
            $this->mailClientCommande = $data['mailClientcommande'];
            $this->refPieceCommande = $data['refpiececommande'];
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
