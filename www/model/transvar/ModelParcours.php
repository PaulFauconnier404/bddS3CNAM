<?php

require_once (File::build_path(array('model','Model.php')));

class ModelParcours extends Model
{
    protected static $object = 'parcours';

    private $id;
    private $depart;
    private $idconducteur;
    private $idligne;

    public function __construct($data = array())
    {
        if(!empty($data)) {
            $this->id = $data["id"];
            $this->depart = $data["depart"];
            $this->idconducteur = $data["idconducteur"];
            $this->idligne = $data["idligne"];
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

    public static function selectNomPersonne($primary_value) {
        $table_name = 'personne';
        $class_name = 'Model'.ucfirst($table_name);
        $primary_key = 'id';
        $sql = "SELECT nom from $table_name WHERE $primary_key =:val";

        // Préparation de la requête
        $req_prep = Model::$pdo->prepare($sql); //permet de protéger la requete SQL

        $values = array(
            "val" => $primary_value,
        );

        $req_prep->execute($values);

        // On récupère les résultats comme précédemment
        $req_prep->setFetchMode(PDO::FETCH_ASSOC);
        $tab_obj = $req_prep->fetchAll();
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($tab_obj))
            return false;
        return $tab_obj;
    }
}