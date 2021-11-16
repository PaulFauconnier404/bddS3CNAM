<?php

require_once (File::build_path(array('model','Model.php')));

class ModelStationligne extends Model
{
    protected static $object = 'stationligne';
    protected static $isComposite = true;

    private $idligne;
    private $idstation;

    public function __construct($data = array())
    {
        if(!empty($data)) {
            $this->idligne = $data["idligne"];
            $this->idstation = $data["idstation"];
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

    public static function deleteComposite($primary, $primary2) {
        $table_name = static::$object;
        $class_name = 'Model'.ucfirst($table_name);
        $primary_key = static::$primary . 'ligne';
        $primary_key2 = static::$primary . 'station';
        $sql = "DELETE FROM $table_name WHERE $primary_key =:nom_tag AND $primary_key2 =:nom_tag2";
        try {
            // Préparation de la requête
            $req_prep = Model::$pdo->prepare($sql); //permet de protéger la requete SQL

            $values = array(
                "nom_tag" => $primary,
                "nom_tag2" => $primary2,
                //nomdutag => valeur, ...
            );
            // On donne les valeurs et on exécute la requête
            $req_prep->execute($values);
        }
        catch(PDOException $e) {
            if (Conf::getDebug()) {
                $view = 'error';
                $pagetitle = 'Erreur';
                require (File::build_path(array('view', 'view.php')));
            } else {
                echo ('Une erreur est survenue cette objet n"existe déja plus dans la base de données ! <br> <a href="?action=readAll"> Retour a la page d\'accueil </a>');
            }
            die();
        }

    }
}