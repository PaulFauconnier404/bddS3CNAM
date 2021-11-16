<?php

require_once (File::build_path(array('model','Model.php')));

class ModelStation extends Model
{
    protected static $object = 'station';

    private $id;
    private $nom;
    private $geolocalisation;

    public function __construct($data = array())
    {
        if(!empty($data)) {
            $this->id = $data["id"];
            $this->nom = $data["nom"];
            $this->geolocalisation = $data["geolocalisation"];
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

    public static function ligneParStation($val) {
        $sql = "SELECT * FROM ligne_par_station('$val')";
        $rep = Model::$pdo->query($sql);
        $rep->setFetchMode(PDO::FETCH_ASSOC);
        $tab_obj = $rep->fetchAll();
        return $tab_obj;
    }
}