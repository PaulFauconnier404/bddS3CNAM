<?php

require_once (File::build_path(array('model','Model.php')));

class ModelBus extends Model
{
    protected static $object = 'bus';

    private $id;
    private $marque;
    private $immatriculation;
    private $nbplaces;
    private $idconducteur;

    public function __construct($data = array())
    {
        if(!empty($data)) {
            $this->id = $data["id"];
            $this->marque = $data["marque"];
            $this->immatriculation = $data["immatriculation"];
            $this->nbplaces = $data["nbplaces"];
            $this->idconducteur = $data["idconducteur"];
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

    public static function readBusAvailable() {
        $sql = "SELECT * FROM bus_non_affecte()";
        $rep = Model::$pdo->query($sql);
        $rep->setFetchMode(PDO::FETCH_ASSOC);
        $tab_obj = $rep->fetchAll();
        return $tab_obj;
    }
}