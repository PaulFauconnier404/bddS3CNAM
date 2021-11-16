<?php

require_once (File::build_path(array('model','Model.php')));

class ModelLigne extends Model
{
    protected static $object = 'ligne';

    private $id;
    private $numero;
    private $stationdepart;
    private $stationterminus;
    private $nbkilometres;
    private $dureetotale;

    public function __construct($data = array())
    {
        if(!empty($data)) {
            $this->id = $data["id"];
            $this->numero = $data["numero"];
            $this->stationdepart = $data["stationdepart"];
            $this->stationterminus = $data["stationterminus"];
            $this->nbkilometres = $data["nbkilometres"];
            $this->dureetotale = $data["dureetotale"];
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

    public static function stationParLigne($val) {
        $sql = "SELECT * FROM station_par_ligne('$val')";
        $rep = Model::$pdo->query($sql);
        $rep->setFetchMode(PDO::FETCH_ASSOC);
        $tab_obj = $rep->fetchAll();
        return $tab_obj;
    }
}