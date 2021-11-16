<?php

require_once(File::build_path(array('model', 'Model.php')));

class ModelClient extends Model
{
    protected static $object = 'Client';

    private $mailClient;
    private $nomClient;
    private $preClient;
    private $telClient;

    public function __construct($data = array())
    {
        if (!empty($data)) {
            $this->mailClient = $data['mailclient'];
            $this->nomClient = $data['nomclient'];
            $this->preClient = $data['preclient'];
            $this->telClient = $data['telclient'];
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
