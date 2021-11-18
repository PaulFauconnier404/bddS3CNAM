<?php

require_once(File::build_path(array('model', 'Model.php')));

class ModelAdministrateur extends Model
{
    protected static $object = 'administrateur ';

    private $mailAdmin;
    private $nomAdmin;
    private $prenomAdmin;
    private $password;

    public function __construct($data = array())
    {
        if (!empty($data)) {
            $this->mailAdmin = $data['mailadmin'];
            $this->nomAdmin = $data['nomadmin'];
            $this->prenomAdmin = $data['prenomadmin'];
            $this->password = $data['password'];
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
