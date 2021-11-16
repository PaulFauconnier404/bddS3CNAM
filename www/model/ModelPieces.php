<?php

require_once(File::build_path(array('model', 'Model.php')));

class ModelPieces extends Model
{
    protected static $object = 'Pieces';

    private $refPiece;
    private $nomPiece;
    private $quantPiece;
    private $prixPiece;
    private $etatPiece;
    private $dateModifPiece;
    private $idCategorie;
    private $mailAdmin;
    private $idVoiture;

    public function __construct($data = array())
    {
        if (!empty($data)) {
            $this->refPiece = $data['refpiece'];
            $this->nomPiece = $data['nompiece'];
            $this->quantPiece = $data['quantpiece'];
            $this->prixPiece = $data['prixpiece'];
            $this->etatPiece = $data['etatpiece'];
            $this->dateModifPiece = $data['datemodifpiece'];
            $this->idCategorie = $data['idcategoriepiece'];
            $this->mailAdmin = $data['mailadminpiece'];
            $this->idVoiture = $data['idvoiturepiece'];
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
